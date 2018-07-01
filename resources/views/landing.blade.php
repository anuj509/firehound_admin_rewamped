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
    <link rel="stylesheet" type="text/css" href="{{asset('css/customtooltipster.css')}}" />
    <link href="{{asset('css/toastr.css')}}" rel="stylesheet"/>
</head>

<body class="software-lp scrollbar-morpheus-den">

        <!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
            <div class="container">
                <a class="navbar-brand" href="#"><strong>Assistecho</strong></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-7" aria-controls="navbarSupportedContent-7"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent-7">
                    <ul class="navbar-nav mr-auto" id="navbar-scrollspy">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#services">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#packages">Pricing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Contact Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#aboutus">About Us</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto nav-flex-icons">
                        <li class="nav-item" id="navrightitem">
                            <?php echo $navrightitem;?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!--Carousel Wrapper-->
    <div id="carousel-example-3" class="carousel slide carousel-fade white-text" data-ride="carousel" data-interval="false">
        <!--Indicators-->
        <ol class="carousel-indicators">
            @foreach($sliders as $key => $slider)
            <li data-target="#carousel-example-3" data-slide-to="{{$key}}" class="{{($key==0)? 'active':''}}"></li>
            @endforeach
        </ol>
        <!--/.Indicators-->

        <!--Slides-->
        <div class="carousel-inner" role="listbox">

            @foreach($sliders as $key => $slider)
            <div class="carousel-item {{($key==0)? 'active':''}} view hm-black-light" style="background-image: url('{{$slider->image}}'); background-repeat: no-repeat; background-size: cover;">
                <!-- Caption -->
                <div class="full-bg-img flex-center white-text">
                    <ul class="animated fadeIn col-md-12">
                        <li>
                            <h1 class="h1-responsive">{{$slider->captionheader}}</h1>
                        </li>
                        <li>
                            <p>{{$slider->caption}}</p>
                        </li>
                        <!-- <li>
                            <a target="_blank" href="#" class="btn btn-info btn-lg" rel="nofollow">See more!</a>
                        </li> -->
                    </ul>
                </div>
                <!-- /.Caption -->

            </div>
            @endforeach            
        </div>
        <!--/.Slides-->

        <!--Controls-->
        <a class="carousel-control-prev" href="#carousel-example-3" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel-example-3" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        <!--/.Controls-->
    </div>
    <!--/.Carousel Wrapper-->

    <!--Main content-->
    <main>

        <!--First container-->
        <div class="container" id="container1">

            <!--Section: Features v.1-->
            <section id="features" class="section feature-box mb-5">

                <!--Section heading-->
                <h1 class="mb-3 my-5 pt-5 dark-grey-text wow fadeIn" data-wow-delay="0.2s"><strong class="font-bold">Lorem ipsum</strong> dolor sit amet</h1>

                <!--Section description-->
                <p class="section-description wow fadeIn" data-wow-delay="0.2s">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum quas, eos officia maiores ipsam ipsum dolores reiciendis
                    ad voluptas, animi obcaecati adipisci sapiente mollitia.</p>

                <!--First row-->
                <div class="row features wow fadeIn" data-wow-delay="0.2s">

                    <div class="col-lg-4 text-center">
                        <div class="icon-area">
                            <div class="circle-icon">
                                <i class="fa fa-gears blue-text"></i>
                            </div>
                            <br>
                            <h5 class="dark-grey-text font-bold mt-2">Customization</h5>
                            <div class="mt-1">
                                <p class="mx-3 grey-text">Lorem Ipsum is simply dummy text of the printing and typesetting let. Lorem ipsum dolor sit
                                    amet, consectetur adipisicing elit.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 text-center">
                        <div class="icon-area">
                            <div class="circle-icon">
                                <i class="fa fa-book blue-text"></i>
                            </div>
                            <br>
                            <h5 class="dark-grey-text font-bold mt-2">Easy tutorials</h5>
                            <div class="mt-1">
                                <p class="mx-3 grey-text">Lorem Ipsum is simply dummy text of the printing and typesetting let. Lorem ipsum dolor sit
                                    amet, consectetur adipisicing elit.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 text-center mb-4">
                        <div class="icon-area">
                            <div class="circle-icon">
                                <i class="fa fa-users blue-text"></i>
                            </div>
                            <br>
                            <h5 class="dark-grey-text font-bold mt-2">Free support</h5>
                            <div class="mt-1">
                                <p class="mx-3 grey-text">Lorem Ipsum is simply dummy text of the printing and typesetting let. Lorem ipsum dolor sit
                                    amet, consectetur adipisicing elit.</p>
                            </div>
                        </div>
                    </div>

                </div>
                <!--/First row-->

            </section>
            <!--/Section: Features v.1-->

        </div>
        <!--First container-->

        <!--Second container-->
        <div class="container-fluid" style="background-color: #f9f9f9" id="services">
            <div class="container py-4">

                <!--Carousel Wrapper-->
                <div id="services-carousel" class="carousel slide carousel-multi-item" data-ride="carousel">

                    <!--Controls-->
                    <div class="controls-top">
                        <a class="btn-floating" href="#services-carousel" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
                        <a class="btn-floating" href="#services-carousel" data-slide="next"><i class="fa fa-chevron-right"></i></a>
                    </div>
                    <!--/.Controls-->

                    <!--Indicators-->
                    <ol class="carousel-indicators">
                        <li data-target="#services-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#services-carousel" data-slide-to="1"></li>
                        <li data-target="#services-carousel" data-slide-to="2"></li>
                    </ol>
                    <!--/.Indicators-->

                    <!--Slides-->
                    <div class="carousel-inner" role="listbox">

                        <!--First slide-->
                        <div class="carousel-item active">

                            <div class="col-md-4">
                                <div class="card">
                                    <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(34).jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">Card title</h4>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        <a class="btn btn-primary">Button</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 clearfix d-none d-md-block">
                                <div class="card">
                                    <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(18).jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">Card title</h4>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        <a class="btn btn-primary">Button</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 clearfix d-none d-md-block">
                                <div class="card">
                                    <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(35).jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">Card title</h4>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        <a class="btn btn-primary">Button</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        

                    </div>
                    <!--/.Slides-->

                </div>
                <!--/.Carousel Wrapper-->

            </div>
        </div>
        <!--Second container-->

        <!--Third container-->
        <div class="streak streak-md streak-photo" style="background-image:url('{{asset('images/Photos/Others/architecture.jpg')}}')">
            <div class="flex-center white-text blue-gradient-mask">
                <div class="container py-3">

                    <!--Section: Features v.4-->
                    <section class="section feature-box wow fadeIn" data-wow-delay="0.2s">

                        <!--Section heading-->
                        <h1 class="py-5 my-5 white-text text-center wow fadeIn" data-wow-delay="0.2s"><strong class="font-bold">Lorem ipsum</strong> dolor sit amet</h1>

                        <!--Grid row-->
                        <div class="row features-small mb-5">

                            <!--Grid column-->
                            <div class="col-md-12 col-lg-4">

                                <!--Grid row-->
                                <div class="row mb-5">
                                    <div class="col-3">
                                        <a type="button" class="btn-floating white btn-lg my-0"><i class="fa fa-tablet blue-text" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="col-9">
                                        <h5 class="feature-title white-text">Fully responsive</h5>
                                        <p class="white-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit maiores.</p>
                                    </div>
                                </div>
                                <!--Grid row-->

                                <!--Grid row-->
                                <div class="row mb-5">
                                    <div class="col-3">
                                        <a type="button" class="btn-floating white btn-lg my-0"><i class="fa fa-level-up blue-text" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="col-9">
                                        <h5 class="feature-title white-text">Frequent updates</h5>
                                        <p class="white-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit maiores.</p>
                                    </div>
                                </div>
                                <!--Grid row-->

                                <!--Grid row-->
                                <div class="row mb-5">
                                    <div class="col-3">
                                        <a type="button" class="btn-floating white btn-lg my-0"><i class="fa fa-phone blue-text" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="col-9">
                                        <h5 class="feature-title white-text">Technical support</h5>
                                        <p class="white-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit maiores nam.</p>
                                    </div>
                                </div>
                                <!--Grid row-->

                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-md-12 col-lg-4 px-5 mb-2 center-on-small-only flex-center">
                                <img src="{{asset('images/Mockups/Transparent/Small/admin-new1.png')}}" alt="" class="z-depth-0 img-fluid">
                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-md-12 col-lg-4">

                                <!--Grid row-->
                                <div class="row mb-5">
                                    <div class="col-3">
                                        <a type="button" class="btn-floating white btn-lg my-0"><i class="fa fa-object-group blue-text" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="col-9">
                                        <h5 class="feature-title white-text">Editable layout</h5>
                                        <p class="white-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit maiores nam.</p>
                                    </div>
                                </div>
                                <!--Grid row-->

                                <!--Grid row-->
                                <div class="row mb-5">
                                    <div class="col-3">
                                        <a type="button" class="btn-floating white btn-lg my-0"><i class="fa fa-rocket blue-text" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="col-9">
                                        <h5 class="feature-title white-text">Fast and powerful</h5>
                                        <p class="white-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit maiores nam.</p>
                                    </div>
                                </div>
                                <!--Grid row-->

                                <!--Grid row-->
                                <div class="row mb-5">
                                    <div class="col-3">
                                        <a type="button" class="btn-floating white btn-lg my-0"><i class="fa fa-cloud-upload blue-text" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="col-9">
                                        <h5 class="feature-title white-text">Cloud storage</h5>
                                        <p class="white-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit maiores nam.</p>
                                    </div>
                                </div>
                                <!--Grid row-->

                            </div>
                            <!--Grid column-->

                        </div>
                        <!--Grid row-->

                    </section>
                    <!--/Section: Features v.4-->
                </div>
            </div>
        </div>
        <!--/Third container-->

        <!--/Fourth container-->
        <div class="container" id="packages">

            <section class="text-center pb-3">

            <!--Section heading-->
            <h1 class="h1 py-5">Our bestsellers</h1>
            <!--Section description-->
            <p class="section-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, error amet numquam iure provident voluptate
                esse quasi, veritatis totam voluptas nostrum quisquam eum porro a pariatur accusamus veniam.</p>

            <!--Carousel Wrapper-->
            <div id="packages-carousel" class="carousel slide carousel-multi-item" data-ride="carousel">

                <!--Controls-->
                <div class="controls-top">
                    <a class="btn-floating primary-color waves-effect waves-light" href="#packages-carousel" data-slide="prev">
                        <i class="fa fa-chevron-left"></i>
                    </a>
                    <a class="btn-floating primary-color waves-effect waves-light" href="#packages-carousel" data-slide="next">
                        <i class="fa fa-chevron-right"></i>
                    </a>
                </div>
                <!--Controls-->

                <!--Indicators-->
                <ol class="carousel-indicators">
                    @foreach($packages->chunk(3) as $key=>$chunk)
                    <li class="primary-color {{($key==0)? 'active':''}}" data-target="#packages-carousel" data-slide-to="{{$key}}"></li>
                    @endforeach
                </ol>
                <!--Indicators-->

                <!--Slides-->
                <div class="carousel-inner" role="listbox">

                    @foreach($packages->chunk(3) as $key => $chunckpackages)
                    <div class="carousel-item {{($key==0)? 'active':''}}">
                        @foreach($chunckpackages as $package)
                        <div class="col-md-4 {{($key==0)? '':'clearfix d-none d-md-block'}}">

                            <!--Card-->
                            <div class="card card-cascade narrower">

                                <!--Card image-->
                                <div class="view overlay hm-white-slight">
                                    <img src="{{$package->image}}" class="img-fluid" alt="">
                                    <a>
                                        <div class="mask waves-effect waves-light"></div>
                                    </a>
                                </div>
                                <!--Card image-->

                                <!--Card content-->
                                <div class="card-body text-center no-padding">

                                    <h4 class="card-title">
                                        <strong>
                                            <a href="">{{ucfirst($package->title)}}</a>
                                            @if($package->badge!='old')
                                                @if($package->badge=='new')
                                                <span class="badge red">{{$package->badge}}</span>
                                                @elif($package->badge=='premium')
                                                <span class="badge light-blue">{{$package->badge}}</span>
                                                @else
                                                <span class="badge purple">{{$package->badge}}</span>
                                                @endif
                                            @endif
                                        </strong>
                                    </h4>

                                    <!--Price-->
                                    <h2 class="font-bold mb-2">{{$package->pricing}}₹</h2>
                                    <p class="grey-text">{{$package->description}}</p>
                                    @if(!in_array($package->id,$customerpackage_ids))
                                    <form action="/buy" method="post" class="buypackage">
                                        {{csrf_field()}}
                                        <input type="hidden" name="package_id" value="{{$package->id}}">
                                    <button type="submit" class="btn btn-light-blue btn-rounded" id="package|{{$package->id}}">Buy now</button>
                                    </form>
                                    @else
                                    <button type="button" class="btn btn-light-blue btn-rounded" id="package|{{$package->id}}">Purchased</button>
                                    @endif

                                </div>
                                <!--Card content-->

                            </div>
                            <!--Card-->

                        </div>

                        @endforeach

                    </div>
                    @endforeach
                    

                </div>
                <!--Slides-->

            </div>
            <!--Carousel Wrapper-->

        </section>

            <hr>


            <!--Section: Testimonials v.4-->
            <section class="section text-center pb-4" id="aboutus">

                <!--Section heading-->
                <h1 class="mb-5 my-5 pt-5 text-center dark-grey-text wow fadeIn" data-wow-delay="0.2s"><strong class="font-bold">About Us</strong></h1>

                <div class="row">

                    <!--Carousel Wrapper-->
                    <div id="aboutus-carousel" class="carousel testimonial-carousel slide carousel-multi-item wow fadeIn" data-ride="carousel">

                        <!--Controls-->
                        <div class="controls-top">
                            <a class="btn-floating btn-blue btn-sm" href="#aboutus-carousel" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
                            <a class="btn-floating btn-blue btn-sm" href="#aboutus-carousel" data-slide="next"><i class="fa fa-chevron-right"></i></a>
                        </div>
                        <!--Controls-->

                        <!--Slides-->
                        <div class="carousel-inner" role="listbox">

                            <!--First slide-->
                            <div class="carousel-item active">
                                <!--Grid column-->
                                <div class="col-md-4">

                                    <div class="testimonial">
                                        <!--Avatar-->
                                        <div class="avatar">
                                            <img src="{{asset('images/Photos/Avatars/img%20(26).jpg')}}" class="rounded-circle img-fluid">
                                        </div>
                                        <!--Content-->
                                        <h4 class="dark-grey-text">Anna Deynah</h4>
                                        <h6 class="blue-text font-bold">Web Designer</h6>
                                        <p><i class="fa fa-quote-left"></i> Lorem ipsum dolor sit amet, consectetur adipisicing
                                            elit.
                                        </p>

                                        <!--Review-->
                                        <div class="grey-text">
                                            <i class="fa fa-star"> </i>
                                            <i class="fa fa-star"> </i>
                                            <i class="fa fa-star"> </i>
                                            <i class="fa fa-star"> </i>
                                            <i class="fa fa-star-half-full"> </i>
                                        </div>
                                    </div>

                                </div>
                                <!--Grid column-->

                                <!--Grid column-->
                                <div class="col-md-4 clearfix d-none d-md-block">
                                    <div class="testimonial">
                                        <!--Avatar-->
                                        <div class="avatar">
                                            <img src="{{asset('images/Photos/Avatars/img%20(8).jpg')}}" class="rounded-circle img-fluid">
                                        </div>
                                        <!--Content-->
                                        <h4 class="dark-grey-text">John Doe</h4>
                                        <h6 class="blue-text font-bold">Web Developer</h6>
                                        <p><i class="fa fa-quote-left"></i> Ut enim ad minima veniam, quis nostrum exercitationem.</p>

                                        <!--Review-->
                                        <div class="grey-text">
                                            <i class="fa fa-star"> </i>
                                            <i class="fa fa-star"> </i>
                                            <i class="fa fa-star"> </i>
                                            <i class="fa fa-star"> </i>
                                            <i class="fa fa-star"> </i>
                                        </div>
                                    </div>
                                </div>
                                <!--Grid column-->

                                <!--Grid column-->
                                <div class="col-md-4 clearfix d-none d-md-block">
                                    <div class="testimonial">
                                        <!--Avatar-->
                                        <div class="avatar">
                                            <img src="{{asset('images/Photos/Avatars/img%20(31).jpg')}}" class="rounded-circle img-fluid">
                                        </div>
                                        <!--Content-->
                                        <h4 class="dark-grey-text">Abbey Clark</h4>
                                        <h6 class="blue-text font-bold">Photographer</h6>
                                        <p><i class="fa fa-quote-left"></i> Quis autem vel eum iure reprehenderit qui in ea
                                            voluptate.
                                        </p>

                                        <!--Review-->
                                        <div class="grey-text">
                                            <i class="fa fa-star"> </i>
                                            <i class="fa fa-star"> </i>
                                            <i class="fa fa-star"> </i>
                                            <i class="fa fa-star"> </i>
                                            <i class="fa fa-star-o"> </i>
                                        </div>
                                    </div>
                                </div>
                                <!--Grid column-->

                            </div>
                            <!--First slide-->

                            <!--Second slide-->
                            <div class="carousel-item">
                                <!--Grid column-->
                                <div class="col-md-4">

                                    <div class="testimonial">
                                        <!--Avatar-->
                                        <div class="avatar">
                                            <img src="{{asset('images/Photos/Avatars/img%20(4).jpg')}}" class="rounded-circle img-fluid">
                                        </div>
                                        <!--Content-->
                                        <h4 class="dark-grey-text">Blake Dabney</h4>
                                        <h6 class="blue-text font-bold">Web Designer</h6>
                                        <p><i class="fa fa-quote-left"></i> Ut enim ad minima veniam, quis nostrum exercitationem.</p>

                                        <!--Review-->
                                        <div class="grey-text">
                                            <i class="fa fa-star"> </i>
                                            <i class="fa fa-star"> </i>
                                            <i class="fa fa-star"> </i>
                                            <i class="fa fa-star"> </i>
                                            <i class="fa fa-star-half-full"> </i>
                                        </div>
                                    </div>

                                </div>
                                <!--Grid column-->

                                <!--Grid column-->
                                <div class="col-md-4 clearfix d-none d-md-block">
                                    <div class="testimonial">
                                        <!--Avatar-->
                                        <div class="avatar">
                                            <img src="{{asset('images/Photos/Avatars/img%20(5).jpg')}}" class="rounded-circle img-fluid">
                                        </div>
                                        <!--Content-->
                                        <h4 class="dark-grey-text">Andrea Clay</h4>
                                        <h6 class="blue-text font-bold">Front-end developer</h6>
                                        <p><i class="fa fa-quote-left"></i> Lorem ipsum dolor sit amet, consectetur adipisicing
                                            elit.
                                        </p>

                                        <!--Review-->
                                        <div class="grey-text">
                                            <i class="fa fa-star"> </i>
                                            <i class="fa fa-star"> </i>
                                            <i class="fa fa-star"> </i>
                                            <i class="fa fa-star"> </i>
                                            <i class="fa fa-star"> </i>
                                        </div>
                                    </div>
                                </div>
                                <!--Grid column-->

                                <!--Grid column-->
                                <div class="col-md-4 clearfix d-none d-md-block">
                                    <div class="testimonial">
                                        <!--Avatar-->
                                        <div class="avatar">
                                            <img src="{{asset('images/Photos/Avatars/img%20(28).jpg')}}" class="rounded-circle img-fluid">
                                        </div>
                                        <!--Content-->
                                        <h4 class="dark-grey-text">Cami Gosse</h4>
                                        <h6 class="blue-text font-bold">Phtographer</h6>
                                        <p><i class="fa fa-quote-left"></i> At vero eos et accusamus et iusto odio dignissimos.</p>

                                        <!--Review-->
                                        <div class="grey-text">
                                            <i class="fa fa-star"> </i>
                                            <i class="fa fa-star"> </i>
                                            <i class="fa fa-star"> </i>
                                            <i class="fa fa-star"> </i>
                                            <i class="fa fa-star-o"> </i>
                                        </div>
                                    </div>
                                </div>
                                <!--Grid column-->

                            </div>
                            <!--Second slide-->

                        </div>
                        <!--Slides-->

                    </div>
                    <!--Carousel Wrapper-->

                </div>

            </section>
            <!--Section: Testimonials v.4-->

        </div>
        <!--/Fourth container-->
        <div class="container" id="blog">
            
            <!--Section: Blog v.3-->
            <section class="py-4">
                    
                <!--Section heading-->
                <h2 class="h1 text-center mb-5">Recent posts</h2>
                <!--Section description-->
                <p class="text-center mb-5 pb-5">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
                occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                <!--Grid row-->
                <div class="row">

                <!--Grid column-->
                <div class="col-lg-5 col-xl-4 mb-4">
                    <!--Featured image-->
                    <div class="view overlay hm-white-slight rounded z-depth-1-half">
                    <img src="https://mdbootstrap.com/img/Photos/Others/images/49.jpg" class="img-fluid" alt="First sample image">
                    <a>
                        <div class="mask"></div>
                    </a>
                    </div>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-7 col-xl-7 ml-xl-4 mb-4">
                    <h3 class="mb-3 font-bold dark-grey-text">
                    <strong>This is title of the news</strong>
                    </h3>
                    <p class="grey-text">Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere
                    possimus, omnis voluptas assumenda est, omnis dolor repellendus et aut officiis debitis aut rerum.</p>
                    <p>by
                    <a class="font-bold dark-grey-text">Jessica Clark</a>, 26/08/2018</p>
                    <a class="btn btn-primary btn-md">Read more</a>
                </div>
                <!--Grid column-->

                </div>
                <!--Grid row-->

                <hr class="mb-5">

                <!--Grid row-->
                <div class="row">

                <!--Grid column-->
                <div class="col-lg-5 col-xl-4 mb-4">
                    <!--Featured image-->
                    <div class="view overlay hm-white-slight rounded z-depth-1">
                    <img src="https://mdbootstrap.com/img/Photos/Others/images/31.jpg" class="img-fluid" alt="Second sample image">
                    <a>
                        <div class="mask"></div>
                    </a>
                    </div>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-7 col-xl-7 ml-xl-4 mb-4">
                    <h3 class="mb-3 font-bold dark-grey-text">
                    <strong>This is title of the news</strong>
                    </h3>
                    <p class="grey-text">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque
                    corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident et dolorum fuga.</p>
                    <p>by
                    <a class="font-bold dark-grey-text">Jessica Clark</a>, 24/08/2018</p>
                    <a class="btn btn-primary btn-md">Read more</a>
                </div>
                <!--Grid column-->

                </div>
                <hr class="mb-5">

                <!--Grid row-->
                <div class="row">

                <!--Grid column-->
                <div class="col-lg-5 col-xl-4 mb-4">
                    <!--Featured image-->
                    <div class="view overlay hm-white-slight rounded z-depth-1">
                    <img src="https://mdbootstrap.com/img/Photos/Others/images/52.jpg" class="img-fluid" alt="Third sample image">
                    <a>
                        <div class="mask"></div>
                    </a>
                    </div>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-7 col-xl-7 ml-xl-4 mb-4">
                    <h3 class="mb-3 font-bold dark-grey-text">
                    <strong>This is title of the news</strong>
                    </h3>
                    <p class="grey-text">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores
                    eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur.</p>
                    <p>by
                    <a class="font-bold dark-grey-text">Jessica Clark</a>, 21/08/2018</p>
                    <a class="btn btn-primary btn-md">Read more</a>
                </div>
                <!--Grid column-->

                </div>
                <!--Grid row-->
        </section>
        <!--Section: Blog v.3-->                
        </div>
        <div class="container" id="contact">
            <!--Section: Contact v.1-->
            <section class="py-3">

                  <!--Section heading-->
                  <h2 class="font-bold text-center h1 py-5">Contact us</h2>
                  <!--Section description-->
                  <p class="section-description pb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, error amet numquam iure provident voluptate esse quasi,
                    veritatis totam voluptas nostrum quisquam eum porro a pariatur accusamus veniam.</p>

                  <div class="row">

                    <!--Grid column-->
                    <div class="col-lg-5 mb-4">

                      <!--Form with header-->
                      <div class="card">

                        <div class="card-body">
                          <!--Header-->
                          <div class="form-header blue accent-1">
                            <h3>
                              <i class="fa fa-envelope"></i> Write to us:</h3>
                          </div>

                          <p>We'll write rarely, but only the best content.</p>
                          <br>

                          <!--Body-->
                          <div class="md-form">
                            <i class="fa fa-user prefix grey-text"></i>
                            <input type="text" id="form-name" class="form-control">
                            <label for="form-name">Your name</label>
                          </div>

                          <div class="md-form">
                            <i class="fa fa-envelope prefix grey-text"></i>
                            <input type="text" id="form-email" class="form-control">
                            <label for="form-email">Your email</label>
                          </div>

                          <div class="md-form">
                            <i class="fa fa-tag prefix grey-text"></i>
                            <input type="text" id="form-Subject" class="form-control">
                            <label for="form-Subject">Subject</label>
                          </div>

                          <div class="md-form">
                            <i class="fa fa-pencil prefix grey-text"></i>
                            <textarea type="text" id="form-text" class="md-textarea"></textarea>
                            <label for="form-text">Icon Prefix</label>
                          </div>

                          <div class="text-center">
                            <button class="btn blue-gradient waves-effect waves-light">Submit</button>
                          </div>

                        </div>

                      </div>
                      <!--Form with header-->

                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-7">

                      <!--Google map-->
                      <div id="map-container" class="rounded z-depth-1-half map-container" style="height: 400px">map api here</div>

                      <br>
                      <!--Buttons-->
                      <div class="row text-center">
                        <div class="col-md-4">
                          <a class="btn-floating blue accent-1">
                            <i class="fa fa-map-marker"></i>
                          </a>
                          <p>San Francisco, CA 94126</p>
                          <p>United States</p>
                        </div>

                        <div class="col-md-4">
                          <a class="btn-floating blue accent-1">
                            <i class="fa fa-phone"></i>
                          </a>
                          <p>+ 01 234 567 89</p>
                          <p>Mon - Fri, 8:00-22:00</p>
                        </div>

                        <div class="col-md-4">
                          <a class="btn-floating blue accent-1">
                            <i class="fa fa-envelope"></i>
                          </a>
                          <p>info@gmail.com</p>
                          <p>sale@gmail.com</p>
                        </div>
                      </div>

                    </div>
                    <!--Grid column-->

                  </div>

            </section>
            <!--Section: Contact v.1-->
        </div>
    </main>
    <!--Main content-->


    <!--Footer-->
    <footer class="page-footer center-on-small-only blue-grey lighten-5 pt-0">

        <div style="background-color: #5991fb;">
            <div class="container">
                <!--Grid row-->
                <div class="row py-4 d-flex align-items-center">

                    <!--Grid column-->
                    <div class="col-12 col-md-5 text-left mb-md-0">
                        <h6 class="mb-0 white-text text-center text-md-left"><strong>Get connected with us on social networks!</strong></h6>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-12 col-md-7 text-center text-md-right">
                        <!--Facebook-->
                        <a class="icons-sm fb-ic ml-0"><i class="fa fa-facebook white-text mr-lg-4"> </i></a>
                        <!--Twitter-->
                        <a class="icons-sm tw-ic"><i class="fa fa-twitter white-text mr-lg-4"> </i></a>
                        <!--Google +-->
                        <a class="icons-sm gplus-ic"><i class="fa fa-google-plus white-text mr-lg-4"> </i></a>
                        <!--Linkedin-->
                        <a class="icons-sm li-ic"><i class="fa fa-linkedin white-text mr-lg-4"> </i></a>
                        <!--Instagram-->
                        <a class="icons-sm ins-ic"><i class="fa fa-instagram white-text mr-lg-4"> </i></a>
                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->
            </div>
        </div>

        <!--Footer Links-->
        <div class="container mt-5 mb-4 text-center text-md-left">
            <div class="row mt-3">

                <!--First column-->
                <div class="col-md-3 col-lg-4 col-xl-3 mb-r dark-grey-text">
                    <h6 class="title font-bold"><strong>Company name</strong></h6>
                    <hr class="blue mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p>Here you can use rows and columns here to organize your footer content. Lorem ipsum dolor sit amet, consectetur
                        adipisicing elit.</p>
                </div>
                <!--/.First column-->

                <!--Second column-->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-r dark-grey-text">
                    <h6 class="title font-bold"><strong>Products</strong></h6>
                    <hr class="blue mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p><a href="#!" class="dark-grey-text">Product 1</a></p>
                    <p><a href="#!" class="dark-grey-text">Product 2</a></p>
                    <p><a href="#!" class="dark-grey-text">Product 3</a></p>
                    <p><a href="#!" class="dark-grey-text">Product 4</a></p>
                </div>
                <!--/.Second column-->

                <!--Third column-->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-r dark-grey-text">
                    <h6 class="title font-bold"><strong>Useful links</strong></h6>
                    <hr class="blue mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p><a href="#!" class="dark-grey-text">Your Account</a></p>
                    <p><a href="#!" class="dark-grey-text">Become an Affiliate</a></p>
                    <p><a href="#!" class="dark-grey-text">Shipping Rates</a></p>
                    <p><a href="#!" class="dark-grey-text">Help</a></p>
                </div>
                <!--/.Third column-->

                <!--Fourth column-->
                <div class="col-md-4 col-lg-3 col-xl-3 dark-grey-text">
                    <h6 class="title font-bold"><strong>Contact</strong></h6>
                    <hr class="blue mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p><i class="fa fa-home mr-3"></i> New York, NY 10012, US</p>
                    <p><i class="fa fa-envelope mr-3"></i> info@example.com</p>
                    <p><i class="fa fa-phone mr-3"></i> + 01 234 567 88</p>
                    <p><i class="fa fa-print mr-3"></i> + 01 234 567 89</p>
                </div>
                <!--/.Fourth column-->

            </div>
        </div>
        <!--/.Footer Links-->

        <!-- Copyright-->
        <div class="footer-copyright">
            <div class="container-fluid">
                © 2017 Copyright: <a href="#"><strong> TechZilla</strong></a>
            </div>
        </div>
        <!--/.Copyright -->

    </footer>
    <!--/.Footer-->

    <!--modals-->
    <!--Modal: Login / Register Form-->
    <div class="modal fade scrollbar-morpheus-den" id="modalLRForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog cascading-modal" role="document">
            <!--Content-->
            <div class="modal-content">
    
                <!--Modal cascading tabs-->
                <div class="modal-c-tabs">
    
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs tabs-2 light-blue darken-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" id="logintab" href="#panel7" role="tab"><i class="fa fa-user mr-1"></i> Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#panel8" role="tab"><i class="fa fa-user-plus mr-1"></i> Register</a>
                        </li>
                        <li class="nav-item" style="display: none;">
                            <a class="nav-link" data-toggle="tab" id="pstab" href="#panelresetpass" role="tab"><i class="fa fa-user-plus mr-1"></i> Password Reset</a>
                        </li>
                    </ul>
    
                    <!-- Tab panels -->
                    <div class="tab-content">
                        <!--Panel 7-->
                        <div class="tab-pane fade in show active" id="panel7" role="tabpanel">
    
                            <form action="/login" method="post" id="loginform">
                            {{csrf_field()}}
                            <!--Body-->
                            <div class="modal-body mb-1">
                                <div class="md-form form-sm">
                                    <i class="fa fa-envelope prefix"></i>
                                    <input type="text" id="lemail" name="email" class="form-control" required>
                                    <label for="lemail">Your email</label>
                                </div>
    
                                <div class="md-form form-sm">
                                    <i class="fa fa-lock prefix"></i>
                                    <input type="password" id="lpassword" name="password" class="form-control" required>
                                    <label for="lpassword">Your password</label>
                                </div>
                                <div class="text-center mt-2">
                                    <button type="submit" class="btn btn-info blue-gradient">Log in <i class="fa fa-sign-in ml-1"></i></button>
                                </div>
                            </div>
                            </form>
                            <!--Footer-->
                            <div class="modal-footer display-footer">
                                <div class="options text-center text-md-right mt-1">
                                    <p>Forgot <a class="blue-text" onclick="document.getElementById('pstab').click()">Password?</a></p>
                                </div>
                                <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
                            </div>
    
                        </div>
                        <!--/.Panel 7-->
    
                        <!--Panel 8-->
                        <div class="tab-pane fade" id="panel8" role="tabpanel">
                            <!-- form here -->
                        </div>
                        <!--/.Panel 8-->

                        <!--Panel 9-->
                        <div class="tab-pane fade" id="panelresetpass" role="tabpanel">
                        <form action="/reset" method="post" id="passwordreset">
                            {{csrf_field()}}
                            <!--Body-->
                            <div class="modal-body mb-1">
                                <div class="md-form form-sm">
                                    <i class="fa fa-envelope prefix"></i>
                                    <input type="text" id="rpemail" name="email" class="form-control" required>
                                    <label for="rpemail">Your email</label>
                                </div>
                                <div class="text-center mt-2">
                                    <button type="submit" class="btn btn-info blue-gradient">Validate<i class="fa fa-sign-in ml-1"></i></button>
                                </div>
                            </div>
                        </form>
                        <!--Footer-->
                        <div class="modal-footer display-footer">
                            <div class="options text-center text-md-right mt-1">
                                <p><a class="blue-text" onclick="document.getElementById('logintab').click()">Login</a></p>
                            </div>
                            <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
                        </div>                            
                        </div>
                        <!--/.Panel 8-->
                    </div>
    
                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
    <!--Modal: Login / Register Form-->
    <div class="modal fade scrollbar-morpheus-den" id="modalPayment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog cascading-modal" role="document">
            <!--Content-->
            <div class="modal-content">
                <iframe id="pgframe" frameborder="0"></iframe>
                
            </div>
            <!--/.Content-->
        </div>
    </div>
    <!-- Modal -->
    <!-- Central Modal Medium Success -->
    <div class="modal fade" id="centralModalSuccess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-notify modal-success" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header">
                    <p class="heading lead">Payment Success</p>
    
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                    </button>
                </div>
    
                <!--Body-->
                <div class="modal-body">
                    <div class="text-center">
                        <i class="fa fa-check fa-4x mb-3 animated rotateIn"></i>
                        <p id="paymentmodalcontent"></p>
                    </div>
                </div>
    
                <!--Footer-->
                <div class="modal-footer justify-content-center">
                    <a type="button" class="btn btn-outline-secondary-modal waves-effect" data-dismiss="modal">Close</a>
                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
    <!-- Central Modal Medium Success-->
    {{csrf_field()}}                                            
                                            
    <!--/.modals-->
    <!-- SCRIPTS -->

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
    <script src="{{asset('js/index.js')}}"></script>
    <script src="https://js.instamojo.com/v1/checkout.js"></script>
    
    @if(session('payment_id'))
    <script>
        $(document).ready(function () {
            $('#paymentmodalcontent').html("{{session('payment_id')}}");
            $('#centralModalSuccess').modal('toggle');  
        });
    </script>
    @endif
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/5a8c8a5c4b401e45400d143a/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
</body>
</html>