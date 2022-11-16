<script>
    function dashboardAxios(url, method, data = null, onSuccess = null, onError = null) {
        axios({
            method: method,
            url: url,
            data: data,
            token: '{{ csrf_token() }}',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'X-Requested-With': 'XMLHttpRequest',
                'Content-Type': 'application/x-www-form-urlencoded',
            }
        }).then(function(response) {
            if (onSuccess) {
                onSuccess(response.data);
            } else {
                swalSuccess(response.data.title, response.data.message, 'success', 2000);
            }
        }).catch(function(error) {
            if (onError) {
                onError(error);
            } else {
                swalError(error.response.data.title, error.response.data.message);
            }
        });
    }

    function swalSuccess(title, message, icon = 'success', timer = null, onClose = null) {
        console.log(onClose);
        Swal.fire({
            title: title ? title : "{{ _i('Successful') }}",
            text: message,
            icon: icon,
            timer: timer,
            showConfirmButton: true,
            confirmButtonText: "{{ _i('Ok') }}",
        }).then((result) => {
            if (onClose != null) {
                onClose();
            }
        });
    }

    function swalError(title, message, icon = 'error') {
        Swal.fire({
            title: title ? title : "{{ _i('Error') }}",
            text: message,
            icon: icon,
            showConfirmButton: true,
            confirmButtonText: "{{ _i('Ok') }}",
        });
    }

    function swalOptions(title = "{{ _i('Caution') }}", message, buttons = {}, icon = 'info') {
        console.log(buttons);
        Swal.fire({
            title: title,
            text: message,
            icon: icon,
            showCancelButton: buttons.cancel ? buttons.cancel.showCancelButton : false,
            cancelButtonText: buttons.cancel ? buttons.cancel.cancelButtonText : "{{ _i('Cancel') }}",
            cancelButtonColor: buttons.cancel ? buttons.cancel.cancelButtonColor : '#d33',
            showConfirmButton: buttons.confirm ? buttons.confirm.showConfirmButton : false,
            confirmButtonText: buttons.confirm ? buttons.confirm.confirmButtonText : "{{ _i('Yes') }}",
            confirmButtonColor: buttons.confirm ? buttons.confirm.confirmButtonColor : '#3085d6',
        }).then((result) => {
            if (result.isConfirmed) {
                buttons.confirm.callback(buttons.confirm.params);
            }
            if (result.isDismissed) {
                buttons.cancel.callback();
            }
        });
    }

    function reloadPage() {
        window.location.reload();
    }
</script>


@push('js')
    <script>
        $(document).ready(function() {
            $(".js-switch").each(function() {
                new Switchery(this, {
                    color: '#26B99A',
                    secondaryColor: '#E74C3C',
                });
            });

            $('.select2').select2();

            $(document).on('click', '[data-button=logout]', function (e) {
                e.preventDefault();
                dashboardAxios($(this).attr('href'), 'post', null, function (response) {
                    let url = response.url;
                    let buttons = {
                        'confirm': {
                            'showConfirmButton': true,
                            'confirmButtonText': "{{ _i('Ok') }}",
                            'confirmButtonColor': '#3085d6',
                            'callback': logOut(url),
                        }
                    }
                    let message = response.message;
                    let title = response.title;
                    let icon = 'success';

                    if (response.fail === true) {
                        icon = 'error';
                    }

                    swalOptions(title, message, buttons, icon);
                });
            });
        });

        function logOut (url) {
            return window.location.href = url;
        }
    </script>
@endpush
