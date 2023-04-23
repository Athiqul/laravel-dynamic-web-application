<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\projects;
use Intervention\Image\Facades\Image as Image;
use Exception;

class project extends Controller
{
    //All projects list
    public function index()
    {
           $portfolio=projects::get();
           return view('admin.portfolio_list',compact('portfolio'));
    }
    //create project
    public function create()
    {
        return view('admin.add_portofolio');
    }
    //store project into database
    public function storeProject(Request $request)
    {
        $request->validate([
        'project_name'=>'required',
        'project_title'=>'required',
        'project_desc'=>'required',
        'image_link'=>'required|image|mimes:png,jpg,jpeg|max:2048'
        ],[
            'project_name.required'  => "Portofolio name field is empty",
            'project_title.required' => 'Portofolio title is missing',
            'project_desc.required'  => 'Portofolio  description is missing',
            'image_link.required' => 'Image is needed for portofolio',
            'image_link.image' => 'Only Image file is allowed to upload',
            'image_link.mimes' => "Only png,jpg and jpeg format file will accepted",
            'image_link.max'   => "Maximum 2 mega byte image size are allowed",
        ]);
        //working with image
        $image=$request->file('image_link');
        $image_name=md5(uniqid()).'.'.$image->getClientOriginalExtension();
        $path=public_path('uploads/projects/');
        !is_dir($path)&&mkdir($path,0777,true);
        Image::make($image)->resize(1020,520)->save($path.$image_name);
        
        try{

            projects::create([
                'project_name'=>$request->project_name,
                'project_title'=>$request->project_title,
                'project_desc'=>$request->project_desc,
                'image_link'=>$image_name
            ]);
            $noti=[
                'alert_type'=>'success',
                'message'=>'Portofolio added Successfully',
            ];

            return redirect()->route('dashboard')->with($noti);

        }catch(Exception $ex)
        {
            $noti=[
                'alert_type'=>'warning',
                'message'=>'Failed to added Portofolio',
            ];

            return redirect()->back()->with($noti)->withInput();
        }
      
       
    }

    //show particular data
    public function show($id)
    {

    }

    //Render edit value
    public function edit($id)
    {
         $check=projects::find($id);
         if($check==null)
         {
            return redirect()->back()->with(['alert_type'=>'warning','message'=>'Portofolio does not found in our system']);
         }
         return view('admin.edit_portfolio',['portfolio'=>$check]);
    }

    //Update particular project
    public function Update(Request $request,$id)
    {
        $request->validate([
            'image_link'=>'image|mimes:png,jpg|max:2048'
        ]);

        $check=projects::find($id);
        if($check==null)
        {
           return redirect()->back()->with(['alert_type'=>'warning','message'=>'Portofolio does not found in our system']);
        }
        //check image upload or not
        if($request->hasFile('image_link') )
        {
            $file=$request->file('image_link');
            if($file->isValid())
            {
                //firstly remove previous image
                 $path=public_path('uploads/projects/');
                 if(file_exists($path.$check->image_link && $check->image_link!==null ))
                 {
                       unlink($path.$check->image_link);
                 }

                 //store new image
                 $new_image=md5(uniqid()).'.'.$file->getClientOriginalExtension();

            }
        }

    }

    public function deleteProject($id)
    {
        $check=projects::find($id);
        if($check==null)
        {
            return redirect()->back()->with(['alert_type'=>'warning','message'=>'Invalid Project']);
        }
        //Remove Image
        $path=public_path('uploads/projects/');
        if(file_exists($path && $check->image_link!==null))
        {
            unlink($path.$check->image_link);
        }
        projects::where('id',$id)->delete();
        return redirect()->back()->with(['alert_type'=>'info','message'=>'Portfolio Deleted Successfully!']);
    }
}
