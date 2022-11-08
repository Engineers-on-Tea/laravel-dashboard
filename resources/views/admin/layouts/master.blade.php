<!DOCTYPE html>
<html lang="{{ \App\Bll\Lang::getAdminLangCode() }}" dir="{{ \App\Bll\Lang::getAdminLangDir() }}">

<head>
    <title>@yield('title')</title>
    <!-- HTML5 Shim and Respond.js IE9 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/bootstrap/css/bootstrap.min.css') }}">
    <!-- themify icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/icon/themify-icons/themify-icons.css') }}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/icon/icofont/css/icofont.css') }}">
    <!-- flag icon framework css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/pages/flag-icon/flag-icon.min.css') }}">
    <!-- Menu-Search css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/pages/menu-search/css/component.css') }}">
    <!-- Horizontal-Timeline css -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/pages/dashboard/horizontal-timeline/css/style.css') }}">
    <!-- amchart css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/pages/dashboard/amchart/css/amchart.css') }}">
    <!-- flag icon framework css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/pages/flag-icon/flag-icon.min.css') }}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <!--color css-->


    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/linearicons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/simple-line-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/ionicons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/jquery.mCustomScrollbar.css') }}">

    @stack('css')
    @stack('style')

</head>

<body class="dark-layout">
    <div class="theme-loader">
        <div class="ball-scale">
            <div></div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <!-- Menu header start -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            @include('admin.layouts.header')
            @include('admin.layouts.chat')
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    @include('admin.layouts.nav')
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    @include('admin.layouts.footer')
    @stack('scripts')
    @stack('js')
    @stack('javascript')
    @stack('script')
</body>

</html>
