<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\footer as footerModel;

class Footer extends Controller
{
    //Show Existed Footer
    public function index()
    {

    }
    //create footer
    public function create()
    {
      $data=footerModel::latest()->first();
      return view('admin.footer.create_footer',compact('data'));
    }

    //Store Footer
    public function store(Request $request)
    {
        $request->validate([
            "contact_number"=>"required",
            "contact_email"=>"required",
            "region"=>"required",
            "street_address"=>"required",
        ]);
        $data=footerModel::latest()->first();
        if($data==null)
        {
             footerModel::create([
                "contact_number"=>$request->contact_number,
                "contact_email"=>$request->contact_email,
                "region"=>$request->region,
                 "street_address"=>$request->street_address,
                 "contact_us"=>$request->contact_us,
                 "social_connect"=>$request->social_connect,
                 "copyright"=>$request->copyright,
                 "facebook"=>$request->facebook,
                 "twitter"=>$request->twitter,
                 "youtube"=>$request->youtube,

                 "linkedin"=>$request->linkedin,
                 "whatsapp"=>$request->whatsapp,
                 "instagram"=>$request->instagram,

             ]);
             
             return redirect()->back()->with($this->toasterNoti('success','Successfully Footer Added!'));
        }

         $data->contact_number=$request->contact_number;
         $data->contact_email=$request->contact_email;
         $data->region=$request->region;
         $data->street_address=$request->street_address;
         $data->contact_us=$request->contact_us;
         $data->social_connect=$request->social_connect;
         $data->copyright=$request->copyright;
         $data->facebook=$request->facebook;
         $data->twitter=$request->twitter;
         $data->youtube=$request->youtube;

         $data->linkedin=$request->linkedin;
         $data->whatsapp=$request->whatsapp;
         $data->instagram=$request->instagram;

         $data->save();
         return redirect()->back()->with($this->toasterNoti('success','Successfully Footer Updated!'));
    }
  

    //delete footer
    private function toasterNoti($type,$msg)
    {
        return [
            "alert-type"=>$type,
            "message"=>$msg
        ];  
    }
}
