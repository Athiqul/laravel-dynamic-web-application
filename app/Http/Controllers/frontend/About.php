<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutInfo;
use App\Models\skillImages;
class About extends Controller
{
    //render about page
     public function index()
     {
        $about=AboutInfo::latest()->first();
        $images=skillImages::where('status','=','1')->get();
        return view('guest.about',compact('about'),compact('images'));
     }
}
