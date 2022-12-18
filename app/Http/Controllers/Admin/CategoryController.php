<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('admin.category.list', compact('categories'));
    }

    public function create(){
        $brands = Brand::all();
        return view('admin.category.create', compact('brands'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|unique:categories',
            'logo' => 'required',
            'brand_id' => 'required',
            'code' => 'required',
        ]);

        $slug = Str::slug($request->name);
        $checkSlug = Category::where('slug', $slug)->first();
        while ($checkSlug) {
            $slug = $checkSlug->slug . Str::random(5);
        }

        Category::create([
            'name' => $request->name,
            'logo' => $request->logo,
            'brand_id' => $request->brand_id,
            'code' => $request->code,
            'slug' => $slug,
        ]);

        return redirect()->route('admin.category.index')->with('success', 'Created Successfully');
    }

    public function edit($id){
        $category = Category::find($id);
        $brands = Brand::all();
        return view('admin.category.edit', compact('category', 'brands'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required|unique:categories',
            'logo' => 'required',
            'brand_id' => 'required',
            'code' => 'required',
        ]);

        $slug = Str::slug($request->name);
        $checkSlug = Category::where('slug', $slug)->first();
        while ($checkSlug) {
            $slug = $checkSlug->slug . Str::random(5);
        }

        Category::where('id', $id)->update([
            'name' => $request->name,
            'logo' => $request->logo,
            'brand_id' => $request->brand_id,
            'code' => $request->code,
            'slug' => $slug,
        ]);

        return redirect()->route('admin.category.index')->with('success', 'Created Successfully');
    }

    public function delete($id){
        Category::where('id', $id)->delete();
        return redirect()->route('admin.category.index')->with('success', 'Delete Successfully');
    }
}
