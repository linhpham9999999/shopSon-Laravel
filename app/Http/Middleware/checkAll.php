<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class checkAll
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // cac route chi co quan tri vien co quyen
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('web')->check() || Auth::guard('nhan_vien_nhap_kho')->check() || Auth::guard('nhan_vien_ban_hang')->check()) {
            return $next($request);
        }
        return redirect()->route('login');
    }
}
