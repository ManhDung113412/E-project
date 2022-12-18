<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\client\test;
use Illuminate\Support\Facades\DB;

class homepageController extends Controller
{
    public function getHomePage()
    {
        // $img_header_collection = DB::table('big_collection')->where('is_header_silde', 1)->get();
        // $img_middle_collection = DB::table('big_collection')->where('is_middle_silde', 1)->get();
        // $img_bottom_collection = DB::table('small_collection')->get();
        // return view('clientsPage.homePage', compact('img_header_collection', 'img_bottom_collection', 'img_middle_collection'));
        return view('clientsPage.homePage' );
    }
}
