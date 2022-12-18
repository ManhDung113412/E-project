<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.product.list', compact('products'));
    }

    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();
        return view('admin.product.create', compact('brands', 'categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'brand' => 'required',
            'category' => 'required',
            'name' => 'required|unique:products',
            'img' => 'required',
            'code' => 'required',
        ]);

        $slug = Str::slug($request->name);
        $checkSlug = Product::where('slug', $slug)->first();
        while ($checkSlug) {
            $slug = $checkSlug->slug . Str::random(5);
        }

        Product::create([
            'brand_id' => $request->brand,
            'category_id' => $request->category,
            'name' => $request->name,
            'img' => $request->img,
            'code' => $request->code,
            'slug' => $slug,
        ]);

        return redirect()->route('admin.product.index')->with('success', 'Created Successfully');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $brands = Brand::all();
        $categories = Category::all();
        return view('admin.product.edit', compact('brands', 'product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'brand' => 'required',
            'category' => 'required',
            'name' => 'required',
            'img' => 'required',
            'code' => 'required',
        ]);

        $slug = Str::slug($request->name);
        $checkSlug = Product::where('slug', $slug)->first();
        while ($checkSlug) {
            $slug = $checkSlug->slug . Str::random(5);
        }

        Product::where('id', $id)->update([
            'brand_id' => $request->brand,
            'category_id' => $request->category,
            'name' => $request->name,
            'img' => $request->img,
            'code' => $request->code,
            'slug' => $slug,
        ]);

        return redirect()->route('admin.product.edit')->with('success', 'Updated Successfully');
    }

    public function delete($id)
    {
        Product::where('id', $id)->delete();
        return redirect()->route('admin.product.index')->with('success', 'Deleted Successfully');
    }
}
