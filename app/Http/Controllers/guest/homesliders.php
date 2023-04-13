<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\homeslider;
use Illuminate\Validation\Rules\Unique;

class homesliders extends Controller
{
    //fetch home slider
    public function fetchSlide()
    {
      $slider=homeslider::latest()->first();
      if($slider==null)
      {
            $slider=[
              'title'=>'',
              'short_desc'=>'',
              'image_link'=>'',
              'video_url'=>''
            ];
            $slider=(object)$slider;
      }
      return view('admin.home_slider',['data'=>$slider]);

    }


    public function homeSliderStore(Request $request)
    {
              $request->validate([
                'title'=>'required',
                'short_desc'=>'required',
                'image_link'=>'required'
              ]);

              $exist=homeslider::latest()->first();

              
               $image_name='';
              if($request->file('image_link'))
              {
                
                $file=$request->file('image_link');
                $image_name=md5(uniqid()).$file->getClientOriginalName().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('upload/home/'.$image_name));

              }
               
              if($exist==null)
              {
               
                homeslider::create(
                  [
                    'title'=>$request->title,
                    'short_desc'=>$request->short_desc,
                    'image_link'=>$image_name,
                    'video_url'=>$request->video_url
                  ]
                );

                return redirect()->back()->with(['alert_type'=>'info','message'=>'HomeSlider Created!']);
               
              }
              else{
                    $exist->title=$request->title;
                    $exist->short_desc=$request->short_desc;
                    $exist->image_link=$image_name;
                    $exist->video_url=$request->video_url;
                    $exist->save();

                    return redirect()->back()->with(['alert_type'=>'success','messsage'=>'HomeSlider updated!']);
              }
    }


}
