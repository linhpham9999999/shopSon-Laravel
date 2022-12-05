<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DuyetHDController extends Controller
{
    function getDanhSach(){
        $hoadon = DB::table('hoa_don')
                ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
                ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
                ->select('Ma_HD','ngaydat','tongtien','hoten','trangthai','hoa_don.id','hoa_don.id_TT','sodth_giao_hang')
                ->orderBy('hoa_don.id','desc')
                ->paginate(8);
        $isOrder = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->get()->toArray();
        return view('admin\duyetHD\danhsach',compact('hoadon','isOrder'));
    }
    // [đơn từ idTT == 6 (từ chối nhận)và nguoi_giao_hang_id == null] or [đơn idTT==3 và nguoi_giao_hang_id == null]
    function chonShipper(Request $request){
//        dd($request->nguoi-giao-hang, $request->idHD);
        if( Auth::guard('web')->check()) {
            $email = Auth::guard('web')->user()->email;
        }
        $this->validate(
            $request,
            [
                'shipper'        => 'bail|required'
            ],
            [
                'shipper.required'           => 'Bạn chưa chọn người giao hàng'
            ]
        );
        $idHD = $request->idHD;
        DB::table('hoa_don')->select('*')->where('id', '=', $idHD)
            ->update(
                [
                    'nguoi_giao_hang_id' => $request->shipper,
                    'email_nguoiban' => $email,
                    'id_TT' => 3
                ]
            );
        return redirect()->route('da-giao-shipper')->with('thongbao', 'Đơn hàng đã chọn người vận chuyển');
    }
    function getDSDaGiaoShipper(){
        $hoadon = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->select('Ma_HD','ngaydat','tongtien','hoten','trangthai','hoa_don.id','hoa_don.id_TT','nguoi_giao_hang_id','sodth_giao_hang')
            ->where([['hoa_don.id_TT','=',3],['nguoi_giao_hang_id','!=',null]])
            ->orWhere('hoa_don.id_TT','=',6)
            ->orderBy('hoa_don.id','desc')
            ->paginate(8);

        $isOrder = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->where([['hoa_don.id_TT','=',3],['nguoi_giao_hang_id','!=',null]])
            ->orWhere('hoa_don.id_TT','=',6)
            ->get()->toArray();
        return view('admin\duyetHD\danhsach',compact('hoadon','isOrder'));
    }
    function getChiTiet($id){
        $user = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->join('hinh_thuc_thanh_toan','hoa_don.id_HTTT','=','hinh_thuc_thanh_toan.id')
            ->where('hoa_don.id','=',$id)
            ->select('ngaydat','tongtien','hoten','dia_chi_giao_hang','sodth','email','trangthai','hoa_don.id_TT',
                     'hoa_don.id','hinh_thuc_thanh_toan.ten_HTTT','ghichu','hinh_anh_giao_hang')->get();
        $products = DB::table('chi_tiet_hoa_don')
            ->join('mau_san_pham','chi_tiet_hoa_don.id_MSP','=','mau_san_pham.id')
            ->where('chi_tiet_hoa_don.id_HD','=',$id)
            ->select('hinhanh','Ma_MSP','soluong','thanh_tien')->get();
        $shipper = DB::table('nguoi_giao_hang')->select('hoten','id')->where('trang_thai','=',1)->get();
        $order_code = DB::table('hoa_don')->select('Ma_HD')->where('id','=',$id)->first();
        return view('admin\duyetHD\chitietHD',compact('user','products','shipper','order_code'));
    }
    function confirm(Request $request){
//        dd($request->idHD);
        DB::table('hoa_don')->select('*')->where('id', '=',$request->input('idHD'))
            ->update(
                [
                    'id_TT' => 1,
                ]
            );
        return response()->json(['status'=>'Xác nhận lấy hàng thành công']);
//        return back()->with('thongbao', '');
    }

    function getDSChuaDuyet(){
        $hoadon = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->select('Ma_HD','ngaydat','tongtien','hoten','trangthai','hoa_don.id','hoa_don.id_TT','sodth_giao_hang')
            ->where([['hoa_don.id_TT','=',3],['nguoi_giao_hang_id','=',null]])->orderBy('hoa_don.id','desc')
            ->paginate(8);

        $isOrder = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->where([['hoa_don.id_TT','=',3],['nguoi_giao_hang_id','=',null]])->get()->toArray();
        return view('admin\duyetHD\danhsach',compact('hoadon','isOrder'));
    }
     // đơn đã đc shipper nhận giao hàng
    function getDSDaDuyet(){
        $hoadon = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->select('Ma_HD','ngaydat','tongtien','hoten','trangthai','hoa_don.id','hoa_don.id_TT','sodth_giao_hang')
            ->where('hoa_don.id_TT','=',2)
            ->orderBy('hoa_don.id','desc')
            ->paginate(8);
        $isOrder = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->where('hoa_don.id_TT','=',2)
            ->get()->toArray();
        return view('admin\duyetHD\danhsach',compact('hoadon','isOrder'));
    }
    // đơn đã giao thành công & đã mua
    function getDSDaMua(){
        $hoadon = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->select('Ma_HD','ngaydat','tongtien','hoten','trangthai','hoa_don.id','hoa_don.id_TT','sodth_giao_hang')
            ->whereIn('hoa_don.id_TT', [1, 5])->orderBy('hoa_don.id','desc')->paginate(8);

        $isOrder = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->whereIn('hoa_don.id_TT', [1, 5])->get()->toArray();
        return view('admin\duyetHD\danhsach',compact('hoadon','isOrder'));
    }

    function getDSDaHuy(){
        $hoadon = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->select('Ma_HD','ngaydat','tongtien','hoten','trangthai','hoa_don.id','hoa_don.id_TT','sodth_giao_hang')
            ->where('hoa_don.id_TT','=',4)->orderBy('hoa_don.id','desc')->paginate(8);

        $isOrder = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->where('hoa_don.id_TT','=',4)->get()->toArray();
        return view('admin\duyetHD\danhsach',compact('hoadon','isOrder'));
    }

    // NHÂN VIÊN BÁN HÀNG
    function getDanhSachBanHang(){
        $hoadon = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->select('Ma_HD','ngaydat','tongtien','hoten','trangthai','hoa_don.id','hoa_don.id_TT','sodth_giao_hang')
            ->orderBy('hoa_don.id','desc')
            ->paginate(8);
        $isOrder = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->get()->toArray();
        return view('admin\duyetHD-ban-hang\danhsach',compact('hoadon','isOrder'));
    }
    function chonShipperBanHang(Request $request){
//        dd($request->nguoi-giao-hang, $request->idHD);
        if( Auth::guard('nhan_vien_ban_hang')->check()) {
            $email = Auth::guard('nhan_vien_ban_hang')->user()->email;
        }
        $this->validate(
            $request,
            [
                'shipper'        => 'bail|required'
            ],
            [
                'shipper.required'           => 'Bạn chưa chọn người giao hàng'
            ]
        );
        $idHD = $request->idHD;
        DB::table('hoa_don')->select('*')->where('id', '=', $idHD)
            ->update(
                [
                    'nguoi_giao_hang_id' => $request->shipper,
                    'email_nguoiban' => $email,
                    'id_TT' => 3
                ]
            );
        return redirect()->route('da-giao-shipper-ban-hang')->with('thongbao', 'Đơn hàng đã chọn người vận chuyển');
    }
    function getDSDaGiaoShipperBanHang(){
        $hoadon = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->select('Ma_HD','ngaydat','tongtien','hoten','trangthai','hoa_don.id','hoa_don.id_TT','nguoi_giao_hang_id','sodth_giao_hang')
            ->where([['hoa_don.id_TT','=',3],['nguoi_giao_hang_id','!=',null]])
            ->orWhere('hoa_don.id_TT','=',6)
            ->orderBy('hoa_don.id','desc')
            ->paginate(8);

        $isOrder = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->where([['hoa_don.id_TT','=',3],['nguoi_giao_hang_id','!=',null]])
            ->orWhere('hoa_don.id_TT','=',6)
            ->get()->toArray();
        return view('admin\duyetHD-ban-hang\danhsach',compact('hoadon','isOrder'));
    }
    function getChiTietBanHang($id){
        $user = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->join('hinh_thuc_thanh_toan','hoa_don.id_HTTT','=','hinh_thuc_thanh_toan.id')
            ->where('hoa_don.id','=',$id)
            ->select('ngaydat','tongtien','hoten','dia_chi_giao_hang','sodth','email','trangthai','hoa_don.id_TT',
                     'hoa_don.id','hinh_thuc_thanh_toan.ten_HTTT','ghichu','hinh_anh_giao_hang')->get();
        $products = DB::table('chi_tiet_hoa_don')
            ->join('mau_san_pham','chi_tiet_hoa_don.id_MSP','=','mau_san_pham.id')
            ->where('chi_tiet_hoa_don.id_HD','=',$id)
            ->select('hinhanh','Ma_MSP','soluong','thanh_tien')->get();
        $shipper = DB::table('nguoi_giao_hang')->select('hoten','id')->where('trang_thai','=',1)->get();
        $order_code = DB::table('hoa_don')->select('Ma_HD')->where('id','=',$id)->first();
        return view('admin\duyetHD-ban-hang\chitietHD',compact('user','products','shipper','order_code'));
    }

    function getDSChuaDuyetBanHang(){
        $hoadon = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->select('Ma_HD','ngaydat','tongtien','hoten','trangthai','hoa_don.id','hoa_don.id_TT','sodth_giao_hang')
            ->where([['hoa_don.id_TT','=',3],['nguoi_giao_hang_id','=',null]])->orderBy('hoa_don.id','desc')
            ->paginate(8);

        $isOrder = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->where([['hoa_don.id_TT','=',3],['nguoi_giao_hang_id','=',null]])->get()->toArray();
        return view('admin\duyetHD-ban-hang\danhsach',compact('hoadon','isOrder'));
    }
    // đơn đã đc shipper nhận giao hàng
    function getDSDaDuyetBanHang(){
        $hoadon = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->select('Ma_HD','ngaydat','tongtien','hoten','trangthai','hoa_don.id','hoa_don.id_TT','sodth_giao_hang')
            ->where('hoa_don.id_TT','=',2)
            ->orderBy('hoa_don.id','desc')
            ->paginate(8);
        $isOrder = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->where('hoa_don.id_TT','=',2)
            ->get()->toArray();
        return view('admin\duyetHD-ban-hang\danhsach',compact('hoadon','isOrder'));
    }
    // đơn đã giao thành công & đã mua
    function getDSDaMuaBanHang(){
        $hoadon = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->select('Ma_HD','ngaydat','tongtien','hoten','trangthai','hoa_don.id','hoa_don.id_TT','sodth_giao_hang')
            ->whereIn('hoa_don.id_TT', [1, 5])->orderBy('hoa_don.id','desc')->paginate(8);

        $isOrder = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->whereIn('hoa_don.id_TT', [1, 5])->get()->toArray();
        return view('admin\duyetHD-ban-hang\danhsach',compact('hoadon','isOrder'));
    }

    function getDSDaHuyBanHang(){
        $hoadon = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->select('Ma_HD','ngaydat','tongtien','hoten','trangthai','hoa_don.id','hoa_don.id_TT','sodth_giao_hang')
            ->where('hoa_don.id_TT','=',4)->orderBy('hoa_don.id','desc')->paginate(8);

        $isOrder = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->where('hoa_don.id_TT','=',4)->get()->toArray();
        return view('admin\duyetHD-ban-hang\danhsach',compact('hoadon','isOrder'));
    }

    function searchHDTG(Request $request){
        $ngaybd = Carbon::createFromFormat(config('app.date_format'), $request->startdate)->format('Y-m-d');
        $ngaykt = Carbon::createFromFormat(config('app.date_format'), $request->enddate)->format('Y-m-d');
        $hoadon = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->select('Ma_HD','ngaydat','tongtien','hoten','trangthai','hoa_don.id','hoa_don.id_TT','sodth_giao_hang')
            ->where([['hoa_don.ngaydat','>=',$ngaybd],['ngaydat','<=',$ngaykt]])
            ->orderBy('hoa_don.id','desc')->paginate(8);

        $isOrder = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->where([['hoa_don.ngaydat','>=',$ngaybd],['ngaydat','<=',$ngaykt]])
            ->get()->toArray();
        return view('admin\duyetHD\danhsach',compact('hoadon','isOrder'));
    }

    function searchHDTGBanHang(Request $request){
        $ngaybd = Carbon::createFromFormat(config('app.date_format'), $request->startdate)->format('Y-m-d');
        $ngaykt = Carbon::createFromFormat(config('app.date_format'), $request->enddate)->format('Y-m-d');
        $hoadon = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->select('Ma_HD','ngaydat','tongtien','hoten','trangthai','hoa_don.id','hoa_don.id_TT','sodth_giao_hang')
            ->where([['hoa_don.ngaydat','>=',$ngaybd],['ngaydat','<=',$ngaykt]])
            ->orderBy('hoa_don.id','desc')->paginate(8);

        $isOrder = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->where([['hoa_don.ngaydat','>=',$ngaybd],['ngaydat','<=',$ngaykt]])
            ->get()->toArray();
        return view('admin\duyetHD-ban-hang\danhsach',compact('hoadon','isOrder'));
    }

}
