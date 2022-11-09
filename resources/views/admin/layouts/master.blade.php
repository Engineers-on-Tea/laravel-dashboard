<!DOCTYPE html>
<html lang="{{ \App\Bll\Lang::getAdminLangCode() }}" dir="{{ \App\Bll\Lang::getAdminLangDir() }}">

<head>
    <title>@yield('title') | {{ _i('Dashboard') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="#">
    <meta name="author" content="#">
    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('admin_dashboard/assets/images/favicon.ico') }}" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin_dashboard/bower_components/bootstrap/css/bootstrap.min.css') }}">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/assets/icon/feather/css/feather.css') }}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/assets/css/jquery.mCustomScrollbar.css') }}">

    @stack('css')
    @stack('style')
</head>

<body>
    <!-- Pre-loader start -->
    @include('admin.layouts.preloader')
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            @include('admin.layouts.header')
            @include('admin.layouts.chat')
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    @include('admin.layouts.nav')
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    @yield('contents')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Required Jquery -->
    <script type="text/javascript" src="{{ asset('admin_dashboard/bower_components/jquery/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin_dashboard/bower_components/jquery-ui/js/jquery-ui.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('admin_dashboard/bower_components/popper.js/js/popper.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('admin_dashboard/bower_components/bootstrap/js/bootstrap.min.js') }}">
    </script>
    <!-- sweet alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- axios js -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript"
        src="{{ asset('admin_dashboard/bower_components/jquery-slimscroll/js/jquery.slimscroll.js') }}"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="{{ asset('admin_dashboard/bower_components/modernizr/js/modernizr.js') }}">
    </script>
    <!-- Chart js -->
    <script type="text/javascript" src="{{ asset('admin_dashboard/bower_components/chart.js/js/Chart.js') }}"></script>
    <!-- amchart js -->
    <script src="{{ asset('admin_dashboard/assets/pages/widget/amchart/amcharts.js') }}"></script>
    <script src="{{ asset('admin_dashboard/assets/pages/widget/amchart/serial.js') }}"></script>
    <script src="{{ asset('admin_dashboard/assets/pages/widget/amchart/light.js') }}"></script>
    <script src="{{ asset('admin_dashboard/assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin_dashboard/assets/js/SmoothScroll.js') }}"></script>
    <script src="{{ asset('admin_dashboard/assets/js/pcoded.min.js') }}"></script>
    <!-- custom js -->
    <script src="{{ asset('admin_dashboard/assets/js/vartical-layout.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin_dashboard/assets/pages/dashboard/custom-dashboard.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('admin_dashboard/assets/js/script.min.js') }}"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    @if (\App\Bll\Lang::getAdminLangDir() == 'rtl')
        <script>
            $(document).ready(function() {
                $("#pcoded").pcodedmenu({
                    verticalMenuplacement: 'right',
                });
            });
        </script>
    @endif
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>

    <script>
        function dashboardAxios(url, method, data = null, onSuccess = null, onError = null) {
            axios({
                method: method,
                url: url,
                data: data,
                token: '{{ csrf_token() }}',
            }).then(function(response) {
                // console.log(response);
                if (onSuccess) {
                    onSuccess(response.data);
                } else {
                    swalSuccess(response.data.title, response.data.message);
                }
            }).catch(function(error) {
                console.log(error);
                if (onError) {
                    onError(error);
                } else {
                    swalError(error.response.data.title, error.response.data.message);
                }
            });
        }

        function swalSuccess(title, message, icon = 'success', timer = 2000, onClose = null) {
            Swal.fire({
                title: title ? title : "{{ _i('Successful') }}",
                text: message,
                icon: icon,
                timer: timer,
                showConfirmButton: true,
                confirmButtonText: "{{ _i('Ok') }}",
            }).then((result) => {
                if (result.isConfirmed) {
                    if (onClose) {
                        onClose();
                    }
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

    @stack('scripts')
    @stack('js')
    @stack('javascript')
</body>

</html>
