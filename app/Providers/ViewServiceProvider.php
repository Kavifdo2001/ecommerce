<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */

    public function boot()
    {
        // Use a view composer to share categories with the header view
        View::composer('User.components.header', function ($view) {
            $categories = Category::where('parent_id', 0)->get();
            $id = auth()->id();
            $cartItems = Cart::where('user_id', $id)->get();
            $cartItemCount = $cartItems->sum('quantity'); // Calculate total item count
            $view->with(['categories' => $categories, 'cartItems' => $cartItems, 'cartItemCount' => $cartItemCount]);
//            $view->with(['categories' => $categories, 'cartItems' => $cartItems]);
//            $view->with('categories', $categories,'cartItems',$cartItems);
        });
    }


    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */

}
