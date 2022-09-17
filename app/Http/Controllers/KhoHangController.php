<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;

use DB;

class KhoHangController extends Controller
{
    public function getDanhSach()
    {
        $data = DB::table('phieu_nhap_hang')
            ->join('chi_tiet_nhap_hang','chi_tiet_nhap_hang.phieu_nhap_hang_id','=','phieu_nhap_hang.id')
            ->join('san_pham','san_pham.id','=','chi_tiet_nhap_hang.id_SP')
            ->join('mau_san_pham','mau_san_pham.id_SP','=','san_pham.id')
            ->select('san_pham.ten_SP as tenSP','mau_san_pham.mau as tenMauSP','hinhanh',
                     'nha_cung_cap','soluongton','loi_nhuan','gia_ban_ra','phieu_nhap_hang.created_at as ngaytao')
            ->orderBy('phieu_nhap_hang.id','desc')
            ->paginate(5);
//            ->sortBy('phieu_nhap_hang.id','desc');
        return view('admin.khohang.danhsach', compact('data'));
    }

    public function getThem()
    {
        $sanpham = DB::table('san_pham')->select('san_pham.id as idSP','ten_SP')->get();
        $mausanpham = DB::table('mau_san_pham')->select('mau_san_pham.id as idMSP','ten_MSP')->get();
        return view('admin.khohang.them', compact('sanpham', 'mausanpham' ));
    }

    public function postThem(Request $request)
    {

    }


}
