const SELECTOR_ADD_MODAL = '#modal-add-sp';

export default class AddSanPham
{
    constructor() {
        this.$modal = $(SELECTOR_ADD_MODAL);
    }

    _bindEvent() {
        $('.js-btn-add-product').on('click', () => {
            this.handleAddButton();
        })

        this.$modal.find('.js-btn-save-sp').on('click', () => {
            this.handleSaveButton()
        })
    }

    handleAddButton() {
        this.$modal.modal('show');
    }

    handleSaveButton() {
        const idLSP = $('input[name="idLSP"]').val();
        const idNPP = $('input[name="idNPP"]').val();
        const idSP = $('input[name="idSP"]').val();
        const tenSP = $('input[name="tenSP"]').val();
        const xuatxu = $('input[name="xuatxu"]').val();
        const trluong = $('input[name="trluong"]').val();
        const giagoc = $('input[name="giagoc"]').val();
        const giamgia = $('input[name="giamgia"]').val();
        const hsd = $('input[name="hsd"]').val();
        const gthieu = $('input[name="gthieu"]').val();
        const sosao = $('input[name="sosao"]').val();
        const noibat = $('input[name="noibat"]').val();
        const hinh_anh = $('input[name="hinh_anh"]').val();
        const _token = $("meta[name='csrf-token']").attr("content");

        axios.post('admin/sanpham/them', {
            _token,
            idNPP,
            idLSP,
            idSP,
            tenSP,
            xuatxu,
            trluong,
            giagoc,
            giamgia,
            hsd,
            gthieu,
            sosao,
            noibat,
            hinh_anh,
        }).then((response) => {
            toastr.success(response.data.message)
            $('#modal-add-sp').modal('hide');
            location.reload();
        }).catch((error) => {
            console.log(error);
        })
    }

    render() {
        this._bindEvent();
    }
}
