<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Member;
use Auth;
use Redirect;
class MemberStatusCheckerMiddleware
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
         if(Auth::guard('members')->user()->status == 1){
            //  return redirect()->route('member.auth.login');
             return $next($request);
         }
         return Redirect::back()->withErrors(['msg', 'Member not approved, contact your chapter president']);
        
    }
}
