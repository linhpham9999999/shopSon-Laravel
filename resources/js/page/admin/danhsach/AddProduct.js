const SELECTOR_ADD_MODAL = '#modal-add';

export default class AddProduct
{
    constructor() {
        this.$modal = $(SELECTOR_ADD_MODAL);
    }

    _bindEvent() {
        $('.js-btn-add').on('click', () => {
            this.handleAddButton();
        })

        this.$modal.find('.js-btn-save').on('click', () => {
            this.handleSaveButton()
        })
    }

    handleAddButton() {
        this.$modal.modal('show');
    }

    handleSaveButton() {
        const idNPP = $('input[name="idNPP"]').val();
        const tenNPP = $('input[name="tenNPP"]').val();
        const dcNPP = $('input[name="dcNPP"]').val();
        const sodtNPP = $('input[name="sodtNPP"]').val();
        const emailNPP = $('input[name="emailNPP"]').val();
        const _token = $("meta[name='csrf-token']").attr("content");

        axios.post('admin/nhaphanphoi/them', {
            _token,
            idNPP,
            tenNPP,
            dcNPP,
            sodtNPP,
            emailNPP,
        }).then((response) => {
            toastr.success(response.data.message)
            $('#modal-add').modal('hide');
            location.reload();
        }).catch((error) => {
            console.log(error);
        })
    }

    render() {
        this._bindEvent();
    }
}
