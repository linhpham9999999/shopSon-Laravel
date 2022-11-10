<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class CountOrderController extends Controller
{

    public function loadcount(){
        $data = DB::table('hoa_don')->select('id')
            ->where('id_TT','=',3)->get()->toArray();
        if(count($data) == 0){
            $countcart = 0;
        }else{
            $countcart = count($data);
        }
        return response()->json(['count'=>$countcart]);
    }
    public function loadcount2(){
        $data = DB::table('hoa_don')->select('id')
            ->where([['id_TT','=',3],['nguoi_giao_hang_id','=',null]])->get()->toArray();
        if(count($data) == 0){
            $countcart = 0;
        }else{
            $countcart = count($data);
        }
        return response()->json(['count'=>$countcart]);
    }
    public function loadcount3(){
        $data = DB::table('hoa_don')->select('id')
            ->where([['id_TT','=',3],['nguoi_giao_hang_id','!=',null]])->get()->toArray();
        if(count($data) == 0){
            $countcart = 0;
        }else{
            $countcart = count($data);
        }
        return response()->json(['count'=>$countcart]);
    }

}
