<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory as categoryModel;

class BlogCategory extends Controller
{
    //show all category list
    public function index()
    {
         $categories=categoryModel::all();
        
          return view('admin.blog.category_list',compact('categories'));
    }

    //create blog category
    public function create()
    {
       return view('admin.blog.add_categiry') ; 
    }
    //store blog category
    public function store(Request $request)
    {
          $request->validate(
            [
                "category"=>"required"
            ],[
                "category.required"=>"Category name field is empty"
            ]);

            categoryModel::create([
                'category'=>$request->category,
            ]);
            $noti=[
                "alert_type"=>"success",
                "message"=>"Blog Category Added Successfully !"
            ];

            return redirect()->route('blog.categories')->with($noti);
    }

    //read blog category
    public function edit($id)
    {
        $category=categoryModel::findorfail($id);
        return view('admin.blog.category_blog_change',compact('category'));
    }

    //update blog category
    public function update(Request $request,$id)
    {
        $request->validate([
            'category'=>'required'
        ],[
            'category.required'=>'Category Name is Empty!'
        ]);
        $category=categoryModel::findorfail($id);

        $category->category=$request->category;
        $category->save();
        $noti=[
            'alert_type'=>'success',
             'message'=>'Blog Category Updated !'
        ];

        return redirect()->route('blog.categories')->with($noti);

    }
    //Delete blog category
    public function delete($id)
    {
        $category=categoryModel::findorfail($id);
        $category->delete();
        $noti=[
            'alert-type'=>'error',
             'message'=>'Blog Category deleted !'
        ];
        return redirect()->route('blog.categories')->with($noti);
        
    }
}
