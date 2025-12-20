<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;

class CheckoutController extends Controller
{
    /**
     * Display the checkout page.
     */
    public function index()
    {
        $user = Auth::user();

        // Fetch cart items
        $cart = $user->cart()->with('product')->get();
        if ($cart->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        // Pre-fill info with previous checkout/order data if available
        $lastOrder = $user->orders()->latest()->first(); // latest order

        return view('checkout.index', [
            'cart' => $cart,
            'user' => $user,
            'prefill' => $lastOrder, // could be null
        ]);
    }

    /**
     * Store the checkout information and process the order.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        // Validate checkout info
        $data = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'province' => 'required|string|max:100',
            'postal_code' => 'required|string|max:20',
            'country' => 'required|string|max:100',
            'payment_method' => 'required|string|in:cod,gcash,card',
        ]);

        DB::transaction(function () use ($user, $data) {

            // Optional: update user info
            $user->update([
                'name' => $data['full_name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'address' => $data['address'],
                'city' => $data['city'],
                'province' => $data['province'],
                'postal_code' => $data['postal_code'],
                'country' => $data['country'],
            ]);

            $cart = $user->cart()->with('product')->get();

            if ($cart->isEmpty()) {
                abort(400, 'Cart is empty.');
            }

            $total = $cart->sum(fn($item) => $item->quantity * $item->product->price);

            $order = Order::create([
                'user_id' => $user->id,
                'payment_method' => $data['payment_method'],
                'total' => $total,
                'phone' => $data['phone'],
                'address' => $data['address'],
                'city' => $data['city'],
                'province' => $data['province'],
                'postal_code' => $data['postal_code'],
                'status' => 'pending',
            ]);

            foreach ($cart as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price,
                ]);
            }

            $user->cart()->delete();
        });

        // Redirect to the orders page instead of back
        return redirect()->route('orders.index')->with('success', 'Order placed successfully!');
    }
}
