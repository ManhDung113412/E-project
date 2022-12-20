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
            'code' => 'required|unique:products',
        ]);

        $slug = Str::slug($request->name);

        Product::create([
            'Brand_id' => $request->brand,
            'Category_id' => $request->category,
            'Name' => $request->name,
            'IMG' => $request->img,
            'Code' => $request->code,
            'Slug' => $slug,
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

        Product::where('ID', $id)->update([
            'Brand_ID' => $request->brand,
            'Category_ID' => $request->category,
            'Name' => $request->name,
            'IMG' => $request->img,
            'Code' => $request->code,
            'Slug' => $slug,
        ]);

        return redirect()->route('admin.product.index')->with('success', 'Updated Successfully');
    }

    public function delete($id)
    {
        Product::where('ID', $id)->delete();
        return redirect()->route('admin.product.index')->with('success', 'Deleted Successfully');
    }
}
