<?php

namespace MyApp\ReadingCircles\Application\Http\Middleware;

use Illuminate\Http\Request;
use Closure;
use Auth;

class RCMemberAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('rcmember')->check() == false) {
            return redirect('/reading-circles/login');
        }
        return $next($request);
    }
}
