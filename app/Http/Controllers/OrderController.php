<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = auth()->user()
            ->orders()
            ->with('items.product')
            ->latest()
            ->get();

        return view('orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        // prevent user from seeing others' orders
        if ($order->user_id !== auth()->id()) {
            abort(403);
        }

        $order->load('items.product');

        return view('orders.show', compact('order'));
    }

    public function cancel(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'reason' => 'required|string|max:255',
            'note' => 'nullable|string|max:1000',
        ]);

        $order = Order::findOrFail($request->order_id);

        // Security: user can only cancel their own order
        if ($order->user_id !== auth()->id()) {
            abort(403);
        }

        // Only pending orders can be cancelled
        if ($order->status !== 'pending') {
            return back()->with('error', 'This order can no longer be cancelled.');
        }

        $order->update([
            'status' => 'cancelled',
            'cancel_reason' => $request->reason,
            'cancel_note' => $request->note,
        ]);

        return redirect()
            ->route('orders.index')
            ->with('success', 'Order cancelled successfully.');
    }

    public function updateStatus(Request $request)
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }

        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'status' => 'required|in:pending,paid,shipped,delivered,cancelled',
        ]);

        $order = Order::findOrFail($request->order_id);

        $order->update([
            'status' => $request->status,
        ]);

        return back()->with('success', 'Order status updated.');
    }
}
