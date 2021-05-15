<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
class ProfileController extends Controller
{



   public function update_info(Request $request)
   {
   	$request->validate([
   		'file'=>'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
   		'name'=>'required|string|min:3|max:100',
   		'phone'=>'nullable|integer|min:999999|max:999999999999'
   	]); 

   	if($request->hasFile('file'))
	   	\App\Models\User::where('id',auth()->user()->id)->update([
	   		'profile_photo_path'=>$this->upload_file($request->file('file'),'avatars','public')
	   	]);

	\App\Models\User::where('id',auth()->user()->id)->update([
		'name'=>$request->name,
		'phone'=>$request->phone
	]);
	emotify('success', 'تم التحديث بمجاح');
	return back();

   }
   public function update_email(Request $request)
   {
      $request->validate([
         'current_email'=>'required|in:'.auth()->user()->email,
         'email'=>"required|confirmed|email"
      ]);
      $user=\App\Models\User::where('email',$request->email)->first();
      if($user==null){
         \App\Models\User::where('id',auth()->user()->id)->update(['email'=>$request->email]);
         emotify('success', 'تم التحديث بمجاح');
         return back();
      }else{
         emotify('danger', 'البريد مستخدم مسبقاً');
         return back();
      }
   	
   }
   public function update_password(Request $request)
   {
       
   	$request->validate([
         'password'=>"required|confirmed|min:6|max:255"
      ]); 

      $user=\App\Models\User::where('id',auth()->user()->id)->firstOrFail(); 
      if(Hash::check($request->current_password, $user->password)){
         \App\Models\User::where('id',auth()->user()->id)->update(['password'=>Hash::make($request->password)]);
         emotify('success', 'تم التحديث بمجاح');
         return back();
      }else{
         emotify('danger', 'كلمة المرور الحالية غير صحيحة');
         return back();
      }
   }
}
