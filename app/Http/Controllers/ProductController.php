<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    public function productIndex()
    {
        $products = Product::all();
        return view('admin.products.productIndex', compact('products'));
    }

    public function productCreate()
    {
        $categories = Category::where('parent_id', 0)->get();
        $subCategories =Category::whereNot('parent_id',0)->get();
        return view('admin.products.addProduct',compact('categories','subCategories'));
    }

    public function addProduct(Request $request)
    {
        $request->validate([
            'amount' => 'required',
            'description' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $imagePaths = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $documentFile) {
                $documentName = time() . '_' . $documentFile->getClientOriginalName();
                $path = 'assets/upload/products/';
                // Move the uploaded file to the desired directory
                $documentFile->move(public_path($path), $documentName);
                $imagePaths[] = "$path$documentName";
            }
        }

        $product = Product::create([
            'name' => $request->name,
            'quantity' => $request->quantity,
            'amount' => $request->amount,
            'category' => $request->category,
            'sub_category' => $request->sub_category,
            'description' => $request->description,
            'images' => json_encode($imagePaths),
        ]);

        return redirect()->route('product.create')->with('success', 'Product Added successfully.');
    }

    public function viewProduct($id)
    {
        $product = Product::findOrFail($id);
        $product = Product::with('categorys')->findOrFail($id);

        return view('admin.products.viewProducts', compact('product'));
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product deleted successfully.');
    }

    public function editProduct($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::where('parent_id', 0)->get();
        $subCategories = Category::whereNot('parent_id',0)->get();
        return view('admin.products.editProduct', compact('product' , 'categories','subCategories'));
    }

    public function updateProduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'amount' => 'required',
            'description' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($request->hasFile('images')) {
            $imagePaths = json_decode($product->images, true) ?? [];
            foreach ($request->file('images') as $file) {
                $documentName = time() . '_' . $file->getClientOriginalName();
                $path = 'assets/upload/products/';
                $file->move(public_path($path), $documentName);
                $imagePaths[] = "$path$documentName";
            }
            $product->images = json_encode($imagePaths);
        }

        $product->update([
            'name' => $request->name,
            'quantity' => $request->quantity,
            'amount' => $request->amount,
            'category' => $request->category,
            'sub_category' => $request->sub_category,
            'description' => $request->description,
        ]);

        return redirect()->route('product.edit', $product->id)->with('success', 'Product updated successfully.');
    }


    public function removeImage(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $images = json_decode($product->images, true);

        if (isset($images[$request->image_index])) {
            unset($images[$request->image_index]);
            $product->images = json_encode(array_values($images));
            $product->save();
        }

        return redirect()->route('product.edit', $product->id)->with('success', 'Image removed successfully.');
    }


    public function shopProductView($id)
    {
        $products = Product::findOrFail($id);
        $products->images = json_decode($products->images, true);  // Decode images
    
        $isInCart = false;
        if (Auth::check()) {
            $userId = Auth::id();
            $isInCart = Cart::where('user_id', $userId)->where('product_id', $id)->exists();
        }
    
        return view('User.products.ShopProductView', compact('products', 'isInCart'));
    }
    
 



}
