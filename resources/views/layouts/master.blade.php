<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 2 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'BRM') }} | {{ __('Portal') }}</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- fontawesom css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/all.min.css') }}">
    <!-- mCustomScrollbar css -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/plugins/mCustomScrollbar/jquery.mCustomScrollbar.css') }}">
    <!-- data table -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/jquery.dataTables.min.css') }}">
    <!-- custom style css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
    <!-- Demo styles -->
    @stack('style')
</head>

<body>
    @include('sweetalert::alert')
    <!-- === header ===-->
    @include('layouts.partials.back-header')
    <!-- end of header -->
    <!--=== content-outer-wrapper ===-->
    <div class="content-outer-wrapper">
        <div class="chance"></div>
        <!--=== content-wrapper ===-->
        <section class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 si-box-padding">
                        <!--=== common heading ===-->
                        <section class="common-head-wrapper-sm clearfix">
                            <div class="wrapper-head">
                                <h4><i class="fa-light fa-@yield('icon')"></i><span>{{ $title }}</span></h4>
                            </div>
                            <!-- end of wrapper-head -->
                        </section>
                        <!-- end of common-head-wrapper -->
                        <!--==== white-smooth-wrapper ===-->
                        @yield('content')
                        <!-- end of white-smooth-wrapper -->
                    </div>
                    <!-- end of col-md-12 -->
                </div>
                <!-- end of row -->
            </div>
            <!-- end of of container -->
        </section>
        <!-- end of content-wrapper -->
    </div>
    <!-- end of content-outer-wrapper -->
    <!--=== footer ===-->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <p>{{ __('Copyright') }} &copy; {{ date('Y') }} <a href="javascript:;">{{ __('BRM') }}</a>.</p>
                </div>
                <div class="col-sm-6">
                    <ul class="footer-list">
                        <li style="color:rgb(179, 175, 175);font-size:10px;"><small><a href="mailto:mikebarasa@outlook.com">Contact Developer</a></small></li>
                    </ul>
                    <!-- end of footer-list -->
                </div>
                <!-- end of col-md-4 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container -->
    </footer>
    <!-- end of footer -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS, then Plugins, then Custom js -->
    <!-- Jquery -->
    <script src="{{ asset('assets/js/jquery-1.12.4.min.js') }}"></script>
    <!-- bootstrap -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <!-- mCustomScrollbar css -->
    <script type="text/javascript" src="{{ asset('assets/plugins/mCustomScrollbar/jquery.mCustomScrollbar.js') }}"></script>
    <!-- datatable -->
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <!-- Custom js -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    @stack('script')
</body>

</html>
