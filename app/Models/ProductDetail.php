<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;

    protected $table = 'product_details';

    protected $fillable = [
        'import_price', 
        'export_price', 
        'sale_price', 
        'main_img', 
        'slide_img_1', 
        'slide_img_2', 
        'information', 
        'material', 
        'color', 
        'size', 
        'code', 
        'is_trending', 
        'is_new_arrivals', 
        'is_feature', 
        'product_id', 
        'quantity',
        // 'slug', 
    ];

    public function product(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
