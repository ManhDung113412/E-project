<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    public function order_details()
    {
        return $this->hasMany(OrderDetail::class, 'Order_ID', 'ID');
    }

    public function customer(){
        return $this->belongsTo(User::class, 'Customer_ID', 'ID');
    }
}
