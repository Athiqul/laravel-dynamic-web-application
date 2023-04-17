<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\homeslider;

class Home extends Controller
{
    public function index()
    {
        //get home slider information
        $homeSlider=homeslider::latest()->first();

        return view('guest.index',['home_slider'=>$homeSlider]);
    }
}
