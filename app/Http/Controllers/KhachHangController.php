<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Carbon\Carbon;
use \Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KhachHangController extends Controller
{
    public function index(){
        $range = Carbon::now()->subDays(365);
        $data = DB::table('chi_tiet_hoa_don')
            ->join('mau_san_pham','mau_san_pham.id','=','chi_tiet_hoa_don.id_MSP')
            ->join('hoa_don','chi_tiet_hoa_don.id_HD','=','hoa_don.id')
            ->join('san_pham','san_pham.id','=','mau_san_pham.id_SP')
            ->select('san_pham.id','mau_san_pham.mau',DB::raw('sum(soluong) as soluongcay'))
            ->where('hoa_don.ngaydat','>=',$range)
            ->whereIn('hoa_don.id_TT',[1,5])
            ->groupBy('san_pham.id','mau_san_pham.mau')
            ->get()->toArray();
        foreach ($data as $item){
            if($item->soluongcay > 4){
                $idSP_ban_chay[] = array(
                    'id_SP' => $item->id
                );
            }
        }
        $san_pham_ban_chay = DB::table('san_pham')->select('*')
            ->where('trang_thai','=',1)
            ->whereIn('id',$idSP_ban_chay)->orderBy('id','desc')->get();
        $sanphamnew = DB::table('san_pham')->select('*')
            ->where('trang_thai','=',1)
            ->orderBy('id','desc')->take(5)->get();
        return view('khach_hang.trangchu', compact('san_pham_ban_chay','sanphamnew'));
    }
    // Thông tin tất cả sản phẩm trong bảng SAN_PHAM
    public function listSP(){
        $loaisp = DB::table('loai_san_pham')->select('id','ten_LSP')->where('trang_thai','=',1)->get();
        $sanpham = DB::table('san_pham')->select('*')->where('trang_thai','=',1)->simplePaginate(6);
        $sanphamnew = DB::table('san_pham')->select('*')
            ->where('trang_thai','=',1)
            ->orderBy('id','desc')->take(3)->get();

        return view('khach_hang.shop.all-product',compact('loaisp','sanpham','sanphamnew'));
    }
    // Xem sản phẩm theo loại sản phẩm
    public function loaiSP($id){
        $loaisp = DB::table('loai_san_pham')->select('id','ten_LSP')
            ->where('trang_thai','=',1)->get();
        $sanpham = DB::table('loai_san_pham')->join('san_pham','loai_san_pham.id','=','san_pham.id_LSP')
            ->select('san_pham.*')
            ->where([['loai_san_pham.id','=',$id],['loai_san_pham.trang_thai','=',1],['san_pham.trang_thai','=',1]])
            ->simplePaginate(6);
        $sanphamnew = DB::table('san_pham')->select('*')
            ->where('trang_thai','=',1)
            ->orderBy('id','desc')->take(3)->get();
        return view('khach_hang.shop.all-product',compact('sanpham','loaisp','sanphamnew'));
    }
    // Danh sách Màu Sản phẩm của từng Sản phẩm
    public function listColorProduct($id){
        $loaisp = DB::table('loai_san_pham')->select('id','ten_LSP')->where('trang_thai','=',1)->get();
        $sanpham = DB::table('san_pham')->select('*')->where('trang_thai','=',1)->get();
        $listColorProduct = DB::table('mau_san_pham')
            ->join('san_pham','mau_san_pham.id_SP','=','san_pham.id')
            ->select('mau_san_pham.*','gia_ban_ra','ten_SP','san_pham.hinhanhgoc')
            ->where([['san_pham.id','=',$id],['san_pham.trang_thai','=',1],['mau_san_pham.trang_thai','=',1]])
            ->simplePaginate(6);
        $sanphamnew = DB::table('san_pham')->select('*')
            ->where('trang_thai','=',1)
            ->orderBy('id','desc')->take(3)->get();
//            DB::table('mau_san_pham')
//            ->join('san_pham','mau_san_pham.id_SP','=','san_pham.id')
//            ->join('binh_luan','binh_luan.id_MSP','=','mau_san_pham.id')
//            ->where([['san_pham.id','=',$id],['san_pham.trang_thai','=',1],['mau_san_pham.trang_thai','=',1]])
//            ->select('binh_luan.id_MSP', DB::raw('avg(so_sao) so_sao'))
//            ->groupBy('binh_luan.id_MSP')
//            ->get()->toArray();
        return view('khach_hang.shop.product-color-list',
                    compact('listColorProduct','loaisp','sanpham','sanphamnew'));
    }
    // Xem chi tiet san pham de them cart
    public function listDetailColorProduct($id){
        $loaisp = DB::table('loai_san_pham')->select('id','ten_LSP')->where('trang_thai','=',1)->get();
        $sanpham = DB::table('san_pham')->select('*')->where('trang_thai','=',1)->get();
        $mausp = DB::table('mau_san_pham')
            ->join('san_pham','san_pham.id','=','mau_san_pham.id_SP')
            ->select('mau_san_pham.id','mau_san_pham.Ma_MSP','mau_san_pham.mau','mau_san_pham.hinhanh','mau_san_pham.thongTinMau',
            'mau_san_pham.soluongton','san_pham.hansudung_thang','san_pham.ten_SP','san_pham.xuatxu','san_pham.trongluong',
            'san_pham.gia_ban_ra','mau_san_pham.id_SP','san_pham.gioithieu','san_pham.thanh_phan','san_pham.created_at')
            ->where([['mau_san_pham.id','=',$id],['san_pham.trang_thai','=',1],['mau_san_pham.trang_thai','=',1]])
            ->get()->toArray();
        // lấy id SP của màu sản phẩm đang xem chi tiết
        $idSP = DB::table('mau_san_pham')->select('id_SP')
            ->where([['trang_thai','=',1],['id','=',$id]])->first();
        //lấy ra tất cả màu sản phẩm có cùng thương hiệu là id SP đó
        $san_pham_tuong_tu = DB::table('mau_san_pham')
            ->join('san_pham','mau_san_pham.id_SP','=','san_pham.id')
            ->select('mau_san_pham.*','gia_ban_ra','san_pham.id','san_pham.trang_thai')
            ->where([['san_pham.trang_thai','=',1],['san_pham.id','=',$idSP->id_SP],['mau_san_pham.id','!=',$id]])
            ->get()->toArray();
        $sanphamnew = DB::table('san_pham')->select('*')
            ->where('trang_thai','=',1)
            ->orderBy('id','desc')->take(3)->get();
        $rating = DB::table('binh_luan')->where('id_MSP','=',$id)->avg('so_sao');
        $rating = round($rating);
        $comment = DB::table('binh_luan')->select('id_MSP','noi_dung','create_at','emailnguoidung')
            ->where([['id_MSP','=',$id],['hien_thi','=',1]])->get()->toArray();
//        dd($rating);
        return view('khach_hang.shop.product-color-detail',
                    compact('mausp','loaisp','sanpham','sanphamnew','san_pham_tuong_tu','rating','comment'));
    }

    public function aboutUs(){
        return view('khach_hang/about_shop/about_shop');
    }
    //Khách hàng được xem chi tiết sản phẩm có đánh sao sau khi mua hàng
    public function listDetailColorProductRating($id){
        $loaisp = DB::table('loai_san_pham')->select('id','ten_LSP')->where('trang_thai','=',1)->get();
        $sanpham = DB::table('san_pham')->select('*')->where('trang_thai','=',1)->get();
        $mausp = DB::table('mau_san_pham')
            ->join('san_pham','san_pham.id','=','mau_san_pham.id_SP')
            ->select('mau_san_pham.id','mau_san_pham.Ma_MSP','mau_san_pham.mau','mau_san_pham.hinhanh','mau_san_pham.thongTinMau',
                     'mau_san_pham.soluongton','san_pham.hansudung_thang','san_pham.ten_SP','san_pham.xuatxu','san_pham.trongluong',
                     'san_pham.gia_ban_ra','mau_san_pham.id_SP','san_pham.gioithieu','san_pham.thanh_phan','san_pham.created_at')
            ->where([['mau_san_pham.id','=',$id],['san_pham.trang_thai','=',1],['mau_san_pham.trang_thai','=',1]])
            ->get()->toArray();
        // lấy id SP của màu sản phẩm đang xem chi tiết
        $idSP = DB::table('mau_san_pham')->select('id_SP')
            ->where([['trang_thai','=',1],['id','=',$id]])->first();
        //lấy ra tất cả màu sản phẩm có cùng thương hiệu là id SP đó
        $san_pham_tuong_tu = DB::table('mau_san_pham')
            ->join('san_pham','mau_san_pham.id_SP','=','san_pham.id')
            ->select('mau_san_pham.*','gia_ban_ra','san_pham.id','san_pham.trang_thai')
            ->where([['san_pham.trang_thai','=',1],['san_pham.id','=',$idSP->id_SP],['mau_san_pham.id','!=',$id]])
            ->get()->toArray();
        $sanphamnew = DB::table('san_pham')->select('*')
            ->where('trang_thai','=',1)
            ->orderBy('id','desc')->take(3)->get();
        $rating = DB::table('binh_luan')->where('id_MSP','=',$id)->avg('so_sao');
        $rating = round($rating);
        $comment = DB::table('binh_luan')->select('id_MSP','noi_dung','create_at','emailnguoidung')
            ->where([['id_MSP','=',$id],['hien_thi','=',1]])->get()->toArray();
//        dd($rating);
        return view('khach_hang.shop.product-color-detail2',
                    compact('mausp','loaisp','sanpham','sanphamnew','san_pham_tuong_tu','rating','comment'));
    }
    // View Lien He
    public function contact()
    {
        $email  = '';
        $name   = '';
        $idUser = '';
        if( Auth::check() )
        {
            $email  = Auth::user()->email;
            $name   = Auth::user()->hoten;
            $idUser = Auth::user()->id;
        }
        return view('khach_hang.contact.view-contact', compact('email','name','idUser'));
    }
}
