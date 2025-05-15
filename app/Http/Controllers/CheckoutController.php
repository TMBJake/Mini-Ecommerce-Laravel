<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function show()
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        return view('checkout.show', compact('cart'));
    }

    public function process(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'payment_type' => 'required',
        ]);

        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        // ✅ Validate stock availability
        foreach ($cart as $productId => $item) {
            $product = Product::find($productId);
            if (!$product || $item['quantity'] > $product->stock_quantity) {
                return redirect()->route('cart.index')->with('error', "Sorry, not enough stock for '{$item['name']}'. Available: {$product->stock_quantity}");
            }
        }

        // Calculate total
        $total = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));

        // Create order
        $order = Order::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'payment_type' => $request->payment_type,
            'total' => $total
        ]);

        // Create order items and reduce stock
        foreach ($cart as $productId => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_name' => $item['name'],
                'price' => $item['price'],
                'quantity' => $item['quantity']
            ]);

            $product = Product::find($productId);
            if ($product) {
                $product->stock_quantity -= $item['quantity'];
                $product->save();
            }
        }

        session()->forget('cart');

        return redirect('/')->with('success', 'Order placed successfully!');
    }
}
