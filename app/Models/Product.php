<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name', 
        'img', 
        'category_id', 
        'code', 
        'slug', 
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function productdetails()
    {
        return $this->hasMany(ProductDetail::class, 'product_id', 'id');
    }
}
