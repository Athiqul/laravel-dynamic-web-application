<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\footer;

class ContactUser extends Controller
{
    //Create contact request
    public function create()
    {
        $contactInfo=footer::latest()->first();
       return view('guest.contact.contact_me',compact('contactInfo'));
    }
    //store request
    public function store(Request $request)
    {
        $request->validate([
            "contact_number"=>"required",
            "email"=>"required|email",
            "subject"=>"required",
            "message"=>"required",
            "customer_name"=>"required",
        ]);

        Contact::create($request->post());
       

        return redirect()->back()->with($this->toasterNoti('success','Thank you Sir! Your Query already submitted, Our Team will Contact with you soon'));
        
    }
    private function toasterNoti($type,$msg)
    {
        return [
            "alert-type"=>$type,
            "message"=>$msg
        ];  
    }
}
