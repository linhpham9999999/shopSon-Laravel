<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class checkQuanTriVien
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
//        dd(!Auth::guard('web')->check() || !Auth::guard('nhan_vien_ban_hang') || !Auth::guard('nhan_vien_ban_hang'),
//           !Auth::guard('web')->check(),
//           !Auth::guard('nhan_vien_ban_hang'),
//           !Auth::guard('nhan_vien_ban_hang')
//        );

        if (!Auth::guard('web')->check() || !Auth::guard('nhan_vien_ban_hang') || !Auth::guard('nhan_vien_ban_hang')) {
            return redirect()->route('login');
        }
        return $next($request);
    }
}
