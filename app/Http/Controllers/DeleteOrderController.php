<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class DeleteOrderController extends Controller
{
    // Khi hủy đơn thì soluongton trong table mau_san_pham phải cộng thêm quantity trong cart
//    public function delete(Request $request)
//    {
//        dd( $request->all());
//        $data = $request->all();
//        $order = hoa_don::where('id',$data['id'])->get();
//        $order->ly_do_huy = $data['lydo'];
//        $order->id_TT = 4;
//        $order->save();
//
//        $order_detail = chi_tiet_hoa_don::where('id_HD',$data['id'])->get();
//        $order_detail->trang_thai = 0;
////        DB::table('hoa_don')->where('Ma_HD',$data['id'])->update([
////            'ly_do_huy' => $data['lydo'],
////            'trang_thai'=>1,
////            'id_TT'=>4
////                                                                 ]);
//    }

    public function delete($id)
    {
//        dd($id);
        $data = DB::table('hoa_don')->join('chi_tiet_hoa_don','hoa_don.id','=','chi_tiet_hoa_don.id_HD')
            ->where('hoa_don.id','=',$id)
            ->select('id_MSP','soluong')->get()->toArray();

        $mausp = DB::table('mau_san_pham')->select('id','soluongton')->get()->toArray();

        foreach ($data as $value){
            foreach ( $mausp as $item) {
                if($value->id_MSP == $item->id){
                    $item->soluongton = $item->soluongton + $value->soluong;
                    DB::table('mau_san_pham')->where('id','=',$item->id)->update(['soluongton' => $item->soluongton]);
                }
            }
        }
        DB::table('hoa_don')->where('id','=',$id)->update(['id_TT' => 4]);
        DB::table('chi_tiet_hoa_don')->where('id_HD','=',$id)->update(['trang_thai' => 0]);
        return response()->json(['status'=>'Hủy đơn hàng thành công']);
//        return redirect()->back()->with('alert','Hủy đơn hàng thành công');
    }
}


?>
