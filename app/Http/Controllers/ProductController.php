<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;

use DB;

class ProductController extends Controller
{
    public function getDanhSach()
    {
        $sanpham = DB::table('san_pham')->paginate(5);
        $loaisanpham = DB::table('loai_san_pham')->select('id', 'ten_LSP')->get();
        $nhapp = DB::table('nha_phan_phoi')->select('id', 'ten_NPP')->get();
        return view('admin.sanpham.danhsach', compact('sanpham', 'loaisanpham','nhapp'));
    }

    public function getThem()
    {
        $loaisanpham = DB::table('loai_san_pham')->select('id', 'ten_LSP')->get();
        $nhapp = DB::table('nha_phan_phoi')->select('id', 'ten_NPP')->get();
        return view('admin.sanpham.them', compact('loaisanpham', 'nhapp'));
    }

    public function postThem(Request $request)
    {
        $this->validate(
            $request,
            [
                'idSP'        => 'bail|required|unique:san_pham,Ma_SP|min:3|max:8',
                'tenSP'       => 'bail|required|unique:san_pham,ten_SP',
                'xuatxu'    => 'bail|required|min:3|max:50',
                'trluong'   => 'bail|required|numeric|min:1',
                'giagoc'    => 'bail|required|numeric|min:5',
                'giamgia'   => 'bail|required|numeric|min:5',
                'hsd'       => 'bail|required|integer',
                'gthieu'    => 'bail|required|min:5|max:500',
                'hinh_anh'  => 'bail|required|mimes:jpg,bmp,png'
            ],
            [
                'idSP.required'           => 'Bạn chưa nhập Mã sản phẩm',
                'idSP.unique'             => 'Mã sản phẩm đã tồn tại',
                'idSP.min'                => 'Mã sản phẩm phải có độ dài từ 3 đến 8 ký tự',
                'idSP.max'                => 'Mã sản phẩm phải có độ dài từ 3 đến 8 ký tự',
                'tenSP.required'          => 'Bạn chưa nhập Tên sản phẩm',
                'tenSP.unique'            => 'Tên sản phẩm đã tồn tại',
                'xuatxu.required'       => 'Bạn chưa nhập Xuất xứ sản phẩm',
                'xuatxu.min'            => 'Tên sản phẩm phải có độ dài từ 3 đến 50 ký tự',
                'xuatxu.max'            => 'Tên sản phẩm phải có độ dài từ 3 đến 50 ký tự',
                'trluong.required'      => 'Bạn chưa nhập Trọng lượng sản phẩm',
                'trluong.numeric'       => 'Trọng lượng sản phẩm phải là 1 số',
                'trluong.min'           => 'Trọng lượng sản phẩm phải lớn hơn 1',
                'giagoc.required'       => 'Bạn chưa nhập Giá sản phẩm',
                'giagoc.numeric'        => 'Giá sản phẩm phải là 1 số',
                'giagoc.min'            => 'Giá sản phẩm phải có độ dài từ 5 ký tự',
                'giamgia.required'      => 'Bạn chưa nhập Giá sản phẩm',
                'giamgia.numeric'       => 'Giá sản phẩm phải là 1 số',
                'giamgia.min'           => 'Giá sản phẩm phải có độ dài từ 5 ký tự',
                'hsd.required'          => 'Bạn chưa nhập Hạn sử dụng của sản phẩm',
                'hsd.integer'           => 'Hạn sử dụng của sản phẩm phải là 1 số nguyên',
                'gthieu.min'            => 'Thông tin sản phẩm phải có độ dài từ 5 đến 500 ký tự',
                'gthieu.max'            => 'Thông tin sản phẩm phải có độ dài từ 5 đến 500 ký tự',
                'gthieu.required'       => 'Bạn chưa nhập Thông tin sản phẩm',
                'hinh_anh.required'     => 'Bạn chưa chọn Hình ảnh của sản phẩm',
                'hinh_anh.mimes'        => 'File chọn phải là file hình ảnh (*.jpg, *png)'
            ]
        );

        if ($request->hasFile('hinh_anh')) {
            $tenfile = $request->hinh_anh;
            $name = $tenfile->getClientOriginalName();
            $tenfile->move('admin_asset/image_son', $name);
        }
        DB::table('san_pham')->insert(
            [
                'Ma_SP' => $request->idSP,
                'id_LSP' => $request->idLSP,
                'id_NPP' => $request->idNPP,
                'ten_SP' => $request->tenSP,
                'xuatxu' => $request->xuatxu,
                'trongluong' => $request->trluong,
                'giagoc' => $request->giagoc,
                'giamgia' => $request->giamgia,
                'hansudung_thang' => $request->hsd,
                'gioithieu' => $request->gthieu,
                'hinhanhgoc' => $name,
                'sosao' => $request->sosao,
                'noibat' => $request->noibat,
            ]
        );
        return redirect('admin/sanpham/them')->with('thongbao', 'Thêm thành công');
    }

    public function getSua($id)
    {
        $sanpham = DB::table('san_pham')->select('*')->where('id', '=', $id)->first();
        $loaisp = DB::table('loai_san_pham')->select('*')->get();
        $nhapp = DB::table('nha_phan_phoi')->select('id', 'ten_NPP')->get();
        return view('admin.sanpham.sua', compact('sanpham', 'loaisp', 'nhapp'));
//        return response()->json($sanpham, $loaisp, $nhapp);
    }

    public function postSua(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'idSP'        => 'bail|required|min:3|max:8',
                'tenSP'       => 'bail|required',
                'xuatxu'    => 'bail|required|min:3|max:50',
                'trluong'   => 'bail|required|numeric|min:1',
                'giagoc'    => 'bail|required|numeric|min:5',
                'giamgia'   => 'bail|required|numeric',
//                'slton'     => 'bail|required|integer',
                'hsd'       => 'bail|required|integer',
                'gthieu'    => 'bail|required|min:5|max:500',
                'hinh_anh'  => 'bail|required|mimes:jpg,bmp,png'
            ],
            [
                'idSP.required'           => 'Bạn chưa nhập Mã sản phẩm',
                'idSP.min'                => 'Mã sản phẩm phải có độ dài từ 3 đến 8 ký tự',
                'idSP.max'                => 'Mã sản phẩm phải có độ dài từ 3 đến 8 ký tự',
                'tenSP.required'          => 'Bạn chưa nhập Tên sản phẩm',
                'xuatxu.required'       => 'Bạn chưa nhập Xuất xứ sản phẩm',
                'xuatxu.min'            => 'Tên sản phẩm phải có độ dài từ 3 đến 50 ký tự',
                'xuatxu.max'            => 'Tên sản phẩm phải có độ dài từ 3 đến 50 ký tự',
                'trluong.required'      => 'Bạn chưa nhập Trọng lượng sản phẩm',
                'trluong.numeric'       => 'Trọng lượng sản phẩm phải là 1 số',
                'trluong.min'           => 'Trọng lượng sản phẩm phải lớn hơn 1',
                'giagoc.required'       => 'Bạn chưa nhập Giá sản phẩm',
                'giagoc.numeric'        => 'Giá sản phẩm phải là 1 số',
                'giagoc.min'            => 'Giá sản phẩm phải có độ dài từ 5 ký tự',
                'giamgia.required'      => 'Bạn chưa nhập Giá sản phẩm',
                'giamgia.numeric'       => 'Giá sản phẩm phải là 1 số',
//                'slton.required'        => 'Bạn chưa nhập Số lượng tồn của sản phẩm',
//                'slton.integer'         => 'Số lượng tồn của sản phẩm phải là 1 số nguyên',
                'hsd.required'          => 'Bạn chưa nhập Hạn sử dụng của sản phẩm',
                'hsd.integer'           => 'Hạn sử dụng của sản phẩm phải là 1 số nguyên',
                'gthieu.min'            => 'Thông tin sản phẩm phải có độ dài từ 5 đến 500 ký tự',
                'gthieu.max'            => 'Thông tin sản phẩm phải có độ dài từ 5 đến 500 ký tự',
                'gthieu.required'       => 'Bạn chưa nhập Thông tin sản phẩm',
                'hinh_anh.required'     => 'Bạn chưa chọn Hình ảnh của sản phẩm',
                'hinh_anh.mimes'        => 'File chọn phải là file hình ảnh (*.jpg, *png)'
            ]
        );
        if ($request->hasFile('hinh_anh')) {
            $tenfile = $request->hinh_anh;
            $name = $tenfile->getClientOriginalName();
            $tenfile->move('admin_asset/image_son', $name);
        }

        DB::table('san_pham')->select('*')->where('id', '=', $id)->update(
            [
                'Ma_SP'         => $request->idSP,
                'id_LSP'        => $request->idLSP,
                'id_NPP'        => $request->idNPP,
                'ten_SP'        => $request->tenSP,
                'xuatxu'        => $request->xuatxu,
                'trongluong'    => $request->trluong,
                'giagoc'        => $request->giagoc,
                'giamgia'       => $request->giamgia,
                'hansudung_thang'=> $request->hsd,
                'gioithieu'     => $request->gthieu,
                'hinhanhgoc'    => $name,
                'sosao'         => $request->sosao,
                'noibat'        => $request->noibat,
            ]
        );

        return redirect('admin/sanpham/sua/' . $id)->with('thongbao', 'Sửa thành công');
    }

    public function postXoa($id)
    {
        DB::table('san_pham')->where('id','=',$id)->delete();
        return response()->json([
                                    'message' => 'Data deleted successfully!'
                                ]);
    }
}
