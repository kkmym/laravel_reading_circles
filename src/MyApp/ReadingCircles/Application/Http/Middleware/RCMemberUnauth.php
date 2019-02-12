<?php

namespace MyApp\ReadingCircles\Application\Http\Middleware;

use Illuminate\Http\Request;
use Closure;
use Auth;

class RCMemberUnauth
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('rcmember')->check()) {
            return redirect('/reading-circles/');
        }
        return $next($request);
    }
}
