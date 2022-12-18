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
        $middle_slides_img = DB::table('sliedes')->where('Is_Top_Slide', 1)->where('Is_Middle_Slide', 0)->get();
        $top_slides_img = DB::table('sliedes')->where('Is_Top_Slide', 1)->where('Is_Middle_Slide', 0)->get();
        return view('clientsPage.homePage', ['middle_slides_img' => $middle_slides_img, 'top_slides_img' => $top_slides_img]);
    }
}
