<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\projects;
use App\Models\skillImages;

class portfolio extends Controller
{
    //Show Portfolio list
    public function index()
    {
       //fetch project data
       $projects= projects::all();
       //fetch skill images
       $images=skillImages::all();
       return view('guest.portfolio.index',compact('projects','images'));
    }

    //Show Particular portofolio
    public function show($id)
    {
        //show skil images
        $images=skillImages::all();
        //fetch particular portfolio 
        $project=projects::find($id);
        return view('guest.portfolio.portfolio',compact('images','project'));
    }
}
