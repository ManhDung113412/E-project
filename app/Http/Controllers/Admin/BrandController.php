<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brand.list', compact('brands'));
    }

    public function create()
    {
        return view('admin.brand.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'          => 'required|unique:brands',
            'logo'          => 'required',
            'information'   => 'required',
            'code'          => 'required|unique:brands',
        ]);

        $slug = Str::slug($request->name);

        Brand::create([
            'Name'          => $request->name,
            'Logo'          => $request->logo,
            'Information'   => $request->information,
            'Code'          => $request->code,
            'Slug'          => $slug,
        ]);

        return redirect()->route('admin.brand.index')->with('success', 'Created Successfully');
    }

    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('admin.brand.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'          => 'required',
            'logo'          => 'required',
            'information'   => 'required',
            'code'          => 'required',
        ]);

        $slug = Str::slug($request->name);

        Brand::where('ID', $id)->update([
            'Name'          => $request->name,
            'Logo'          => $request->logo,
            'Information'   => $request->information,
            'Code'          => $request->code,
            'Slug'          => $slug,
        ]);

        return redirect()->route('admin.brand.index')->with('success', 'Updated Successfully');
    }

    public function delete($id)
    {
        $brand = Brand::find($id);
        $brand_id = $brand->ID;
        $products = Product::where('Brand_ID', $brand_id)->count();
        if($products){
            return redirect()->route('admin.brand.index')->with('error', 'Cannot detele this brand!');
        }
        Brand::where('ID', $id)->delete();
        return redirect()->route('admin.brand.index')->with('success', 'Deleted Successfully');
    }
}
