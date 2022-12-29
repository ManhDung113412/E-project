<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';

    protected $fillable = [
        'Method',
        'Method',
        'Method',
        'Price'
    ];

    public function orders(){
        return $this->hasMany(OrderDetail::class, 'Payment_ID', 'ID');
    }
}
