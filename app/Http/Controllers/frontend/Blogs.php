<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use App\Models\BlogModel;

class Blogs extends Controller
{
    //Show All Blogs
    public function index()
    {
      $categories=BlogCategory::latest()->take(5)->get();
      $blogs=BlogModel::latest()->take(5)->get();
      $type="All Blogs";
     
      return view('guest.blogs.all_blogs',compact('blogs','categories','type'));
    }
    //Single Blogs
    public function show($id)
    {
        $blogs=BlogModel::latest()->take(5)->get();
       $categories=BlogCategory::latest()->take(5)->get();
       $blog=BlogModel::findorfail($id);
       return view('guest.blogs.blog',compact('blog','blogs','categories'));
    }
    //Category wise Blogs
    public function category($cat_id)
    {

    }
}
