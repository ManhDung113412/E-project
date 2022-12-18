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
    public function index(){
        $product_details = ProductDetail::all();
        return view('admin.product_detail.list', compact('product_details'));
    }

    public function create(){
        $brands = Brand::all();
        return view('admin.product_detail.create', compact('brands'));
    }

    public function store(Request $request){
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
        'brand_id' => 'required', 
        'category_id' => 'required', 
        'product_id' => 'required', 
        ]);

        $product = Product::find($request->product_id);
        $slug = Str::slug($product->name . '-' . $request->code);
        
        $checkSlug = ProductDetail::where('slug', $slug)->first();
        while ($checkSlug) {
            $slug = $checkSlug->slug . Str::random(5);
        }

        ProductDetail::create([
        'import_price'=> $request->import_price, 
        'export_price'=> $request->export_price, 
        'sale_price'=> $request->sale_price, 
        'main_img'=> $request->main_img, 
        'slide_img_1'=> $request->slide_img_1, 
        'slide_img_2'=> $request->slide_img_2, 
        'information'=> $request->information, 
        'material'=> $request->material, 
        'color'=> $request->color, 
        'size'=> $request->size, 
        'code'=> $request->code, 
        'is_trending'=> $request->is_trending, 
        'is_new_arrivals'=> $request->is_arrivals, 
        'is_feature'=> $request->is_feature, 
        'product_id'=> $request->product_id, 
        'slug'=> $slug, 
        ]);

        return redirect()->route('admin.product-detail.index')->with('success', 'Created Successfully');
    }

    public function edit($id){
        $products = Product::all();
        $brands = Brand::all();
        $categories = Category::all();
        $product_detail = ProductDetail::find($id);
        return view('admin.product_detail.edit', compact('brands', 'products', 'categories', 'product_detail'));
    }

    public function update(Request $request, $id){
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
            'brand_id' => 'required', 
            'category_id' => 'required', 
            'product_id' => 'required', 
            ]);
    
            $product = Product::find($request->product_id);
            $slug = Str::slug($product->name . '-' . $request->code);
            
            $checkSlug = ProductDetail::where('slug', $slug)->first();
            while ($checkSlug) {
                $slug = $checkSlug->slug . Str::random(5);
            }
    
            ProductDetail::where('id', $id)->update([
            'import_price'=> $request->import_price, 
            'export_price'=> $request->export_price, 
            'sale_price'=> $request->sale_price, 
            'main_img'=> $request->main_img, 
            'slide_img_1'=> $request->slide_img_1, 
            'slide_img_2'=> $request->slide_img_2, 
            'information'=> $request->information, 
            'material'=> $request->material, 
            'color'=> $request->color, 
            'size'=> $request->size, 
            'code'=> $request->code, 
            'is_trending'=> $request->is_trending, 
            'is_new_arrivals'=> $request->is_arrivals, 
            'is_feature'=> $request->is_feature, 
            'product_id'=> $request->product_id, 
            'slug'=> $slug, 
            ]);
    
            return redirect()->route('admin.product-detail.edit')->with('success', 'Updated Successfully');
    }

    public function delete($id){
        ProductDetail::where('id', $id)->delete();
        return redirect()->route('admin.product-detail.index')->with('success', 'Deleted Successfully');
    }
}
