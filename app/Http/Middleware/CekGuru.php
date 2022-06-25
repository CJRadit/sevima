<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CekGuru
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
        // if (Auth::user()->hak_akses == 10) {
        //     if (strtolower($request->segment(1)) == 'xpanel') {
        //       return redirect('/');
        //     }
        // }
        if (Auth::user()->role == 'guru') {
            return $next($request);
        } else {
            abort(404);
        }
    }
}
