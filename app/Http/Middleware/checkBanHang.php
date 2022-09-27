<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class checkBanHang
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // route quan ly don hang
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('nhan_vien_ban_hang')->check() || Auth::guard('web')->check()) {
            return $next($request);
        }
        return redirect()->route('login-ban-hang');
    }
}
