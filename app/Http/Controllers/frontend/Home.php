<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\homeslider;
use App\Models\AboutInfo;
use App\Models\skillImages;
use App\Models\projects;
use App\Models\BlogCategory;
use App\Models\BlogModel;

class Home extends Controller
{
    public function index()
    {
        //get home slider information
        $homeSlider=homeslider::latest()->first();
        //get About portion on home Page
        $about=AboutInfo::latest()->first();
        //SEND About images
        $skillImages=skillImages::where('status','=','1')->get();
        // Project Portofolio
        $portofolio=projects::all();
       
        return view('guest.index',['home_slider'=>$homeSlider,'about'=>$about,'aboutImages'=>$skillImages,'portfolio'=>$portofolio]);
    }
}
