<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\mau_san_pham;
use App\Models\loai_san_pham;

use DB;

class MauSpController extends Controller
{
    public function getDanhSach(){
        $data = DB::table('mau_san_pham')->join('loai_san_pham','mau_san_pham.id_LSP','=','loai_san_pham.id')->select('*')->get();
        return view('admin.mausp.danhsach',['mausanpham'=>$data]);
    }
    public  function getThem(){
        $loaisp = loai_san_pham::all();
        return view('admin.mausp.them', compact('loaisp'));
    }
    public  function postThem(Request  $request){
        $this->validate($request,
            [
                'idMSP' => 'bail|required|unique:mau_san_pham,Ma_MSP|min:3|max:8',
                'mau' => 'bail|unique:mau_san_pham,mau|required|min:5|max:30'
            ],
            [
                'idMSP.required' => 'Bạn chưa nhập Mã màu sản phẩm',
                'idMSP.unique' => 'Mã màu sản phẩm đã tồn tại',
                'idMSP.min' => 'Mã màu sản phẩm phải có độ dài từ 3 đến 8 ký tự',
                'idMSP.max' => 'Mã màu sản phẩm phải có độ dài từ 3 đến 8 ký tự',
                'mau.required' => 'Bạn chưa nhập Tên màu sản phẩm',
                'mau.unique' => 'Tên màu sản phẩm đã tồn tại',
                'mau.min' => 'Tên màu sản phẩm phải có độ dài từ 5 đến 30 ký tự',
                'mau.max' => 'Tên màu sản phẩm phải có độ dài từ 5 đến 30 ký tự'
            ]);
        $mausp = new mau_san_pham;
        $mausp->id_LSP = $request->idLSP;
        $mausp->Ma_MSP = $request->idMSP;
        $mausp->mau = $request->mau;
        $mausp->save();
        return redirect('admin/mausp/them')->with('thongbao','Thêm thành công');
    }

    public  function getSua($id){
        $mausanppham = DB::table('mau_san_pham')->select('*')->where('id','=',$id)->first();
        return view('admin.mausp.sua',compact('mausanppham'));
    }

    public  function postSua(Request $request, $id){
        $this->validate($request,
            [
                'idMSP' => 'bail|required|unique:mau_san_pham,Ma_MSP|min:3|max:8',
                'mau' => 'bail|unique:mau_san_pham,mau|required|min:5|max:50'
            ],
            [
                'idMSP.required' => 'Bạn chưa nhập Mã màu sản phẩm',
                'idMSP.unique' => 'Mã màu sản phẩm đã tồn tại',
                'idMSP.min' => 'Mã màu sản phẩm phải có độ dài từ 3 đến 8 ký tự',
                'idMSP.max' => 'Mã màu sản phẩm phải có độ dài từ 3 đến 8 ký tự',
                'mau.required' => 'Bạn chưa nhập Tên màu sản phẩm',
                'mau.unique' => 'Tên màu sản phẩm đã tồn tại',
                'mau.min' => 'Tên màu sản phẩm phải có độ dài từ 5 đến 30 ký tự',
                'mau.max' => 'Tên màu sản phẩm phải có độ dài từ 5 đến 30 ký tự'
            ]);
        DB::table('mau_san_pham')->select('*')->where('id','=',$id)->update(['Ma_MSP'=>$request->idMSP,'mau'=>$request->mau]);

        return redirect('admin/mausp/sua/'.$id)->with('thongbao','Sửa thành công');
    }
    public  function getXoa($id){
        $msp = DB::table('mau_san_pham')->select('*')->where('id','=',$id);
        $msp->delete();

        return redirect('admin/mausp/danhsach')->with('thongbao','Xóa thành công');
    }
}
