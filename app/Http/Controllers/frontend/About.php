<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutInfo;

class About extends Controller
{
    //render about page
     public function index()
     {
        $about=AboutInfo::latest()->first();
        return view('guest.about',compact('about'));
     }
}
