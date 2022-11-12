<?php

namespace App\Http\Controllers;

use App\Models\chuc_vu;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

use DB;

class AdminAddUserController extends Controller
{
    public function getDanhSach(){
        $khachhang = DB::table('nguoi_dung')
            ->select('hoten','email','ngaysinh','diachi','sodth','nguoi_dung.id as id')
            ->where('trang_thai','=',1)->paginate(5);
        return view('admin.khach-hang.danhsach',compact('khachhang'));
    }
    public function postXoa($id)
    {
        DB::table('nguoi_dung')->where('id','=',$id)->update(['trang_thai'=>0]);
        return response()->json([
                                    'message' => 'Data deleted successfully!'
                                ]);
    }

    // nhân viên bán hàng
    public function getDanhSachBanHang(){
        $khachhang = DB::table('nguoi_dung')
            ->select('hoten','email','ngaysinh','diachi','sodth','nguoi_dung.id as id')
            ->where('trang_thai','=',1)->paginate(5);
        return view('admin.khach-hang-nv.danhsach',compact('khachhang'));
    }
    public function postXoaBanHang($id)
    {
        DB::table('nguoi_dung')->where('id','=',$id)->update(['trang_thai'=>0]);
        return response()->json([
                                    'message' => 'Data deleted successfully!'
                                ]);
    }
}
