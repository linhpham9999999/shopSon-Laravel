export default class UpdateStatus
{
    constructor() { // ham xay dung
        this.setupAjax();
        this.bindEvent();
    }

    setupAjax() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    }

    bindEvent() { //function(){} ==== () => {}
        $('.js_button_confirm').on('click', (event) => {
            this.updateStatus(event);
        })
    }

    updateStatus(event) {
        const id = event.target.getAttribute('data-id');
        const status = event.target.getAttribute('data-status');
        const request = $.ajax({
            url: '/api/confirm',
            type: 'POST',
            data: {
                idOrder: id,
                status,
            }
        });

        request.done((response) => {
            $(`.js_status_${id}`).text('Đang chờ lấy hàng');
            $('.js_button_confirm').text('Đã duyệt');
        })
    }

}
