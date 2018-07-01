var csrf="<input type='hidden' name='_token' value='"+$("input[name='_token']").val()+"'>";

//Animation init
        new WOW().init();

        //Modal
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').focus()
        })
        function customerid(response){
            return "<input type='hidden' name='customer_id' value='"+response+"'>";
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

        function stateAutocomplete(){
            $.get('/getstates',function(response){
                var states = response;

                            $('.mdb-autocomplete').mdb_autocomplete({
                                data: states
                            });
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
                contact:{
                    required:true,
                    minlength:10,
                    maxlength:10,
                    digits:true
                },
                marketplace:"required"
            },
            messages: {
                companyname: "Please enter your fullname",
                contact:{
                    required:"Please enter you contact",
                    minlength:"Please enter your mobile number",
                    maxlength:"Please enter your mobile number",
                    digits:"Only digits allowed"
                },
                marketplace:"Please select your marketplace availability"
            },
            submitHandler: function(form){
                var $form = $(form);
                $.ajax({
                    type:"POST",
                    url:$form.attr("action"),
                    data:$form.serialize(),
                    success: function(response){
                        //toastr[response[0]](response[1]);
                        $('#panel8').addClass('animated fadeOut');
                        $('#panel8').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',function(){
                            setRegform();
                            initRegform();
                            toastr[response[0]](response[1]);
                            $('#panel8').removeClass('active');
                            $('[href="#panel7"]').tab('show');
                            $('#panel8').removeClass('animated fadeOut');
                        });
                        //console.log(response);
                    }
                });
                return false;
            }
        });
        }

        // function categorydetails(){
        //   $('#categoryform').submit(function(e){
        //     e.preventDefault();     
        //     }).validate({
        //         errorPlacement: function (error, element) {
        //         $(element).tooltipster('update', $(error).text());
        //         $(element).tooltipster('show');
        //     },
        //     success: function (label, element) {
        //         $(element).tooltipster('hide');
        //     },
        //     rules:{
        //         categoriesdeals:"required"
        //     },
        //     messages:{
        //         categoriesdeals:"Please select few Categories"
        //     },
        //     submitHandler:function(form){
        //        var $form = $(form);
        //         $.ajax({
        //             type:"POST",
        //             url:$form.attr("action"),
        //             data:$form.serialize(),
        //             success: function(response){
        //                 //console.log(response);
        //                 $('#panel8').addClass('animated fadeOut');
        //                 $('#panel8').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',function(){
        //                     setRegform();
        //                     initRegform();
        //                     toastr[response[0]](response[1]);
        //                     $('#panel8').removeClass('active');
        //                     $('[href="#panel7"]').tab('show');
        //                     $('#panel8').removeClass('animated fadeOut');
        //                 });
        //             }
        //         });
        //         return false; 
        //     }
        //     });  
        // }
        function setRegform(){
            var setregformhtml='<form action="/register" method="post" id="regform" autocomplete="off" role="presentation"> '+csrf+' <!--Body--> <div class="modal-body"> <div class="md-form form-sm"> <i class="fa fa-user prefix"></i> <input type="text" id="fullname" name="fullname" class="form-control" required> <label for="fullname">Your Full Name</label> </div> <div class="md-form form-sm"> <i class="fa fa-envelope prefix"></i> <input type="text" name="regemail" id="regemail" class="form-control" required> <label for="regemail">Your email</label> </div> <div class="md-form form-sm"> <i class="fa fa-phone prefix"></i> <input type="text" name="contact" id="contact" class="form-control" required> <label for="contact">Your Contact</label> </div> <div class="md-form form-sm"> <i class="fa fa-lock prefix"></i> <input type="password" name="password" id="password" class="form-control" required> <label for="password">Your password</label> </div> <div class="md-form form-sm"> <i class="fa fa-lock prefix"></i> <input type="password" name="cnf_password" id="cnf_password" class="form-control" required> <label for="cnf_password">Repeat password</label> </div> <!--Textarea with icon prefix--> <div class="md-form form-sm"> <i class="fa fa-home prefix"></i> <textarea type="text" id="address" name="address" class="md-textarea" required></textarea> <label for="address">Address</label> </div> <div class="md-form form-sm"> <i class="fa fa-flag prefix"></i> <input type="search" id="state" name="state" class="form-control mdb-autocomplete" required> <button class="mdb-autocomplete-clear"> <svg fill="#000000" height="24" viewBox="0 0 24 24" width="24" xmlns="https://www.w3.org/2000/svg"> <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z" /> <path d="M0 0h24v24H0z" fill="none" /> </svg> </button> <label for="state" class="active">State</label> </div> <div class="md-form form-sm"> <i class="fa fa-hashtag prefix"></i> <input type="text" name="pincode" id="pincode" class="form-control" required> <label for="pincode">Pin Code</label> </div> <div class="text-center form-sm mt-2"> <button type="submit" class="btn btn-info blue-gradient">Sign up <i class="fa fa-sign-in ml-1"></i></button> </div> </div> </form>';
            $('#panel8').html(setregformhtml);
        }
        function genOptions(response){
            var options='';
                $.each(response,function(key,value){
                    options+='<option>'+value+'</option>';
                });
                return options;
        }
        function initRegform(){
            $('.mdb-select').material_select();

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
                },
                "categories_deals[]":{
                    required:true
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
                },
                "categories_deals[]":{
                    required:"Please select atleast one category you deal with."
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
                        $('#panel8').addClass('animated fadeOut');
                        toastr["info"]("Now fill Company details.");
                        toastr[response[0]](response[1]);
                        latcustomerid=response[2];
                        $('#panel8').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',function(){
                            $.when( $.ajax( "/getmonthlysales" ), $.ajax( "/getfulfillments" ), $.ajax( "/getcategoriesdeals" ) ).done(function( response, response1, response3) {
                            var options3='';
                            $.each(response3[0],function(key,value){
                                options3+='<option '+((value["isGroupHeader"]=='yes')? "disabled":"")+'>'+value["name"]+'</option>';
                            });
                            var companyform=csrf+customerid(latcustomerid)+'<!--Body--> <div class="modal-body"> <div class="md-form form-sm"> <i class="fa fa-user prefix"></i> <input type="text" id="companyname" name="companyname" class="form-control" required> <label for="companyname">Your Company Name</label> </div> <div class="md-form form-sm"> <i class="fa fa-phone prefix"></i> <input type="text" name="contact" id="contact" class="form-control" required> <label for="contact">Your Contact</label> </div> <div class="md-form form-sm"> <i class="fa fa-home prefix"></i> <textarea type="text" id="cmpy_address" name="cmpy_address" class="md-textarea"></textarea> <label for="cmpy_address">Address</label> </div> <div class="md-form form-sm"> <i class="fa fa-flag prefix"></i> <input type="search" id="state" name="state" class="form-control mdb-autocomplete"> <button class="mdb-autocomplete-clear"> <svg fill="#000000" height="24" viewBox="0 0 24 24" width="24" xmlns="https://www.w3.org/2000/svg"> <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z" /> <path d="M0 0h24v24H0z" fill="none" /> </svg> </button> <label for="state" class="active">State</label> </div> <div class="md-form form-sm"> <i class="fa fa-hashtag prefix"></i> <input type="text" name="pincode" id="pincode" class="form-control"> <label for="pincode">Pin Code</label> </div> <div class="md-form form-sm" id="marketplace-inline"> <label>Are You On MarketPlace?</label> <br> <div class="form-inline"> <div class="form-group"> <input name="marketplace" type="radio" id="radio1" value="yes"> <label for="radio1">Yes</label> </div> <div class="form-group"> <input name="marketplace" type="radio" id="radio2" value="no"> <label for="radio2">No</label> </div> </div> </div> <div class="md-form form-sm"> <select name="sales" class="mdb-select" id="sales"> '+genOptions(response[0])+' </select> <label>Monthly Sales (offline/online)</label> </div> <div class="md-form form-sm"> <select name="fulfillment" class="mdb-select" id="fulfillment"> '+genOptions(response1[0])+' </select> <label>Fulfillment Requirement(self/website)</label> </div><div class="md-form form-sm"> <select class="mdb-select" multiple name="categories_deals[]" required> '+options3+' </select> <label>Categories You Deal with</label> </div> <div class="text-center form-sm mt-2"> <button type="submit" class="btn btn-info blue-gradient">Sign up <i class="fa fa-sign-in ml-1"></i></button> </div> </div><div class="modal-body">';
                            //console.log(companyform);
                            $('#panel8').html('<form method="post" action="/companydetails" id="companyform">'+companyform+'</form>');
                            $('.mdb-select').material_select();
                            stateAutocomplete();
                            radioChange();
                            companydetails();
                            $('#panel8').removeClass('animated fadeOut');
                            });
                        } );
                        }else{
                            toastr[response[0]](response[1]);    
                        }
                    }
                });
                return false;
            }
        });
        }

        function loginajax(){
            $('#loginform').submit(function(e){
                e.preventDefault();     
                }).validate({
                errorPlacement: function (error, element) {
                    $(element).tooltipster('update', $(error).text());
                    $(element).tooltipster('show');
                },
                success: function (label, element) {
                    $(element).tooltipster('hide');
                },
                rules:{
                    email:{
                        required:true,
                        email:true
                    },
                    password:{
                        required:true,
                        minlength:3,
                        maxlength:255
                    }
                },
                messages:{
                    email:{
                        required:"Please enter Email.",
                        email:"Please enter valid Email."
                    },
                    password:{
                        required:"Please enter a password.",
                        minlength:"Please enter min length of 3.",
                        maxlength:"Password seems too lengthy."
                    }
                },
                submitHandler:function(form){
                    var $form = $(form);
                    $.ajax({
                        type:"POST",
                        url:$form.attr("action"),
                        data:$form.serialize(),
                        success: function(response){
                            //console.log(response);
                            toastr[response[0]](response[1]);
                            if(response[0]=='success'){
                                $.when( $.ajax('/checkloginstatus'),$.ajax('/checkpackagesstatus')).done(function(response,response1){
                                    $('#navrightitem').html(response[0]);
                                    $('#modalLRForm').modal('toggle');
                                    setRegform();
                                    initRegform();
                                    loginajax();

                                    $.each($('#packages-carousel button'),function(key,value){
                                        $value=$(value);
                                        if($.inArray(parseInt($value.attr('id').split('|')[1]), response1[0] )==0){
                                            console.log("package id:"+$value.attr('id').split('|')[1]);
                                            $value.attr('type','button');
                                            $value.text('Purchased');
                                        }    
                                        else
                                            console.log("package id:"+$value.attr('id').split('|')[1]+' no match');
                                        //console.log($value.attr('type','button'));
                                    });

                                });
                            }else{

                            }
                        }
                    });
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
        function expirydateformat(){
            $('#expirydate').keyup(function (e) {
                msg = $('#expirydate').val();
                if(e.which!=8)
                if(msg.length==2){
                  msg=msg.slice(0,2)+'/'+msg.slice(2,msg.length);
                  $('#expirydate').val(msg);
                }
                if(msg.length>=7){
                  msg=msg.slice(0,7);
                  $('#expirydate').val(msg);
                }
            });
            var regExp = /[a-z]/i;
              $('#expirydate').on('keydown keyup', function(e) {
                var value = String.fromCharCode(e.which) || e.key;

                // No letters
                if (regExp.test(value)) {
                  e.preventDefault();
                  return false;
                }
              });
            $('#expirydate').focusout(function(e){
                checkExp($('#expirydate').val());
            });
        }
        // Material Select Initialization
        $(document).ready(function () {
            setRegform();
            initRegform();
            loginajax();
            $('.buypackage').submit(function(e){
                e.preventDefault();
                //$('#modalPayment').toggle();
                $.ajax({
                        type:"POST",
                        url:$(this).attr("action"),
                        data:$(this).serialize(),
                        success: function(response){
                            if(response.success==true){
                            //openInNewTab(response.data);
                            Instamojo.open(response.data);
                            }else if(response.success=='login'){
                                toastr['error'](response.msgbody);
                                $('#modalLRForm').modal('toggle');
                            }
                            else if(response.success=='error'){
                                toastr['error'](response.msgbody);
                                //location.reload();
                            }
                            else{
                                console.log(response);
                                toastr['error']('We are facing technical issue.Try Later...');
                            }
                        }
                    });
            });
            resetpassword();
        });

        function resetpassword(){
            $('#passwordreset').submit(function(e){
                e.preventDefault();
                //$('#modalPayment').toggle();
                $.ajax({
                        type:"POST",
                        url:$(this).attr("action"),
                        data:$(this).serialize(),
                        success: function(response){
                            if(response.success=='success'){
                                console.log(response);
                                toastr[response.success](response.msgbody);
                            }
                            else{
                                toastr['error'](response.msgbody);
                            }
                            $('#modalLRForm').modal('toggle');
                        }
                    });
            });
        }
// function openInNewTab(url) {
//   var win = window.open(url, "payment", "width=800,height=600");
//   var timer = setInterval(function() { 
//     if(win.closed) {
//         clearInterval(timer);
//         $('#paymentmodalcontent').html("payment_id here");
//         $('#centralModalSuccess').modal('toggle');
//     }
// }, 1000);
// }
