<!DOCTYPE html>
<html lang="en">

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
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin_dashboard/assets/icon/flag-icons/css/flag-icon.css') }}">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin_dashboard/assets/icon/font-awesome/css/font-awesome.min.css') }}">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/assets/icon/icofont/css/icofont.css') }}">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin_dashboard/assets/icon/ion-icon/css/ionicons.min.css') }}">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin_dashboard/assets/icon/material-design/css/material-design-iconic-font.min.css') }}">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin_dashboard/assets/icon/simple-line-icons/css/simple-line-icons.css') }}">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin_dashboard/assets/icon/SVG-animated/svg-weather.css') }}">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin_dashboard/assets/icon/themify-icons/themify-icons.css') }}">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin_dashboard/assets/icon/typicons-icons/css/typicons.min.css') }}">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin_dashboard/assets/icon/weather-icons/css/weather-icons-wind.min.css') }}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/assets/pages/prism/prism.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/assets/css/style.css') }}">

    @if (\App\Bll\Lang::getAdminLangDir() == 'rtl')
        <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/assets/css/rtl.css') }}">
    @endif

    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin_dashboard/assets/css/jquery.mCustomScrollbar.css') }}">

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
    @if (\App\Bll\Lang::getAdminLangDir() == 'rtl')
        <script>
            $(document).ready(function() {
                $("#pcoded").pcodedmenu({
                    verticalMenuplacement: 'right',
                });
            });
        </script>
        <script src="{{ asset('admin_dashboard/assets/js/menu/menu-rtl.js') }}"></script>
    @endif
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>

    @include('admin.includes.base-scripts')

    @stack('scripts')
    @stack('js')
    @stack('javascript')
</body>

</html>
