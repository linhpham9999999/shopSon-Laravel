<div class="modal fade" id="modal-add">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Thêm thông tin loại sản phẩm</h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
            </div>
            <div class="modal-body">
                <form action="" data-url="{{ route('actionThem2') }}" id="form-add-lsp" method="POST" role="form" class="form-validate is-alter">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="form-label" for="full-name">Mã loại sản phẩm</label>
                        <div class="form-control-wrap">
                            <input class="form-control" id="idLSP-add" name="idLSP" placeholder="Mã loại sản phẩm phải có độ dài từ 3 đến 8 ký tự" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email-address">Tên loại sản phẩm</label>
                        <div class="form-control-wrap">
                            <input class="form-control" name="tenLSP" id="tenLSP-add" placeholder="Tên loại sản phẩm phải có độ dài từ 5 đến 50 ký tự" required/>
                        </div>
                    </div>
                    <input type="hidden" name="status" id="trangthai-add" value = "1">
                    <div class="form-group" style="padding-left: 100px;">
                        <button type="submit" class="btn btn-lg btn-primary">Lưu thông tin</button>
                        <button type="reset" class="btn btn-lg btn-light">Làm mới</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
