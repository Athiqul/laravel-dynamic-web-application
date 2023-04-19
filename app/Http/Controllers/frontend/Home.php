<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\homeslider;
use App\Models\AboutInfo;

class Home extends Controller
{
    public function index()
    {
        //get home slider information
        $homeSlider=homeslider::latest()->first();
        //get About portion on home Page
        $about=AboutInfo::latest()->first();
       
        return view('guest.index',['home_slider'=>$homeSlider,'about'=>$about]);
    }
}
