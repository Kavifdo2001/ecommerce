<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function categoryIndex()
    {
        $categories = Category::where('parent_id', 0)->get();
        return view('admin.category.categoryIndex', compact('categories'));
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('img')) {
            $imageName = time() . '_' . $request->file('img')->getClientOriginalName();
            $path = 'assets/upload/category/';
            $request->file('img')->move(public_path($path), $imageName);
            $imagePath = "$path$imageName";
        }

        Category::create([
            'category_name' => $request->category_name,
            'parent_id' => 0, // Assuming it's a main category
            'img' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Category added successfully');
    }

    public function addSubCategory($id)
    {
        $mainCategory = Category::findOrFail($id);
        $subCategories = Category::where('parent_id', $id)->get();
        return view('admin.category.addSubCategory', compact('mainCategory', 'subCategories'));
    }

    public function storeSubCategory(Request $request)
    {
        $request->validate([
            'sub_category' => 'required|string|max:255',
        ]);

        Category::create([
            'category_name' => $request->sub_category,
            'parent_id' => $request->category_id,
        ]);

        return redirect()->back()->with('success', 'Subcategory added successfully!');
    }

    public function editCategory($id)
    {
        $category = Category::findOrFail($id);
        $subCategories = Category::where('parent_id', $id)->get(); // Ensure this variable matches
        return view('admin.category.editCategory', compact('category', 'subCategories'));
    }

    public function updateCategory(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $category = Category::findOrFail($id);
        $category->category_name = $request->input('category_name');
        
        if ($request->hasFile('img')) {
            // Delete the old image if exists
            if ($category->img) {
                Storage::delete(public_path($category->img));
            }

            // Store the new image
            $imageName = time() . '_' . $request->file('img')->getClientOriginalName();
            $path = 'assets/upload/category/';
            $request->file('img')->move(public_path($path), $imageName);
            $category->img = "$path$imageName";
        }

        $category->save();

        return redirect()->back()->with('success', 'Category updated successfully!');
    }

    public function updateSubCategory(Request $request)
    {
        foreach ($request->sub_category as $id => $name) {
            $subCategory = Category::findOrFail($id);
            $subCategory->category_name = $name;
            $subCategory->save();
        }

        return redirect()->back()->with('success', 'Subcategories updated successfully!');
    }

    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);
        $subCategories = Category::where('parent_id', $id)->get();

        // Delete the category image if exists
        if ($category->img) {
            Storage::delete(public_path($category->img));
        }

        foreach ($subCategories as $subCategory) {
            // Delete the subcategory images if they have any
            if ($subCategory->img) {
                Storage::delete(public_path($subCategory->img));
            }
            $subCategory->delete();
        }

        $category->delete();

        return redirect()->back()->with('success', 'Category and its subcategories deleted successfully!');
    }

    public function viewCategory($id)
    {
        $category = Category::findOrFail($id);
        $subCategories = Category::where('parent_id', $id)->get();
        return view('admin.category.viewCategory', compact('category', 'subCategories'));
    }

    public function removeCategoryImage($id)
    {
        $category = Category::findOrFail($id);

        if ($category->img) {
            Storage::delete(public_path($category->img));
            $category->img = null;
            $category->save();
        }

        return redirect()->route('category.edit', $category->id)->with('success', 'Image removed successfully.');
    }

    public function show($id)
    {
        // Fetch the category by its ID
        $category = Category::findOrFail($id);

        // Fetch the subcategories related to the category
        $subCategory = SubCategory::where('category_id', $id)->get();

        // Pass the variables to the view
        return view('admin.view-category', compact('category', 'subCategory'));
    }
}
