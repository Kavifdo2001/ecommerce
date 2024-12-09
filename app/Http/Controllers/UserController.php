<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function UserHome()
    {
        // Fetch all products and categories
        $products = Product::all();
        $categories = Category:: where('parent_id', 0)->get(); // Fetch categories

        // Pass both products and categories to the view
        return view('User.index', compact('products', 'categories'));
    }

    public function aboutUs()
    {
        return view('user.aboutUs');
    }

    public function contactUs()
    {
        return view('user.contactUs');
    }

//    public function product()
//    {
//        $products = Product::all();
//
//        $isInCart = false;
//        if (Auth::check()) {
//            $userId = Auth::id();
//            $isInCart = Cart::where('user_id', $userId)->where('product_id', $id)->exists();
//        }
//
//        return view('user.product', compact('products', 'isInCart'));
//
//
//    }

    public function product()
    {
        $products = Product::all();
        $isInCart = [];

        if (Auth::check()) {
            $userId = Auth::id();
            foreach ($products as $product) {
                $isInCart[$product->id] = Cart::where('user_id', $userId)->where('product_id', $product->id)->exists();
            }
        }

        return view('user.product', compact('products', 'isInCart'));
    }


    public function bulk()
    {
        return view('user.bulk');
    }

    public function wishlist()
    {
        return view('user.wishlist');
    }

    public function profile()
    {


        $userId = Auth::id(); // Assuming you have user authentication in place
        $orders = Order::where('user_id', $userId)->orderBy('created_at', 'desc')->get();

        // return view('User.profile', compact('orders'));

        $user = Auth::user(); // Get the authenticated user
        return view('user.profile', compact('user','orders')); // Pass the user data to the view
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'f_name' => 'required|string|max:255',
            'l_name' => 'required|string|max:255',
            'contact' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string|max:255',
        ]);

        $user = Auth::user();

        $user->f_name = $request->f_name;
        $user->l_name = $request->l_name;
        $user->contact = $request->contact;
        $user->email = $request->email;
        $user->address = $request->address;


        $user->save();


        return redirect()->back()->with('success', 'Profile updated successfully!');
    }



}

