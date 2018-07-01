<!DOCTYPE html>
<html lang="en" class="full-height">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Assistecho</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/font-awesome/font-awesome.min.css')}}">
    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="{{asset('css/mdb.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/toastr.css')}}" rel="stylesheet"/>
</head>

<body class="software-lp scrollbar-morpheus-den">
<div class="col-md-6 offset-md-3">
    
<!--Card-->
<div class="card card-cascade wider reverse my-4">

    <!--Card image-->
    <div class="view overlay hm-white-slight">
        <img src="{{url('/images/Photos/Others/passreset.png')}}" class="img-fluid">
        <a href="#!">
            <div class="mask"></div>
        </a>
    </div>
    <!--/Card image-->

    <!--Card content-->
    <div class="card-body">
        <div class="col-md-6 offset-md-3">
            <!-- Form login -->
            <form method="POST" action="{{ route('customer.password.request') }}" id="passwordreset">
                {{ csrf_field() }}
                <input type="hidden" name="token" value="{{$token}}">
                <p class="h5 text-center mb-4">Password Reset</p>

                <div class="md-form">
                    <i class="fa fa-envelope prefix grey-text"></i>
                    <input type="text" id="email" class="form-control" name="email" value="{{$email}}" readonly>
                </div>

                <div class="md-form">
                    <i class="fa fa-lock prefix grey-text"></i>
                    <input type="password" class="form-control" name="password" required id="pass">
                    <label for="defaultForm-pass">Your password</label>
                </div>
                
                <div class="md-form">
                    <i class="fa fa-lock prefix grey-text"></i>
                    <input type="password" class="form-control" name="repassword" required id="repass">
                    <label for="defaultForm-pass">Your RePassword</label>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-default">Reset Password</button>
                </div>
            </form>
            <!-- Form login -->
        </div>
    </div>
    <!--/.Card content-->

</div>
<!--/.Card-->

</div>
<!-- JQuery -->
    <script type="text/javascript" src="{{asset('js/jquery-3.2.1.min.js')}}"></script>

    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>

    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{asset('js/mdb.min.js')}}"></script>
    <script src="{{asset('js/jquery.validate.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/customtooltipster.js')}}"></script>
    <script src="{{asset('js/toastr.js')}}"></script>
    
<script>
    $('#passwordreset').submit(function(e){
            e.preventDefault();
            //$('#modalPayment').toggle();
            $.ajax({
                    type:"POST",
                    url:$(this).attr("action"),
                    data:$(this).serialize(),
                    success: function(response){
                        if(response.success=='success'){
                            toastr[response.success](response.msgbody);
                        }
                        else{
                            toastr['error'](response.msgbody);
                        }
                        setInterval(function(){ location.replace("{{url('/')}}"); }, 1000);
                    }
                });
        });
</script>
</body>
</html>