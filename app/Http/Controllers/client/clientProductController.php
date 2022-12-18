<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class clientProductController extends Controller
{
    public function getProductPages()
    {
        return view('layouts.productPage');
    }
}
