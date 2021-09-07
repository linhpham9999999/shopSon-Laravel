<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class ApiConfirmOrderController extends Controller
{
    public function confirmOrder(Request $request) {
        if(Auth::check()){
            $email_nguoiban = Auth::user()->email;
        }
        $affected = DB::table('hoa_don')
            ->where('id', $request->get('idOrder'))
            ->update(['id_TT'           => $request->get('status'),
                      'email_nguoiban'  => $email_nguoiban,
                      'ngaygiao'        => Carbon::now()->addDay(3)
                      ]);
        if ($affected) {
            http_response_code(200);
        } else {
            http_response_code(204);
        }
    }
}
