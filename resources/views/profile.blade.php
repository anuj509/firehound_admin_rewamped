@extends('myspace')
@section('breadcrumb')
<p>Profile</p>
@endsection
@section('content')
<div class="col-md-8">

    <!-- Nav tabs -->
    <ul class="nav nav-tabs nav-justified blue-gradient">
        <li class="nav-item waves-effect waves-light">
            <a class="nav-link active" data-toggle="tab" href="#panel1" role="tab" aria-selected="false">Personal</a>
        </li>
        <li class="nav-item waves-effect waves-light">
            <a class="nav-link" data-toggle="tab" href="#panel2" role="tab" aria-selected="false">Company Details</a>
        </li>
    </ul>
    <!-- Tab panels -->
    <div class="tab-content card">
        <!--Panel 1-->
        <div class="tab-pane fade active show" id="panel1" role="tabpanel">
            <div class="col-sm-10 offset-md-1">
                <form action="/update/register/{{$customer->id}}" method="post" id="regform" autocomplete="off" role="presentation" novalidate="novalidate">
                {{csrf_field()}}
                <!--Body-->
                <div class="modal-body">
                    <div class="md-form form-sm"> <i class="fa fa-user prefix"></i>
                        <input type="text" id="fullname" name="fullname" value="<?=$customer->fullname?>" class="form-control" required="" aria-required="true">
                        <label for="fullname">Your Full Name</label>
                    </div>
                    <div class="md-form form-sm"> <i class="fa fa-envelope prefix"></i>
                        <input type="text" name="regemail" id="regemail" value="<?=$customer->email?>" class="form-control" required="" aria-required="true">
                        <label for="regemail">Your email</label>
                    </div>
                    <div class="md-form form-sm"> <i class="fa fa-phone prefix"></i>
                        <input type="text" name="contact" id="contact" value="<?=$customer->contact?>" class="form-control" required="" aria-required="true">
                        <label for="contact">Your Contact</label>
                    </div>
                    <div class="md-form form-sm"> <i class="fa fa-lock prefix"></i>
                        <input type="password" name="password" id="password" class="form-control" required="" aria-required="true">
                        <label for="password">Your password</label>
                    </div>
                    <div class="md-form form-sm"> <i class="fa fa-lock prefix"></i>
                        <input type="password" name="cnf_password" id="cnf_password" class="form-control" required="" aria-required="true">
                        <label for="cnf_password">Repeat password</label>
                    </div>
                    <!--Textarea with icon prefix-->
                    <div class="md-form form-sm"> <i class="fa fa-home prefix"></i>
                        <textarea type="text" id="address" name="address" class="md-textarea" required="" aria-required="true"><?=$customer->address?></textarea>
                        <label for="address">Address</label>
                    </div>
                    <div class="md-form form-sm"> <i class="fa fa-flag prefix"></i>
                        <input type="search" id="state" name="state" value="<?=$customer->state?>" class="form-control mdb-autocomplete" required="" aria-required="true">
                        <ul class="mdb-autocomplete-wrap"></ul>
                        <button class="mdb-autocomplete-clear">
                            <svg fill="#000000" height="24" viewBox="0 0 24 24" width="24" xmlns="https://www.w3.org/2000/svg">
                                <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"></path>
                                <path d="M0 0h24v24H0z" fill="none"></path>
                            </svg>
                        </button>
                        <label for="state" class="active">State</label>
                    </div>
                    <div class="md-form form-sm"> <i class="fa fa-hashtag prefix"></i>
                        <input type="text" name="pincode" id="pincode" value="<?=$customer->pincode?>" class="form-control" required="" aria-required="true">
                        <label for="pincode">Pin Code</label>
                    </div>
                    <div class="text-center form-sm mt-2">
                        <button type="submit" class="btn btn-info blue-gradient">Update <i class="fa fa-sign-in ml-1"></i></button>
                    </div>
                </div>
            </form>
            </div>
        </div>
        <!--/.Panel 1-->
        <!--Panel 2-->
        <div class="tab-pane fade" id="panel2" role="tabpanel">
            <div class="col-md-10 offset-md-1">
                <form method="post" action="/update/companydetails/{{$customer->id}}" id="companyform" novalidate="novalidate">
                    {{csrf_field()}}
                    <!--Body-->
                    <div class="modal-body">
                        <div class="md-form form-sm"> <i class="fa fa-user prefix"></i>
                            <input type="text" id="companyname" name="companyname" value="<?=$company_detail->companyname?>" class="form-control" required>
                            <label for="companyname">Your Company Name</label>
                        </div>
                        <div class="md-form form-sm"> <i class="fa fa-phone prefix"></i>
                            <input type="text" name="contact" id="ccontact" value="<?=$company_detail->contact?>" class="form-control" required>
                            <label for="contact">Your Contact</label>
                        </div>
                        <div class="md-form form-sm"> <i class="fa fa-home prefix"></i>
                            <textarea type="text" id="cmpy_address" name="cmpy_address" class="md-textarea"><?=$company_detail->address?></textarea>
                            <label for="cmpy_address">Address</label>
                        </div>
                        <div class="md-form form-sm"> <i class="fa fa-flag prefix"></i>
                            <input type="search" id="cstate" name="state" value="<?=$company_detail->state?>" class="form-control mdb-autocomplete">
                            <button class="mdb-autocomplete-clear">
                                <svg fill="#000000" height="24" viewBox="0 0 24 24" width="24" xmlns="https://www.w3.org/2000/svg">
                                    <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z" />
                                    <path d="M0 0h24v24H0z" fill="none" /> </svg>
                                </button>
                                <label for="state" class="active">State</label>
                            </div>
                            <div class="md-form form-sm"> <i class="fa fa-hashtag prefix"></i>
                                <input type="text" name="pincode" id="cpincode" value="<?=$company_detail->pincode?>" class="form-control">
                                <label for="pincode">Pin Code</label>
                            </div>
                            <div class="md-form form-sm" id="marketplace-inline">
                                <label>Are You On MarketPlace?</label>
                                <br>
                                <div class="form-inline">
                                    <div class="form-group">
                                        <input name="marketplace" type="radio" id="radio1" value="yes" <?php echo ($company_detail->marketplace=='yes')?'checked':'';?>>
                                        <label for="radio1">Yes</label>
                                    </div>
                                    <div class="form-group">
                                        <input name="marketplace" type="radio" id="radio2" value="no" <?php echo ($company_detail->marketplace=='no')?'checked':'';?>>
                                        <label for="radio2">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="md-form form-sm">
                                <select name="sales" class="mdb-sales" id="sales">
                                    
                                </select>
                                <label>Monthly Sales (offline/online)</label>
                            </div>
                            <div class="md-form form-sm">
                                <select name="fulfillment" class="mdb-fulfill" id="fulfillment">
                                    
                                </select>
                                <label>Fulfillment Requirement(self/website)</label>
                            </div>
                            <div class="md-form form-sm">
                                <select class="mdb-cateselect" multiple id="categories_deals" name="categories_deals[]" required>
                                    
                                </select>
                                <label>Categories You Deal with</label>
                            </div>
                            <div class="text-center form-sm mt-2">
                                <button type="submit" class="btn btn-info blue-gradient">Update <i class="fa fa-sign-in ml-1"></i></button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
        <!--/.Panel 2-->
    </div>


</div>

<!-- Modal -->
<div class="modal fade bottom" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-frame modal-top" role="document">
                <!--Content-->
                <div class="modal-content">
                    <!--Body-->
                    <div class="modal-body">
                        <div class="row d-flex justify-content-center align-items-center">

                            <p class="pt-3 pr-2">Verify your Mobile number ?</p>
                    <form id="contactverify" action="/verifycontact" method="post">
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Sure, Verify</button>    
                    </form>
                    <button type="button" class="btn btn-secondary waves-effect waves-light" data-dismiss="modal">No, Thanks!</button>
                        </div>
                    </div>
                </div>
                <!--/.Content-->
            </div>
        </div>
<div class="modal fade bottom" id="otpModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-frame modal-top" role="document">
                <!--Content-->
                <div class="modal-content">
                    <!--Body-->
                    <div class="modal-body">
                        <div class="row d-flex justify-content-center align-items-center">
                    <form id="otpverify" action="/verifyotp" method="post" class="form-inline">
                    <label for="otp">OTP</label>
                    <input type="text" id="otp" name="otp" class="form-control">
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Verify</button>    
                    </form>
                        </div>
                    </div>
                </div>
                <!--/.Content-->
            </div>
        </div>        
@endsection
@section('js')
<script src="{{asset('js/jquery.validate.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/customtooltipster.js')}}"></script>
    <script src="{{asset('js/toastr.js')}}"></script>
<script>
    function initRegform(){
            //$('.mdb-select').material_select();

            stateAutocomplete();
            $('#regform input[type="text"]').tooltipster({
                trigger: 'custom',
                onlyOne: false,
                position: 'right'
            });
            $("#regform").submit(function(e) {
                e.preventDefault();
            }).validate({
            errorPlacement: function (error, element) {
                $(element).tooltipster('update', $(error).text());
                $(element).tooltipster('show');
            },
            success: function (label, element) {
                $(element).tooltipster('hide');
            },
            rules: {
                fullname: "required",
                regemail: {
                    required:true,
                    email:true
                },
                contact:{
                    required:true,
                    minlength:10,
                    maxlength:10,
                    digits:true
                },
                password: {
                    required: true,
                    minlength: 6
                },
                cnf_password: {
                    required: true,
                    minlength: 6,
                    equalTo: "#password"
                },
                address:"required",
                state:"required",
                pincode:{
                    required:true,
                    minlength:6
                }
            },
            messages: {
                fullname: "Please enter your fullname",
                regemail: {
                    required:"Please enter your email",
                    email:"Please Provide valid email"
                },
                contact:{
                    required:"Please enter you contact",
                    minlength:"Please enter your mobile number",
                    maxlength:"Please enter your mobile number",
                    digits:"Only digits allowed"
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 6 characters long"
                },
                cnf_password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 6 characters long",
                    equalTo: "Please enter the same password as above"
                },
                address: "Please enter a valid address",
                state: "Please select a state from autocomplete.",
                pincode:{
                    required:"Please enter pincode",
                    minlength:"Please enter a valid pincode"
                } 
            },
            submitHandler: function(form) {
                //alert("form submit");
                var $form = $(form);
                //console.log(("#regform").serialize());
                $.ajax({
                    type:"POST",
                    url:$form.attr("action"),
                    data:$form.serialize(),
                    success: function(response){
                        console.log(response);
                        if(response[0]=='success'){
                        toastr[response[0]](response[1]);
                        }else{
                            toastr[response[0]](response[1]);    
                        }
                    }
                });
                return false;
            }
        });
        }
        function stateAutocomplete(){
            $.get('/getstates',function(response){
                var states = response;

                            $('.mdb-autocomplete').mdb_autocomplete({
                                data: states
                            });
            });
        }
        function radioChange(){
            $('input:radio[name="marketplace"]').on('change',function(){
            //console.log($(this).val());
            if($(this).val()=='yes'){
            $.get('/getmarketplaces',function(response){
            $('<div class="md-form form-sm" id="speficmarketplace"> <i class="fa fa-flag prefix"></i> <input type="search" id="marketplacename" name="marketplacename" class="form-control mp-autocomplete" required> <button class="mdb-autocomplete-clear"> <svg fill="#000000" height="24" viewBox="0 0 24 24" width="24" xmlns="https://www.w3.org/2000/svg"> <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z" /> <path d="M0 0h24v24H0z" fill="none" /> </svg> </button> <label for="marketplacename" class="active">Specify MarketPlace</label> </div>').insertAfter("#marketplace-inline");
                var marketplaces = response;
                $('.mp-autocomplete').mdb_autocomplete({
                    data: marketplaces
                });
            }); 

            }else{
                $('#speficmarketplace').remove();
            }

             });
        }
        function companydetails(){
            $('#companyform').submit(function(e){
            e.preventDefault();     
        }).validate({
            errorPlacement: function (error, element) {
                $(element).tooltipster('update', $(error).text());
                $(element).tooltipster('show');
            },
            success: function (label, element) {
                $(element).tooltipster('hide');
            },
            rules: {
                companyname:"required",
                ccontact:{
                    required:true,
                    minlength:10,
                    maxlength:10,
                    digits:true
                },
                marketplace:"required",
                "categories_deals[]":"required"
            },
            messages: {
                companyname: "Please enter your fullname",
                ccontact:{
                    required:"Please enter you contact",
                    minlength:"Please enter your mobile number",
                    maxlength:"Please enter your mobile number",
                    digits:"Only digits allowed"
                },
                marketplace:"Please select your marketplace availability",
                "categories_deals[]":"Please select categories you deal with"
            },
            submitHandler: function(form){
                var $form = $(form);
                $.ajax({
                    type:"POST",
                    url:$form.attr("action"),
                    data:$form.serialize(),
                    success: function(response){
                        //console.log(response);
                        toastr[response[0]](response[1]);
                    }
                });
                return false;
            }
        });
        }
        
        function normalizeYear(year){
            // Century fix
            var YEARS_AHEAD = 20;
            if (year<100){
                var nowYear = new Date().getFullYear();
                year += Math.floor(nowYear/100)*100;
                if (year > nowYear + YEARS_AHEAD){
                    year -= 100;
                } else if (year <= nowYear - 100 + YEARS_AHEAD) {
                    year += 100;
                }
            }
            return year;
        }

        function checkExp(expdate){
            var match=expdate.match(/^\s*(0?[1-9]|1[0-2])\/(\d\d|\d{4})\s*$/);
            if (!match){
                toastr['error']('Please enter a valid expiration date.')
                return;
            }
            var exp = new Date(normalizeYear(1*match[2]),1*match[1]-1,1).valueOf();
            var now=new Date();
            var currMonth = new Date(now.getFullYear(),now.getMonth(),1).valueOf();
            if (exp<=currMonth){
                toastr['error']('Card Expired.');
            }
        }
        function genOptions(response,selected){
            //console.log(selected);
            var options='';
                $.each(response,function(key,value){
                    attr=(stringToSlug(value)===selected)? 'selected':'';
                    options+='<option '+attr+'>'+value+'</option>';
                });
                return options;
        }
        function stringToSlug (title) {
          return title.toLowerCase().trim()
          .replace(/&/g, '-and-')         // Replace & with 'and'
          .replace(/([~!@#$%^&*()_+=`{}\[\]\|\\:;'<>,.\/? ])+/g, '-') // Replace sepcial character with -
          .replace(/\-\-+/g, '-')         // Replace multiple - with single -
        }
        $(document).ready(function () {
            if('{{$customer->isContactVerified}}'!='1'){
                $('#contactModal').modal('toggle');
                $("#contactverify").submit(function(e) {
                e.preventDefault();
                $.ajaxSetup({
                      headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                    });
                $.ajax({
                    type:"POST",
                    url:$("#contactverify").attr("action"),
                    data:$("#contactverify").serialize(),
                    success: function(response){
                        console.log(response);
                        if(response=='success'){
                            $('#contactModal').modal('toggle');
                            $('#otpModal').modal('toggle');
                        }else{
                            $('#contactModal').modal('toggle');
                            toastr['error']('Something went Wrong!');
                        }
                    }
                    });    
                });
                $("#otpverify").submit(function(e) {
                e.preventDefault();
                $.ajaxSetup({
                      headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                    });
                $.ajax({
                    type:"POST",
                    url:$("#otpverify").attr("action"),
                    data:$("#otpverify").serialize(),
                    success: function(response){
                        console.log(response);
                        if(response=='success'){
                            $('#otpModal').modal('toggle');
                            toastr['success']('Contact Verified Succesfully');
                        }else{
                            toastr['error']('Contact Verification Failed.');
                        }
                    }
                    });    
                });
            }

            initRegform();
            radioChange();
            companydetails();
            $.get('/getmonthlysales',function(response){
                //console.log(response);
                options=genOptions(response,stringToSlug('{{$company_detail->sales}}'));
                $('#sales').html(options);
                $('.mdb-sales').material_select();
            });
            $.get('/getcategoriesdeals',function(response){
                //console.log(response);
                var options='';
                $.each(response,function(key,value){
                    options+='<option '+((value["isGroupHeader"]=='yes')? "disabled":"")+' '+((jQuery.inArray(value["name"], <?=$company_detail->categories_deals?>) !== -1)? "selected":"")+'>'+value["name"]+'</option>';
                });
                $('#categories_deals').html(options);
                $('.mdb-cateselect').material_select();
            });
            $.get('/getfulfillments',function(response){
                //console.log(response);
                options=genOptions(response,stringToSlug('{{$company_detail->fulfillment}}'));
                $('#fulfillment').html(options);
                $('.mdb-fulfill').material_select();
            });
            if(($('input:radio[name="marketplace"]').val()=='yes') && ($('input:radio[name="marketplace"]').val()!='') ){
            $.get('/getmarketplaces',function(response){
            $('<div class="md-form form-sm" id="speficmarketplace"> <i class="fa fa-flag prefix"></i> <input type="search" id="marketplacename" name="marketplacename" class="form-control mp-autocomplete" value="<?=$company_detail->marketplacename?>" required> <button class="mdb-autocomplete-clear"> <svg fill="#000000" height="24" viewBox="0 0 24 24" width="24" xmlns="https://www.w3.org/2000/svg"> <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z" /> <path d="M0 0h24v24H0z" fill="none" /> </svg> </button> <label for="marketplacename" class="active">Specify MarketPlace</label> </div>').insertAfter("#marketplace-inline");
                var marketplaces = response;
                $('.mp-autocomplete').mdb_autocomplete({
                    data: marketplaces
                });
            });

            }else{
                $('#speficmarketplace').remove();
            }
            
        });
</script>
@endsection        