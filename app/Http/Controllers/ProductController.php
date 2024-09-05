<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        return view('admin.product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'string|required',
            'description' => 'string|required',
            'price' => 'numeric|required',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:10048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:10048',
        ]);

        $thumbnailPath = null;

        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('thumbnail', 'public');
        }

        $product = Product::create([
            'category_id' => $request->input('category_id'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'thumbnail' => $thumbnailPath,
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('products', 'public');
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $imagePath,
                ]);
            }
        }

        return redirect()->route('product.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'string',
            'description' => 'string',
            'price' => 'numeric',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:10048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:10048',
        ]);

        $product = Product::findOrFail($id);

        $thumbnail = $product->thumbnail;

        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail')->store('thumbnail', 'public');
        }

        $product->update([
            'category_id' => $request->input('category_id'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'thumbnail' => $thumbnail,
        ]);

        if ($request->hasFile('images')) {
            ProductImage::where('product_id', $product->id)->delete();
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('products', 'public');
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $imagePath,
                ]);
            }
        }

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, $id)
    {

        $product = Product::findOrFail($id);

        // Xóa hình ảnh sản phẩm khi xóa sản phẩm
        if ($product->thumbnail) {
            Storage::disk('public')->delete($product->thumbnail);
        }

        foreach ($product->images as $image) {
            Storage::disk('public')->delete($image->image_path);
            $image->delete();
        }

        $product->delete();
        return redirect()->route('product.index');
    }
}
