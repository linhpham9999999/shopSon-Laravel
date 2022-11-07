<?php

namespace App\Http\Controllers;
use DateTime;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Carbon;

class SearchOrderController extends Controller
{
    // tìm kiếm theo mã HĐ, tên KH mua
    public function search(Request $request){
        $output="";
        $order_code = $request->order_code_input;
        $hoadon = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->select('Ma_HD','ngaydat','tongtien','hoten','trangthai','hoa_don.id','hoa_don.id_TT')
            ->orderBy('hoa_don.id','desc')
            ->where('Ma_HD','like','%'.$order_code.'%')
            ->orWhere('nguoi_dung.hoten','like','%'.$order_code.'%')
            ->paginate(5);
        $isOrder = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->where('Ma_HD','like','%'.$order_code.'%')
            ->orWhere('nguoi_dung.hoten','like','%'.$order_code.'%')
            ->get()->toArray();
        if($isOrder){
            foreach ($hoadon as $hd){
                $output.=
                    '<tr class="nk-tb-item">
                    <td class="nk-tb-col tb-col-md" style="text-align: center"><span># '.$hd->Ma_HD.' </span></td>
                    <td class="nk-tb-col tb-col-md"><span> '.$hd->hoten.' </span></td>
                    <td class="nk-tb-col tb-col-md"><span> '.DateTime::createFromFormat('Y-m-d', $hd->ngaydat)->format('m/d/Y').' </span></td>
                    <td class="nk-tb-col tb-col-md"><span> '.number_format($hd->tongtien).' </span></td>
                    <td class="nk-tb-col tb-col-md"><span> '.$hd->trangthai.' </span></td>
                    <td class="nk-tb-col tb-col-md">
                    '.'<a href="admin/duyetHD/chitietHD/'.$hd->id.'" class="btn btn-dim btn-sm btn-primary">'.'Chi tiết
                        </a>
                    '.'</td>
                </tr>';
            }
        }
        else{
            $output='
                    <h3 style="text-align: center">Không tìm thấy hóa đơn</h3>';
        }
        return($output);
    }
    // tìm kiếm theo ngày
    public function fetch_data(Request $request){
        if($request->ajax())
        {
            if($request->from_date != '' && $request->to_date != '')
            {
                $data = DB::table('hoa_don')
                    ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
                    ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
                    ->select('Ma_HD','ngaydat','tongtien','hoten','trangthai','hoa_don.id','hoa_don.id_TT')
                    ->orderBy('hoa_don.id','desc')
                    ->whereBetween('hoa_don.ngaydat',[$request->from_date, $request->to_date])
                    ->get();
            }
            else
            {
                $data = DB::table('hoa_don')->orderBy('id', 'desc')->get();
            }
            echo json_encode($data);
        }
    }

    // NHÂN VIÊN BÁN HÀNG
    public function searchBanHang(Request $request){
        $output="";
        $order_code = $request->order_code_input;
        $hoadon = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->select('Ma_HD','ngaydat','tongtien','hoten','trangthai','hoa_don.id','hoa_don.id_TT')
            ->orderBy('hoa_don.id','desc')
            ->where('Ma_HD','like','%'.$order_code.'%')
            ->orWhere('nguoi_dung.hoten','like','%'.$order_code.'%')
            ->paginate(5);
        $isOrder = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->where('Ma_HD','like','%'.$order_code.'%')
            ->orWhere('nguoi_dung.hoten','like','%'.$order_code.'%')
            ->get()->toArray();
        if($isOrder){
            foreach ($hoadon as $hd){
                $output.=
                    '<tr class="nk-tb-item">
                    <td class="nk-tb-col tb-col-md" style="text-align: center"><span># '.$hd->Ma_HD.' </span></td>
                    <td class="nk-tb-col tb-col-md"><span> '.$hd->hoten.' </span></td>
                    <td class="nk-tb-col tb-col-md"><span> '.DateTime::createFromFormat('Y-m-d', $hd->ngaydat)->format('m/d/Y').' </span></td>
                    <td class="nk-tb-col tb-col-md"><span> '.number_format($hd->tongtien).' </span></td>
                    <td class="nk-tb-col tb-col-md"><span> '.$hd->trangthai.' </span></td>
                    <td class="nk-tb-col tb-col-md">
                    '.'<a href="admin/duyetHD-ban-hang/chitietHD/'.$hd->id.'" class="btn btn-dim btn-sm btn-primary">'.'Chi tiết
                        </a>
                    '.'</td>
                </tr>';
            }
        }
        else{
            $output='
                    <h3 style="text-align: center">Không tìm thấy hóa đơn</h3>';
        }
        return($output);
    }
}
