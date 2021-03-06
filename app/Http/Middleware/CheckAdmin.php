<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdmin
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
        
        if(auth()->user()->isAdmin=="1")
        return $next($request);
        else{
            return redirect('blog')->with('admin',' sorry you are not admin ');
        }
    }
}
