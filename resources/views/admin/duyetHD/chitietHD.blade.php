@extends('admin.layout.index')

@section('cssKH')
    <style>
        .formdetails{
            border: 1.5px solid #D8D8D8;
            padding-left: 8px;
            margin-top: 5px;
            height: 40px;
            padding-top: 7px;
            width: 400px;
        }
        .t1{
            text-align: center;
            font-weight: bold;
            padding-bottom: 8px;
            border-bottom: 1px solid black;
        }
        .chi-tiet-sp{
            width: 700px;
            border: 2px solid #2ECCFA;
            margin-left: 450px;
            margin-top: 110px;
            background-color:  #CEF6F5;
            text-align: center;
        }
    </style>
@endsection

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Chi tiết hóa đơn
                        <small>thông tin</small>
                    </h1>
                </div>
                <div class="checkout-area mt-no-text">
                    <div class="container custom-container">
                        <div class="row">
                            <div class="col-lg-6 col-12 col-custom" style="height:480px ;float: left; background-color: #E6E6E6; width: 430px">
                                <div class="checkbox-form">
                                    <h3 class="t1">Thông tin khách hàng</h3>
                                    @foreach($user as $ct)
                                        <div class="row">
                                            <div class="col-md-12 col-custom">
                                                <div class="checkout-form-list">
                                                    <label>Tên khách hàng</label>
                                                    <p class="formdetails">{{$ct->hoten}}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-custom">
                                                <div class="checkout-form-list">
                                                    <label>Địa chỉ </label>
                                                    <p class="formdetails">{{$ct->dia_chi_giao_hang}}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-custom">
                                                <div class="checkout-form-list">
                                                    <label>Số điện thoại <span class="required">*</span></label>
                                                    <p class="formdetails">{{$ct->sodth}}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-custom">
                                                <div class="checkout-form-list">
                                                    <label>Email <span class="required">*</span></label>
                                                    <p class="formdetails">{{$ct->email}}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-custom">
                                                <div class="checkout-form-list">
                                                    <label>Trạng thái đơn hàng <span class="required">*</span></label>
                                                    <p class="formdetails">{{$ct->trangthai}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="chi-tiet-sp">
                                <h3 class="t1">Thông tin sản phẩm</h3>
                                <table style=" width: 700px; height: auto;" >
                                    <thead>
                                        <tr>
                                            <th style=" text-align: center; width: 150px">Mã màu sản phẩm</th>
                                            <th style=" text-align: center; width: 200px">Hình ảnh</th>
                                            <th style=" text-align: center">Số lượng</th>
                                            <th style=" text-align: center">Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($products as $pd)
                                            <tr style="height: 190px">
                                                <td style="text-align: center">{{$pd->Ma_MSP}}</td>
                                                <td style="text-align: center"><img src="admin_asset/image_son/mau_san_pham/{{$pd->hinhanh}}" height="150px" width="150px"/></td>
                                                <td style="text-align: center">{{$pd->soluong}}</td>
                                                <td style="text-align: center">{{$pd->thanh_tien}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
