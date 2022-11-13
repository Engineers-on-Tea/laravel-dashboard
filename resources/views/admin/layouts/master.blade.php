<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title') | {{ _i('Dashboard') }}</title>
    @include('admin.layouts.meta')
    @include('admin.layouts.styles')
    @stack('css')
    @stack('style')
</head>

<body>
    @include('admin.layouts.preloader')
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
    @include('admin.layouts.scripts')
    @stack('scripts')
    @stack('js')
    @stack('javascript')
</body>

</html>
