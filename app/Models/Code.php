<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    use HasFactory;

    protected $table = 'codes';

    protected $fillable = [
        'Code',
        'Discount',
        'Date_Start',
        'Date_End',
    ];

    // public function setDateAttribute($value)
    // {
    //     $this->attributes['Date_Start'] = Carbon::parse($value)->format('Y-m-d');
    //     $this->attributes['Date_End'] = Carbon::parse($value)->format('Y-m-d');
    // }

    public function orders(){
        return $this->hasMany(OrderDetail::class, 'Code_ID', 'ID');
    }
}
