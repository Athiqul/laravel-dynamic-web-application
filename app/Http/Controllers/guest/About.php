<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutInfo;
use Intervention\Image\Facades\Image as Image;

class About extends Controller
{
    public function about()
    {
        $data=AboutInfo::latest()->first();
        return view('admin.about',compact('data'));
    }

    public function storeAbout(Request $request)
    {
        $request->validate([
            "title"=>"required",
            "image_link"=>"image|mimes:jpeg,png,jpg|max:2048",
            "short_desc"=>"required",
            "exp"=>"required",
            "long_desc"=>"required"
        ]);
        //check image
        $imageName=null;
        if($request->file('image_link'))
        {
            $image=$request->file('image_link');
            if($image->isValid())
            {
                $imageName=md5(uniqid()).'.'.$image->getClientOriginalExtension();
                 //path check and create
                $path=public_path('uploads/about/');
                !is_dir($path)&&mkdir($path,0777,true);
                Image::make($image)->resize(523,605)->save($path.$imageName);
            }
        }
        //get existed record
        $data=AboutInfo::latest()->first();
        if($data==null)
        {
            AboutInfo::create([
                "title"=>$request->title,
            "image_link"=>$imageName,
            "short_desc"=>$request->short_desc,
            "exp"=>$request->exp,
            "long_desc"=>$request->long_desc
            ]);

         $noti=[
          "alert_type"=>"success",
          "message"=>"About Page Information Created ",
         ];
         return redirect()->back()->with($noti);   
        }

        $data->title=$request->title;
        $data->image_link=$imageName;
        $data->short_desc=$request->short_desc;
        $data->exp=$request->exp;
        $data->long_desc=$request->long_desc;
        
        $data->save();
        $noti=[
            "alert_type"=>"success",
            "message"=>"About Page Information Updated",
           ];
      return redirect()->back()->with($noti);
    }
}
