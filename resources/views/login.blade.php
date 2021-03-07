<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Antebellum</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/metismenu.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css">
    </head>

    <body>

        <!-- Background -->
        <div class="account-pages"></div>
        <!-- Begin page -->
        <div class="wrapper-page">

            <div class="card">
                <div class="card-body">

                    <h3 class="text-center m-0">
                        <a href="index.html" class="logo logo-admin"><img src="{{ asset('assets/images/Antebellum-logo.png') }}" height="80" alt="logo"></a>
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

                            <div class="form-group">
                                <label for="userpassword">Senha</label>
                                <input type="password" class="form-control" name="pass" id="userpassword" placeholder="Sua senha...">
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

    </body>

</html>