<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailOffer;
class UserController extends Controller
{
   public function profile(){
     return view('profile');
   }
   public function changenamephoto(Request $request){
        $request->validate([
            'name'=>'required',
            'profile_photo' => 'required',
        ]);
        if($request->hasFile('profile_photo')){
            if(Auth::user()->profile_photo !=='avator.jpeg'){
              unlink('uploads/profile_photos/'.Auth::user()->profile_photo);
            }
            $file = $request->file('profile_photo');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $path = "uploads/profile_photos";
            $request->profile_photo->move($path, $fileName);
            User::find(Auth::id())->update([
                'profile_photo'=> $fileName,
            ]);

        }
        User::find(Auth::id())->update([
            'name'=>$request['name'],
        ]);
        return back()->with('name', 'Name  and profile updated successfully ');
   }
   public function changepasssword(Request $request){
        $request->validate([
            'old_password' => 'required',
            'password' => 'required',
            'confirmation' => 'required',
        ]);
        if(Hash::check($request->old_password, Auth::user()->password)){
          if($request->password==$request->confirmation){
            User::find(Auth::id())->update([
               'password'=>Hash::make($request->password),
            ]);
            return back()->with('password','password updated successfully');
          }else{
            return back()->withErrors('New Password and old password does not match');
          }
        }else{
            return back()->withErrors('old Password  does not match in our records');
        }
   }
   public function emailloffer(){
      return view('emailloffer',[
        'customers'=>User::where('role','!=',2)->get(),
      ]);
   }
    public function emailsingleoffer($id){
        Mail::to(User::find($id)->email)->send(new EmailOffer);
        return back();
    }
}
