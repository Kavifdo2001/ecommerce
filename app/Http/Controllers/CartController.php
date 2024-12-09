<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        if (!auth()->check()) {
            return response()->json(['error' => 'You need to be logged in to add items to the cart'], 401);
        }

        $userId = auth()->id();
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1);

        $cart = session()->get('cart', []);

        if(isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = [
                "id" => $productId,
                "name" => $request->input('product_name'),
                "quantity" => $quantity,
                "price" => $request->input('product_price')
            ];
        }

        session()->put('cart', $cart);

        $amount = $request->amount;
        $quantity = $request->quantity;
        $total = $amount * $quantity;

        Cart::create([
            'user_id' => $userId,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'total' => $total
        ]);

        return back()->with('success', 'Item added to cart successfully!');

//        return response()->json(['success' => 'Product added to cart', 'cart_count' => count($cart)]);
    }

//    public function addToCart(Request $request)
//    {
//        $productId = $request->input('product_id');
//        $quantity = $request->input('quantity', 1);
//
//        $cart = session()->get('cart', []);
//
//        if(isset($cart[$productId])) {
//            $cart[$productId]['quantity'] += $quantity;
//        } else {
//            $cart[$productId] = [
//                "id" => $productId,
//                "name" => $request->input('product_name'),
//                "quantity" => $quantity,
//                "price" => $request->input('product_price'),
//                "image" => $request->input('product_image') // Add this line
//            ];
//        }
//
//        session()->put('cart', $cart);
//
//        $userId = auth()->id();
//        Cart::create([
//            'user_id' => $userId,
//            'product_id' => $request->product_id,
//            'quantity' => $request->quantity,
//        ]);
//
//
//        return response()->json(['success' => 'Product added to cart', 'cart_count' => count($cart)]);
//    }
    public function cartCount()
    {
        $cart = session()->get('cart', []);
        return response()->json(['cart_count' => count($cart), 'cart_items' => $cart]);
    }

    public function getCartItems()
    {
        $cart = session()->get('cart', []);
        return response()->json($cart);
    }

    public function removeFromCart(Request $request)
    {
        $productId = $request->input('product_id');
        $cart = session()->get('cart', []);
        if(isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
        }

        return response()->json(['success' => 'Product removed from cart', 'cart_count' => count($cart), 'cart_items' => $cart]);
    }

    public function viewCart()
    {
//        $cartItems = Cart::all();
        $id = auth()->id();

        $cartItems = Cart::where('user_id', $id)->get();

        $grandTotal = $cartItems->sum(function($cart) {
            return $cart->quantity * $cart->product->amount;
        }); // Calculate grand total
        $tax = $grandTotal * 0.1;
        $total = $grandTotal + $tax;

        return view('User.cart.cart', compact('cartItems', 'grandTotal', 'tax', 'total'));
    }

    public function removeCart($id)
    {
        Cart::findOrFail($id)->delete();
        return back()->with('success', 'Item removed from cart successfully!');
    }

    public function checkout()
    {
        $lastQuote = Order::orderBy('id', 'desc')->first();

        $ldate = date('Ymd');

        if ($lastQuote) {
            $lastQuoteNo = $lastQuote->order_no;
            $lastQuoteDate = substr($lastQuoteNo, 0, 8);
            $lastQuoteIncrement = substr($lastQuoteNo, 8);

            if ($lastQuoteDate == $ldate) {
                $newIncrement = (int)$lastQuoteIncrement + 1;
            } else {
                $newIncrement = 1;
            }
        } else {
            $newIncrement = 1;
        }

        $newQuoteNo = $ldate . str_pad((string)$newIncrement, 4, '0', STR_PAD_LEFT); // Pad the number to ensure fixed width

//     var_dump($newQuoteNo);die();

        $id = auth()->id();

        $cartItems = Cart::where('user_id', $id)->get();
        // Check if the cart is empty
        if ($cartItems->isEmpty()) {
            return redirect()->back()->with('error', 'Your cart is empty. Please add items to your cart before placing an order.');
        }
        $grandTotal = $cartItems->sum(function($cart) {
            return $cart->quantity * $cart->product->amount;
        }); // Calculate grand total
        $tax = $grandTotal * 0.1;
        $total = $grandTotal + $tax;
        return view('User.cart.checkout',compact('cartItems', 'grandTotal', 'tax', 'total','newQuoteNo'));
    }

//    public function order()
//    {
//        $id = auth()->id();
//        $cartItems = Cart::where('user_id', $id)->get();
//        $cartItems->delete();
//    }

    public function order(Request $request)
    {

        $userId = Auth::id();

            $order =Order::create([
                'user_id' => $userId,
                'additional' => $request->additional,
                'grand_total' => $request->grand_total,
                'order_no' => $request->order_no,
            ]);

        // Create the order items
        foreach ($request->products_id as $index => $productId) {
            OrderItems::create([
                'order_id' => $order->id, // Use the created order's ID
                'products_id' => $productId,
                'quantity' => $request->quantities[$index],
                'total' => $request->totals[$index],
            ]);
        }


        // Remove cart items for the user
        $cartItems = Cart::where('user_id', $userId)->get();
        foreach ($cartItems as $cartItem) {
            $cartItem->delete();
        }

        return redirect()->route('order.success')->with('success', 'Order placed successfully!');

    }

}
