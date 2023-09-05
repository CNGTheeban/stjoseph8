<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->status != '1') {
            //Auth::logout();
            return redirect('/login')->with('error','Your account is not active. Please contact support.');
        }
        else if (!Auth::user()->email_verified_at) {
            auth()->logout();
            return redirect('/login')
                    ->with('error', 'You need to confirm your account. We have sent you an activation code, please check your email.');
          }
   
        return $next($request);
        return $next($request);
    }
}
