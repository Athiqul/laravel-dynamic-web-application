<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\User;

class AdminUser extends Controller
{
       public function index(){
        $id=Auth::user()->id;
          $data=User::find($id);
        return view('admin.dashboard',compact('adminInfo'));
       }
       public function profileEdit()
       {
          $id=Auth::user()->id;
          $data=User::find($id);
          return view('admin.admin_profile_edit',compact('data'));
       }

        public function profile()
        {
            $id=Auth::user()->id;
            $adminData=User::find($id);
            return view('admin.admin_profile',compact('adminData'));
        }

        public function update(Request $request)
        {
             $id=Auth::user()->id;
             $info=User::find($id);
             $info->name=$request->name;
             $info->email=$request->email;
             $info->username=$request->username;
             $info->mobile=$request->mobile;
             if($request->file('image'))
             {
                $file=$request->file('image');
                $filename=date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/profile'),$filename);
                $info->profile_image=$filename;
             }

             $info->save();
             return redirect()->route('admin.profile');
        }

        public function destroy(Request $request): RedirectResponse
        {
            Auth::guard('web')->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect('/login');
        }

}
