<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    use HasFactory;

    protected $table = 'codes';

    protected $fillable = [
        'Code',
        'Discount'
    ];

    public function order_details(){
        return $this->hasMany(OrderDetail::class, 'Code_ID', 'ID');
    }
}
