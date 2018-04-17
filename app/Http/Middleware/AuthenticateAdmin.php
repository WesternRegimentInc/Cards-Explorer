<?php

namespace App\Http\Middleware;

//Auth Facade
use Auth;
use Closure;

class AuthenticateAdmin
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
        //If request does not comes from logged in seller
       //then he shall be redirected to Seller Login page
       if (! Auth::guard('admin')->check()) {
           return redirect()->route('admin.login');
       }
       
        return $next($request);
    }
}
