@extends('admin.layout.index')
@section('content')
<div style="background-color: #008080">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Sửa thông tin sản phẩm</h5>
                <a href="{{route('dsSP')}}" class="btn btn-wider btn-primary"><span>Back</span><em class="icon ni ni-arrow-right"></em></a>
            </div>
            @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
            @endif
            <div class="modal-body">
                <form action="{{route('postSuaSP',['id'=>$sanpham->id])}}" method="POST" role="form" enctype="multipart/form-data" class="form-validate is-alter">
                    {{csrf_field()}}
                    <input type="hidden" name="id" id="id" />
                    <div class="form-group">
                        <label class="form-label" for="full-name">Loại sản phẩm</label>
                        <div class="form-control-wrap">
                            <select class="form-control" name="idLSP" id="idLSP-edit">
                                @foreach($loaisp as $lsp)
                                <option value="{{$lsp->id}}" id="idLSP-edit" >{{$lsp->ten_LSP}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email-address">Nhà phân phối</label>
                        <div class="form-control-wrap">
                            <select class="form-control" name="idNPP" id="idNPP-edit">
                                                                @foreach($nhapp as $npp)
                                <option value="{{$npp->id}}" id="idNPP-edit" >{{$npp->ten_NPP}}</option>
                                                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email-address">Mã sản phẩm</label>
                        <div class="form-control-wrap">
                            <input class="form-control" value="{{$sanpham->Ma_SP}}" name="idSP" id="idSP-edit" placeholder="Mã sản phẩm phải có độ dài từ 3 đến 8 ký tự" required/>
                            <div class="error"> {{$errors->first('idSP')}}</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="phone-no">Tên sản phẩm</label>
                        <div class="form-control-wrap">
                            <input class="form-control" value="{{$sanpham->ten_SP}}" name="tenSP" id="tenSP-edit" placeholder="Tên sản phẩm phải có độ dài từ 5 đến 100 ký tự" required/>
                            <div class="error"> {{$errors->first('tenSP')}}</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email-address">Xuất xứ</label>
                        <div class="form-control-wrap">
                            <input class="form-control" value="{{$sanpham->xuatxu}}" name="xuatxu" id="xuatxu-edit" placeholder="Xuất xứ sản phẩm có độ dài từ 3 đến 50 ký tự" required />
                            <div class="error"> {{$errors->first('xuatxu')}}</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email-address">Trọng lượng</label>
                        <div class="form-control-wrap">
                            <input class="form-control" value="{{$sanpham->trongluong}}" name="trluong" id="trluong-edit" placeholder="Nhập trọng lượng sản phẩm (g)" required />
                            <div class="error"> {{$errors->first('trluong')}}</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email-address">Gía gốc</label>
                        <div class="form-control-wrap">
                            <input class="form-control" value="{{$sanpham->giagoc}}" name="giagoc" id="giagoc-edit" placeholder="Nhập giá sản phẩm (VNĐ)" required />
                            <div class="error"> {{$errors->first('giagoc')}}</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email-address">Giảm giá</label>
                        <div class="form-control-wrap">
                            <input class="form-control" value="{{$sanpham->giamgia}}" name="giamgia" id="giamgia-edit" placeholder="Nhập giá giảm sản phẩm (VNĐ)" required />
                            <div class="error"> {{$errors->first('giamgia')}}</div>
                        </div>
                    </div>
{{--                    <div class="form-group">--}}
{{--                        <label class="form-label" for="email-address">Số lượng tồn</label>--}}
{{--                        <div class="form-control-wrap">--}}
{{--                            <input class="form-control" name="slton" id="slton-edit" placeholder="Nhập số lượng tồn của sản phẩm" required />--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="form-group">
                        <label class="form-label" for="email-address">Hạn sử dụng</label>
                        <div class="form-control-wrap">
                            <input class="form-control" value="{{$sanpham->hansudung_thang}}" name="hsd" id="hsh-edit" placeholder="Nhập hạn sử dụng sản phẩm (tháng)" required />
                            <div class="error"> {{$errors->first('hsd')}}</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email-address">Giới thiệu</label>
                        <div class="form-control-wrap">
                            <input class="form-control" value="{{$sanpham->gioithieu}}" name="gthieu" id="gthieu-edit" placeholder="Thông tin sản phẩm phải có độ dài từ 5 đến 500 ký tự" required />
                            <div class="error"> {{$errors->first('gthieu')}}</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email-address">Số sao</label>
                        <div class="form-control-wrap">
                            <select class="form-control" name="sosao" id="sosao-edit">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email-address">Nổi bật</label>
                        <div class="form-control-wrap">
                            <select class="form-control" name="noibat" id="noibat-edit">
                                <option value="0">Không</option>
                                <option value="1">Có</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email-address">Hình ảnh</label>
                        <div class="form-control-wrap">
                            <input type="file" name="hinh_anh" value="{{$sanpham->hinhanhgoc}}" id="hinh_anh-edit"/>
                            <div class="error"> {{$errors->first('hinh_anh')}}</div>
                        </div>
                    </div>
                    <div class="form-group" style="padding-left: 100px;">
                        <button type="submit" class="btn btn-lg btn-primary js-btn-update-sp">Lưu thông tin</button>
                        <button type="reset" class="btn btn-lg btn-light">Làm mới</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
{{--@extends('admin.layout.index')
@section('menu')
    @include('admin.layout.menu_d')
@endsection
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sản phẩm
                        <small>sửa</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">

                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    <form action="admin/sanpham/sua/{{$sanpham->id}}" method="POST"  enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Loại sản phẩm</label>
                            <select class="form-control" name="idLSP">
                                @foreach($loaisp as $lsp)
                                    <option value="{{$lsp->id}}">{{$lsp->ten_LSP}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nhà phân phối</label>
                            <select class="form-control" name="idNPP">
                                @foreach($nhapp as $npp)
                                    <option value="{{$npp->id}}">{{$npp->ten_NPP}}</option>
                                @endforeach
                            </select>
                        </div>
                        <label>Mã sản phẩm</label>
                        <input class="form-control" name="id" value="{{$sanpham->Ma_SP}}" placeholder="Mã sản phẩm phải có độ dài từ 3 đến 8 ký tự" />
                        <div class="error"> {{$errors->first('id')}}</div>

                        <label>Tên sản phẩm</label>
                        <input class="form-control" name="ten" value="{{$sanpham->ten_SP}}" />
                        <div class="error"> {{$errors->first('ten')}}</div>

                        <label>Xuất xứ</label>
                        <input class="form-control" name="xuatxu" value="{{$sanpham->xuatxu}}" placeholder="Xuất xứ sản phẩm có độ dài từ 3 đến 50 ký tự" />
                        <div class="error"> {{$errors->first('xuatxu')}}</div>

                        <label>Trọng lượng</label>
                        <input class="form-control" name="trluong" value="{{$sanpham->trongluong}}" placeholder="Nhập trọng lượng sản phẩm (g)" />
                        <div class="error"> {{$errors->first('trluong')}}</div>

                        <label>Giá gốc</label>
                        <input class="form-control" name="giagoc" value="{{$sanpham->giagoc}}" placeholder="Nhập giá sản phẩm (VNĐ)" />
                        <div class="error"> {{$errors->first('giagoc')}}</div>

                        <label>Giảm giá</label>
                        <input class="form-control" name="giamgia" value="{{$sanpham->giamgia}}" placeholder="Nhập giảm giá sản phẩm (VNĐ)" />
                        <div class="error"> {{$errors->first('giamgia')}}</div>

                        <label>Số lượng tồn</label>
                        <input class="form-control" name="slton" value="{{$sanpham->soluongton}}" placeholder="Nhập số lượng tồn của sản phẩm" />
                        <div class="error"> {{$errors->first('slton')}}</div>

                        <label>Hạn sử dụng </label>
                        <input class="form-control" name="hsd" value="{{$sanpham->hansudung_thang}}" placeholder="Nhập hạn sử dụng sản phẩm (tháng)" />
                        <div class="error"> {{$errors->first('hsd')}}</div>

                        <label>Giới thiệu</label>
                        <input class="form-control" name="gthieu" value="{{$sanpham->gioithieu}}" placeholder="Thông tin sản phẩm phải có độ dài từ 5 đến 500 ký tự" />
                        <div class="error"> {{$errors->first('gthieu')}}</div>

                        <label>Số sao</label>
                        <select class="form-control" name="sosao">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>

                        <label>Nổi bật</label>
                        <select class="form-control" name="noibat">
                            <option value="0">Không</option>
                            <option value="1">Có</option>
                        </select>

                        <label>Hình ảnh sản phẩm</label>
                        <input type="file" name="hinh_anh" />
                        <div class="error"> {{$errors->first('hinh_anh')}}</div>

                        <button type="submit" class="btn btn-default">Sửa</button>
                        <button type="reset" class="btn btn-default">Làm mới</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection--}}
