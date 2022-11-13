<!-- Required Jquery -->
<script type="text/javascript" src="{{ asset('admin_dashboard/bower_components/jquery/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin_dashboard/bower_components/jquery-ui/js/jquery-ui.min.js') }}">
</script>
<script type="text/javascript" src="{{ asset('admin_dashboard/bower_components/popper.js/js/popper.min.js') }}">
</script>
<script type="text/javascript" src="{{ asset('admin_dashboard/bower_components/bootstrap/js/bootstrap.min.js') }}">
</script>
<script src="{{ asset('admin_dashboard/bower_components/switchery/js/switchery.min.js') }}"></script>
<!-- sweet alert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- axios js -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript"
    src="{{ asset('admin_dashboard/bower_components/jquery-slimscroll/js/jquery.slimscroll.js') }}"></script>
<!-- modernizr js -->
<script type="text/javascript" src="{{ asset('admin_dashboard/bower_components/modernizr/js/modernizr.js') }}"></script>
<!-- Chart js -->
<script type="text/javascript" src="{{ asset('admin_dashboard/bower_components/chart.js/js/Chart.js') }}"></script>
<!-- amchart js -->
<script src="{{ asset('admin_dashboard/assets/pages/widget/amchart/amcharts.js') }}"></script>
<script src="{{ asset('admin_dashboard/assets/pages/widget/amchart/serial.js') }}"></script>
<script src="{{ asset('admin_dashboard/assets/pages/widget/amchart/light.js') }}"></script>
<script src="{{ asset('admin_dashboard/assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin_dashboard/assets/js/SmoothScroll.js') }}"></script>
<script src="{{ asset('admin_dashboard/assets/js/pcoded.min.js') }}"></script>

<!-- Select 2 js -->
<script type="text/javascript" src="{{ asset('admin_dashboard/bower_components/select2/js/select2.full.min.js') }}"></script>

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
