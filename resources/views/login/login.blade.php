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
    <title>Login</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fontfaces CSS-->
    <link href="{{ asset('template/css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('template/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet"
        media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('template/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

    {{-- Boostrap-table --}}

    <!-- Vendor CSS-->
    <link href="{{ asset('template/vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('template/vendor/wow/animate.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('template/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ asset('template/css/theme.css') }}" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="{{ asset('images/logo-denso3.png') }}" alt="GRAHA RAJASA">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="" method="post">
                                <div class="form-group">
                                    @csrf
                                    <label>Username</label>
                                    <input class="au-input au-input--full" type="text" name="densoUsername"
                                        placeholder="Username Code">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="densoPassword"
                                        placeholder="Password">
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign
                                    in</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="{{ asset('template/vendor/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap JS-->
    <script src="{{ asset('template/vendor/bootstrap-4.1/popper.min.js') }}"></script>
    <script src="{{ asset('template/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
    {{-- Boostrap-Table-JS --}}
    <script src="{{ asset('template/vendor/animsition/animsition.min.js') }}"></script>

    <!-- Main JS-->
    <script src="{{ asset('template/js/main.js') }}"></script>

</body>

</html>
<!-- end document-->
