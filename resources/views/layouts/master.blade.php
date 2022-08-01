<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

@include('layouts._head')

<body class="pace-done vertical-layout vertical-menu-modern navbar-floating footer-static menu-collapsed " data-open="click"
    data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: Header-->
    @include('layouts._header')
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    @include('layouts._menu')
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->

<div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                 <p class="main-p">showing results for "all services/Outpatient/Inpatient"</p>
            </div>
            <div class="content-body">
                 @include('layouts._message')
    @yield('content')
    <!-- END: Content-->
            </div>
        </div>
    </div>
    <!-- END: Content-->



    <!-- BEGIN: Customizer-->
    @include('layouts._customizer')
    <!-- End: Customizer-->


    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix mb-0"><span class="float-md-start d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2022<a
                    class="ms-25" href="#" target="_blank">Health Links</a><span
                    class="d-none d-sm-inline-block">, All rights
                    Reserved</span></span>


                </p>
    </footer>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>

    @include('layouts._scripts')

    @stack('js')
    @stack('css')

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
        $(".flatpickr").flatpickr();
    </script>
</body>
<!-- END: Body-->

</html>
