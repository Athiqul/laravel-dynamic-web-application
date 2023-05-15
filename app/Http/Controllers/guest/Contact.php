<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact as ContactModel;

class Contact extends Controller
{
    //View Contact request
    public function index()
    {
           $contactList=ContactModel::latest()->take(20)->get();
           return view('admin.contact.contact_request',compact('contactList'));
    }
    //Delete contact request
    public function deleteRequest($id)
    {
              $contactList=ContactModel::findorfail($id);
              $contactList->delete();
              return redirect()->back()->with($this->toasterNoti('error','Item Deleted!'));

    }
    //Update status
    public function status($id)
    {

    }
    private function toasterNoti($type,$msg)
    {
        return [
            "alert-type"=>$type,
            "message"=>$msg
        ];  
    }
}
