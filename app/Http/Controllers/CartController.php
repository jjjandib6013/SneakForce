<?php

namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Models\Cart;
    use App\Models\Product;
    use Illuminate\Support\Facades\Auth;

    class CartController extends Controller
    {
        public function index()
        {
            // Get the logged-in user's cart items
            $cart = Cart::with('product')->where('user_id', Auth::id())->get();

            return view('cart.index', compact('cart'));
        }

        public function add(Request $request, $productId)
        {
            $product = Product::findOrFail($productId);

            // Check if the product is already in the user's cart
            $cartItem = Cart::where('user_id', Auth::id())
                            ->where('product_id', $productId)
                            ->first();

            if ($cartItem) {
                $cartItem->quantity += $request->quantity;
                $cartItem->save();
            } else {
                Cart::create([
                    'user_id' => Auth::id(),
                    'product_id' => $productId,
                    'quantity' => $request->quantity,
                ]);
            }

            // Get total cart quantity
            $count = Cart::where('user_id', Auth::id())->sum('quantity');

            return response()->json([
                'success' => true,
                'message' => 'Product added to cart!',
                'cartCount' => $count,
            ]);
        }

        public function update(Request $request, $cartItemId)
        {
            $cartItem = Cart::where('id', $cartItemId)
                            ->where('user_id', Auth::id())
                            ->firstOrFail();

            $cartItem->quantity = $request->quantity;
            $cartItem->save();

            return redirect()->back()->with('success', 'Cart updated!');
        }

        public function remove($cartItemId)
        {
            $cartItem = Cart::where('id', $cartItemId)
                            ->where('user_id', Auth::id())
                            ->firstOrFail();

            $cartItem->delete();

            return redirect()->back()->with('success', 'Product removed from cart!');
        }

        public function getCartCount()
        {
            $count = Cart::where('user_id', Auth::id())->sum('quantity');

            return response()->json(['count' => $count]);
        }
    }
