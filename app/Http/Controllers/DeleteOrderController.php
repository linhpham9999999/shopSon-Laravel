<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;

class DeleteOrderController extends Controller
{
    public function delete($id)
    {
//        dd($id);
        DB::table('hoa_don')->where('id','=',$id)->delete();
        DB::table('chi_tiet_hoa_don')->where('id_HD','=',$id)->delete();
        return redirect()->back()->with('alert','Hủy đơn hàng thành công');
    }
}


?>
