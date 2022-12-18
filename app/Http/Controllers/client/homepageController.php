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
        $middle_slides_img = DB::table('sliedes')->where('Is_Top_Slide', 0)->where('Is_Middle_Slide', 1)->get();
        $top_slides_img = DB::table('sliedes')->where('Is_Top_Slide', 1)->where('Is_Middle_Slide', 0)->get();
        $products = DB::table('products')->get()->shuffle();
        $ran_pro = [];
        array_push($ran_pro, $products[0], $products[1], $products[2], $products[3]);
        $dior = DB::table('brand_collections')->where('Brand_ID',2)->get();
        $chanel = DB::table('brand_collections')->where('Brand_ID',1)->get();
        $Gucci = DB::table('brand_collections')->where('Brand_ID',3)->get();
        $LV = DB::table('brand_collections')->where('Brand_ID',4)->get();
        // dd($chanel);
        return view('clientsPage.homePage', ['middle_slides_img' => $middle_slides_img, 'top_slides_img' => $top_slides_img, 'randomPro' => $ran_pro,'dior'=>$dior,'channel'=>$chanel,'LV'=>$LV,'gucci'=>$Gucci]);
    }
}
