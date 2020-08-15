<?php

namespace App\Http\Controllers;

use App\User;
use App\UserContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
 public function index(){
     return view('Admin.admin_page');
 }
 public function admin_profile(){
     $id=auth()->user()->id;
     $data=User::find($id);
     return view('Admin.admin_profile')->with('data',$data);
 }
 public function  user_account(){
     return view ('Admin.user_account');
 }
 public function premium(){
     $data=User::get();
     return view ('Admin.manage_preminum_user')->with('data',$data);
 }
 public function contact(){
     $data=UserContact::latest()->get();
     
     return view ('Admin.contact')->with('data',$data);
 }
 public function contact_delete($id){
     UserContact::findOrFail($id)->delete();
     return back();
 }
 public function delete_user_info($id){
    User::findOrFail($id)->delete();
    return back()->with('data','delete success');
 }
 public function updata_user_info($id){
    $data=User::findOrFail($id);
    return view('Admin.update_premium_user')->with('data',$data);
 }
 public function update_premium_user(Request $request){ 
     $data=$request->validate([
         'name'=>'required',
         'isAdmin'=>'required',
         'isPremium'=>'required',
         "email"=>'required',
     ]);
 
     $id=$request->id;
    
     $isAdmin=$request->isAdmin;
     $isPremium=$request->isPremium;
     if(($isAdmin=='0' || $isAdmin=='1')&&($isPremium=='0' || $isPremium=='1')){
       User::findOrFail($id)->update($data);
      
        return redirect('premium')->with('edit','edit success');
     }else{
        return back()->with('validate','you must type 0 or 1 ');
     }

 }
 Public function update_admin_profile(Request $request){
    $data=$request->validate([
        'name'=>'required',
        
        "email"=>'required',
    ]);

    User::findOrFail($request->id)->update($data);
    return back()->with('edit','edit success');
 }
 public function update_admin_password(Request $request){
    $request->validate([
        'new_password'=>'required',
        'old_password'=>'required',
        'comfirm_password'=>'required',
        ]);
        $id=auth()->user()->id;
        $data=User::findOrFail($id);
       $old_password=$request->old_password;
       $new_password=$request->new_password;
            
      $comfirm_password =$request->comfirm_password;
        if(!Hash::check  ( $old_password,$data->password )){
            return back()->with('oldpassword','oldpassword is incorrect');
        }
        elseif(!(strlen( $new_password)>=8 && strlen($comfirm_password)>=8)){
            return back()->with('password','you need to fill more than 6 character');
        }
        elseif(!($new_password==$comfirm_password)){
            return back()->with('comfrm_password','Password is not match');
        }
        else{
           $hash_new_password=Hash::make($new_password);
           $item=[
               "password"=>$hash_new_password,
           ];
           $data->update($item);
           return back()->with('success','password change success');
        }
 }
}
