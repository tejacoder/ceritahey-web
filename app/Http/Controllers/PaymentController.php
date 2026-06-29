<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use App\Services\TripayService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class PaymentController extends Controller
{
    protected TripayService $tripay;

    public function __construct(TripayService $tripay)
    {
        $this->tripay = $tripay;
    }

    public function channels(Order $order): View
    {
        if ($order->user_id !== Auth::id()) abort(404);
        if ($order->status !== 'pending') {
            return redirect()->route('order.show', $order);
        }

        $channels = $this->tripay->getPaymentChannels();
        return view('payments.channels', compact('order', 'channels'));
    }

    public function process(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'order_id' => ['required', 'exists:orders,id'],
            'method'   => ['required', 'string'],
        ]);

        $order = Order::findOrFail($validated['order_id']);
        if ($order->user_id !== Auth::id()) abort(404);

        // cek udah ada payment
        if ($order->payment && $order->payment->status === 'paid') {
            return redirect()->route('order.show', $order);
        }

        $result = $this->tripay->createTransaction([
            'method'         => $validated['method'],
            'merchant_ref'   => $order->invoice,
            'amount'         => $order->total_amount,
            'customer_name'  => $order->customer_name,
            'customer_email' => $order->customer_email,
            'customer_phone' => $order->customer_phone,
            'items'          => $order->items->map(fn($i) => [
                'name'    => $i->product_name,
                'price'   => $i->price,
                'quantity'=> 1,
            ])->toArray(),
            'return_url' => route('order.show', $order),
        ]);

        if (!$result) {
            return back()->withErrors(['msg' => 'Gagal memproses pembayaran. Coba lagi.']);
        }

        // simpan payment
        $payment = Payment::updateOrCreate(
            ['order_id' => $order->id],
            [
                'reference'        => $result['reference'] ?? null,
                'tripay_reference' => $result['reference'] ?? null,
                'method'           => $validated['method'],
                'channel'          => $result['payment_name'] ?? $validated['method'],
                'amount'           => $order->total_amount,
                'fee'              => $result['total_fee'] ?? 0,
                'total'            => $result['total_amount'] ?? $order->total_amount,
                'status'           => 'pending',
                'payload'          => $result,
            ]
        );

        // redirect ke payment page
        if (!empty($result['checkout_url'])) {
            return redirect()->away($result['checkout_url']);
        }

        return redirect()->route('payment.waiting', $payment);
    }

    public function waiting(Payment $payment): View
    {
        if ($payment->order->user_id !== Auth::id()) abort(404);
        return view('payments.waiting', compact('payment'));
    }

    /** Mock Success untuk lokal dev */
    public function mockSuccess(Request $request): RedirectResponse
    {
        $ref = $request->query('ref');
        $invoice = $request->query('order');

        $payment = Payment::where('reference', $ref)->first();
        if ($payment) {
            $payment->update([
                'status'  => 'paid',
                'paid_at' => now(),
            ]);
            $payment->order->update(['status' => 'paid']);
        }

        return redirect()->route('order.my')->with('success', 'Pembayaran Berhasil Disimulasikan (Lunas)!');
    }

    /** callback dari Tripay */
    public function callback(Request $request): void
    {
        $rawJson    = $request->getContent();
        $signature  = $request->header('X-Callback-Signature');
        $payload    = json_decode($rawJson, true);

        if (!$payload) {
            Log::error('Tripay callback: No payload');
            abort(400, 'Invalid payload');
        }

        $payload['signature'] = $signature;
        Log::info('Tripay callback received', $payload);

        Log::info('Tripay Callback Data: ' . $payload['merchant_ref'] . $payload['total_amount'] . $payload['status']);

        $calculatedSig = hash_hmac('sha256', $rawJson, config('tripay.private_key'));
        Log::info('Calculated Sig: ' . $calculatedSig);
        Log::info('Payload Sig: ' . $signature);

        if (!$this->tripay->verifyCallback($rawJson, $signature)) {
            Log::warning('Tripay callback signature invalid', $payload);
            abort(403, 'Invalid signature');
        }

        $payment = Payment::whereHas('order', fn($q) => $q->where('invoice', $payload['merchant_ref']))->first();
        if (!$payment) {
            Log::warning('Tripay callback: payment not found', $payload);
            abort(404, 'Payment not found');
        }

        $status = match ($payload['status']) {
            'PAID'     => 'paid',
            'EXPIRED'  => 'expired',
            'FAILED'   => 'failed',
            default    => 'pending',
        };

        $payment->update([
            'status'  => $status,
            'paid_at' => $status === 'paid' ? now() : $payment->paid_at,
        ]);

        // update order status
        $orderStatus = match ($status) {
            'paid'    => 'paid',
            'expired' => 'expired',
            'failed'  => 'failed',
            default   => 'pending',
        };
        $payment->order->update(['status' => $orderStatus]);
    }
}
