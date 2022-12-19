<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductDetail;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductDetailController extends Controller
{
    public function index()
    {
        $product_details = ProductDetail::all();
        return view('admin.product_detail.list', compact('product_details'));
    }

    public function create($id)
    {
        $product = Product::find($id);
        return view('admin.product_detail.create', compact('product'));
    }

    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'import_price' => 'required|numeric',
            'export_price' => 'required|numeric',
            'sale_price' => 'required|numeric',
            'main_img' => 'required',
            'slide_img_1' => 'required|unique:product_details',
            'slide_img_2' => 'required|unique:product_details',
            'information' => 'required',
            'material' => 'required',
            'color' => 'required|unique:product_details',
            'size' => 'required',
            'code' => 'required|unique:product_details',
            'quantity' => 'required|numeric',
        ]);

        $product = Product::find($id);

        $slug = Str::slug($product->name . "-" . $request->color);

        ProductDetail::create([
            'import_price' => $request->import_price,
            'export_price' => $request->export_price,
            'sale_price' => $request->sale_price,
            'main_img' => $request->main_img,
            'slide_img_1' => $request->slide_img_1,
            'slide_img_2' => $request->slide_img_2,
            'information' => $request->information,
            'material' => $request->material,
            'color' => $request->color,
            'size' => $request->size,
            'code' => $request->code,
            'is_trending' => $request->is_trending,
            'is_new_arrivals' => $request->is_arrivals,
            'is_feature' => $request->is_feature,
            'product_id' => $id,
            'quantity' => $request->quantity,
            'slug'=> $slug, 
        ]);

        return redirect()->route('admin.product-detail.index')->with('success', 'Created Successfully');
    }

    public function edit($id)
    {
        $products = Product::all();
        $product_detail = ProductDetail::find($id);
        return view('admin.product_detail.edit', compact('products', 'product_detail'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'import_price' => 'required|numeric',
            'export_price' => 'required|numeric',
            'sale_price' => 'required|numeric',
            'main_img' => 'required',
            'slide_img_1' => 'required',
            'slide_img_2' => 'required',
            'information' => 'required',
            'material' => 'required',
            'color' => 'required',
            'size' => 'required',
            'code' => 'required',
            'quantity' => 'required|numeric',
        ]);

        $product_detail = ProductDetail::find($id);
        $product_id  = $product_detail->product_id;
        $product = Product::find($product_id);

        $slug = Str::slug($product->name . "-" . $request->color);

        $old_product_detail = ProductDetail::find($id);
        $old_quantity = $old_product_detail->quantity;
        $product_id = $old_product_detail->product_id;

        ProductDetail::where('id', $id)->update([
            'import_price' => $request->import_price,
            'export_price' => $request->export_price,
            'sale_price' => $request->sale_price,
            'main_img' => $request->main_img,
            'slide_img_1' => $request->slide_img_1,
            'slide_img_2' => $request->slide_img_2,
            'information' => $request->information,
            'material' => $request->material,
            'color' => $request->color,
            'size' => $request->size,
            'code' => $request->code,
            'is_trending' => $request->is_trending,
            'is_new_arrivals' => $request->is_arrivals,
            'is_feature' => $request->is_feature,
            'product_id' => $product_id,
            'quantity' => $request->quantity + $old_quantity,
            'slug'=> $slug, 
        ]);
        
        return redirect()->route('admin.product-detail.index')->with('success', 'Updated Successfully');
    }

    public function delete($id)
    {
        ProductDetail::where('id', $id)->delete();
        return redirect()->route('admin.product-detail.index')->with('success', 'Deleted Successfully');
    }
}
