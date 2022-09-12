<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;

use DB;

class ProductController extends Controller
{
    public function getDanhSach()
    {
        $sanpham = DB::table('san_pham')->where('trang_thai','=',1)->paginate(5);
        $loaisanpham = DB::table('loai_san_pham')->where('trang_thai','=',1)->select('id', 'ten_LSP')->get();
        return view('admin.sanpham.danhsach', compact('sanpham', 'loaisanpham'));
    }

    public function getThem()
    {
        $loaisanpham = DB::table('loai_san_pham')->where('trang_thai','=',1)->select('id', 'ten_LSP')->get();
        return view('admin.sanpham.them', compact('loaisanpham' ));
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
                'gianhap'    => 'bail|required|numeric|min:5',
                'giaban'   => 'bail|required|numeric|min:5',
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
                'gianhap.required'       => 'Bạn chưa nhập Giá sản phẩm',
                'gianhap.numeric'        => 'Giá sản phẩm phải là 1 số',
                'gianhap.min'            => 'Giá sản phẩm phải có độ dài từ 5 ký tự',
                'giaban.required'      => 'Bạn chưa nhập Giá sản phẩm',
                'giaban.numeric'       => 'Giá sản phẩm phải là 1 số',
                'giaban.min'           => 'Giá sản phẩm phải có độ dài từ 5 ký tự',
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
                'ten_SP' => $request->tenSP,
                'xuatxu' => $request->xuatxu,
                'trongluong' => $request->trluong,
                'gia_nhap_vao' => $request->gianhap,
                'gia_ban_ra' => $request->giaban,
                'hansudung_thang' => $request->hsd,
                'gioithieu' => $request->gthieu,
                'hinhanhgoc' => $name,
                'trang_thai'=> $request->status,
                'noibat' => $request->noibat,
            ]
        );
        return redirect('admin/sanpham/them')->with('thongbao', 'Thêm thành công');
    }

    public function getSua($id)
    {
        $sanpham = DB::table('san_pham')->select('*')
            ->where([['id', '=', $id],['trang_thai','=',1]])
            ->first();
        $loaisp = DB::table('loai_san_pham')->select('*')->get();
        return view('admin.sanpham.sua', compact('sanpham', 'loaisp'));
    }

    public function postSua(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'idSP'        => 'bail|required|unique:san_pham,Ma_SP|min:3|max:8',
                'tenSP'       => 'bail|required|unique:san_pham,ten_SP',
                'xuatxu'    => 'bail|required|min:3|max:50',
                'trluong'   => 'bail|required|numeric|min:1',
                'gianhap'    => 'bail|required|numeric|min:5',
                'giaban'   => 'bail|required|numeric|min:5',
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
                'gianhap.required'       => 'Bạn chưa nhập Giá sản phẩm',
                'gianhap.numeric'        => 'Giá sản phẩm phải là 1 số',
                'gianhap.min'            => 'Giá sản phẩm phải có độ dài từ 5 ký tự',
                'giaban.required'      => 'Bạn chưa nhập Giá sản phẩm',
                'giaban.numeric'       => 'Giá sản phẩm phải là 1 số',
                'giaban.min'           => 'Giá sản phẩm phải có độ dài từ 5 ký tự',
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
                'Ma_SP' => $request->idSP,
                'id_LSP' => $request->idLSP,
                'ten_SP' => $request->tenSP,
                'xuatxu' => $request->xuatxu,
                'trongluong' => $request->trluong,
                'gia_nhap_vao' => $request->gianhap,
                'gia_ban_ra' => $request->giaban,
                'hansudung_thang' => $request->hsd,
                'gioithieu' => $request->gthieu,
                'hinhanhgoc' => $name,
                'noibat' => $request->noibat,
            ]
        );

        return redirect('admin/sanpham/sua/' . $id)->with('thongbao', 'Sửa thành công');
    }

    public function postXoa($id)
    {
        DB::table('san_pham')->where('id','=',$id)->update(['trang_thai' => 0]);
        DB::table('mau_san_pham')->where('id_SP','=',$id)->update(['trang_thai' => 0]);
        return response()->json([
                                    'message' => 'Data deleted successfully!'
                                ]);
    }
}
