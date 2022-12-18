<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
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
            'name' => 'required|unique:brands',
            'logo' => 'required',
            'information' => 'required',
            'code' => 'required',
        ]);

        $slug = Str::slug($request->name);
        $checkSlug = Brand::where('slug', $slug)->first();
        while ($checkSlug) {
            $slug = $checkSlug->slug . Str::random(5);
        }

        Brand::create([
            'name' => $request->name,
            'logo' => $request->logo,
            'information' => $request->information,
            'code' => $request->code,
            'slug' => $slug,
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
            'name' => 'required',
            'logo' => 'required',
            'information' => 'required',
            'code' => 'required',
        ]);

        $slug = Str::slug($request->name);
        $checkSlug = Brand::where('slug', $slug)->first();
        while ($checkSlug) {
            $slug = $checkSlug->slug . Str::random(5);
        }

        Brand::where('id', $id)->update([
            'name' => $request->name,
            'logo' => $request->logo,
            'information' => $request->information,
            'code' => $request->code,
            'slug' => $slug,
        ]);

        return redirect()->route('admin.brand.edit', $id)->with('success', 'Updated Successfully');
    }

    public function delete($id)
    {
        Brand::where('id', $id)->delete();
        return redirect()->route('admin.brand.index')->with('success', 'Deleted Successfully');
    }
}
