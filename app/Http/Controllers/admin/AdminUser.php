<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use App\Models\User;

class AdminUser extends Controller
{
       public function index(){
        $id=Auth::user()->id;
          $data=User::find($id);
        return view('admin.dashboard',compact('data'));
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
                $file->move(public_path('upload/profile/'),$filename);
                $info->profile_image=$filename;
             }

             $info->save();
             return redirect()->route('admin.profile')->with(['alert-type'=>'success','message'=>'Successfully Profile updated!']);
        }

        //admin password change

        public function changePassword(){
            return view('admin.password_change');
        }

        public function destroy(Request $request): RedirectResponse
        {
            Auth::guard('web')->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect('/login')->with(['alert-type'=>'warning','message'=>'You are logged out!']);
        }


        //password verify and store
        public function passwordStore(Request $request)
        {
            //validation
            $request->validate(
                [
                    "old_password"=>"required",
                    "new_password"=>"required",
                    "confirm_password"=>"required|same:new_password"
                ]
            ) ;

            $getUserPassword= Auth::user()->password;

            if(Hash::check($request->old_password, $getUserPassword)){

                $getUser=User::find(Auth::user()->id);
                $getUser->password=bcrypt($request->new_password);
                $getUser->save();
                Auth::guard('web')->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();
                return redirect('/login')->with(['alert-type'=>'info','message'=>'Your password Updated Please login with your new password']);

            }else{
                return redirect()->back()->with(['alert-type'=>'warning','message'=>'Your old password is wrong']);
            }

        }

}
