<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutInfo;
use App\Models\skillImages;
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

    //About multiple skill image
    public function addSkillImages()
    {
        return view('admin.about_skill_images');
    }

    //Store multiple skill images
    public function storeSkillImages(Request $request)
    {
           //validation
           $request->validate([
             "images"=>"required",
             "images.*"=>"image|mimes:png,jpg,jpeg|max:2048"
           ]);
           //flag
           $status=false;
           //Save Images
           if($request->hasFile('images'))
           {
              $images=$request->file('images');
               foreach($images as $image)
               {
                     $getImageName=md5(uniqid()).'.'.$image->getClientOriginalExtension();
                     //Saving Image into server folder
                     $path=public_path("uploads/about/skills/");
                     !is_dir($path)&&mkdir($path,0777,true);
                     Image::make($image)->resize(220,220)->save($path.$getImageName);
                     //Saving image name in database
                     skillImages::create([
                        "image_link"=>$getImageName,
                     ]);
                     $status=true;
               }

               if($status)
               {
                  $noti=[
                    'alert_type'=>'success',
                    'message'=>'All images uploaded Successfully !'
                  ];
                  return redirect()->back()->with($noti);
               }
               else{
                $noti=[
                    'alert_type'=>'warning',
                    'message'=>'Image Upload failed !'
                  ];
                  return redirect()->back()->with($noti);
               }
           }
    }
    //show skill images
    public function allSkillImages()
    {
          $images=skillImages::all();
          return view('admin.all_skill_images',compact('images'));
    }
    //Edit Skill images
    public function editSkillImage($id=null)
    {  
       $tuple=skillImages::find($id);
       if($tuple==null)
       {
        return redirect()->back()->with('warning','No record found');
       } 
       return view('admin.edit_skill_image',compact('tuple'));
    }
    //update skill image
    public function updateSkillImage(Request $request,$id=null)
    {
        
        $tuple=skillImages::find($id);
       if($tuple==null)
       {
        return redirect()->back()->with('warning','No record found');
       } 
       $request->validate([
        'image'=>'required|image|mimes:jpg,png,jpeg|max:2048',
       
       ]);

       //remove existence file
       $path=public_path('uploads/about/skills/');
       if(file_exists($path.$tuple->image_link))
       {
        unlink($path.$tuple->image_link);   
       }
      
      //Store new image to directory
      if($request->hasFile('image'))
      {
        $file=$request->file('image');
        $newImage=md5(uniqid()).'.'.$file->getClientOriginalExtension();

        Image::make($file)->resize(220,220)->save($path.$newImage);
        //Update Data base
        $tuple->image_link=$newImage;
        if($tuple->save())
        {
            $noti=[
                'alert_type'=>'info',
                'message'=>'Skill Image Updated!'
            ];
            return redirect()->route('all.skill.images')->with($noti);
        }

      }
      



    }
    //active or hide skill images
    public function activeHide($id)
    {
        $tuple=skillImages::find($id);
        if($tuple==null)
        {
         return redirect()->back()->with('warning','No record found');
        } 
        $tuple->status=='1'?$tuple->status='0':$tuple->status='1';
        $tuple->save();
        return redirect()->back()->with(['alert_type'=>'info','message'=>'Image status updated successfully']);

    }
    //delete skill Images
    public function deleteSkillImage($id)
    {     //get image tuple
        $tuple=skillImages::find($id);
        if($tuple==null)
        {
         return redirect()->back()->with('warning','No record found');
        } 
          //Remove Images from server
          $path=public_path('uploads/about/skills/');
          if(file_exists($path.$tuple->image_link))
          {
           unlink($path.$tuple->image_link);   
          }
          //Remove image information From database   
          skillImages::where('id',$id)->delete();
          return redirect()->back()->with(['alert_type'=>'danger','message'=>'Image Deleted successfully']);
    }
}
