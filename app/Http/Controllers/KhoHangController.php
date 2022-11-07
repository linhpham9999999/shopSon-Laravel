<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

use DB;
use Illuminate\Support\Facades\Auth;

class KhoHangController extends Controller
{

    public function search(Request $request){
        $name = $request->tenSP;
        $sanpham = DB::table('san_pham')->select('san_pham.id as idSP','ten_SP')
            ->where('trang_thai','=',1)->get();
        $product = DB::table('san_pham')->where([['ten_SP','=',$name],['trang_thai','=',1]])->first();
        $productColor = DB::table('mau_san_pham')->where('id_SP','=',$product->id)->paginate(5);
        return view('admin.khohang.them',compact('productColor','sanpham'));
    }

    public function getThem()
    {
        $sanpham = DB::table('san_pham')->select('san_pham.id as idSP','ten_SP')
            ->where('trang_thai','=',1)->get();
        $productColor = DB::table('mau_san_pham')
            ->where([['trang_thai','=',1],['id_SP','=',1]])->paginate(5);
        return view('admin.khohang.them', compact('sanpham','productColor'));
    }

    public function detail($id){
        $mausanpham = DB::table('mau_san_pham')->where('id','=',$id)->first();
        $sanpham = DB::table('san_pham')->where('id','=',$mausanpham->id_SP)->first();
        return view('admin.khohang.chi-tiet-nhap-kho',compact('mausanpham','sanpham'));

    }

    public function getDanhSach()
    {
        $data = DB::table('phieu_nhap_hang')
            ->join('chi_tiet_nhap_hang','chi_tiet_nhap_hang.phieu_nhap_hang_id','=','phieu_nhap_hang.id')
            ->join('mau_san_pham','mau_san_pham.id','=','chi_tiet_nhap_hang.id_MSP')
            ->join('san_pham','san_pham.id','=','chi_tiet_nhap_hang.id_SP')
            ->select('mau','hinhanh','soluongton','nha_cung_cap','loi_nhuan','phieu_nhap_hang.created_at','gia_ban_ra','ten_SP')
            ->orderBy('phieu_nhap_hang.id','desc')
            ->paginate(5);
//            ->sortBy('phieu_nhap_hang.id','desc');
//        dd($data);
        return view('admin.khohang.danhsach', compact('data'));
    }

    public function postThem(Request $request)
    {
//        $msp = DB::table('mau_san_pham')->where('id','=',$request->idMSP)->first();
//        dd($msp->soluongton + $request->soluong);
        if( Auth::guard('web')->check()) {
            $admin = Auth::guard('web')->user()->id;
        }
        $this->validate(
            $request,
            [
                'ncc'     => 'bail|required|min:8',
                'soluong'     => 'bail|required|integer',
                'dongia'       => 'bail|required|numeric|min:5',
                'loinhuan'     => 'bail|required|numeric|min:1'
            ],
            [
                'ncc.required'   => 'Bạn chưa nhập Nhà cung cấp',
                'ncc.min'        => 'Nhà cung cấp phải có độ dài từ 8 ký tự',
                'soluong.required'   => 'Bạn chưa nhập Số lượng nhập kho',
                'soluong.integer'    => 'Số lượng nhập kho là 1 số nguyên',
                'dongia.required'     => 'Bạn chưa nhập giá mới của sản phẩm',
                'dongia.numeric'       => 'Giá sản phẩm phải là một số',
                'dongia.min'          => 'Giá sản phẩm có độ dài ít nhất 5 ký tự',
                'loinhuan.required'     => 'Bạn chưa lợi nhuận của sản phẩm',
                'loinhuan.numeric'       => 'Lợi nhuận sản phẩm phải là một số',
                'loinhuan.min'          => 'Lợi nhuận sản phẩm phải là 1 số lớn hơn 0',
            ]
        );

        DB::table('phieu_nhap_hang')->insert(
            [
                'nha_cung_cap'=>$request->ncc,
                'tong_tien' => $request->soluong * $request->dongia,
                'created_at' => Carbon::now(),
                'quan_tri_id'=> $admin
            ]
        );
        $id_PNH = DB::getPdo()->lastInsertId();
        DB::table('chi_tiet_nhap_hang')->insert(
            [
                'phieu_nhap_hang_id'=>$id_PNH,
                'soluong'=>$request->soluong,
                'dongia'=>$request->dongia,
                'loi_nhuan'=>$request->loinhuan,
                'id_MSP'=>$request->idMSP,
                'id_SP'=>$request->idSP
            ]
        );
        $sp = DB::table('san_pham')->where('id','=',$request->idSP)->first();
        $msp = DB::table('mau_san_pham')->where('id','=',$request->idMSP)->first();
        //Lưu lại giá cũ vào bảng san_pham_tmp
        DB::table('san_pham_tmp')->insert([
            'Ma_SP'=>$sp->Ma_SP,
            'ten_SP'=>$sp->ten_SP,
            'xuatxu'=>$sp->xuatxu,
            'trongluong'=>$sp->trongluong,
            'gia_nhap_vao'=>$sp->gia_nhap_vao,
            'gia_ban_ra'=>$sp->gia_ban_ra,
            'hansudung_thang'=>$sp->hansudung_thang,
            'gioithieu'=>$sp->gioithieu,
            'hinhanhgoc'=>$sp->hinhanhgoc,
            'thanh_phan'=>$sp->thanh_phan,
            'id_LSP'=>$sp->id_LSP,
            'trang_thai'=>$sp->trang_thai,
            'created_at'=>Carbon::now() ]);
        //Thêm số lượng sản phẩm
        DB::table('mau_san_pham')->where('id','=',$request->idMSP)->update([
            'soluongton'=> $msp->soluongton + $request->soluong
                                                                      ]);
        // update lại giá cho Sản phẩm
        DB::table('san_pham')->where('id','=',$request->idSP)->update([
            'gia_nhap_vao'=>$request->dongia,
            'gia_ban_ra'=>$request->dongia * (1 + $request->loinhuan*0.01),
            'updated_at'=>Carbon::now()
            ]);

        return back()->with('thongbao','Nhập kho thành công');
    }

    // NHÂN VIÊN NHẬP KHO
    public function searchKhoHang(Request $request){
        $name = $request->tenSP;
        $sanpham = DB::table('san_pham')->select('san_pham.id as idSP','ten_SP')
            ->where('trang_thai','=',1)->get();
        $product = DB::table('san_pham')->where([['ten_SP','=',$name],['trang_thai','=',1]])->first();
        $productColor = DB::table('mau_san_pham')->where('id_SP','=',$product->id)->paginate(5);
        return view('admin.khohang-nv.them',compact('productColor','sanpham'));
    }

    public function getThemKhoHang()
    {
        $sanpham = DB::table('san_pham')->select('san_pham.id as idSP','ten_SP')
            ->where('trang_thai','=',1)->get();
        $productColor = DB::table('mau_san_pham')
            ->where([['trang_thai','=',1],['id_SP','=',1]])->paginate(5);
        return view('admin.khohang-nv.them', compact('sanpham','productColor'));
    }

    public function detailKhoHang($id){
        $mausanpham = DB::table('mau_san_pham')->where('id','=',$id)->first();
        $sanpham = DB::table('san_pham')->where('id','=',$mausanpham->id_SP)->first();
        return view('admin.khohang-nv.chi-tiet-nhap-kho',compact('mausanpham','sanpham'));

    }

    public function getDanhSachKhoHang()
    {
        $data = DB::table('phieu_nhap_hang')
            ->join('chi_tiet_nhap_hang','chi_tiet_nhap_hang.phieu_nhap_hang_id','=','phieu_nhap_hang.id')
            ->join('mau_san_pham','mau_san_pham.id','=','chi_tiet_nhap_hang.id_MSP')
            ->join('san_pham','san_pham.id','=','chi_tiet_nhap_hang.id_SP')
            ->select('mau','hinhanh','soluongton','nha_cung_cap','loi_nhuan','phieu_nhap_hang.created_at','gia_ban_ra','ten_SP')
            ->orderBy('phieu_nhap_hang.id','desc')
            ->paginate(5);
        return view('admin.khohang-nv.danhsach', compact('data'));
    }

    public function postThemKhoHang(Request $request)
    {
        if( Auth::guard('nhan_vien_nhap_kho')->check()) {
            $email = Auth::guard('nhan_vien_nhap_kho')->user()->email;
        }
        $quan_tri = DB::table('quan_tri')->select('id','email')->where('email','=',$email)->first();
        $this->validate(
            $request,
            [
                'ncc'     => 'bail|required|min:8',
                'soluong'     => 'bail|required|integer',
                'dongia'       => 'bail|required|numeric|min:5',
                'loinhuan'     => 'bail|required|numeric|min:1'
            ],
            [
                'ncc.required'   => 'Bạn chưa nhập Nhà cung cấp',
                'ncc.min'        => 'Nhà cung cấp phải có độ dài từ 8 ký tự',
                'soluong.required'   => 'Bạn chưa nhập Số lượng nhập kho',
                'soluong.integer'    => 'Số lượng nhập kho là 1 số nguyên',
                'dongia.required'     => 'Bạn chưa nhập giá mới của sản phẩm',
                'dongia.numeric'       => 'Giá sản phẩm phải là một số',
                'dongia.min'          => 'Giá sản phẩm có độ dài ít nhất 5 ký tự',
                'loinhuan.required'     => 'Bạn chưa lợi nhuận của sản phẩm',
                'loinhuan.numeric'       => 'Lợi nhuận sản phẩm phải là một số',
                'loinhuan.min'          => 'Lợi nhuận sản phẩm phải là 1 số lớn hơn 0',
            ]
        );

        DB::table('phieu_nhap_hang')->insert(
            [
                'nha_cung_cap'=>$request->ncc,
                'tong_tien' => $request->soluong * $request->dongia,
                'created_at' => Carbon::now(),
                'quan_tri_id'=> $quan_tri->id
            ]
        );
        $id_PNH = DB::getPdo()->lastInsertId();
        DB::table('chi_tiet_nhap_hang')->insert(
            [
                'phieu_nhap_hang_id'=>$id_PNH,
                'soluong'=>$request->soluong,
                'dongia'=>$request->dongia,
                'loi_nhuan'=>$request->loinhuan,
                'id_MSP'=>$request->idMSP,
                'id_SP'=>$request->idSP
            ]
        );
        $sp = DB::table('san_pham')->where('id','=',$request->idSP)->first();
        $msp = DB::table('mau_san_pham')->where('id','=',$request->idMSP)->first();
        //Lưu lại giá cũ vào bảng san_pham_tmp
        DB::table('san_pham_tmp')->insert([
              'Ma_SP'=>$sp->Ma_SP,
              'ten_SP'=>$sp->ten_SP,
              'xuatxu'=>$sp->xuatxu,
              'trongluong'=>$sp->trongluong,
              'gia_nhap_vao'=>$sp->gia_nhap_vao,
              'gia_ban_ra'=>$sp->gia_ban_ra,
              'hansudung_thang'=>$sp->hansudung_thang,
              'gioithieu'=>$sp->gioithieu,
              'hinhanhgoc'=>$sp->hinhanhgoc,
              'thanh_phan'=>$sp->thanh_phan,
              'id_LSP'=>$sp->id_LSP,
              'trang_thai'=>$sp->trang_thai,
              'created_at'=>Carbon::now() ]);
        //Thêm số lượng sản phẩm
        DB::table('mau_san_pham')->where('id','=',$request->idMSP)->update([
                                                   'soluongton'=> $msp->soluongton + $request->soluong
                                               ]);
        // update lại giá cho Sản phẩm
        DB::table('san_pham')->where('id','=',$request->idSP)->update([
                                                  'gia_nhap_vao'=>$request->dongia,
                                                  'gia_ban_ra'=>$request->dongia * (1 + $request->loinhuan*0.01),
                                                  'updated_at'=>Carbon::now()
                                              ]);
        return back()->with('thongbao','Nhập kho thành công');
    }


}
