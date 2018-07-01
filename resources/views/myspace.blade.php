<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Assistecho | MySpace | {{Session::get('customersession')->fullname}}</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/font-awesome/font-awesome.min.css')}}">
    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/compiled.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/toastr.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.4/themes/base/jquery-ui.css">
    <link href="{{asset('css/jquery.flexdatalist.css')}}" rel='stylesheet' type='text/css' />
    @yield('css')
</head>

<body class="fixed-sn light-blue-skin" data-spy="scroll" data-target="#scrollspy" data-offset="15">
    <div id="mdb-preloader" class="flex-center">
        <div id="preloader-markup">
            <div class="preloader-wrapper big active">
             <div class="preloader-wrapper big active">
             <div class="preloader-wrapper big active">
           <div class="preloader-wrapper big active">
            <div class="spinner-layer spinner-blue-only">
              <div class="circle-clipper left">
                <div class="circle"></div>
              </div><div class="gap-patch">
                <div class="circle"></div>
              </div><div class="circle-clipper right">
                <div class="circle"></div>
              </div>
            </div>
          </div>
          </div>
          </div>
          </div>   
        </div>
    </div>
    
    <!--Double navigation-->
    <header>
        <!-- Sidebar navigation -->
        <div id="slide-out" class="side-nav sn-bg-4 fixed mdb-sidenav">
            <ul class="custom-scrollbar list-unstyled" style="max-height:100vh;">
                <!-- Logo -->
                <li>
                    <div class="logo-wrapper waves-light">
                        <span class="img-fluid flex-center">Assistecho</span>
                    </div>
                </li>
                <!-- Side navigation links -->
                <li>
                    <ul class="collapsible collapsible-accordion">
                        <li id="loading"><a class="waves-effect arrow-r" id="home" href="/me"><i class="fa fa-chevron-right"></i> loading</a>
                        </li>
                        <li><a class="waves-effect arrow-r" id="home" href="/me"><i class="fa fa-chevron-right"></i> Home{{time()}}</a>
                        </li>
                        <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-hand-pointer-o"></i> Guides<i class="fa fa-angle-down rotate-icon"></i></a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="/guides" class="waves-effect">All</a></li>
                                    @if(isset($guides_menuitem))
                                    @foreach($guides_menuitem as $guide)
                                    <li><a href="/guides/{{$guide->id}}" class="waves-effect">
                                    <?php
                                        $max_length = 20;

                                        if (strlen($guide->name) > $max_length)
                                        {
                                            $offset = ($max_length - 3) - strlen($guide->name);
                                            $s = substr($guide->name, 0, strrpos($guide->name, ' ', $offset)) . '...';
                                            echo $s;
                                        }else{
                                            echo $guide->name;
                                        }
                                        
                                    ?>
                                    </a>
                                    </li>
                                    @endforeach
                                    @endif
                                </ul>
                            </div>
                        </li>
                        <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-eye"></i> Blogs<i class="fa fa-angle-down rotate-icon"></i></a><div class="collapsible-body">
                                <ul>
                                    @if(isset($blogs_menuitem))
                                    @foreach($blogs_menuitem as $blog)
                                    <li><a href="/blogs?blog={{$blog->id}}" class="waves-effect">
                                    <?php
                                        $max_length = 20;

                                        if (strlen($blog->title) > $max_length)
                                        {
                                            $offset = ($max_length - 3) - strlen($blog->title);
                                            $s = substr($blog->title, 0, strrpos($blog->title, ' ', $offset)) . '...';
                                            echo $s;
                                        }else{
                                            echo $blog->title;
                                        }
                                        
                                    ?>
                                    </a>
                                    </li>
                                    @endforeach
                                    @endif
                                </ul>
                            </div>
                        </li>
                        <li><a class="collapsible-header waves-effect arrow-r" href="/tickets"><i class="fa fa-envelope-o"></i> Tickets</a>
                        </li>
                        <li><a class="collapsible-header waves-effect arrow-r" href="/packages"><i class="fa fa-envelope-o"></i> Packages</a>
                        </li>
                    </ul>
                </li>
                <!--/. Side navigation links -->
            </ul>
            <div class="sidenav-bg mask-strong"></div>
        </div>
        <!--/. Sidebar navigation -->
        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-toggleable-md navbar-expand-lg scrolling-navbar double-nav blue-gradient">
            <!-- SideNav slide-out button -->
            <div class="float-left">
                <a href="#" data-activates="slide-out" class="button-collapse"><i class="fa fa-bars"></i></a>
            </div>
            <!-- Breadcrumb-->
            <div class="breadcrumb-dn col-md-3">
                @yield('breadcrumb')
            </div>
            <div class="col-md-6">
                <style scoped>
                    ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
                        color: white;
                        opacity: 1; /* Firefox */
                    }

                    :-ms-input-placeholder { /* Internet Explorer 10-11 */
                        color: white;
                    }

                    ::-ms-input-placeholder { /* Microsoft Edge */
                        color: white;
                    }
                    input[type=text] {
                        color: white;
                    }
                </style>
                <input id="globalsearch" type="text" placeholder="Search" autocomplete="off">
            </div>
            <ul class="nav navbar-nav nav-flex-icons ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{Session::get('customersession')->fullname}}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="/">Home</a>
                        <a class="dropdown-item" href="/profile">Profile</a>
                        <a class="dropdown-item" href="/logout">LogOut</a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.Navbar -->
    </header>
    <!--/.Double navigation-->
    <!--Main Layout-->
    <main id="pjax-container">
        @yield('content')
        
    </main>
    <!--Main Layout-->
    
    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/compiled.min.js')}}"></script>
    <script src="{{asset('js/toastr.js')}}"></script>
    <script src="{{asset('js/jquery.flexdatalist.js')}}"></script>
    @yield('js')
    <script>
        $(document).ready(function () {
          $("#mdb-preloader").fadeOut("slow");
          $('#loading').hide();
        });
        
        // SideNav Initialization
        $(".button-collapse").sideNav();
        $('#globalsearch').flexdatalist({
            minLength: 1,
            searchIn: ['name','description'],
            visibleProperties: ["htmltext"],
            data: '/globalsearch'
         });
         function showblog(id){
            var url=window.location.href.split('/');
            var calling_url=url[0]+"//"+url[2]+"/getblog/"+id;
            console.log(calling_url);
            $.get( calling_url, function( data ) {
                //console.log(data);
                $('#blog_image').attr('src',data.image)
                $('#blog_title').html(data.title);
                $('#blog_sign').html('Written by '+data.posted_by+', '+data.created_at);
                $('#content').html(data.content);
                $('#modalBlog').modal('toggle');
            });
        }
    </script>

</body>
</html>