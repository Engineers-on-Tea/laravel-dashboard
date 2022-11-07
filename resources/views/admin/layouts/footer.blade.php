<script type="text/javascript" src="{{ asset('bower_components/jquery/js/jquery.min.js') }}"></script>
<script src="{{ asset('bower_components/jquery-ui/js/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('bower_components/popper.js/js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('bower_components/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="{{ asset('bower_components/jquery-slimscroll/js/jquery.slimscroll.js') }}"></script>
<!-- modernizr js -->
<script type="text/javascript" src="{{ asset('bower_components/modernizr/js/modernizr.js') }}"></script>
<script type="text/javascript" src="{{ asset('bower_components/modernizr/js/css-scrollbars.js') }}"></script>
<!-- classie js -->
<script type="text/javascript" src="{{ asset('bower_components/classie/js/classie.js') }}"></script>
<!-- Rickshow Chart js -->
<script src="{{ asset('bower_components/d3/js/d3.js') }}"></script>
<script src="{{ asset('bower_components/rickshaw/js/rickshaw.js') }}"></script>
<!-- Morris Chart js -->
<script src="{{ asset('bower_components/raphael/js/raphael.min.js') }}"></script>
<script src="{{ asset('bower_components/morris.js/js/morris.js') }}"></script>
<!-- Horizontal-Timeline js -->
<script type="text/javascript" src="{{ asset('assets/pages/dashboard/horizontal-timeline/js/main.js') }}"></script>
<!-- amchart js -->
<script type="text/javascript" src="{{ asset('assets/pages/dashboard/amchart/js/amcharts.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/pages/dashboard/amchart/js/serial.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/pages/dashboard/amchart/js/light.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/pages/dashboard/amchart/js/custom-amchart.js') }}"></script>
<!-- i18next.min.js -->
<script type="text/javascript" src="{{ asset('bower_components/i18next/js/i18next.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js') }}">
</script>
<script type="text/javascript"
    src="{{ asset('bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js') }}">
</script>
<script type="text/javascript" src="{{ asset('bower_components/jquery-i18next/js/jquery-i18next.min.js') }}"></script>
<!-- Custom js -->
<script type="text/javascript" src="{{ asset('assets/pages/dashboard/custom-dashboard.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/script.js') }}"></script>

@if (\App\Bll\Lang::getAdminLangDir() == 'rtl')
    <script src="{{ asset('assets/js/menu/menu-rtl.js') }}"></script>
@endif

<!-- pcmenu js -->
<script src="{{ asset('assets/js/pcoded.min.js') }}"></script>
<script src="{{ asset('assets/js/demo-12.js') }}"></script>
<script src="{{ asset('assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.mousewheel.min.js') }}"></script>
