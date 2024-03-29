@extends('admin.layout.index')
@section('content')
    <div class="nk-content-body" style="height: 60px;">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title" style="width: 593px;float: left;">Thống kê số lượt mua hàng</h3>
                    <div class="nk-block-des text-soft" style="float: right;padding-top: 5px;">
                        <form action="{{route('sale-month')}}" method="POST" role="form">
                            {{csrf_field()}}
                            <div class="row">
                                {{--            <h4 style="margin-left: 20px;">Thời gian</h4>--}}
                                <div class="col-4 input-daterange">
                                    <div class="form-group">
                                        <input type="date" value="01/01/2022" name="startdate" class="form-control">
                                        <div class="error"> {{$errors->first('startdate')}}</div>
                                    </div>
                                </div>
                                <div class="col-4 input-daterange">
                                    <div class="form-group">
                                        <input type="date" value="12/31/2022" name="enddate" class="form-control">
                                        <div class="error"> {{$errors->first('enddate')}}</div>
                                    </div>
                                </div>
                                <input type="submit" value="Lọc" class="btn btn-info btn-fill pull-right" style="height: 33px; margin-left: 10px;">
                                <a href="{{route('get-sales')}}" style="height: 33px; margin-left: 10px;" class="btn btn-dark pull-right">Refesh</a>
                            </div>
                        </form>
                    </div>
                </div><!-- .nk-block-head-content -->
            </div><!-- .nk-block-between -->
        </div><!-- .nk-block-head -->
    </div>
    <div class="row">
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-area me-1"></i>
                    Biểu đồ ĐƯỜNG
                </div>
                <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-bar me-1"></i>
                    Biểu đồ CỘT
                </div>
                <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6">
            <div class="card bg-warning text-white mb-4" style="text-align: center;">
                <div class="card-body">Thống kê LỢI NHUẬN</div>
                <div class="card-footer d-flex align-items-center justify-content-between" style="background-color: lavender">
                    <table class="nk-tb-list nk-tb-ulist">
                        <thead>
                        <tr class="nk-tb-item nk-tb-head">
                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Tháng</span></th>
                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Tiền vốn</span></th>
                            <th class="nk-tb-col tb-col-sm" ><span class="sub-text">Doanh thu</span></th>
                            <th class="nk-tb-col tb-col-sm" ><span class="sub-text">Lợi nhuận</span></th>
                        </tr><!-- .nk-tb-item -->
                        </thead>
                        <tbody>
                        @foreach($loinhuan as $ln)
                            <tr class="nk-tb-item" > {{--id="npp_{{$lsp->id}}"--}}
                                <td class="nk-tb-col tb-col-md">
                                    <span>{{$ln['month']}}</span>
                                </td>
                                <td class="nk-tb-col tb-col-lg">
                                    <span>{{number_format($ln['von'],0,',','.')}}</span>
                                </td>
                                <td class="nk-tb-col tb-col-sm">
                                    <span>{{number_format($ln['doanhthu'],0,',','.')}}</span>
                                </td>
                                <td class="nk-tb-col tb-col-sm">
                                    <span>{{number_format($ln['tienloi'],0,',','.')}}</span>
                                </td>
                            </tr><!-- .nk-tb-item -->
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card bg-success text-white mb-4" style="text-align: center;">
                <div class="card-body">Thống kê MÀU SẢN PHẨM bán chạy</div>
                <div class="card-footer d-flex align-items-center justify-content-between" style="background-color: lavender">
                    <table class="nk-tb-list nk-tb-ulist">
                        <thead>
                        <tr class="nk-tb-item nk-tb-head">
                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Thương hiệu</span></th>
                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Màu son</span></th>
                            <th class="nk-tb-col tb-col-sm" ><span class="sub-text">Số lượng thỏi</span></th>
                        </tr><!-- .nk-tb-item -->
                        </thead>
                        <tbody>
                        @foreach($san_pham as $sp)
                            <tr class="nk-tb-item" > {{--id="npp_{{$lsp->id}}"--}}
                                <td class="nk-tb-col tb-col-md">
                                    <span>{{$sp->ten_SP}}</span>
                                </td>
                                <td class="nk-tb-col tb-col-md">
                                    <span>{{$sp->mau}}</span>
                                </td>
                                <td class="nk-tb-col tb-col-md">
                                    <span>{{$sp->soluongcay}}</span>
                                </td>
                            </tr><!-- .nk-tb-item -->
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6">
            <div class="card bg-gray text-white mb-4" style="text-align: center;">
                <div class="card-body" style="background-color: pink;">Thống kê số lượng son của mỗi thương hiệu</div>
                <div class="card-footer d-flex align-items-center justify-content-between" style="background-color: lavender">
                    <table class="nk-tb-list nk-tb-ulist" style="width: 890px;">
                        <thead>
                        <tr class="nk-tb-item nk-tb-head">
                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Tên thương hiệu</span></th>
                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Số lượng tồn kho</span></th>
                        </tr><!-- .nk-tb-item -->
                        </thead>
                        <tbody>
                                @foreach($soluongton_sp as $slton)
                                    <tr class="nk-tb-item" >
                                        <td class="nk-tb-col tb-col-md">
                                            <span>{{$slton->ten_SP}}</span>
                                        </td>
                                        <td class="nk-tb-col tb-col-lg">
                                            <span>{{$slton->soluongtonkho}}</span>
                                        </td>
                                    </tr>
                                @endforeach
                        </tbody>
                    </table>
                    <table class="nk-tb-list nk-tb-ulist" style=" margin-top: 2px;">
                        <thead>
                        <tr class="nk-tb-item nk-tb-head">
                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Số lượng đã bán</span></th>
                        </tr><!-- .nk-tb-item -->
                        </thead>
                        <tbody>
                            @foreach($soluongdaban_sp as $slban)
                                <tr class="nk-tb-item" >
                                    <td class="nk-tb-col tb-col-lg">
                                        <span>{{$slban->soluongdaban}}</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script type="text/javascript">
        var _ydata=JSON.parse('{!! json_encode($months) !!}');
        var _xdata=JSON.parse('{!! json_encode($monthCount) !!}');
    </script>
@endsection

