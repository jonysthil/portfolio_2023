
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title>@yield('title', 'Dashboard')</title>
    <link rel="apple-touch-icon" href="{{ asset('assets/admin/app-assets/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/admin/app-assets/images/ico/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/app-assets/vendors/css/extensions/toastr.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/app-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/app-assets/css/components.css') }}">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/app-assets/css/core/menu/menu-types/vertical-menu-modern.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/app-assets/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/app-assets/vendors/css/charts/jquery-jvectormap-2.0.3.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/app-assets/vendors/css/charts/morris.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/app-assets/fonts/simple-line-icons/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/app-assets/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/app-assets/css/plugins/extensions/toastr.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/assets/css/style.css') }}">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-dark navbar-shadow">
        <div class="navbar-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mobile-menu d-lg-none mr-auto">
                        <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#">
                            <i class="ft-menu font-large-1"></i>
                        </a>
                    </li>
                    <li class="nav-item mr-auto">
                        <a class="navbar-brand" href="index.html">
                            <img class="brand-logo" alt="modern admin logo" src="{{ asset('assets/admin/app-assets/images/logo/logo.png') }}">
                            <h3 class="brand-text">Jonysthil</h3>
                        </a></li>
                    {{-- <li class="nav-item d-none d-lg-block nav-toggle">
                        <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                            <i class="toggle-icon ft-toggle-right font-medium-3 white" data-ticon="ft-toggle-right"></i>
                        </a>
                    </li> --}}
                    <li class="nav-item d-lg-none">
                        <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile">
                            <i class="la la-ellipsis-v"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="navbar-container content">
                <div class="collapse navbar-collapse" id="navbar-mobile">
                    <ul class="nav navbar-nav mr-auto float-left">
                        <li class="nav-item d-none d-lg-block">
                            <a class="nav-link nav-link-expand" href="#">
                                <i class="ficon ft-maximize"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-bell"></i><span class="badge badge-pill badge-danger badge-up badge-glow">5</span></a>
                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                <li class="dropdown-menu-header">
                                    <h6 class="dropdown-header m-0"><span class="grey darken-2">Notifications</span></h6><span class="notification-tag badge badge-danger float-right m-0">5 New</span>
                                </li>
                                <li class="scrollable-container media-list w-100"><a href="javascript:void(0)">
                                        <div class="media">
                                            <div class="media-left align-self-center"><i class="ft-plus-square icon-bg-circle bg-cyan mr-0"></i></div>
                                            <div class="media-body">
                                                <h6 class="media-heading">You have new order!</h6>
                                                <p class="notification-text font-small-3 text-muted">Lorem ipsum dolor sit amet, consectetuer elit.</p><small>
                                                    <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">30 minutes ago</time></small>
                                            </div>
                                        </div>
                                    </a><a href="javascript:void(0)">
                                        <div class="media">
                                            <div class="media-left align-self-center"><i class="ft-download-cloud icon-bg-circle bg-red bg-darken-1 mr-0"></i></div>
                                            <div class="media-body">
                                                <h6 class="media-heading red darken-1">99% Server load</h6>
                                                <p class="notification-text font-small-3 text-muted">Aliquam tincidunt mauris eu risus.</p><small>
                                                    <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Five hour ago</time></small>
                                            </div>
                                        </div>
                                    </a><a href="javascript:void(0)">
                                        <div class="media">
                                            <div class="media-left align-self-center"><i class="ft-alert-triangle icon-bg-circle bg-yellow bg-darken-3 mr-0"></i></div>
                                            <div class="media-body">
                                                <h6 class="media-heading yellow darken-3">Warning notifixation</h6>
                                                <p class="notification-text font-small-3 text-muted">Vestibulum auctor dapibus neque.</p><small>
                                                    <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Today</time></small>
                                            </div>
                                        </div>
                                    </a><a href="javascript:void(0)">
                                        <div class="media">
                                            <div class="media-left align-self-center"><i class="ft-check-circle icon-bg-circle bg-cyan mr-0"></i></div>
                                            <div class="media-body">
                                                <h6 class="media-heading">Complete the task</h6><small>
                                                    <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Last week</time></small>
                                            </div>
                                        </div>
                                    </a><a href="javascript:void(0)">
                                        <div class="media">
                                            <div class="media-left align-self-center"><i class="ft-file icon-bg-circle bg-teal mr-0"></i></div>
                                            <div class="media-body">
                                                <h6 class="media-heading">Generate monthly report</h6><small>
                                                    <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Last month</time></small>
                                            </div>
                                        </div>
                                    </a></li>
                                <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center" href="javascript:void(0)">Read all notifications</a></li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-user nav-item">
                            <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <span class="mr-1 user-name text-bold-700">{{ session()->get('ad_name') }}</span>
                                <span class="avatar avatar-online">
                                    <img src="{{ asset('assets/admin/app-assets/images/portrait/small/avatar-s-19.png') }}" alt="avatar"><i></i>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="user-profile.html">
                                    <i class="ft-user"></i> Edit Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}">
                                    <i class="ft-power text-danger"></i> Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->

    <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
               {{--  <li class=" nav-item">
                <a href="index.html">
                    <i class="la la-home"></i>
                    <span class="menu-title" data-i18n="Dashboard">Dashboard</span>
                    <span class="badge badge badge-info badge-pill float-right mr-2">3</span>
                </a>
                    <ul class="menu-content">
                        <li><a class="menu-item" href="dashboard-ecommerce.html"><i></i><span data-i18n="eCommerce">eCommerce</span></a>
                        </li>
                        <li><a class="menu-item" href="dashboard-crypto.html"><i></i><span data-i18n="Crypto">Crypto</span></a>
                        </li>
                        <li class="active"><a class="menu-item" href="dashboard-sales.html"><i></i><span data-i18n="Sales">Sales</span></a>
                        </li>
                    </ul>
                </li>
                <li class=" nav-item"><a href="#"><i class="la la-television"></i><span class="menu-title" data-i18n="Templates">Templates</span></a>
                    <ul class="menu-content">
                        <li><a class="menu-item" href="#"><i></i><span data-i18n="Vertical">Vertical</span></a>
                            <ul class="menu-content">
                                <li><a class="menu-item" href="../vertical-menu-template"><i></i><span data-i18n="Classic Menu">Classic Menu</span></a>
                                </li>
                                <li><a class="menu-item" href="../vertical-modern-menu-template"><i></i><span>Modern Menu</span></a>
                                </li>
                                <li><a class="menu-item" href="../vertical-collapsed-menu-template"><i></i><span data-i18n="Collapsed Menu">Collapsed Menu</span></a>
                                </li>
                                <li><a class="menu-item" href="../vertical-compact-menu-template"><i></i><span data-i18n="Compact Menu">Compact Menu</span></a>
                                </li>
                                <li><a class="menu-item" href="../vertical-content-menu-template"><i></i><span data-i18n="Content Menu">Content Menu</span></a>
                                </li>
                                <li><a class="menu-item" href="../vertical-overlay-menu-template"><i></i><span data-i18n="Overlay Menu">Overlay Menu</span></a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="menu-item" href="#"><i></i><span data-i18n="Horizontal">Horizontal</span></a>
                            <ul class="menu-content">
                                <li><a class="menu-item" href="../horizontal-menu-template"><i></i><span data-i18n="Classic">Classic</span></a>
                                </li>
                                <li><a class="menu-item" href="../horizontal-menu-template-nav"><i></i><span data-i18n="Full Width">Full Width</span></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class=" navigation-header"><span data-i18n="Admin Panels">Admin Panels</span><i class="la la-ellipsis-h" data-toggle="tooltip" data-placement="right" data-original-title="Admin Panels"></i>
                </li> --}}

                <li class=" nav-item {{ request()->is('admin/dashboard*') ? 'active' : '' }}">
                    <a href="{{ route('home') }}">
                        <i class="la la-home"></i>
                        <span class="menu-title">Home</span>
                    </a>
                </li>

                <li class=" nav-item {{ request()->is('admin/about*') ? 'active' : '' }}">
                    <a href="{{ route('about') }}">
                        <i class="la la-question"></i>
                        <span class="menu-title">About</span>
                    </a>
                </li>

                <li class=" nav-item {{ request()->is('admin/service*') ? 'active' : '' }}">
                    <a href="{{ route('services') }}">
                        <i class="la la-server"></i>
                        <span class="menu-title">Services</span>
                    </a>
                </li>

                <li class=" nav-item {{ request()->is('admin/experience*') ? 'active' : '' }}">
                    <a href="{{ route('experiences') }}">
                        <i class="la la-industry"></i>
                        <span class="menu-title">Work Experience</span>
                    </a>
                </li>

                <li class=" nav-item {{ request()->is('admin/education*') ? 'active' : '' }}">
                    <a href="{{ route('educations') }}">
                        <i class="la la-graduation-cap"></i>
                        <span class="menu-title">Education</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- END: Main Menu-->
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                
                @yield('container')

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light navbar-border navbar-shadow">
        <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
            <span class="float-md-left d-block d-md-inline-block">Copyright &copy; {{ date('Y') }} 
                <a class="text-bold-800 grey darken-2" href="https://jonyjg.com" target="_blank">jonysthil</a>
            </span>
            <span class="float-md-right d-none d-lg-block">Hand-crafted & Made with
                <i class="ft-heart pink"></i>
                <span id="scroll-top"></span>
            </span>
        </p>
    </footer>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('assets/admin/app-assets/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->
    
    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('assets/admin/app-assets/vendors/js/charts/chart.min.js') }}"></script>
    <script src="{{ asset('assets/admin/app-assets/vendors/js/charts/raphael-min.js') }}"></script>
    <script src="{{ asset('assets/admin/app-assets/vendors/js/charts/morris.min.js') }}"></script>
    <script src="{{ asset('assets/admin/app-assets/vendors/js/charts/jvector/jquery-jvectormap-2.0.3.min.js') }}"></script>
    <script src="{{ asset('assets/admin/app-assets/vendors/js/charts/jvector/jquery-jvectormap-world-mill.js') }}"></script>
    <script src="{{ asset('assets/admin/app-assets/data/jvector/visitor-data.js') }}"></script>
    <script src="{{ asset('assets/admin/app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/app-assets/vendors/js/extensions/toastr.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('assets/admin/app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('assets/admin/app-assets/js/core/app.js') }}"></script>
    <!-- END: Theme JS-->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <!-- BEGIN: Page JS-->
    <script src="{{ asset('assets/admin/assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/admin/app-assets/js/scripts/modal/components-modal.js') }}"></script>
    <!-- END: Page JS-->
    
    <script>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": true,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        
        @php
        
        if (session('success'))
        echo 'toastr["success"]("'.session("success").'", "");';

        if (session('error'))    
        echo 'toastr["error"]("'.session("error").'", "");';

        if (session('warning'))
        echo 'toastr["warning"]("'.session("warning").'", "");';
        
        @endphp
    </script>

</body>
<!-- END: Body-->

</html>