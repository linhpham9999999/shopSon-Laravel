<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\mau_san_pham;
use App\Models\loai_san_pham;
use App\Models\san_pham;

use DB;

class MauSpController extends Controller
{
    public function getDanhSach()
    {
        $data = DB::table('mau_san_pham')->select('*')->get();
        return view('admin.mausp.danhsach', ['mausanpham' => $data]);
    }

    public function getThem()
    {
        $loaisp = loai_san_pham::all();
        $sanpham = san_pham::all();
        return view('admin.mausp.them', compact('loaisp', 'sanpham'));
    }

    public function postThem(Request $request)
    {
        $this->validate(
            $request,
            [
                'idMSP'     => 'bail|required|unique:mau_san_pham,Ma_MSP|min:3|max:8',
                'mau'       => 'bail|unique:mau_san_pham,mau|required|min:5|max:50',
                'yn'        => 'bail|required|min:5|max:255',
                'hinhanh'   => 'bail|required|mimes:jpg,bmp,png'
            ],
            [
                'idMSP.required'      => 'Bạn chưa nhập Mã màu sản phẩm',
                'idMSP.unique'        => 'Mã màu sản phẩm đã tồn tại',
                'idMSP.min'           => 'Mã màu sản phẩm phải có độ dài từ 3 đến 8 ký tự',
                'idMSP.max'           => 'Mã màu sản phẩm phải có độ dài từ 3 đến 8 ký tự',
                'mau.required'        => 'Bạn chưa nhập Tên màu sản phẩm',
                'mau.unique'          => 'Tên màu sản phẩm đã tồn tại',
                'mau.min'             => 'Tên màu sản phẩm phải có độ dài từ 5 đến 50 ký tự',
                'mau.max'             => 'Tên màu sản phẩm phải có độ dài từ 5 đến 50 ký tự',
                'hinhanh.required'    => 'Bạn chưa chọn Hình ảnh màu sản phẩm',
                'hinh_anh.mimes'      => 'File chọn phải là file hình ảnh (*.jpg, *png)',
                'yn.required'         => 'Bạn chưa nhập Ý nghĩa màu sản phẩm',
                'yn.min'              => 'Ý nghĩa màu sản phẩm phải có độ dài từ 5 đến 255 ký tự',
                'yn.max'              => 'Ý nghĩa màu sản phẩm phải có độ dài từ 5 đến 255 ký tự'

            ]
        );
        if ($request->hasFile('hinhanh')) {
            $tenfile = $request->hinhanh;
            $name = $tenfile->getClientOriginalName();
            $tenfile->move('admin_asset/image_son/mau_san_pham', $name);
        }
        DB::table('mau_san_pham')->insert(
            [
                'id_LSP' => $request->idLSP,
                'id_SP' => $request->idSP,
                'Ma_MSP' => $request->idMSP,
                'mau' => $request->mau,
                'hinhanh' => $name,
                'thongTinMau' => $request->yn
            ]
        );
        return redirect('admin/mausp/them')->with('thongbao', 'Thêm thành công');
    }

    public function getSua($id)
    {
        $loaisp = loai_san_pham::all();
        $sanpham = san_pham::all();
        $mausanppham = DB::table('mau_san_pham')->select('*')->where('id', '=', $id)->first();
        return view('admin.mausp.sua', compact('mausanppham', 'loaisp', 'sanpham'));
    }

    public function postSua(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'yn'        => 'bail|required|min:5|max:50',
                'hinhanh'   => 'bail|required|mimes:jpg,bmp,png'
            ],
            [
                'hinhanh.required'  => 'Bạn chưa chọn Hình ảnh màu sản phẩm',
                'hinhanh.mimes'    => 'File chọn phải là file hình ảnh (*.jpg, *png)',
                'yn.required'       => 'Bạn chưa nhập Ý nghĩa màu sản phẩm',
                'yn.min'            => 'Ý nghĩa màu sản phẩm phải có độ dài từ 5 đến 50 ký tự',
                'yn.max'            => 'Ý nghĩa màu sản phẩm phải có độ dài từ 5 đến 50 ký tự',
            ]
        );
        if ($request->hasFile('hinhanh')) {
            $tenfile = $request->hinhanh;
            $name = $tenfile->getClientOriginalName();
            $tenfile->move('admin_asset/image_son/mau_san_pham', $name);
        }
//        return $name;
        DB::table('mau_san_pham')->select('*')->where('id', '=', $id)
            ->update(
                [
                    'id_LSP' => $request->idLSP,
                    'id_SP' => $request->idSP,
                    'Ma_MSP' => $request->idMSP,
                    'mau' => $request->mau,
                    'hinhanh' => $name,
                    'thongTinMau' => $request->yn
                ]
            );

        return redirect('admin/mausp/sua/' . $id)->with('thongbao', 'Sửa thành công');
    }

    public function getXoa($id)
    {
        $msp = DB::table('mau_san_pham')->select('*')->where('id', '=', $id);
        $msp->delete();

        return redirect('admin/mausp/danhsach')->with('thongbao', 'Xóa thành công');
    }
}
