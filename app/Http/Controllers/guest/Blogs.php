<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogModel;
use App\Models\BlogCategory;
use Intervention\Image\Facades\Image as Image;

class Blogs extends Controller
{
    //All Blog list
    public function index()
    {
      $blogs=BlogModel::all();
      $categories=BlogCategory::all();
      
      return view('admin.blog.all_blogs',compact('blogs','categories'));   
    }
    //Create Blog
    public function createBlog()
    {
        $categories=BlogCategory::all();
      if($categories->isEmpty())
      {
        return redirect()->route('blog.create.category')->with(['alert-type'=>'error','message'=>'First you need to add category before create blog']);
      }
        return view('admin.blog.add_blog',compact('categories'));
    } 
    public function storeBlog(Request $request)
    {
         $request->validate([
            "title"=>"required",
            "cat_id"=>"required",
            "image_link"=>"required|image|mimes:png,jpg|max
            :1024",
            "desc"=>"required",
            "tags"=>"required"
         ]);

         //work with image
         $imageFile=$request->file('image_link');
         if($imageFile->isValid())
         {
            $image_link=md5(uniqid()).'.'.$imageFile->getClientOriginalExtension();
            $path=public_path('uploads/blogs/');
            !is_dir($path)&&mkdir($path,0777,true);
            Image::make($imageFile)->resize(850,430)->save($path.$image_link);
         }

         BlogModel::create([
            "title"=>$request->title,
            "cat_id"=>$request->cat_id,
            "image_link"=>$image_link,
            "desc"=>$request->desc,
            "tags"=>$request->tags,
         ]);
         $noti=[
            "alert-type"=>"success",
            "message"=>"Successfully Added Blog Article!"
         ];

         return redirect()->route('all.blog.list')->with($noti);
    }
    //Particular Blog By id
    public function showBlog($id)
    {
         $blog=BlogModel::findorfail($id);
         $categories=BlogCategory::all();
         return view('admin.blog.edit_blog',compact('blog','categories'));
    }
    //Update Blog
    public function updateBlog(Request $request,$id)
    {
        $request->validate([
            "image_link"=>"image|mimes:png,jpg|max:1024"
        ]);
        $blog=BlogModel::findorfail($id);
        if($request->hasFile('image_link'))
        {
            $updateImage=$request->file('image_link');
            
            $image_name=md5(uniqid()).'.'.$updateImage->getClientOriginalExtension();
            $path=public_path('uploads/blogs/');
            !is_dir($path)&&mkdir($path,0777,true);
            if($blog->image_link!=null)
            {
                unlink($path.$blog->image_link);
            }
            Image::make($updateImage)->resize(850,430)->save($path.$image_name);
            $blog->image_link=$image_name;

        }
        $blog->title=$request->title;
        $blog->desc=$request->desc;
        $blog->cat_id=$request->cat_id;
        $blog->tags=$request->tags;
        $blog->save();
        return redirect()->route('all.blog.list')->with(['alert-type'=>'success','message'=>'Blog Updated!!']);
    }
    //Delete Blog
    public function delete($blogId)
    {
        $blog=BlogModel::findorfail($blogId);
        $blog->delete();
        return redirect()->route('all.blog.list')->with(['alert-type'=>'success','message'=>'Successfully blog deleted']);
    }
}
