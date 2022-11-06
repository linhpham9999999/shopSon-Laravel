@extends('admin.layout.index')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="padding: 15px 15px">
                    @if(session('alert'))
                        <div class="alert alert-success">
                            {{session('alert')}}
                        </div>
                    @endif
                    <div class="header">
                        <h4 class="title">Viết tin tức</h4>
                    </div>
                    <div class="content">
                        <form action="{{route('postThemTinTuc')}}" method="POST" role="form" enctype="multipart/form-data" class="contact-form">
                            {{csrf_field()}}
                            <div class="row" style="margin: 10px;">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label style="margin-bottom: unset;">Tiêu đề</label>
                                        <input type="text" name="tieude" class="form-control">
                                        <div class="error">{{$errors->first('tieude')}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin: 10px;">
                                <div class="col-md-7">
                                    <label style="margin-bottom: unset;">Hình ảnh</label>
                                    <div class="form-group">
                                        <div class="custom-file">
                                            <input type="file" multiple class="custom-file-input" name="hinh_anh" id="customFile">
                                            <div class="error"> {{$errors->first('hinh_anh')}}</div>
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin: 10px;">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label style="margin-bottom: unset;">Mô tả ngắn</label>
                                        <textarea type="text" name="motangan" class="form-control"></textarea>
                                        <div class="error">{{$errors->first('motangan')}}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="row" style="margin: 10px;">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label style="margin-bottom: unset;">Nội dung</label>
                                        <textarea type="text" name="noidung" class="form-control"></textarea>
                                        <div class="error">{{$errors->first('noidung')}}</div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" style="margin-left: 340px;" class="btn btn-info btn-fill pull-right">Lưu thay đổi</button>
                            <button type="reset" class="btn btn-dim btn-warning pull-right">Làm mới</button>
                            <a href="" class="btn btn-dark pull-right">Xem bài viết</a>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
