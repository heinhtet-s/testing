<?php

namespace App\Http\Controllers;

use auth;
use App\Home;
use App\User;
use App\UserContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class HomesController extends Controller
{
    public function index(){
        $data=Home::orderBy('id','desc')->get();
   
        return view("Blog.blog")->with('data',$data);
    }
    public function contact_page(){
            return view ("Blog.Contact");}
        public function user_profile(){
            $id=auth()->user()->id;
           $data=User::findOrFail($id);

            return view ('Blog.user_profile')->with('data',$data);
        }
        //insert new
        public function insert(Request $request){
            $this->validate($request,[
                "Title"=>'required',
                'Photo'=>'required',
                'Contact'=>'required',
            ]);
            $file=$request->file('Photo');
           
            $fileName=uniqid()."_".$file->getClientOriginalName();
                $path=$file->storeAs('/public/photo',$fileName);
           $data=[
               'new_title'=>$request->Title,
               'new_image'=>$fileName,
               'new_post'=>$request->Contact,
               'user_id'=>auth()->user()->id,
           ];
           Home::create($data);
           return back()->with('data','data success');
        }
        Public function user_contact(Request $request){
            $this->validate($request,[
                'name'=>'required',
                'email'=>'required',
                'message'=>'required',
            ]);
            $data=[
                'name'=>$request->name,
                'email'=>$request->email,
                'message'=>$request->message
            ];
            UserContact::create($data);
            return back()->with("data","Inserting Success");
        }
        public function look_new_info($id){
           $data=Home::findOrFail($id);
           
         
           $data->load('user.homes');
           
           return view('Blog.look_new_info')->with('data',$data);
           $questionarie->load('questions.answers.respones');
            
        }
        public function delete_new($id){
            $data=Home::findOrFail($id);
            Storage::delete('public/photo/'.$data->new_image);
            $data->delete();
            return redirect("/blog")->with('delete','delete success');
        }
        public function update_new(Request $request){
            $this->validate($request,[
               'Title'=>'required',
                'Photo'=>'required',
                'Content'=>'required',
            ]);
            $id=$request->id;
            $file=$request->file('Photo');
         
     
            $filename=uniqid().'_'.$file->getClientOriginalName();
            $path=$file->storeAs('public/photo',$filename);


            $data=[
                'new_title'=>$request->Title,
                'new_image'=>$filename,
                'new_post'=>$request->Content,
            ];
            $datas=Home::findOrFail($id);
            Storage::delete('public/photo/'.$datas->new_image);
            $datas->update($data);
            return redirect('blog')->with('data','update success');
        }
        public function update_account(Request $request){
          $user_account=$this->validate($request,[
              'name'=>'required',
              'email'=>'required',
          ]);
         
             $id=$request->id;
            
            $data= User::findOrFail($id)->update($user_account);
          
             return back()->with("user","edit success");
           
        }
        public function user_change_password(Request $request ){
        
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
