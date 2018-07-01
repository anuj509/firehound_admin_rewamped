<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Firehound</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('css/font-awesome/font-awesome.min.css')}}">
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <!-- Material Design Bootstrap -->
        <link rel="stylesheet" href="{{asset('css/admin.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('js/vendor/datatables/css/dataTables.bootstrap4.min.css')}}"/>
        <link href="{{asset('css/toastr.css')}}" rel="stylesheet"/>
        <style>
            .form-gradient .font-small {
              font-size: 0.8rem; }

            .form-gradient .header {
              border-top-left-radius: .3rem;
              border-top-right-radius: .3rem; }

            .form-gradient input[type=text]:focus:not([readonly]) {
              border-bottom: 1px solid #fd9267;
              -webkit-box-shadow: 0 1px 0 0 #fd9267;
              box-shadow: 0 1px 0 0 #fd9267; }

            .form-gradient input[type=text]:focus:not([readonly]) + label {
              color: #4f4f4f; }

            .form-gradient input[type=password]:focus:not([readonly]) {
              border-bottom: 1px solid #fd9267;
              -webkit-box-shadow: 0 1px 0 0 #fd9267;
              box-shadow: 0 1px 0 0 #fd9267; }

            .form-gradient input[type=password]:focus:not([readonly]) + label {
              color: #4f4f4f; }

        </style>
    </head>
    <body>
        <div class="container-fluid">

            <!--Grid row-->
            <div class="row">

                <section class="form-gradient col-md-4 offset-md-4">
                <form role="form" method="POST" action="{{ url('/admin/login') }}">
                    {{ csrf_field() }}
                <!--Form with header-->
                <div class="card">

                    <!--Header-->
                    <div class="header pt-3 blue-gradient">

                        <div class="row d-flex justify-content-center">
                            <h3 class="white-text mb-3 pt-3 font-weight-bold">Firehound:Admin</h3>
                        </div>

                        <div class="white-text row mt-2 mb-3 d-flex justify-content-center">
                            Log In
                        </div>

                    </div>
                    <!--Header-->

                    <div class="card-body mx-4 mt-4">

                        <!--Body-->
                        <div class="md-form{{ $errors->has('email') ? ' has-error' : '' }}">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autofocus>
                            <label for="email">Your email</label>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="md-form pb-1 pb-md-3{{ $errors->has('password') ? ' has-error' : '' }}">
                            <input id="password" type="password" class="form-control" name="password">
                            <label for="password">Your password</label>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                            <p class="font-small grey-text d-flex justify-content-end">Forgot <a href="#" class="dark-grey-text ml-1 font-weight-bold"> Password?</a></p>
                        </div>


                        <!--Grid row-->
                        <div class="row d-flex align-items-center mb-4">

                            <!--Grid column-->
                            <div class="offset-md-4 d-flex align-items-start">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-grey btn-rounded z-depth-1a">Log in</button>
                                </div>
                            </div>
                            <!--Grid column-->

                        </div>
                        <!--Grid row-->
                    </div>

                </div>
                <!--/Form with header-->

            </section>
            </div>
        </div>            
    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{asset('js/admin.min.js')}}"></script>
    <script src="{{asset('js/toastr.js')}}"></script>
    </body>
</html>