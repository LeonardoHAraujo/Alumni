<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Login - Antebellum</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />

        <!-- ICONS --> 
        <link rel="apple-touch-icon" sizes="57x57" href="assets/newIcons/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="assets/newIcons/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="assets/newIcons/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="assets/newIcons/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="assets/newIcons/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="assets/newIcons/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="assets/newIcons/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="assets/newIcons/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="assets/newIcons/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="assets/newIcons/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="assets/newIcons/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="assets/newIcons/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="assets/newIcons/favicon-16x16.png">
        <link rel="manifest" href="assets/newIcons/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="assets/newIcons/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">

        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/metismenu.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css">
        <!--<link href="{{ asset('assets/css/socials.css') }}" rel="stylesheet" type="text/css">-->
    </head>

    <body>

        <!-- Background -->
        <div class="account-pages"></div>
        <!-- Begin page -->
        <div class="wrapper-page">

            <div class="card">
                <div class="card-body">

                    <h3 class="text-center m-0">
                        <img src="{{ asset('assets/images/Antebellum-logo.png') }}" height="90" alt="logo">
                    </h3>

                    <div class="p-3">

                        <form class="form-horizontal m-t-30" method="post" action="{{ route('autenticate') }}">

                            @csrf

                            @if (session('error'))
                                <div class="alert alert-primary" id="messageErrorLogin" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="username">Email</label>
                                <input type="text" class="form-control" name="username" id="username" placeholder="Seu-email@dominio.com...">
                            </div>

                            <div class="form-group input-with-icon">
                                <label for="userpassword">Senha</label>
                                <input type="password" class="form-control" name="pass" id="userpassword" placeholder="Sua senha...">

                                <div class="icon-eye" id="changeTypeInputPass">
                                    <i class="fas fa-eye-slash cursor-not-eye"></i>
                                </div>
                            </div>

                            <div class="form-group row m-t-20">
                                <div class="col-12 flex-center">
                                    <!--<div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customControlInline">
                                        <label class="custom-control-label" for="customControlInline">Lembrar</label>
                                    </div>-->
                                    <button class="btn btn-primary w-md waves-effect waves-light" tstyle="text-align: center !importtant" ype="submit">Entrar</button>
                                </div>
                            </div>

                            <!--<div class="form-group m-t-10 mb-0 row">
                                <div class="col-12 m-t-20">
                                    <a href="pages-recoverpw.html" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                </div>
                            </div>-->
                        </form>
                    </div>

                </div>
            </div>

            <!--<div class="socials">
                <a href="" class="fb connect">
                    <i class="fab fa-facebook"></i>
                </a>

                <a href="" class="gle connect">
                    <i class="fab fa-google fa-10x"></i>
                </a>
            </div>

            <div class="socials">
                <a href="" class="lkd connect">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </div>-->

            <div class="m-t-40 text-center">
                <!-- <p class="text-white-50">Don't have an account ? <a href="#" class="text-white"> Signup Now </a> </p> -->
                <p class="text-muted">© 2021 Antebellum.</p>
            </div>

        </div>

        <!-- END wrapper -->


        <!-- jQuery  -->
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/metisMenu.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('assets/js/waves.min.js') }}"></script>

        <script src="{{ asset('plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('assets/js/app.js') }}"></script>

        <!-- My Script -->
        <script src="{{ asset('js/globalScripts/clearMessage.js') }}"></script>
        <script src="{{ asset('js/globalScripts/EyeInputs/scriptEyeLogin.js') }}"></script>

    </body>

</html>
