<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\loai_san_pham;
use App\Models\san_pham;

use DB;
use Illuminate\Support\Carbon;

class MauSpController extends Controller
{
    public function getDanhSach()
    {
        $data = DB::table('mau_san_pham')->join('loai_san_pham','mau_san_pham.id_LSP','=','loai_san_pham.id')
            ->join('san_pham','mau_san_pham.id_SP','=','san_pham.id')
            ->select('mau_san_pham.*','mau_san_pham.id as id', 'loai_san_pham.ten_LSP as ten_LSP',
                'san_pham.ten_SP as ten_SP')
            ->where([['mau_san_pham.trang_thai', '=', 1],['san_pham.trang_thai','=',1],['loai_san_pham.trang_thai','=',1]])
            ->orderBy('mau_san_pham.id','desc')
            ->paginate(5);
        return view('admin.mausp.danhsach', compact('data'));
    }

    public function getThem()
    {
        $loaisp = DB::table('loai_san_pham')->select('*')->where('trang_thai','=',1)->get();
        $sanpham = DB::table('san_pham')->select('*')->where('trang_thai','=',1)->get();
        return view('admin.mausp.them', compact('loaisp', 'sanpham'));
    }

    public function postThem(Request $request)
    {
        $this->validate(
            $request,
            [
                'idMSP'     => 'bail|required|min:3|max:8',
                'mau'       => 'bail|unique:mau_san_pham,mau|required|min:5|max:50',
                'yn'        => 'bail|required|min:5|max:500',
                'hinh_anh'  => 'bail|required|mimes:jpg,bmp,png',
                'slton'     => 'bail|required|integer',
            ],
            [
                'idMSP.required'   => 'Bạn chưa nhập Mã màu sản phẩm',
                'idMSP.min'        => 'Mã màu sản phẩm phải có độ dài từ 3 đến 8 ký tự',
                'idMSP.max'        => 'Mã màu sản phẩm phải có độ dài từ 3 đến 8 ký tự',
                'mau.required'     => 'Bạn chưa nhập Tên màu sản phẩm',
                'mau.unique'       => 'Tên màu sản phẩm đã tồn tại',
                'mau.min'          => 'Tên màu sản phẩm phải có độ dài từ 5 đến 50 ký tự',
                'mau.max'          => 'Tên màu sản phẩm phải có độ dài từ 5 đến 50 ký tự',
                'hinh_anh.required'=> 'Bạn chưa chọn Hình ảnh màu sản phẩm',
                'hinh_anh.mimes'   => 'File chọn phải là file hình ảnh (*.jpg, *png)',
                'yn.required'      => 'Bạn chưa nhập Ý nghĩa màu sản phẩm',
                'yn.min'           => 'Ý nghĩa màu sản phẩm phải có độ dài từ 5 đến 500 ký tự',
                'yn.max'           => 'Ý nghĩa màu sản phẩm phải có độ dài từ 5 đến 500 ký tự',
                'slton.required'   => 'Bạn chưa nhập Số lượng tồn của sản phẩm',
                'slton.integer'    => 'Số lượng tồn của sản phẩm phải là 1 số nguyên',
            ]
        );
        if ($request->hasFile('hinh_anh')) {
            $tenfile = $request->hinh_anh;
            $name = $tenfile->getClientOriginalName();
            $tenfile->move('admin_asset/image_son/mau_san_pham', $name);
        }
        DB::table('mau_san_pham')->insert(
            [
                'id_LSP'    => $request->idLSP,
                'id_SP'     => $request->idSP,
                'Ma_MSP'    => $request->idMSP,
                'mau'       => $request->mau,
                'hinhanh'   => $name,
                'thongTinMau'=> $request->yn,
                'soluongton'=>$request->slton,
                'trang_thai'=> $request->status,
                'created_at' => Carbon :: now ()
            ]
        );
        return redirect('admin/mausp/them')->with('thongbao', 'Thêm thành công');
    }

    public function getSua($id)
    {
        $loaisp = DB::table('loai_san_pham')->select('*')->where('trang_thai','=',1)->get();
        $sanpham = DB::table('san_pham')->select('*')->where('trang_thai','=',1)->get();
        $mausanppham = DB::table('mau_san_pham')->select('*')->where([['id', '=', $id],['trang_thai','=',1]])->first();
        return view('admin.mausp.sua', compact('mausanppham', 'loaisp', 'sanpham'));
    }

    public function postSua(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'idMSP'     => 'bail|required|min:3|max:8',
                'mau'       => 'bail|required|min:5|max:50',
                'yn'        => 'bail|min:5|max:500',
                'hinh_anh'   => 'bail|required|mimes:jpg,bmp,png',
                'slton'     => 'bail|required|integer',
            ],
            [
                'idMSP.required'    => 'Bạn chưa nhập Mã màu sản phẩm',
                'idMSP.min'         => 'Mã màu sản phẩm phải có độ dài từ 3 đến 8 ký tự',
                'idMSP.max'         => 'Mã màu sản phẩm phải có độ dài từ 3 đến 8 ký tự',
                'mau.required'      => 'Bạn chưa nhập Tên màu sản phẩm',
                'mau.min'           => 'Tên màu sản phẩm phải có độ dài từ 5 đến 50 ký tự',
                'mau.max'           => 'Tên màu sản phẩm phải có độ dài từ 5 đến 50 ký tự',
                'hinh_anh.required'  => 'Bạn chưa chọn Hình ảnh màu sản phẩm',
                'hinh_anh.mimes'     => 'File chọn phải là file hình ảnh (*.jpg, *png)',
                'yn.min'            => 'Ý nghĩa màu sản phẩm phải có độ dài từ 5 đến 500 ký tự',
                'yn.max'            => 'Ý nghĩa màu sản phẩm phải có độ dài từ 5 đến 500 ký tự',
                'slton.required'   => 'Bạn chưa nhập Số lượng tồn của sản phẩm',
                'slton.integer'    => 'Số lượng tồn của sản phẩm phải là 1 số nguyên',
            ]
        );
        if ($request->hasFile('hinh_anh')) {
            $tenfile = $request->hinh_anh;
            $name = $tenfile->getClientOriginalName();
            $tenfile->move('admin_asset/image_son/mau_san_pham', $name);
        }
        DB::table('mau_san_pham')->select('*')->where('id', '=', $id)
            ->update(
                [
                    'id_LSP' => $request->idLSP,
                    'id_SP' => $request->idSP,
                    'Ma_MSP' => $request->idMSP,
                    'mau' => $request->mau,
                    'hinhanh' => $name,
                    'thongTinMau' => $request->yn,
                    'soluongton'=>$request->slton,
                    'updated_at'=>Carbon :: now ()
                ]
            );

        return redirect('admin/mausp/sua/' . $id)->with('thongbao', 'Sửa thành công');
    }

    public function postXoa($id)
    {
        DB::table('mau_san_pham')->where('id','=',$id)->update(['trang_thai' => 0]);
        return response()->json([
                                    'message' => 'Data deleted successfully!'
                                ]);
    }

    // NHÂN VIÊN BÁN HÀNG
    public function getDanhSachBanHang()
    {
        $data = DB::table('mau_san_pham')->join('loai_san_pham','mau_san_pham.id_LSP','=','loai_san_pham.id')
            ->join('san_pham','mau_san_pham.id_SP','=','san_pham.id')
            ->select('mau_san_pham.*','mau_san_pham.id as id', 'loai_san_pham.ten_LSP as ten_LSP',
                     'san_pham.ten_SP as ten_SP')
            ->where([['mau_san_pham.trang_thai', '=', 1],['san_pham.trang_thai','=',1],['loai_san_pham.trang_thai','=',1]])
            ->orderBy('mau_san_pham.id','desc')
            ->paginate(5);
        return view('admin.mausp-ban-hang.danhsach', compact('data'));
    }

    public function getThemBanHang()
    {
        $loaisp = DB::table('loai_san_pham')->select('*')->where('trang_thai','=',1)->get();
        $sanpham = DB::table('san_pham')->select('*')->where('trang_thai','=',1)->get();
        return view('admin.mausp-ban-hang.them', compact('loaisp', 'sanpham'));
    }

    public function postThemBanHang(Request $request)
    {
        $this->validate(
            $request,
            [
                'idMSP'     => 'bail|required|min:3|max:8',
                'mau'       => 'bail|unique:mau_san_pham,mau|required|min:5|max:50',
                'yn'        => 'bail|required|min:5|max:500',
                'hinh_anh'  => 'bail|required|mimes:jpg,bmp,png',
                'slton'     => 'bail|required|integer',
            ],
            [
                'idMSP.required'   => 'Bạn chưa nhập Mã màu sản phẩm',
                'idMSP.min'        => 'Mã màu sản phẩm phải có độ dài từ 3 đến 8 ký tự',
                'idMSP.max'        => 'Mã màu sản phẩm phải có độ dài từ 3 đến 8 ký tự',
                'mau.required'     => 'Bạn chưa nhập Tên màu sản phẩm',
                'mau.unique'       => 'Tên màu sản phẩm đã tồn tại',
                'mau.min'          => 'Tên màu sản phẩm phải có độ dài từ 5 đến 50 ký tự',
                'mau.max'          => 'Tên màu sản phẩm phải có độ dài từ 5 đến 50 ký tự',
                'hinh_anh.required'=> 'Bạn chưa chọn Hình ảnh màu sản phẩm',
                'hinh_anh.mimes'   => 'File chọn phải là file hình ảnh (*.jpg, *png)',
                'yn.required'      => 'Bạn chưa nhập Ý nghĩa màu sản phẩm',
                'yn.min'           => 'Ý nghĩa màu sản phẩm phải có độ dài từ 5 đến 500 ký tự',
                'yn.max'           => 'Ý nghĩa màu sản phẩm phải có độ dài từ 5 đến 500 ký tự',
                'slton.required'   => 'Bạn chưa nhập Số lượng tồn của sản phẩm',
                'slton.integer'    => 'Số lượng tồn của sản phẩm phải là 1 số nguyên',
            ]
        );
        if ($request->hasFile('hinh_anh')) {
            $tenfile = $request->hinh_anh;
            $name = $tenfile->getClientOriginalName();
            $tenfile->move('admin_asset/image_son/mau_san_pham', $name);
        }
        DB::table('mau_san_pham')->insert(
            [
                'id_LSP'    => $request->idLSP,
                'id_SP'     => $request->idSP,
                'Ma_MSP'    => $request->idMSP,
                'mau'       => $request->mau,
                'hinhanh'   => $name,
                'thongTinMau'=> $request->yn,
                'soluongton'=>$request->slton,
                'trang_thai'=> $request->status,
                'created_at' => Carbon :: now ()
            ]
        );
        return redirect('admin/mausp-ban-hang/them')->with('thongbao', 'Thêm thành công');
    }

    public function getSuaBanHang($id)
    {
        $loaisp = DB::table('loai_san_pham')->select('*')->where('trang_thai','=',1)->get();
        $sanpham = DB::table('san_pham')->select('*')->where('trang_thai','=',1)->get();
        $mausanppham = DB::table('mau_san_pham')->select('*')->where([['id', '=', $id],['trang_thai','=',1]])->first();
        return view('admin.mausp-ban-hang.sua', compact('mausanppham', 'loaisp', 'sanpham'));
    }

    public function postSuaBanHang(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'idMSP'     => 'bail|required|min:3|max:8',
                'mau'       => 'bail|required|min:5|max:50',
                'yn'        => 'bail|min:5|max:500',
                'hinh_anh'   => 'bail|required|mimes:jpg,bmp,png',
                'slton'     => 'bail|required|integer',
            ],
            [
                'idMSP.required'    => 'Bạn chưa nhập Mã màu sản phẩm',
                'idMSP.min'         => 'Mã màu sản phẩm phải có độ dài từ 3 đến 8 ký tự',
                'idMSP.max'         => 'Mã màu sản phẩm phải có độ dài từ 3 đến 8 ký tự',
                'mau.required'      => 'Bạn chưa nhập Tên màu sản phẩm',
                'mau.min'           => 'Tên màu sản phẩm phải có độ dài từ 5 đến 50 ký tự',
                'mau.max'           => 'Tên màu sản phẩm phải có độ dài từ 5 đến 50 ký tự',
                'hinh_anh.required'  => 'Bạn chưa chọn Hình ảnh màu sản phẩm',
                'hinh_anh.mimes'     => 'File chọn phải là file hình ảnh (*.jpg, *png)',
                'yn.min'            => 'Ý nghĩa màu sản phẩm phải có độ dài từ 5 đến 500 ký tự',
                'yn.max'            => 'Ý nghĩa màu sản phẩm phải có độ dài từ 5 đến 500 ký tự',
                'slton.required'   => 'Bạn chưa nhập Số lượng tồn của sản phẩm',
                'slton.integer'    => 'Số lượng tồn của sản phẩm phải là 1 số nguyên',
            ]
        );
        if ($request->hasFile('hinh_anh')) {
            $tenfile = $request->hinh_anh;
            $name = $tenfile->getClientOriginalName();
            $tenfile->move('admin_asset/image_son/mau_san_pham', $name);
        }
        DB::table('mau_san_pham')->select('*')->where('id', '=', $id)
            ->update(
                [
                    'id_LSP' => $request->idLSP,
                    'id_SP' => $request->idSP,
                    'Ma_MSP' => $request->idMSP,
                    'mau' => $request->mau,
                    'hinhanh' => $name,
                    'thongTinMau' => $request->yn,
                    'soluongton'=>$request->slton,
                    'updated_at'=>Carbon :: now ()
                ]
            );

        return redirect('admin/mausp-ban-hang/sua/' . $id)->with('thongbao', 'Sửa thành công');
    }

    public function postXoaBanHang($id)
    {
        DB::table('mau_san_pham')->where('id','=',$id)->update(['trang_thai' => 0]);
        return response()->json([
                                    'message' => 'Data deleted successfully!'
                                ]);
    }
    //NHÂN VIÊN NHẬP KHO
    public function getDanhSachNhapKho()
    {
        $data = DB::table('mau_san_pham')->join('loai_san_pham','mau_san_pham.id_LSP','=','loai_san_pham.id')
            ->join('san_pham','mau_san_pham.id_SP','=','san_pham.id')
            ->select('mau_san_pham.*','mau_san_pham.id as id', 'loai_san_pham.ten_LSP as ten_LSP',
                     'san_pham.ten_SP as ten_SP')
            ->where([['mau_san_pham.trang_thai', '=', 1],['san_pham.trang_thai','=',1],['loai_san_pham.trang_thai','=',1]])
            ->orderBy('mau_san_pham.id','desc')
            ->paginate(5);
        return view('admin.mausp-nhap-kho.danhsach', compact('data'));
    }

    public function getThemNhapKho()
    {
        $loaisp = DB::table('loai_san_pham')->select('*')->where('trang_thai','=',1)->get();
        $sanpham = DB::table('san_pham')->select('*')->where('trang_thai','=',1)->get();
        return view('admin.mausp-nhap-kho.them', compact('loaisp', 'sanpham'));
    }

    public function postThemNhapKho(Request $request)
    {
        $this->validate(
            $request,
            [
                'idMSP'     => 'bail|required|min:3|max:8',
                'mau'       => 'bail|unique:mau_san_pham,mau|required|min:5|max:50',
                'yn'        => 'bail|required|min:5|max:500',
                'hinh_anh'  => 'bail|required|mimes:jpg,bmp,png',
                'slton'     => 'bail|required|integer',
            ],
            [
                'idMSP.required'   => 'Bạn chưa nhập Mã màu sản phẩm',
                'idMSP.min'        => 'Mã màu sản phẩm phải có độ dài từ 3 đến 8 ký tự',
                'idMSP.max'        => 'Mã màu sản phẩm phải có độ dài từ 3 đến 8 ký tự',
                'mau.required'     => 'Bạn chưa nhập Tên màu sản phẩm',
                'mau.unique'       => 'Tên màu sản phẩm đã tồn tại',
                'mau.min'          => 'Tên màu sản phẩm phải có độ dài từ 5 đến 50 ký tự',
                'mau.max'          => 'Tên màu sản phẩm phải có độ dài từ 5 đến 50 ký tự',
                'hinh_anh.required'=> 'Bạn chưa chọn Hình ảnh màu sản phẩm',
                'hinh_anh.mimes'   => 'File chọn phải là file hình ảnh (*.jpg, *png)',
                'yn.required'      => 'Bạn chưa nhập Ý nghĩa màu sản phẩm',
                'yn.min'           => 'Ý nghĩa màu sản phẩm phải có độ dài từ 5 đến 500 ký tự',
                'yn.max'           => 'Ý nghĩa màu sản phẩm phải có độ dài từ 5 đến 500 ký tự',
                'slton.required'   => 'Bạn chưa nhập Số lượng tồn của sản phẩm',
                'slton.integer'    => 'Số lượng tồn của sản phẩm phải là 1 số nguyên',
            ]
        );
        if ($request->hasFile('hinh_anh')) {
            $tenfile = $request->hinh_anh;
            $name = $tenfile->getClientOriginalName();
            $tenfile->move('admin_asset/image_son/mau_san_pham', $name);
        }
        DB::table('mau_san_pham')->insert(
            [
                'id_LSP'    => $request->idLSP,
                'id_SP'     => $request->idSP,
                'Ma_MSP'    => $request->idMSP,
                'mau'       => $request->mau,
                'hinhanh'   => $name,
                'thongTinMau'=> $request->yn,
                'soluongton'=>$request->slton,
                'trang_thai'=> $request->status,
                'created_at' => Carbon :: now ()
            ]
        );
        return redirect('admin/mausp-nhap-kho/them')->with('thongbao', 'Thêm thành công');
    }

    public function getSuaNhapKho($id)
    {
        $loaisp = DB::table('loai_san_pham')->select('*')->where('trang_thai','=',1)->get();
        $sanpham = DB::table('san_pham')->select('*')->where('trang_thai','=',1)->get();
        $mausanppham = DB::table('mau_san_pham')->select('*')->where([['id', '=', $id],['trang_thai','=',1]])->first();
        return view('admin.mausp-nhap-kho.sua', compact('mausanppham', 'loaisp', 'sanpham'));
    }

    public function postSuaNhapKho(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'idMSP'     => 'bail|required|min:3|max:8',
                'mau'       => 'bail|required|min:5|max:50',
                'yn'        => 'bail|min:5|max:500',
                'hinh_anh'   => 'bail|required|mimes:jpg,bmp,png',
                'slton'     => 'bail|required|integer',
            ],
            [
                'idMSP.required'    => 'Bạn chưa nhập Mã màu sản phẩm',
                'idMSP.min'         => 'Mã màu sản phẩm phải có độ dài từ 3 đến 8 ký tự',
                'idMSP.max'         => 'Mã màu sản phẩm phải có độ dài từ 3 đến 8 ký tự',
                'mau.required'      => 'Bạn chưa nhập Tên màu sản phẩm',
                'mau.min'           => 'Tên màu sản phẩm phải có độ dài từ 5 đến 50 ký tự',
                'mau.max'           => 'Tên màu sản phẩm phải có độ dài từ 5 đến 50 ký tự',
                'hinh_anh.required'  => 'Bạn chưa chọn Hình ảnh màu sản phẩm',
                'hinh_anh.mimes'     => 'File chọn phải là file hình ảnh (*.jpg, *png)',
                'yn.min'            => 'Ý nghĩa màu sản phẩm phải có độ dài từ 5 đến 500 ký tự',
                'yn.max'            => 'Ý nghĩa màu sản phẩm phải có độ dài từ 5 đến 500 ký tự',
                'slton.required'   => 'Bạn chưa nhập Số lượng tồn của sản phẩm',
                'slton.integer'    => 'Số lượng tồn của sản phẩm phải là 1 số nguyên',
            ]
        );
        if ($request->hasFile('hinh_anh')) {
            $tenfile = $request->hinh_anh;
            $name = $tenfile->getClientOriginalName();
            $tenfile->move('admin_asset/image_son/mau_san_pham', $name);
        }
        DB::table('mau_san_pham')->select('*')->where('id', '=', $id)
            ->update(
                [
                    'id_LSP' => $request->idLSP,
                    'id_SP' => $request->idSP,
                    'Ma_MSP' => $request->idMSP,
                    'mau' => $request->mau,
                    'hinhanh' => $name,
                    'thongTinMau' => $request->yn,
                    'soluongton'=>$request->slton,
                    'updated_at'=>Carbon :: now ()
                ]
            );

        return redirect('admin/mausp-nhap-kho/sua/' . $id)->with('thongbao', 'Sửa thành công');
    }

    public function postXoaNhapKho($id)
    {
        DB::table('mau_san_pham')->where('id','=',$id)->update(['trang_thai' => 0]);
        return response()->json([
                                    'message' => 'Data deleted successfully!'
                                ]);
    }
}
