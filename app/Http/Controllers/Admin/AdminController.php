<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index(): View
    {
        $stats = [
            'total_users'    => User::count(),
            'total_orders'   => Order::count(),
            'total_products' => Product::count(),
            'revenue'        => Order::where('status', 'paid')->sum('total_amount'),
            'orders_pending' => Order::where('status', 'pending')->count(),
            'orders_paid'    => Order::where('status', 'paid')->count(),
            'orders_expired' => Order::whereIn('status', ['expired', 'failed'])->count(),
        ];

        $recentOrders = Order::with('user', 'items')->latest()->take(5)->get();

        // Chart: monthly revenue last 6 months
        $months = [];
        $revenueData = [];
        $orderCountData = [];
        for ($i = 5; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $month = $date->format('Y-m');
            $label = $date->translatedFormat('M'); // e.g., Jan, Feb
            $months[] = $label;

            $revenueData[] = Order::where('status', 'paid')
                ->whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->sum('total_amount');

            $orderCountData[] = Order::whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->count();
        }

        // Chart: order status breakdown
        $statusLabels = ['Pending', 'Paid', 'Expired/Failed'];
        $statusCounts = [
            $stats['orders_pending'],
            $stats['orders_paid'],
            $stats['orders_expired'],
        ];

        // Top products by sales
        $topProducts = Product::withCount(['orders as sold_count' => function ($q) {
            $q->where('status', 'paid');
        }])->orderByDesc('sold_count')->take(5)->get();

        return view('admin.dashboard', compact(
            'stats',
            'recentOrders',
            'months',
            'revenueData',
            'orderCountData',
            'statusLabels',
            'statusCounts',
            'topProducts'
        ));
    }
}
