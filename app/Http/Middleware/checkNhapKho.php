<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class checkNhapKho
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // route quan ly kho hang
    public function handle(Request $request, Closure $next)
    {
//        dd(Auth::guard('nhan_vien_nhap_kho')->check(), Auth::guard('web')->check());
        if (Auth::guard('nhan_vien_nhap_kho')->check() || Auth::guard('web')->check()) {
            return $next($request);
        }
        return redirect()->route('login-nhap-kho');
    }
}
