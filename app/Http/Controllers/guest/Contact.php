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

    }
    //Update status
    public function status($id)
    {

    }
}
