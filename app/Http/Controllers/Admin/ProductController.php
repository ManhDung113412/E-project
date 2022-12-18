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
        return view('admin.product.create', compact('brands'));
    }

    public function search(Request $request)
    {
        if ($request->get('brand')) {
            $brand = $request->get('brand');
            $categories = Category::where('brand_id', $brand)->get();
            $data1 = '<select class="form-control" id="category" name="category_id">';
                foreach ($categories as $category)
                {
                    $data1 .= '
                    <option value="'.$category->id.'">
                        '.$category->name.'
                    </option>';
                }
                $data1 .='</select>';
                echo $data1;
        }

        if ($request->get('category')) {
            $category = $request->get('category');
            $products = Product::where('category_id', $category)->get();
            $data2 = '<select class="form-control" id="product" name="product_id">';
                foreach ($products as $product)
                {
                    $data2 .= '
                    <option value="'.$product->id.'">
                        '.$product->name.'
                    </option>';
                }
                $data2 .='</select>';
                echo $data2;
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:products',
            'img' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'code' => 'required',
        ]);

        $slug = Str::slug($request->name);
        $checkSlug = Product::where('slug', $slug)->first();
        while ($checkSlug) {
            $slug = $checkSlug->slug . Str::random(5);
        }

        Product::create([
            'name' => $request->name,
            'img' => $request->img,
            'category_id' => $request->category_id,
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
            'name' => 'required|unique:products',
            'img' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'code' => 'required',
        ]);

        $slug = Str::slug($request->name);
        $checkSlug = Product::where('slug', $slug)->first();
        while ($checkSlug) {
            $slug = $checkSlug->slug . Str::random(5);
        }

        Product::where('id', $id)->update([
            'name' => $request->name,
            'img' => $request->img,
            'category_id' => $request->category_id,
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
