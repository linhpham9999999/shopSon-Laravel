<?php

namespace App\Http\Controllers;
use App\Models\hoa_don;
use Composer\DependencyResolver\Request;

class DeleteOrderController extends Controller
{
    public function delete(Request $request)
    {
        dd( $request->all());
        $data = $request->all();
        $order = hoa_don::where('Ma_HD',$data['id'])->get();
        $order->ly_do_huy = $data['lydo'];
        $order->trang_thai = 4;
        $order->save();
//        DB::table('hoa_don')->where('Ma_HD',$data['id'])->update([
//            'ly_do_huy' => $data['lydo'],
//            'trang_thai'=>1,
//            'id_TT'=>4
//                                                                 ]);
    }
}


?>
