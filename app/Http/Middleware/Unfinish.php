<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class Unfinish
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {       
        $user = Auth::user();
        if($user->status == 'Unfinish')
        {
            return redirect(route('profile.create'));
        }else{
            return $next($request);
        }
    }
}
