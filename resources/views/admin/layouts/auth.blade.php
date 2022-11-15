<!DOCTYPE html>
<html lang="en">
@php
    use App\Bll\Utility;
    $settings = Utility::getDefaultSettings();
@endphp
<head>
    <title>{{ _i('Login') }} | {{ $settings['title'] }}</title>
    @include('admin.layouts.meta')
    @include('admin.layouts.styles')
    @stack('css')
    @stack('style')
</head>

<body class="fix-menu">
@include('admin.layouts.preloader')

<section class="login-block">
    <!-- Container-fluid starts -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                @yield('content')
            </div>
            <!-- end of col-sm-12 -->
        </div>
        <!-- end of row -->
    </div>
    <!-- end of container-fluid -->
</section>
<!-- Required Jquery -->
@include('admin.layouts.scripts')
@stack('scripts')
@stack('js')
@stack('javascript')
</body>

</html>
