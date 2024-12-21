<?php

namespace App\Http\Controllers\UserController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;

class UserRiwayatController extends Controller
{
    public function index()
    {
        // Get the start and end date for the current month
        $startDate = Carbon::now()->startOfMonth();
        $endDate = Carbon::now()->endOfMonth();

        // Fetch orders for the current user
        $orders = Order::where('user_id', auth()->id())
            ->whereBetween('created_at', [$startDate, $endDate])
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($order) {
                return [
                    'id' => $order->id,
                    'nama' => $order->item_name,
                    'amount' => $order->quantity . ' Pcs',
                    'date' => Carbon::parse($order->created_at)->format('d M'),
                    'status' => $order->status,
                    'total_price' => number_format($order->total_price, 0, ',', '.'),
                    'can_reorder' => $order->status === 'Selesai'
                ];
            });

        // Get available date ranges for filter (last 6 months)
        $dateRanges = collect(range(0, 5))->map(function ($month) {
            $date = Carbon::now()->subMonths($month);
            $start = $date->startOfMonth()->format('M d');
            $end = $date->endOfMonth()->format('M d Y');
            return [
                'label' => "$start - $end",
                'start' => $date->startOfMonth()->format('Y-m-d'),
                'end' => $date->endOfMonth()->format('Y-m-d')
            ];
        });

        return view('user.riwayat.index', [
            'orders' => $orders,
            'dateRanges' => $dateRanges
        ]);
    }

    public function filterByDate(Request $request)
    {
        $startDate = Carbon::parse($request->start_date)->startOfDay();
        $endDate = Carbon::parse($request->end_date)->endOfDay();

        $orders = Order::where('user_id', auth()->id())
            ->whereBetween('created_at', [$startDate, $endDate])
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($order) {
                return [
                    'id' => $order->id,
                    'nama' => $order->item_name,
                    'amount' => $order->quantity . ' Pcs',
                    'date' => Carbon::parse($order->created_at)->format('d M'),
                    'status' => $order->status,
                    'total_price' => number_format($order->total_price, 0, ',', '.'),
                    'can_reorder' => $order->status === 'Selesai'
                ];
            });

        return response()->json(['orders' => $orders]);
    }

    public function reorder($orderId)
    {
        $order = Order::where('user_id', auth()->id())
            ->findOrFail($orderId);

        // Create a new order based on the previous one
        $newOrder = $order->replicate();
        $newOrder->status = 'Pending';
        $newOrder->created_at = Carbon::now();
        $newOrder->save();

        return response()->json([
            'message' => 'Order has been successfully reordered',
            'order' => $newOrder
        ]);
    }
}
