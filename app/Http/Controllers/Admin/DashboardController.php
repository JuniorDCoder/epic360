<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Order;
use App\Models\Store;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $startDate = Carbon::now()->subDays(6)->startOfDay();
        $endDate = Carbon::now()->endOfDay();

        $orders = Order::whereBetween('created_at', [$startDate, $endDate])
                       ->orderBy('created_at', 'asc')
                       ->get()
                       ->groupBy(function($date) {
                           return Carbon::parse($date->created_at)->format('Y-m-d');
                       });

        $orderCounts = [];
        $orderAmounts = [];

        foreach ($orders as $date => $orderGroup) {
            $orderCounts[$date] = $orderGroup->count();
            $orderAmounts[$date] = $orderGroup->sum('total');
        }

        return Inertia::render('Admin/Dashboard', [
            'orderCounts' => $orderCounts,
            'orderAmounts' => $orderAmounts,
        ]);
    }

    public function orders()
    {
        $orders = Order::with(['user', 'transactions', 'orderItems.product'])
                       ->orderBy('created_at', 'desc')
                       ->get();

        return Inertia::render('Admin/Orders', [
            'orders' => $orders,
        ]);
    }

    public function customers(){
        $customers = User::all();

        return Inertia::render('Admin/Customers', [
            'users' => $customers,
        ]);
    }

    public function support(){
        return Inertia::render('Admin/Support');
    }
    public function settings(){
        return Inertia::render('Admin/Settings', [
            'store' => Store::first()
        ]);
    }
}
