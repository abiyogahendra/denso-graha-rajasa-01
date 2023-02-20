<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard 2</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Fontfaces CSS-->
    <link href="{{ asset('template/css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('template/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet"
        media="all">
    <link href="{{ asset('template/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet"
        media="all">
    <link href="{{ asset('template/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet"
        media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('template/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

    {{-- Boostrap-table --}}
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.21.2/dist/bootstrap-table.min.css">

    <!-- Vendor CSS-->
    <link href="{{ asset('template/vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('template/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}"
        rel="stylesheet" media="all">
    <link href="{{ asset('template/vendor/wow/animate.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('template/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('template/vendor/slick/slick.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('template/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('template/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet"
        media="all">
    <link href="{{ asset('template/vendor/vector-map/jqvmap.min.css') }}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ asset('template/css/theme.css') }}" rel="stylesheet" media="all">


    {{-- Custom css --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
        integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    @yield('custom-css')

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        @include('master.part-master.menu-sidebar')
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container2">
            <!-- HEADER DESKTOP-->
            @include('master.part-master.header')
            <!-- END HEADER DESKTOP-->

            <!-- BREADCRUMB-->
            @include('master.part-master.path-page')
            <!-- END BREADCRUMB-->

            <!-- STATISTIC-->
            <div class="content">
                <div class="container-fluid data_masuk">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    @yield('content')
                </div>
            </div>
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="{{ asset('template/vendor/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap JS-->
    <script src="{{ asset('template/vendor/bootstrap-4.1/popper.min.js') }}"></script>
    <script src="{{ asset('template/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
    {{-- Boostrap-Table-JS --}}
    <script src="https://unpkg.com/bootstrap-table@1.21.2/dist/bootstrap-table.min.js"></script>
    <!-- Vendor JS       -->
    <script src="{{ asset('template/vendor/slick/slick.min.js') }}"></script>
    <script src="{{ asset('template/vendor/wow/wow.min.js') }}"></script>
    <script src="{{ asset('template/vendor/animsition/animsition.min.js') }}"></script>
    <script src="{{ asset('template/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <script src="{{ asset('template/vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('template/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('template/vendor/chartjs/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('template/vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('template/vendor/sweetalert/sweetalert.min.js') }}"></script>

    <!-- Main JS-->
    <script src="{{ asset('template/js/main.js') }}"></script>

    {{-- Custom Java Script --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"
        integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @yield('custom-js')

</body>

</html>
<!-- end document-->
