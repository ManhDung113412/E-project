<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class aboutusController extends Controller
{
    public function getAboutUs()
    {
        return view('clientsPage.aboutUs');
    }
}
