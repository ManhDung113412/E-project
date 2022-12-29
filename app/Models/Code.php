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
        ,'ID'
    ];

    public function orders(){
        return $this->hasMany(OrderDetail::class, 'Code_ID', 'ID');
    }
}
