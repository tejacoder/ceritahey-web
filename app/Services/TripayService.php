<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TripayService
{
    protected string $apiKey;
    protected string $privateKey;
    protected string $merchantCode;
    protected string $mode;

    public function __construct()
    {
        $this->apiKey       = config('tripay.api_key');
        $this->privateKey   = config('tripay.private_key');
        $this->merchantCode = config('tripay.merchant_code');
        $this->mode         = config('tripay.mode', 'sandbox');
    }

    protected function baseUrl(): string
    {
        return $this->mode === 'production'
            ? 'https://tripay.co.id/api'
            : 'https://tripay.co.id/api-sandbox';
    }

    protected function headers(): array
    {
        return [
            'Authorization' => 'Bearer ' . $this->apiKey,
            'Accept'        => 'application/json',
        ];
    }

    /** ambil channel pembayaran */
    public function getPaymentChannels(): array
    {
        if (empty($this->apiKey)) {
            return [
                [
                    'code' => 'MOCK_VA',
                    'name' => 'Mock Virtual Account (Dev Only)',
                    'group' => 'Virtual Account',
                    'active' => true,
                ],
            ];
        }

        $res = Http::withHeaders($this->headers())
            ->get($this->baseUrl() . '/merchant/payment-channel');

        if ($res->successful()) {
            return $res->json()['data'] ?? [];
        }

        Log::error('Tripay getPaymentChannels failed', ['body' => $res->body()]);
        return [];
    }

    /** buat transaksi */
    public function createTransaction(array $data): ?array
    {
        if (empty($this->apiKey)) {
            $ref = 'MOCK-' . strtoupper(uniqid());
            return [
                'reference'     => $ref,
                'merchant_ref'  => $data['merchant_ref'],
                'payment_name'  => $data['method'],
                'total_fee'     => 0,
                'total_amount'  => $data['amount'],
                'checkout_url'  => route('payment.mock_success', ['ref' => $ref, 'order' => $data['merchant_ref']]),
                'status'        => 'PENDING',
            ];
        }

        $payload = [
            'method'         => $data['method'],
            'merchant_ref'   => $data['merchant_ref'],
            'amount'         => $data['amount'],
            'customer_name'  => $data['customer_name'],
            'customer_email' => $data['customer_email'],
            'customer_phone' => $data['customer_phone'] ?? '',
            'order_items'    => $data['items'] ?? [],
            'return_url'     => $data['return_url'] ?? url('/order/my'),
            'expired_time'   => now()->addHours(24)->timestamp,
            'signature'      => $this->generateSignature($data['merchant_ref'], $data['amount']),
        ];

        $res = Http::withHeaders($this->headers())
            ->post($this->baseUrl() . '/transaction/create', $payload);

        if ($res->successful()) {
            return $res->json()['data'] ?? null;
        }

        Log::error('Tripay createTransaction failed', [
            'payload' => $payload,
            'body'    => $res->body(),
        ]);
        return null;
    }

    /** detail transaksi */
    public function getTransaction(string $reference): ?array
    {
        $res = Http::withHeaders($this->headers())
            ->get($this->baseUrl() . '/transaction/detail', [
                'reference' => $reference,
            ]);

        if ($res->successful()) {
            return $res->json()['data'] ?? null;
        }

        return null;
    }

    /** verifikasi callback signature - hash dari raw JSON body sesuai docs Tripay */
    public function verifyCallback(string $rawJson, string $signature): bool
    {
        $calculated = hash_hmac('sha256', $rawJson, $this->privateKey);
        return hash_equals($calculated, $signature);
    }

    protected function generateSignature(string $merchantRef, int $amount): string
    {
        return hash_hmac('sha256', $this->merchantCode . $merchantRef . $amount, $this->privateKey);
    }
}
