<?php

namespace App\Http\Middleware;

use Closure;
use App\Home;

class PremiumCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       $id=$request->id;
      $user_id=Home::where('id',$id)->select('user_id')->get();
     
       
        if(auth()->user()->isPremium=="1" || auth()->user()->id==$user_id[0]->user_id || auth()->user()->isAdmin=='1')
       return $next($request);
        else{
            return redirect("blog")->with("premium","you are not premium user");
        }
    
    }
}
