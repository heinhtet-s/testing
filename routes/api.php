<?php

use App\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('show_news',function(){
    $data=Home::get();
    return Response::json($data);
});
Route::post('insert_news',function(Request $request){
   $data= [
    'new_title'=>$request->title,
    'new_image'=>$request->photo,
    'new_post'=>$request->content,
    'user_id'=>$request->user_id,
   ];
   $file->storeAs('/public/photo',$request->photo);
   Home::create($data);
   return "sucess";
   
});
Route::post('update_news',function(Request $request){
    $id=$request->id;
    $data= [
     'new_title'=>$request->title,
     'new_image'=>$request->photo,
     'new_post'=>$request->content,
     'user_id'=>$request->user_id,
    ];
    

    Home::findOrFail($id)->create($data);
    return "sucess";
    
 });
 Route::post('delete_news',function(Request $request){
    $id=$request->id;
    
    

    Home::findOrFail($id)->delete();
    return "sucess";
    
 });

 