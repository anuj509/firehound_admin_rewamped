<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Firehound</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/font-awesome/font-awesome.min.css')}}">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="{{asset('css/admin.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('js/vendor/datatables/css/dataTables.bootstrap4.min.css')}}"/>
    <link href="{{asset('css/toastr.css')}}" rel="stylesheet"/>
    @yield('css')
    
</head>

<body class="fixed-sn light-blue-skin">

    <!--Main Navigation-->
    <header>

        <!-- Sidebar navigation -->
        @include('admin.layout.sidenav')
        <!--/. Sidebar navigation -->

        <!-- Navbar -->
        <nav class="navbar blue-gradient fixed-top navbar-toggleable-md navbar-expand-lg scrolling-navbar double-nav">
            <!-- SideNav slide-out button -->
            <div class="float-left">
                <a href="#" data-activates="slide-out" class="button-collapse black-text"><i class="fa fa-bars"></i></a>
            </div>
            <!-- Breadcrumb-->
            <div class="breadcrumb-dn mr-auto">
                <p id="breadcrumb">@yield('breadcrumb')</p>
            </div>

            <!--Navbar links-->
            <ul class="nav navbar-nav nav-flex-icons ml-auto">

                <!-- Dropdown -->
                <!-- <li class="nav-item dropdown notifications-nav">
                    <a class="nav-link dropdown-toggle waves-effect" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <span class="badge red">3</span> <i class="fa fa-bell"></i>
                        <span class="d-none d-md-inline-block">Notifications</span>
                    </a>
                    <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">
                            <i class="fa fa-money mr-2" aria-hidden="true"></i>
                            <span>New order received</span>
                            <span class="float-right"><i class="fa fa-clock-o" aria-hidden="true"></i> 13 min</span>
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fa fa-money mr-2" aria-hidden="true"></i>
                            <span>New order received</span>
                            <span class="float-right"><i class="fa fa-clock-o" aria-hidden="true"></i> 33 min</span>
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fa fa-line-chart mr-2" aria-hidden="true"></i>
                            <span>Your campaign is about to end</span>
                            <span class="float-right"><i class="fa fa-clock-o" aria-hidden="true"></i> 53 min</span>
                        </a>
                    </div>
                </li> -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect" href="#" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user"></i> <span class="clearfix d-none d-sm-inline-block">{{Auth::guard('admin')->User()->name}}</span></a>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <!-- <a class="dropdown-item" href="#">My account</a> -->
                        <a class="dropdown-item" onclick="document.getElementById('logout-form').submit()">Log Out</a>
                        <form id="logout-form" method="post" action="{{url('admin/logout')}}" style="display: none;">
                            {{csrf_field()}}
                        </form>
                    </div>
                </li>

            </ul>
            <!--/Navbar links-->
        </nav>
        <!-- /.Navbar -->

    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main id="maincontent">
        @yield('content')
    </main>
    <!--Main layout-->

    <div id="csrf" style="display: none;">{{csrf_field()}}</div>
    <div id="put">{{ method_field('PUT') }}</div>
    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="editModalbody">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="document.getElementById('formsubmit').click()">Save</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="createModalbody">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="document.getElementById('createformsubmit').click()">Save</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="historyModal" tabindex="-1" role="dialog" aria-labelledby="historyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ticket History</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="historyModalbody">
                <style scoped>
                    @media (max-width: 1025px) {
  .stepper.timeline li {
    -webkit-box-align: end;
    -webkit-align-items: flex-end;
    -ms-flex-align: end;
    align-items: flex-end; } }

.stepper.timeline li a {
  padding: 0px 24px;
  left: 50%; }
  @media (max-width: 450px) {
    .stepper.timeline li a {
      left: 6%; } }
  @media (min-width: 451px) and (max-width: 1025px) {
    .stepper.timeline li a {
      left: 6%; } }
  .stepper.timeline li a .circle {
    width: 50px;
    height: 50px;
    line-height: 50px;
    font-size: 1.4em;
    text-align: center;
    position: absolute;
    top: 16px;
    margin-left: -50px;
    background-color: #ccc;
    z-index: 2; }

.stepper.timeline li .step-content {
  width: 45%;
  float: left;
  border-radius: 2px;
  position: relative; }
  .stepper.timeline li .step-content:before {
    position: absolute;
    top: 26px;
    right: -15px;
    display: inline-block;
    border-top: 15px solid transparent;
    border-left: 15px solid #e0e0e0;
    border-right: 0 solid #e0e0e0;
    border-bottom: 15px solid transparent;
    content: " "; }
  .stepper.timeline li .step-content:after {
    position: absolute;
    top: 27px;
    right: -14px;
    display: inline-block;
    border-top: 14px solid transparent;
    border-left: 14px solid #fff;
    border-right: 0 solid #fff;
    border-bottom: 14px solid transparent;
    content: " "; }
  @media (max-width: 450px) {
    .stepper.timeline li .step-content {
      width: 80%;
      left: 3rem;
      margin-right: 3rem;
      margin-bottom: 2rem;
      float: right; }
      .stepper.timeline li .step-content:before {
        border-left-width: 0;
        border-right-width: 15px;
        left: -15px;
        right: auto; }
      .stepper.timeline li .step-content:after {
        border-left-width: 0;
        border-right-width: 14px;
        left: -14px;
        right: auto; } }
  @media (min-width: 451px) and (max-width: 1025px) {
    .stepper.timeline li .step-content {
      width: 85%;
      left: 3rem;
      margin-right: 3rem;
      margin-bottom: 2rem;
      float: right; }
      .stepper.timeline li .step-content:before {
        border-left-width: 0;
        border-right-width: 15px;
        left: -15px;
        right: auto; }
      .stepper.timeline li .step-content:after {
        border-left-width: 0;
        border-right-width: 14px;
        left: -14px;
        right: auto; } }

.stepper.timeline li.timeline-inverted {
  -webkit-box-align: end;
  -webkit-align-items: flex-end;
  -ms-flex-align: end;
  align-items: flex-end; }
  .stepper.timeline li.timeline-inverted .step-content {
    float: right; }
    .stepper.timeline li.timeline-inverted .step-content:before {
      border-left-width: 0;
      border-right-width: 15px;
      left: -15px;
      right: auto; }
    .stepper.timeline li.timeline-inverted .step-content:after {
      border-left-width: 0;
      border-right-width: 14px;
      left: -14px;
      right: auto; }

.stepper.stepper-vertical li:not(:last-child):after {
  content: " ";
  position: absolute;
  width: 3px;
  background-color: #e0e0e0;
  left: 50%;
  top: 57px;
  margin-left: -1.5px; }
  @media (max-width: 450px) {
    .stepper.stepper-vertical li:not(:last-child):after {
      left: 6%; } }
  @media (min-width: 451px) and (max-width: 1025px) {
    .stepper.stepper-vertical li:not(:last-child):after {
      left: 6%; } }
                </style>
                <!-- Timeline -->
                <div class="row mt-5">
                    <div class="col-md-12">

                        <!-- Timeline Wrapper -->
                        <ul class="stepper stepper-vertical timeline pl-0" id="ticket-events">


                        </ul>
                        <!-- Timeline Wrapper -->

                    </div>
                </div>
                <!-- Timeline -->
    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="showPackagesModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">View Packages</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="showPackagesModalbody">
                    <!-- Nav tabs -->
                    <div class="tabs-wrapper"> 
                        <ul class="nav classic-tabs tabs-cyan" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link waves-light active" data-toggle="tab" href="#panel51" role="tab">Active Packages</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link waves-light" data-toggle="tab" href="#panel52" role="tab">Past Packages</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Tab panels -->
                    <div class="tab-content card">

                        <!--Panel 1-->
                        <div class="tab-pane fade in show active" id="panel51" role="tabpanel">
                            <!--Accordion wrapper-->
                            <div class="accordion" id="activepackages" role="tablist" aria-multiselectable="true">
                            </div>
                            <!--/.Accordion wrapper-->

                        </div>
                        <!--/.Panel 1-->

                        <!--Panel 2-->
                        <div class="tab-pane fade" id="panel52" role="tabpanel">
                            <!--Accordion wrapper-->
                            <div class="accordion" id="pastpackages" role="tablist" aria-multiselectable="true">
                            </div>
                            <!--/.Accordion wrapper-->                            
                        </div>
                        <!--/.Panel 2-->

                    </div>  
                </div>
            </div>
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
    <script type="text/javascript" src="{{asset('js/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/vendor/datatables/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('js/toastr.js')}}"></script>
    <script src="{{asset('js/jquery.validate.js')}}"></script>
    <script src="{{asset('js/ckeditor.js')}}"></script>
    <!--Custom scripts-->
    @yield('js')
    <script>
        $(document).ready(function(){
            updates();
        });
        function perms(){
            return $.ajax({
            type: "GET",
            url: "/admin/getperms",
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            async: false,
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                alert("Request: " + JSON.stringify(XMLHttpRequest) + "\n\nStatus: " + textStatus + "\n\nError: " + errorThrown);
            },
            success: function (result) {
                //console.log("success",result);
            }
        }).responseJSON;
        }

        function sliders(){
            $('#breadcrumb').text('Sliders');
            $sliders=$.get('{{route("sliders.index")}}',function(data){
                if(data.error!=undefined){
                    toastr['error'](data.error);
                }else{
                showtable('sliders',data);
                }
            });
        }
        function admins(){
            $('#breadcrumb').text('Users');
            $admins=$.get('{{route("admins.index")}}',function(data){
                if(data.error!=undefined){
                    toastr['error'](data.error);
                }else{
                showtable('admins',data,perms());
                }
            });
        }
        function permissions(){
            $('#breadcrumb').text('Permissions');
            $permissions=$.get('{{route("permissions.index")}}',function(data){
                if(data.error!=undefined){
                    toastr['error'](data.error);
                }else{
                showtable('permissions',data,perms());
                }
            });
        }
        function roles(){
            $('#breadcrumb').text('Roles');
            $roles=$.get('{{route("roles.index")}}',function(data){
                if(data.error!=undefined){
                    toastr['error'](data.error);
                }else{
                showtable('roles',data,perms());
                }
            });
        }

        function guides(){
            $('#breadcrumb').text('Guides');
            $guides=$.get('{{route("guides.index")}}',function(data){
                if(data.error!=undefined){
                    toastr['error'](data.error);
                }else{
                showtable('guides',data);
                }
            });
        }

        function types(){
            $('#breadcrumb').text('Types');
            $types=$.get('{{route("types.index")}}',function(data){
                if(data.error!=undefined){
                    toastr['error'](data.error);
                }else{
                showtable('types',data);
                }
            });
        }

        function packages(){
            $('#breadcrumb').text('Packages');
            $packages=$.get('{{route("packages.index")}}',function(data){
                if(data.error!=undefined){
                    toastr['error'](data.error);
                }else{
                showtable('packages',data);
                }
            });
        }

        function blogs(){
            $('#breadcrumb').text('Blogs');
            $blogs=$.get('{{route("blogs.index")}}',function(data){
                if(data.error!=undefined){
                    toastr['error'](data.error);
                }else{
                showtable('blogs',data);
                }
            });
        }

        function tickets(){
            $('#breadcrumb').text('Tickets');
            $tickets=$.get('{{route("tickets.index")}}',function(data){
                if(data.error!=undefined){
                    toastr['error'](data.error);
                }else{
                showtable('tickets',data);
                }
            });
        }

        function services(){
            $('#breadcrumb').text('Services');
            $services=$.get('{{route("services.index")}}',function(data){
                if(data.error!=undefined){
                    toastr['error'](data.error);
                }else{
                showtable('services',data);
                }
            });
        }

        function customers(){
            $('#breadcrumb').text('Customers');
            $services=$.get('{{route("customers.index")}}',function(data){
                if(data.error!=undefined){
                    toastr['error'](data.error);
                }else{
                showtable('customers',data);
                }
            });
        }

        function states(){
            $('#breadcrumb').text('States');
            $services=$.get('{{route("states.index")}}',function(data){
                if(data.error!=undefined){
                    toastr['error'](data.error);
                }else{
                showtable('states',data);
                }
            });
        }

        function marketplaces(){
            $('#breadcrumb').text('MarketPlaces');
            $services=$.get('{{route("marketplaces.index")}}',function(data){
                if(data.error!=undefined){
                    toastr['error'](data.error);
                }else{
                showtable('marketplaces',data);
                }
            });
        }

        function monthlysales(){
            $('#breadcrumb').text('MonthlySales');
            $services=$.get('{{route("monthlysales.index")}}',function(data){
                if(data.error!=undefined){
                    toastr['error'](data.error);
                }else{
                showtable('monthlysales',data);
                }
            });
        }

        function fulfillments(){
            $('#breadcrumb').text('FulFillments');
            $services=$.get('{{route("fulfillments.index")}}',function(data){
                if(data.error!=undefined){
                    toastr['error'](data.error);
                }else{
                showtable('fulfillments',data);
                }
            });
        }

        function categoriesdeals(){
            $('#breadcrumb').text('CategoriesDeals');
            $services=$.get('{{route("categoriesdeals.index")}}',function(data){
                if(data.error!=undefined){
                    toastr['error'](data.error);
                }else{
                showtable('categoriesdeals',data);
                }
            });
        }
        function devices(){
            $('#breadcrumb').text('Devices');
            $services=$.get('{{route("devices.index")}}',function(data){
                if(data.error!=undefined){
                    toastr['error'](data.error);
                }else{
                showtable('devices',data,perms());
                }
            });
        }
        
        function updates(){
            $('#breadcrumb').text('Updates');
            $services=$.get('{{route("updates.index")}}',function(data){
                if(data.error!=undefined){
                    toastr['error'](data.error);
                }else{
                showtable('updates',data,perms());
                }
            });
        }

        function showtable(module,data,perms){
            tablehtml=getTableStart(module,perms);
            tablehtml+=prepareheader(module);
            tablehtml+='<tbody>'+preparebody(module,data,perms)+'</tbody>';
            tablehtml+='</table>';
            tablehtml+='</div></div>';
            $('#maincontent').html(tablehtml);
            $('.datatable').DataTable( {
                    "order": [[ 0, "desc" ]],
                    dom: 'lBfrtip',
                    "columnDefs": [
                        datatableColdef(module)
                    ]
                } );
        }
        function getTableStart(module,perms){
            var createbutton='';
            var mod='';
            if(module=='users'){
                mod='admins';
            }else{
                mod=module;
            }
            if($.inArray('create'+mod,perms)!=-1){
                createbutton='<h3 class="card-title"><button type="button" class="btn btn-outline-info waves-effect" onclick="createModal(\''+module+'\')">Create</button></h3>';
            }else{
                createbutton='';
            }
            tablehtml='<div class="card"><div class="card-body">'+createbutton+'<table class="table table-striped table-bordered datatable" cellspacing="0" width="100%">';
            switch (module){
                case 'sliders':
                    
                    break;
                case 'admins':
                    
                    break;
                case 'permissions':
                    
                    break;
                case 'roles':
                    
                    break;
                case 'guides':
                    
                    break;
                case 'types':
                    
                    break;
                case 'packages':
                    
                    break;
                case 'blogs':
                    
                    break;
                case 'tickets':
                    
                    break;
                case 'services':
                    
                    break;
                case 'customers':
                    tablehtml='<div class="card"><div class="card-body"><table class="table table-striped table-bordered datatable" cellspacing="0" width="100%">';
                    break;
                case 'states':
                    
                    break;
                case 'marketplaces':
                    
                    break;
                case 'monthlysales':
                    
                    break;
                case 'fulfillments':
                    
                    break;
                case 'categoriesdeals':
                    
                    break;
                case 'devices':
                    
                    break;
                case 'updates':
                    
                    break;                                                                
            }
            return tablehtml;
        }
        function datatableColdef(module){
            columnDefs={};
            switch (module) {
                case 'sliders':
                    columnDefs={
                            "targets": [ 0 ],
                            "visible": false,
                            "searchable": true
                        };
                    break;
                case 'admins':
                    columnDefs={
                            "targets": [ 0,4 ],
                            "visible": false,
                            "searchable": true
                        };
                    break;
                case 'permissions':
                    columnDefs={
                            "targets": [ 0 ],
                            "visible": false,
                            "searchable": true
                        };
                    break;
                case 'roles':
                    columnDefs={
                            "targets": [ 0,4 ],
                            "visible": false,
                            "searchable": true
                        };
                    break;
                case 'guides':
                    columnDefs={
                            "targets": [ 0 ],
                            "visible": false,
                            "searchable": true
                        };
                    break;
                case 'types':
                    columnDefs={
                            "targets": [ 0,2 ],
                            "visible": false,
                            "searchable": true
                        };
                    break;
                case 'packages':
                    columnDefs={
                            "targets": [ 0,7 ],
                            "visible": false,
                            "searchable": true
                        };
                    break;
                case 'blogs':
                    columnDefs={
                            "targets": [ 0 ],
                            "visible": false,
                            "searchable": true
                        };
                    break;                        
                case 'tickets':
                    columnDefs={
                            "targets": [ 0 ],
                            "visible": false,
                            "searchable": true
                        };
                    break;
                case 'services':
                    columnDefs={
                            "targets": [ 0 ],
                            "visible": false,
                            "searchable": true
                        };
                    break;
                case 'customers':
                    columnDefs={
                            "targets": [ 0 ],
                            "visible": false,
                            "searchable": true
                        };
                    break;        
                case 'states':
                    columnDefs={
                            "targets": [ 0 ],
                            "visible": false,
                            "searchable": true
                        };
                    break;
                case 'marketplaces':
                    columnDefs={
                            "targets": [ 0 ],
                            "visible": false,
                            "searchable": true
                        };
                    break;
                case 'monthlysales':
                    columnDefs={
                            "targets": [ 0 ],
                            "visible": false,
                            "searchable": true
                        };
                    break;
                case 'fulfillments':
                    columnDefs={
                            "targets": [ 0 ],
                            "visible": false,
                            "searchable": true
                        };
                    break;
                case 'categoriesdeals':
                    columnDefs={
                            "targets": [ 0 ],
                            "visible": false,
                            "searchable": true
                        };
                    break;
                case 'devices':
                    columnDefs={
                            "targets": [ 0 ],
                            "visible": false,
                            "searchable": true
                        };
                    break;
                case 'updates':
                    columnDefs={
                            "targets": [ 0 ],
                            "visible": false,
                            "searchable": true
                        };
                    break;        
                case 'somecase':
                    headers = "Monday";
                    break;

            }

            return columnDefs;
        }
        function prepareheader(module){
            headers=getheaders(module);
            th='<thead>';
            $.each(headers,function(key,value){
                th+='<th>'+value+'</th>';
            });
            th+='<th>Actions</th>';
            th+='</thead>';
            return th;
        }
        function getheaders(module){
            switch (module) {
                case 'sliders':
                    headers =['id','Image','Caption Header','Caption','isActive'] ;
                    break;
                case 'admins':
                    headers = ['id','Name','Email','Devices','Role Id','Role'];
                    break;
                case 'permissions':
                    headers = ['id','Name','Display Name','Description'];
                    break;
                case 'roles':
                    headers = ['id','Name','Display Name','Description','permission_ids','Permissions'];
                    break;
                case 'guides':
                    headers = ['id','Image','Name','Topics','Content'];
                    break;
                case 'types':
                    headers = ['id','Name','Guide Id','Guides'];
                    break;
                case 'packages':
                    headers = ['id','Image','Title','Description','Badge','Duration','Pricing','Type ids','Type name','Startdatetime','Enddatetime'];
                    break;
                case 'blogs':
                    headers = ['id','Title','Image','Content','Posted By','Created At'];
                    break;                    
                case 'tickets':
                    headers = ['id','Ref. Number','Title','Status','Description','Type','Assigned To'];
                    break;
                case 'services':
                    headers = ['id','Image','Title','Description'];
                    break;
                case 'customers':
                    headers = ['id','Full Name','Email','Contact','Address','Email Verified','Contact Verified'];
                    break;
                case 'states':
                    headers = ['id','Name'];
                    break;
                case 'marketplaces':
                    headers = ['id','Name'];
                    break;
                case 'monthlysales':
                    headers = ['id','Name'];
                    break;
                case 'fulfillments':
                    headers = ['id','Name'];
                    break;
                case 'categoriesdeals':
                    headers = ['id','Name','isGroupHeader'];
                    break;
                case 'devices':
                    headers = ['id','Name','Model','Maintainer'];
                    break;
                case 'updates':
                    headers = ['id','Build Version','ZipLink','ChangeLog','XDA Thread Link','Device Model','Device Name'];
                    break;                                
                case 'somecase':
                    headers = "Monday";
                    break;
            }
            return headers;
        }
        function preparebody(module,data,perms){
            if(data.length==0){
               return '';
            }else{
                var tbody='';
                $.each(data,function(key,row){
                    tbody+='<tr>';
                    $.each(row,function(index,value){
                        tbody+='<td>'+preparetag(value)+'</td>';
                    })
                    tbody+=getActions(module,row,perms);
                    tbody+='</tr>';
                });
               return tbody; 
            }
        }

        function getActions(module,row,perms){
            var editbutton='';
            var deletebutton='';
            var mod='';
            if(module=='users'){
                mod='admins';
            }else{
                mod=module;
            }
            if($.inArray('edit'+mod,perms)!=-1){
                editbutton='<button class="btn btn-outline-default waves-effect" onclick="editRow(\''+module+'\',\''+row.id+'\')">Edit</button>';
            }else{
                editbutton='';
            }
            if($.inArray('delete'+mod,perms)!=-1){
                deletebutton='<button class="btn btn-outline-danger waves-effect" onclick="destroyRow(\''+module+'\',\''+row.id+'\')">Delete</button>';
            }else{
                deletebutton='';
            }
            tbody='<td>'+editbutton+deletebutton+'</td>';
            switch (module){
                case 'sliders':
                    
                    break;
                case 'admins':
                    
                    break;
                case 'permissions':
                    
                    break;
                case 'roles':
                    
                    break;
                case 'guides':
                    
                    break;
                case 'types':
                    
                    break;
                case 'packages':
                    
                    break;
                case 'blogs':
                    
                    break;
                case 'tickets':
                    tbody='<td>'+editbutton+deletebutton+'<button class="btn btn-outline-warning waves-effect" onclick="showHistory(\''+module+'\',\''+row.id+'\')">History</button></td>';
                    break;
                case 'services':
                    
                    break;
                case 'customers':
                    tbody='<td><button class="btn btn-outline-warning waves-effect" onclick="showPackage(\''+module+'\',\''+row.id+'\')">View Packages</button></td>';
                    break;
                case 'states':
                    
                    break;
                case 'marketplaces':
                    
                    break;
                case 'monthlysales':
                    
                    break;
                case 'fulfillments':
                    
                    break;
                case 'categoriesdeals':
                    
                    break;
                case 'devices':
                    
                    break;
                case 'updates':
                    
                    break;                                                        
            }
            return tbody;
        }
        function preparetag(value){
            if(checkURL(value)){
                return '<img src="'+value+'" class="img-thumbnail" width="200px" height="auto">';
            }else if(isHTML(value)){
                try{
                    htmlstr='';
                    htmlstrlist=$.parseJSON(value);
                    //console.log(htmlstrlist);
                    $.each(htmlstrlist,function(key,val){
                        htmlstr+=val;
                        //console.log(val);
                    });
                    //console.log('<iframe srcdoc="'+htmlstr+'" height="200" width="300"></iframe>');
                    return '<iframe srcdoc="'+htmlstr+'" height="200" width="300"></iframe>';
                }catch(e){
                    return value;
                }
            }else{
                try {
                    json = $.parseJSON(value);
                    return json;
                } catch (e) {
                    return value;
                }
                
            }
        }
        function checkURL(url) {
            url=url.toString();
            return(url.match(/\.(jpeg|jpg|gif|png)$/) != null);
        }
        function isHTML(str) {
          var a = document.createElement('div');
          a.innerHTML = str;

          for (var c = a.childNodes, i = c.length; i--; ) {
            if (c[i].nodeType == 1) return true; 
          }

          return false;
        }
        // SideNav Initialization
        $(".button-collapse").sideNav();

        var container = document.getElementById('slide-out');
        Ps.initialize(container, {
            wheelSpeed: 2,
            wheelPropagation: true,
            minScrollbarLength: 20
        });
        function getEditForm(module,id,options){
            switch (module) {
                case 'sliders':
                    form ='<form method="post" action="/admin/sliders/'+id+'/update" id="editModalForm" enctype="multipart/form-data">';
                    form+='<div class="md-form"> <img id="edit-preview-image" src="#" class="img-fluid preview-image" alt="not found"> </div> <div class="md-form"> <div class="file-field"> <div class="btn btn-primary btn-sm"> <span>Choose file</span> <input type="file" name="image" onchange="encodeImageFileAsURL(this)"> </div> <div class="file-path-wrapper"> <input class="file-path validate" type="text" placeholder="Upload your file"> </div> </div> </div> <div class="md-form"> <i class="fa fa-hashtag prefix grey-text"></i> <input type="text" class="form-control" name="captionheader" required> <label>Header</label> </div> <div class="md-form"> <i class="fa fa-hashtag prefix grey-text"></i> <input type="text" class="form-control" name="caption" required> <label>Caption</label> </div> <div class="md-form form-inline"> <div class="form-group"> isActive </div> <div class="form-group"> <input name="isActive" type="radio" id="option1" value="yes"> <label for="option1">Yes</label> </div> <div class="form-group"> <input name="isActive" type="radio" id="option2" value="no"> <label for="option2">No</label> </div> </div><button type="submit" id="formsubmit" style="display:none;">';
                    form+='</form>' ;
                    break;
                case 'admins':
                    form ='<form method="post" action="/admin/admins/'+id+'/update" id="editModalForm" enctype="multipart/form-data">';
                    form+='<div class="md-form"> <i class="fa fa-user prefix grey-text"></i> <input type="text" name="name" class="form-control" required> <label>Full name</label> </div> <div class="md-form"> <i class="fa fa-envelope prefix grey-text"></i> <input type="text" name="email" class="form-control" required> <label>Email</label> </div> <div class="md-form"> <i class="fa fa-lock prefix grey-text"></i> <input type="password" name="password" class="form-control" required> <label>Password</label> </div> <div class="md-form"> <i class="fa fa-lock prefix grey-text"></i> <input type="password" name="cnf-password" class="form-control" required> <label>Confirm password</label> </div><div class="md-form"><select class="mdb-select" name="device_id[]" multiple required><option selected disabled>-- select device --</option>'+options+'</select></div></div><button type="submit" id="formsubmit" style="display:none;">'; 
                    form+='</form>';
                    break;
                case 'permissions':
                    form ='<form method="post" action="/admin/permissions/'+id+'/update" id="editModalForm" enctype="multipart/form-data">';
                    form+='<div class="md-form"> <i class="fa fa-user prefix grey-text"></i> <input type="text" name="name" class="form-control" required> <label>Permission name</label> </div> <div class="md-form"> <i class="fa fa-envelope prefix grey-text"></i> <input type="text" name="display_name" class="form-control" required> <label>Display Name</label> </div> <div class="md-form"> <i class="fa fa-pencil prefix"></i><textarea type="text" name="description" class="md-textarea"></textarea><label>Description</label> </div> </div><button type="submit" id="formsubmit" style="display:none;">'; 
                    form+='</form>';
                    break;
                case 'roles':
                    form ='<form method="post" action="/admin/roles/'+id+'/update" id="editModalForm" enctype="multipart/form-data">';
                    form+='<div class="md-form"> <i class="fa fa-user prefix grey-text"></i> <input type="text" name="name" class="form-control" required> <label>Permission name</label> </div> <div class="md-form"> <i class="fa fa-envelope prefix grey-text"></i> <input type="text" name="display_name" class="form-control" required> <label>Display Name</label> </div> <div class="md-form"> <i class="fa fa-pencil prefix"></i><textarea  name="description" class="md-textarea"></textarea><label>Description</label> </div><div class="md-form"><select class="mdb-select" name="permission_id[]" multiple required>'+options+'</select></div> </div><button type="submit" id="formsubmit" style="display:none;">'; 
                    form+='</form>';
                    break;        
                case 'guides':
                    form = '<form method="post" action="/admin/guides/'+id+'/update" id="editModalForm" enctype="multipart/form-data">';
                    form+='<div class="md-form"> <img id="edit-preview-image" src="#" class="img-fluid preview-image" alt="not found"> </div> <div class="md-form"> <div class="file-field"> <div class="btn btn-primary btn-sm"> <span>Choose file</span> <input type="file" name="image" onchange="encodeImageFileAsURL(this)"> </div> <div class="file-path-wrapper"> <input class="file-path validate" type="text" placeholder="Upload your file"> </div> </div> </div><div class="md-form"> <i class="fa fa-book prefix grey-text"></i> <input type="text" name="name" class="form-control" required> <label>Guide Name</label></div>'+options+'<div class="md-form"><button type="button" class="btn btn-primary" onclick="generateTextEditors(this)">Add New Topic</button></div></div><button type="submit" id="formsubmit" style="display:none;">';
                    form+='</form>';
                    break;
                case 'types':
                    form ='<form method="post" action="/admin/types/'+id+'/update" id="editModalForm" enctype="multipart/form-data">';
                    form+='<div class="md-form"> <i class="fa fa-user prefix grey-text"></i> <input type="text" name="name" class="form-control" required> <label>Type Name</label> </div> <div class="md-form"><select class="mdb-select" name="guide_id[]" multiple required>'+options+'</select></div> </div><button type="submit" id="formsubmit" style="display:none;">'; 
                    form+='</form>';
                    break;
                case 'packages':    
                    form ='<form method="post" action="/admin/packages/'+id+'/update" id="editModalForm" enctype="multipart/form-data">';
                    form+='<div class="md-form"> <img id="edit-preview-image" src="#" class="img-fluid preview-image" alt="not found"> </div> <div class="md-form"> <div class="file-field"> <div class="btn btn-primary btn-sm"> <span>Choose file</span> <input type="file" name="image" onchange="encodeImageFileAsURL(this)"> </div> <div class="file-path-wrapper"> <input class="file-path validate" type="text" placeholder="Upload your file"> </div> </div> </div><div class="md-form"> <i class="fa fa-user prefix grey-text"></i> <input type="text" name="title" class="form-control" required> <label>Title</label> </div><div class="md-form"> <i class="fa fa-pencil prefix"></i><textarea  name="description" class="md-textarea"></textarea><label>Description</label> </div><div class="md-form"><select class="mdb-select" name="badge" required> <option value="" disabled selected>Choose your option</option> <option value="new">New</option> <option value="premium">Premium</option> <option value="exclusive">Exclusive</option> </select> <label>Badge</label></div> <div class="md-form"><input placeholder="Select start date" type="text" name="startdate" class="form-control datepicker" required><input placeholder="Select start time" type="text" name="starttime" class="form-control timepicker" required> </div><div class="md-form"><input placeholder="Select end date" type="text" name="enddate" class="form-control datepicker" required><input placeholder="Select end time" type="text" name="endtime" class="form-control timepicker" required> </div><div class="md-form"> <i class="fa fa-user prefix grey-text"></i> <input type="text" name="pricing" class="form-control" required> <label>Pricing</label> </div><div class="range-field"> <i class="fa fa-calendar prefix grey-text"></i> <input type="range" name="duration" min="1" max="365" class="form-control dur-range" required> <label>Package Duration</label> </div> <div class="md-form"><select class="mdb-select" name="type_id[]" multiple required>'+options+'</select></div></div><button type="submit" id="formsubmit" style="display:none;">'; 
                    form+='</form>';
                    break;
                case 'blogs':
                    form ='<form method="post" action="/admin/blogs/'+id+'/update" id="editModalForm" enctype="multipart/form-data">';
                    form+='<div class="md-form"> <i class="fa fa-user prefix grey-text"></i> <input type="text" name="title" class="form-control" required> <label>Title</label> </div><div class="md-form"> <img id="edit-preview-image" src="#" class="img-fluid preview-image" alt="not found"> </div> <div class="md-form"> <div class="file-field"> <div class="btn btn-primary btn-sm"> <span>Choose file</span> <input type="file" name="image" onchange="encodeImageFileAsURL(this)"> </div> <div class="file-path-wrapper"> <input class="file-path validate" type="text" placeholder="Upload your file"> </div> </div> </div><div class="md-form"><textarea name="content" id="editor" class="editor"></textarea></div><button type="submit" id="formsubmit" style="display:none;">';
                    form+='</form>';
                    break;
                case 'tickets':
                    form ='<form method="post" action="/admin/tickets/'+id+'/update" id="editModalForm" enctype="multipart/form-data">';
                    form+='<div class="md-form"> <i class="fa fa-user prefix grey-text"></i><input type="text" name="refnumber" class="form-control" readonly><label>Ref. Number</label> </div><div class="md-form"> <i class="fa fa-user prefix grey-text"></i> <input type="text" name="title" class="form-control" required> <label>Title</label> </div><div class="md-form"><select class="mdb-select" name="status" required> <option value="" disabled selected>Choose your option</option> <option value="raised">Raised</option> <option value="inprocess">in Process</option> <option value="completed">completed</option> </select> <label>Status</label></div> <div class="md-form"> <i class="fa fa-pencil prefix"></i><textarea  name="description" class="md-textarea"></textarea><label>Description</label></div><div class="md-form"><select class="mdb-select" name="type" required> <option value="" disabled selected>Choose your option</option> <option value="type1">type1</option> <option value="type2">type2</option> <option value="type3">type3</option> </select> <label>Ticket Type</label></div><div class="md-form"><select class="mdb-select" name="admin_id" required>'+options+'</select></div><button type="submit" id="formsubmit" style="display:none;">';
                    form+='</form>';
                    break;
                case 'services':
                    form ='<form method="post" action="/admin/services/'+id+'/update" id="editModalForm" enctype="multipart/form-data">';
                    form+='<div class="md-form"> <img id="edit-preview-image" src="#" class="img-fluid preview-image" alt="not found"> </div> <div class="md-form"> <div class="file-field"> <div class="btn btn-primary btn-sm"> <span>Choose file</span> <input type="file" name="image" onchange="encodeImageFileAsURL(this)"> </div> <div class="file-path-wrapper"> <input class="file-path validate" type="text" placeholder="Upload your file"> </div> </div> </div><div class="md-form"> <i class="fa fa-user prefix grey-text"></i> <input type="text" name="title" class="form-control" required> <label>Title</label> </div><div class="md-form"> <i class="fa fa-pencil prefix"></i><textarea  name="description" class="md-textarea"></textarea><label>Description</label> </div><button type="submit" id="formsubmit" style="display:none;">';
                    form+='</form>';
                    break;
                case 'sliders':
                    form ='<form method="post" action="/admin/states/'+id+'/update" id="editModalForm" enctype="multipart/form-data">';
                    form+='<div class="md-form"> <i class="fa fa-flag prefix grey-text"></i> <input type="text" class="form-control" name="name" required> <label>State Name</label> </div> <button type="submit" id="formsubmit" style="display:none;">';
                    form+='</form>' ;
                    break;
                case 'marketplaces':
                    form ='<form method="post" action="/admin/marketplaces/'+id+'/update" id="editModalForm" enctype="multipart/form-data">';
                    form+='<div class="md-form"> <i class="fa fa-flag prefix grey-text"></i> <input type="text" class="form-control" name="name" required> <label>MarketPlace Name</label> </div> <button type="submit" id="formsubmit" style="display:none;">';
                    form+='</form>' ;
                    break;
                case 'monthlysales':
                    form ='<form method="post" action="/admin/monthlysales/'+id+'/update" id="editModalForm" enctype="multipart/form-data">';
                    form+='<div class="md-form"> <i class="fa fa-flag prefix grey-text"></i> <input type="text" class="form-control" name="name" required> <label>MonthlySales Tag Name</label> </div> <button type="submit" id="formsubmit" style="display:none;">';
                    form+='</form>' ;
                    break;
                case 'fulfillments':
                    form ='<form method="post" action="/admin/fulfillments/'+id+'/update" id="editModalForm" enctype="multipart/form-data">';
                    form+='<div class="md-form"> <i class="fa fa-flag prefix grey-text"></i> <input type="text" class="form-control" name="name" required> <label>FulFillment Name</label> </div> <button type="submit" id="formsubmit" style="display:none;">';
                    form+='</form>' ;
                    break;
                case 'categoriesdeals':
                    form ='<form method="post" action="/admin/categoriesdeals/'+id+'/update" id="editModalForm" enctype="multipart/form-data">';
                    form+='<div class="md-form"> <i class="fa fa-flag prefix grey-text"></i> <input type="text" class="form-control" name="name" required> <label>CategoriesDeal Name</label> </div><div class="md-form form-inline"> <div class="form-group"> isGroupHeader </div> <div class="form-group"> <input name="isGroupHeader" type="radio" id="option1" value="yes" required> <label for="option1">Yes</label> </div> <div class="form-group"> <input name="isGroupHeader" type="radio" id="option2" value="no"> <label for="option2">No</label> </div> </div> <button type="submit" id="formsubmit" style="display:none;">';
                    form+='</form>' ;
                    break;
                case 'devices':
                    form ='<form method="post" action="/admin/devices/'+id+'/update" id="editModalForm" enctype="multipart/form-data">';
                    form+='<div class="md-form"> <i class="fa fa-flag prefix grey-text"></i> <input type="text" class="form-control" name="name" required> <label>Device Name</label> </div><div class="md-form">  <i class="fa fa-flag prefix grey-text"></i><input type="text" class="form-control" name="model" required><label>Model</label> </div><button type="submit" id="formsubmit" style="display:none;">';
                    form+='</form>' ;
                    break;
                case 'updates':
                    form ='<form method="post" action="/admin/updates/'+id+'/update" id="editModalForm" enctype="multipart/form-data">';
                    form+='<div class="md-form">  <i class="fa fa-flag prefix grey-text"></i><input type="text" class="form-control" name="buildversion" required><label>Build Version</label> </div><div class="md-form">  <i class="fa fa-flag prefix grey-text"></i><input type="text" class="form-control" name="ziplink" required><label>Zip Link</label> </div><div class="md-form"> <i class="fa fa-pencil prefix"></i><textarea type="text" name="changelog" class="md-textarea"></textarea><label>Change Log</label> </div><div class="md-form">  <i class="fa fa-flag prefix grey-text"></i><input type="text" class="form-control" name="xdathread" required><label>XDA Thread Link</label> </div><button type="submit" id="formsubmit" style="display:none;">';
                    form+='</form>' ;
                    break;                             
                case 'somecase':
                    headers = "Monday";
                    break;
            }
            return form;
        }
        
        function putEditData(module,data){
            $('#editModalForm').append($('#csrf').html());
            //$('#editModalForm').append($('#put').html());
            $.each($('#editModalForm input'),function(key,value){
                //console.log(key+' : '+value.type);
                if(value.type=='text'){
                    if(data[value.name]!=undefined){
                    value.setAttribute('value',data[value.name]);
                    $element=$(value);
                    label=$element.next('label');
                    label.addClass('active');
                    }else{
                        console.log('could not set value in text field.');
                    }
                }else if(value.type=='radio'){
                    if(data[value.name]!=undefined){
                        if(value.value==data[value.name]){
                            value.setAttribute('checked','checked');
                        }
                    }
                }else if(value.type=='file'){
                    if(data[value.name]!=undefined){
                        $('#editModalForm').find('img:first').attr('src',data[value.name]);
                    }
                }else if(value.type=='range'){
                    if(data[value.name]!=undefined){
                    value.setAttribute('value',data[value.name]);
                    $element=$(value);
                    label=$element.next('label');
                    label.text('Days ('+data[value.name]+'}');
                    }else{
                        console.log('could not set value in range field.');
                    }
                }
            });
            $.each($('#editModalForm textarea'),function(key,value){
                if(data[value.name]!=undefined){
                    $(value).text(data[value.name]);
                    $element=$(value);
                    label=$element.next('label');
                    label.addClass('active');
                }else{
                        console.log('could not set value in textarea');    
                    }
            });
            //{"id":2,"name":"ram lakhan","email":"ram@laravel.com","role_id":2,"rolename":"Support Member"}
            //data={"id":5,"name":"bannerman","display_name":"Banner Man","description":"role enables banner CRUD","permission_id":[1,2,3,6],"permissions":"Create Slider,Edit Slider,Delete Slider,View Sliders"};
            $.each($('#editModalForm select'),function(key,value){
                if(data[value.name]!=undefined){
                    $(value).children('option').each(function(index,inrvalue){
                    //console.log(inrvalue);
                    if($(inrvalue).val()==data[value.name]){
                        //console.log('match');
                        $(inrvalue).attr('selected','selected');
                    }else if(jQuery.inArray( parseInt($(inrvalue).val()), data[value.name] )!=-1){
                        $(inrvalue).attr('selected','selected');
                    }else{
                        //console.log('could not match.');
                    }
                    });
                }
                else{
                        console.log('could not set value in select field.');
                }
            });
                        
        }
        function encodeImageFileAsURL(element) {
          var file = element.files[0];
          var reader = new FileReader();
          reader.onloadend = function() {
            //console.log('RESULT', reader.result);
            $('.preview-image').attr('src',reader.result);
            $('#editModalForm').append('<input type="hidden" name="imagestring" value="'+reader.result+'" />');
            $('#createModalForm').append('<input type="hidden" name="imagestring" value="'+reader.result+'" />');
          }
          reader.readAsDataURL(file);
        }
        function formPost(module){
            $('#editModalForm').submit(function(e){
            if($.inArray(module,['guides','blogs'])!=-1){
                editTEChangeListener();    
            }
            e.preventDefault();     
            }).validate({
                submitHandler:function(form){
                    //console.log(form);
                    var $form = $(form);
                    $.ajaxSetup({
                      headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                    });
                    $.ajax({
                        type:"POST",
                        url:$form.attr("action"),
                        data:$form.serialize(),
                        success: function(response){
                            //console.log(response);
                            if(response.error!=undefined){
                                toastr['error'](response.error);
                            }else{
                            $('#editModal').modal('toggle');
                            refresh(module);
                            toastr[response.msgtype](response.body);
                            }
                        }    
                    });
                return false;
                }
            });
            
        }
        function refresh(module){
            switch (module){
                case 'sliders':
                    sliders();
                    break;
                case 'admins':
                    admins();
                    break;
                case 'permissions':
                    permissions();
                    break;
                case 'roles':
                    roles();
                    break;
                case 'guides':
                    guides();
                    break;
                case 'types':
                    types();
                    break;
                case 'packages':
                    packages();
                    break;
                case 'blogs':
                    blogs();
                    break;
                case 'tickets':
                    tickets();
                    break;
                case 'services':
                    services();
                    break;
                case 'customers':
                    customers();
                    break;
                case 'states':
                    states();
                    break;
                case 'marketplaces':
                    marketplaces();
                    break;
                case 'monthlysales':
                    monthlysales();
                    break;
                case 'fulfillments':
                    fulfillments();
                    break;
                case 'categoriesdeals':
                    categoriesdeals();
                    break;
                case 'devices':
                    devices();
                    break;
                case 'updates':
                    updates();
                    break;    
            }
        }
        function makeOptions(options){
            htmloptions='';
            $.each(options,function(key,value){
                htmloptions+='<option value="'+value.id+'">'+((value.display_name != undefined) ? value.display_name : value.name)+'</option>';
            });
            return htmloptions;
        }
        function modalClass(module){
            switch(module){
                case 'sliders':
                    
                    break;
                case 'admins':

                    break;
                case 'permissions':
                    
                    break;
                case 'roles':
                    
                    break;
                case 'guides':
                    if(!$('#editModal').find(".modal-dialog").hasClass('modal-fluid')){
                        $('#editModal').find(".modal-dialog").addClass('modal-fluid');
                    }
                    if(!$('#createModal').find(".modal-dialog").hasClass('modal-fluid')){
                        $('#createModal').find(".modal-dialog").addClass('modal-fluid');
                    }
                    break;
                case 'types':
                    
                    break;
                case 'packages':
                    
                    break;
                case 'blogs':
                    if(!$('#editModal').find(".modal-dialog").hasClass('modal-lg')){
                        $('#editModal').find(".modal-dialog").addClass('modal-lg');
                    }
                    if(!$('#createModal').find(".modal-dialog").hasClass('modal-lg')){
                        $('#createModal').find(".modal-dialog").addClass('modal-lg');
                    }
                    break;
                case 'tickets':
                    
                    break;
                case 'services':
                    
                    break;
                case 'customers':
                    
                    break;
                case 'states':
                    
                    break;
                case 'marketplaces':
                    
                    break;
                case 'monthlysales':
                    
                    break;
                case 'fulfillments':
                    
                    break;
                case 'categoriesdeals':
                    
                    break;
                case 'devices':
                    
                    break;
                case 'updates':
                    
                    break;                                            
            }
        }

        function editTextEditors(data){
            editorhtml='';
            try{
              console.log('trying');  
              json=$.parseJSON(data['topics']);
              //console.log(json);
              $.each(json,function(index,innerhtml){
                    console.log('begin');
                    edtrid=uuidv4();
                    editorhtml+='<div class="md-form"> <i class="fa fa-list prefix grey-text"></i> <input type="text" name="topics[]" value="'+innerhtml+'" class="form-control" required> <label class="active">Topic Name</label></div><div class="md-form"><textarea name="content[]" id="'+edtrid+'" class="editor">'+$.parseJSON(data['content'])[index]+'</textarea></div>';
                    console.log('instances updated');
                    //console.log(index+'=>'+innerhtml);
                   
              });  
            }catch(e){
                console.log(e+'could not set value in textarea.');
            }
            
        return editorhtml;    
        }
        function editInitTextEditors(){
            $.each($('#editModalForm textarea'),function(key,value){
                editorid=$(value).attr('id');
                CKEDITOR.replace(editorid);
            });
        }
        function editTEChangeListener(){
            if($('#editModalForm textarea').length>0){
                $.each($('#editModalForm textarea'),function(key,value){
                    editorid=$(value).attr('id');
                    $("#"+editorid).text(CKEDITOR.instances[editorid].getData());
                });
            }
        }

        function editRowOptions(module){
            response='sliders';
            switch (module){
                case 'sliders':
                    
                    break;
                case 'admins':
                    response='getdevices';
                    break;
                case 'permissions':
                    
                    break;
                case 'roles':
                    response='permissions';
                    break;
                case 'guides':
                    break;
                case 'types':
                    response='guides';
                    break;
                case 'packages':
                    response='types';
                    break;
                case 'blogs':
                    
                    break;
                case 'tickets':
                    response='admins/get/support';
                    break;
                case 'services':
                    
                    break;
                case 'customers':
                    
                    break;
                case 'states':
                    
                    break;
                case 'marketplaces':
                    
                    break;
                case 'monthlysales':
                    
                    break;
                case 'fulfillments':
                    
                    break;
                case 'categoriesdeals':
                    
                    break;
                case 'devices':
                    
                    break;
                case 'updates':
                    
                    break;                                                    
            }
            return response;
        }

        function editRow(module,id){
            options='';
            editrowoptions=editRowOptions(module);
            $.when( $.ajax(module+'/'+id), $.ajax( "/admin/"+editrowoptions+"/" ) ).done(function( data, response ) {
              //console.log(data[0]);
              console.log(response[0]);
              options+=makeOptions(response[0]);
              
              if(module=='guides'){
                options=editTextEditors(data[0]);
              }
              //console.log(options);
              $('#editModalbody').html(getEditForm(module,id,options));
                putEditData(module,data[0]);
                if($.inArray(module,['guides','blogs'])!=-1){
                editInitTextEditors();
                }
                if(module=='packages'){
                    $('.timepicker').pickatime({
                        twelvehour: true
                    });
                    $('.datepicker').pickadate();
                    $('.dur-range').on('change input', function() {
                      var $this = $(this);
                      $this.siblings('label').html('Days (' + $this.val() + ')');
                    });
                }
                //$('.mdb-select').append(options);
                $('.mdb-select').material_select();
                modalClass(module);
                $('#editModal').modal('toggle');
                formPost(module);
            });
        }

        function initTextEditor(){
            CKEDITOR.replace('editor');
        }
        function createTEChangeListener(){
            $.each($('#createModalForm textarea'),function(key,value){
                    editorid=$(value).attr('id');
                    $("#"+editorid).text(CKEDITOR.instances[editorid].getData());
            });    
        }
        function createModal(module){
            $('#createModalbody').html(getCreateForm(module));
            $('#createModalForm').append($('#csrf').html());
            modalClass(module);
            if($.inArray(module,['guides','blogs'])!=-1){
                initTextEditor();
            }
            if(module=='packages'){
                $('.timepicker').pickatime({
                    twelvehour: true
                });
                $('.datepicker').pickadate();
                $('.dur-range').on('change input', function() {
                  var $this = $(this);
                  $this.siblings('label').html('Days (' + $this.val() + ')');
                });
            }
            $('#createModal').modal('toggle');
            createformPost(module);
        }
        function getCreateForm(module){
            switch (module) {
                case 'sliders':
                    form ='<form method="post" action="{{route('sliders.save')}}" id="createModalForm" enctype="multipart/form-data">';
                    form+='<div class="md-form"> <img src="#" class="img-fluid preview-image" alt="preview"> </div> <div class="md-form"> <div class="file-field"> <div class="btn btn-primary btn-sm"> <span>Choose file</span> <input type="file" name="image" onchange="encodeImageFileAsURL(this)" required> </div> <div class="file-path-wrapper"> <input class="file-path validate" type="text" placeholder="Upload your file"> </div> </div> </div> <div class="md-form"> <i class="fa fa-hashtag prefix grey-text"></i> <input type="text" class="form-control" name="captionheader" required> <label>Header</label> </div> <div class="md-form"> <i class="fa fa-hashtag prefix grey-text"></i> <input type="text" class="form-control" name="caption" required> <label>Caption</label> </div> <div class="md-form form-inline"> <div class="form-group"> isActive </div> <div class="form-group"> <input name="isActive" type="radio" id="option1" value="yes" required> <label for="option1">Yes</label> </div> <div class="form-group"> <input name="isActive" type="radio" id="option2" value="no"> <label for="option2">No</label> </div> </div><button type="submit" id="createformsubmit" style="display:none;">';
                    form+='</form>' ;
                    break;
                case 'admins':
                    options='';
                    select=$.get('/admin/getdevices/',function(response){
                        options+=makeOptions(response);
                        $('.mdb-select').append(options);
                        $('.mdb-select').material_select();
                    });
                    form ='<form method="post" action="{{route('admins.save')}}" id="createModalForm" enctype="multipart/form-data">';
                    form+='<div class="md-form"> <i class="fa fa-user prefix grey-text"></i> <input type="text" name="name" class="form-control" required> <label>Full name</label> </div> <div class="md-form"> <i class="fa fa-envelope prefix grey-text"></i> <input type="text" name="email" class="form-control" required> <label>Email</label> </div> <div class="md-form"> <i class="fa fa-lock prefix grey-text"></i> <input type="password" name="password" class="form-control" required> <label>Password</label> </div> <div class="md-form"> <i class="fa fa-lock prefix grey-text"></i> <input type="password" name="cnf-password" class="form-control" required> <label>Confirm password</label> </div><div class="md-form"><select class="mdb-select" name="device_id[]" multiple required><option selected disabled>-- select device --</option>'+options+'</select></div></div><button type="submit" id="createformsubmit" style="display:none;">'; 
                    form+='</form>';
                    break;
                case 'permissions':
                    form ='<form method="post" action="{{route('permissions.save')}}" id="createModalForm" enctype="multipart/form-data">';
                    form+='<div class="md-form"> <i class="fa fa-user prefix grey-text"></i> <input type="text" name="name" class="form-control" required> <label>Permission name</label> </div> <div class="md-form"> <i class="fa fa-envelope prefix grey-text"></i> <input type="text" name="display_name" class="form-control" required> <label>Display Name</label> </div> <div class="md-form"> <i class="fa fa-pencil prefix"></i><textarea type="text" name="description" class="md-textarea"></textarea><label>Description</label> </div> </div><button type="submit" id="createformsubmit" style="display:none;">'; 
                    form+='</form>';
                    break;
                case 'roles':
                    options='';
                    select=$.get('/admin/permissions/',function(response){
                        options+=makeOptions(response);
                        $('.mdb-select').append(options);
                        $('.mdb-select').material_select();
                    });
                    form ='<form method="post" action="{{route('roles.save')}}" id="createModalForm" enctype="multipart/form-data">';
                    form+='<div class="md-form"> <i class="fa fa-user prefix grey-text"></i> <input type="text" name="name" class="form-control" required> <label>Role name</label> </div> <div class="md-form"> <i class="fa fa-envelope prefix grey-text"></i> <input type="text" name="display_name" class="form-control" required> <label>Display Name</label> </div> <div class="md-form"> <i class="fa fa-pencil prefix"></i><textarea type="text" name="description" class="md-textarea"></textarea><label>Description</label> </div><div class="md-form"><select class="mdb-select" name="permission_id[]" multiple required>'+options+'</select></div> </div><button type="submit" id="createformsubmit" style="display:none;">'; 
                    form+='</form>';
                    break;            
                case 'guides':
                    form = '<form method="post" action="{{route('guides.save')}}" id="createModalForm" enctype="multipart/form-data">';
                    form+='<div class="md-form"> <img src="#" class="img-fluid preview-image" alt="preview"> </div> <div class="md-form"> <div class="file-field"> <div class="btn btn-primary btn-sm"> <span>Choose file</span> <input type="file" name="image" onchange="encodeImageFileAsURL(this)" required> </div> <div class="file-path-wrapper"> <input class="file-path validate" type="text" placeholder="Upload your file"> </div> </div> </div><div class="md-form"> <i class="fa fa-book prefix grey-text"></i> <input type="text" name="name" class="form-control" required> <label>Guide Name</label></div><div class="md-form"> <i class="fa fa-list prefix grey-text"></i> <input type="text" name="topics[]" class="form-control" required> <label>Topic Name</label></div><div class="md-form"><textarea name="content[]" id="editor" class="editor"></textarea></div><div class="md-form"><button type="button" class="btn btn-primary" onclick="generateTextEditors(this)">Add New Topic</button></div><button type="submit" id="createformsubmit" style="display:none;">';
                    form+= '</form>';
                    break;
                case 'types':
                    options='';
                    select=$.get('/admin/guides/',function(response){
                        options+=makeOptions(response);
                        $('.mdb-select').append(options);
                        $('.mdb-select').material_select();
                    });
                    form ='<form method="post" action="{{route('types.save')}}" id="createModalForm" enctype="multipart/form-data">';
                    form+='<div class="md-form"> <i class="fa fa-user prefix grey-text"></i> <input type="text" name="name" class="form-control" required> <label>Type Name</label> </div> <div class="md-form"><select class="mdb-select" name="guide_id[]" multiple required>'+options+'</select></div> </div><button type="submit" id="createformsubmit" style="display:none;">'; 
                    form+='</form>';
                    break;
                case 'packages':
                    options='';
                    select=$.get('/admin/types/',function(response){
                        options+=makeOptions(response);
                        $('#types-select').append(options);
                        $('.mdb-select').material_select();
                    });    
                    form ='<form method="post" action="{{route('packages.save')}}" id="createModalForm" enctype="multipart/form-data">';
                    form+='<div class="md-form"> <img id="edit-preview-image" src="#" class="img-fluid preview-image" alt="not found"> </div> <div class="md-form"> <div class="file-field"> <div class="btn btn-primary btn-sm"> <span>Choose file</span> <input type="file" name="image" onchange="encodeImageFileAsURL(this)"> </div> <div class="file-path-wrapper"> <input class="file-path validate" type="text" placeholder="Upload your file"> </div> </div> </div><div class="md-form"> <i class="fa fa-user prefix grey-text"></i> <input type="text" name="title" class="form-control" required> <label>Title</label> </div><div class="md-form"> <i class="fa fa-pencil prefix"></i><textarea  name="description" class="md-textarea"></textarea><label>Description</label> </div><div class="md-form"><select class="mdb-select" name="badge" required> <option value="" disabled selected>Choose your option</option> <option value="new">New</option> <option value="premium">Premium</option> <option value="exclusive">Exclusive</option> </select> <label>Badge</label></div> <div class="md-form"><input placeholder="Select start date" type="text" name="startdate" class="form-control datepicker" required><input placeholder="Select start time" type="text" name="starttime" class="form-control timepicker" required> </div><div class="md-form"><input placeholder="Select end date" type="text" name="enddate" class="form-control datepicker" required><input placeholder="Select end time" type="text" name="endtime" class="form-control timepicker" required> </div><div class="md-form"> <i class="fa fa-user prefix grey-text"></i> <input type="text" name="pricing" class="form-control" required> <label>Pricing</label> </div><div class="range-field"> <i class="fa fa-calendar prefix grey-text"></i> <input type="range" name="duration" min="1" max="365" class="form-control dur-range" required> <label>Package Duration</label> </div> <div class="md-form"><select class="mdb-select" id="types-select" name="type_id[]" multiple required>'+options+'</select></div></div><button type="submit" id="createformsubmit" style="display:none;">'; 
                    form+='</form>';
                     break;        
                case 'blogs':
                    form = '<form method="post" action="{{route('blogs.save')}}" id="createModalForm" enctype="multipart/form-data">';
                    form+='<div class="md-form"> <i class="fa fa-user prefix grey-text"></i> <input type="text" name="title" class="form-control" required> <label>Title</label> </div><div class="md-form"> <img id="edit-preview-image" src="#" class="img-fluid preview-image" alt="not found"> </div> <div class="md-form"> <div class="file-field"> <div class="btn btn-primary btn-sm"> <span>Choose file</span> <input type="file" name="image" onchange="encodeImageFileAsURL(this)"> </div> <div class="file-path-wrapper"> <input class="file-path validate" type="text" placeholder="Upload your file"> </div> </div> </div><div class="md-form"><textarea name="content" id="editor" class="editor"></textarea></div><button type="submit" id="createformsubmit" style="display:none;">';
                    form+='</form>';
                    break;
                case 'tickets':
                    options='';
                    select=$.get('/admin/admins/get/support/',function(response){
                        options+=makeOptions(response);
                        $('#support-select').append(options);
                        $('.mdb-select').material_select();
                    });
                    form = '<form method="post" action="{{route('tickets.save')}}" id="createModalForm" enctype="multipart/form-data">';
                    form+='<div class="md-form"> <i class="fa fa-user prefix grey-text"></i> <input type="text" name="title" class="form-control" required> <label>Title</label> </div><div class="md-form"><select class="mdb-select" name="status" required> <option value="" disabled selected>Choose your option</option> <option value="raised">Raised</option> <option value="inprocess">in Process</option> <option value="completed">completed</option> </select> <label>Status</label></div> <div class="md-form"> <i class="fa fa-pencil prefix"></i><textarea  name="description" class="md-textarea"></textarea><label>Description</label></div><div class="md-form"><select class="mdb-select" name="type" required> <option value="" disabled selected>Choose your option</option> <option value="type1">type1</option> <option value="type2">type2</option> <option value="type3">type3</option> </select> <label>Ticket Type</label></div><div class="md-form"><select class="mdb-select" id="support-select" name="admin_id" required>'+options+'</select></div><button type="submit" id="createformsubmit" style="display:none;">';
                    form+='</form>';
                    break;
                case 'services':
                    form = '<form method="post" action="{{route('services.save')}}" id="createModalForm" enctype="multipart/form-data">';
                    form+='<div class="md-form"> <i class="fa fa-user prefix grey-text"></i> <input type="text" name="title" class="form-control" required> <label>Title</label> </div><div class="md-form"> <img id="edit-preview-image" src="#" class="img-fluid preview-image" alt="not found"> </div> <div class="md-form"> <div class="file-field"> <div class="btn btn-primary btn-sm"> <span>Choose file</span> <input type="file" name="image" onchange="encodeImageFileAsURL(this)"> </div> <div class="file-path-wrapper"> <input class="file-path validate" type="text" placeholder="Upload your file"> </div> </div> </div><div class="md-form"> <i class="fa fa-pencil prefix"></i><textarea  name="description" class="md-textarea"></textarea><label>Description</label> </div><button type="submit" id="createformsubmit" style="display:none;">';
                    form+='</form>';
                    break;
                case 'states':
                    form ='<form method="post" action="{{route('states.save')}}" id="createModalForm" enctype="multipart/form-data">';
                    form+='<div class="md-form"> <i class="fa fa-flag prefix grey-text"></i> <input type="text" class="form-control" name="name" required> <label>State Name</label> </div><button type="submit" id="createformsubmit" style="display:none;">';
                    form+='</form>' ;
                    break;
                case 'marketplaces':
                    form ='<form method="post" action="{{route('marketplaces.save')}}" id="createModalForm" enctype="multipart/form-data">';
                    form+='<div class="md-form"> <i class="fa fa-flag prefix grey-text"></i> <input type="text" class="form-control" name="name" required> <label>MarketPlace Name</label> </div><button type="submit" id="createformsubmit" style="display:none;">';
                    form+='</form>' ;
                    break;
                case 'monthlysales':
                    form ='<form method="post" action="{{route('monthlysales.save')}}" id="createModalForm" enctype="multipart/form-data">';
                    form+='<div class="md-form"> <i class="fa fa-flag prefix grey-text"></i> <input type="text" class="form-control" name="name" required> <label>MonthlySales Tag Name</label> </div><button type="submit" id="createformsubmit" style="display:none;">';
                    form+='</form>' ;
                    break;
                case 'fulfillments':
                    form ='<form method="post" action="{{route('fulfillments.save')}}" id="createModalForm" enctype="multipart/form-data">';
                    form+='<div class="md-form"> <i class="fa fa-flag prefix grey-text"></i> <input type="text" class="form-control" name="name" required> <label>FulFillment Name</label> </div><button type="submit" id="createformsubmit" style="display:none;">';
                    form+='</form>' ;
                    break;
                case 'categoriesdeals':
                    form ='<form method="post" action="{{route('categoriesdeals.save')}}" id="createModalForm" enctype="multipart/form-data">';
                    form+='<div class="md-form"> <i class="fa fa-flag prefix grey-text"></i> <input type="text" class="form-control" name="name" required> <label>CategoriesDeal Name</label> </div><div class="md-form form-inline"> <div class="form-group"> isGroupHeader </div> <div class="form-group"> <input name="isGroupHeader" type="radio" id="option1" value="yes" required> <label for="option1">Yes</label> </div> <div class="form-group"> <input name="isGroupHeader" type="radio" id="option2" value="no" selected> <label for="option2">No</label> </div> </div><button type="submit" id="createformsubmit" style="display:none;">';
                    form+='</form>' ;
                    break;
                case 'devices':
                    form ='<form method="post" action="{{route('devices.save')}}" id="createModalForm" enctype="multipart/form-data">';
                    form+='<div class="md-form"> <i class="fa fa-flag prefix grey-text"></i> <input type="text" class="form-control" name="name" required> <label>Device Name</label> </div><div class="md-form">  <i class="fa fa-flag prefix grey-text"></i><input type="text" class="form-control" name="model" required><label>Model</label> </div><button type="submit" id="createformsubmit" style="display:none;">';
                    form+='</form>' ;
                    break;
                case 'updates':
                    form ='<form method="post" action="{{route('updates.save')}}" id="createModalForm" enctype="multipart/form-data">';
                    form+='<div class="md-form">  <i class="fa fa-flag prefix grey-text"></i><input type="text" class="form-control" name="buildversion" required><label>Build Version</label> </div><div class="md-form">  <i class="fa fa-flag prefix grey-text"></i><input type="text" class="form-control" name="ziplink" required><label>Zip Link</label> </div><div class="md-form"> <i class="fa fa-pencil prefix"></i><textarea type="text" name="changelog" class="md-textarea"></textarea><label>Change Log</label> </div><div class="md-form">  <i class="fa fa-flag prefix grey-text"></i><input type="text" class="form-control" name="xdathread" required><label>XDA Thread Link</label> </div><button type="submit" id="createformsubmit" style="display:none;">';
                    form+='</form>' ;
                    break;             
                case 'somecase':
                    form = "Monday";
                    break;
            }
            return form;
        }

        function generateTextEditors(form){
            edtrid=uuidv4();
            editorhtml='<div class="md-form"> <i class="fa fa-list prefix grey-text"></i> <input type="text" name="topics[]" class="form-control" required> <label>Topic Name</label></div><div class="md-form"><textarea name="content[]" id="'+edtrid+'" class="editor"></textarea></div>';
            formid=jQuery(form).closest("form").attr('id');
            $('#'+formid+' .md-form:last').before(editorhtml);
            CKEDITOR.replace(edtrid);
        }

        function uuidv4() {
          return 'xxxxxxxx'.replace(/[xy]/g, function(c) {
            var r = Math.random() * 16 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
            return v.toString(16);
          });
        }

        function createformPost(module){
            $('#createModalForm').submit(function(e){
            if($.inArray(module,['guides','blogs'])!=-1){
                createTEChangeListener();
            }
            e.preventDefault();     
            }).validate({
                submitHandler:function(form){
                    //console.log(form);
                    var $form = $(form);
                    $.ajaxSetup({
                      headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                    });
                    $.ajax({
                        type:"POST",
                        url:$form.attr("action"),
                        data:$form.serialize(),
                        success: function(response){
                            //console.log(response);
                            if(response.error!=undefined){
                                toastr['error'](response.error);
                            }else{
                                if(response.msgtype=='success'){
                                    $('#createModal').modal('toggle');
                                    refresh(module);
                                }
                                toastr[response.msgtype](response.body);
                            }
                        }    
                    });
                return false;
                }
            });
            
        }


        function destroyRow(module,id){
            if(confirm('Are you sure you want to delete ?')){
                $.get(module+'/'+id+'/destroy',function(response){
                        if(response.error!=undefined){
                                toastr['error'](response.error);
                        }else{
                            $('#destroyModal').modal('toggle');
                            refresh(module);
                            toastr[response.msgtype](response.body);
                        }
                    });
            }
        }


        function showHistory(module,id){
            console.log(module+id);
            $.get(module+'/'+id+'/history',function(response){
                    if(response.error!=undefined){
                        toastr['error'](response.error);
                    }else{
                        console.log(response);
                        $('#ticket-events').html("");
                        eventlog=$.parseJSON(response.title);
                        ticketrefnumber=response.refnumber;
                        ticketstatus=$.parseJSON(response.status);
                        ticketdescription=$.parseJSON(response.description);
                        tickettype=$.parseJSON(response.type);
                        ticketassigned_to=$.parseJSON(response.assigned_to);
                        for (var i = (eventlog.length-1); i >= 0; i--) {
                            if((i%2!=0)){
                                //console.log('odd');
                                $('#ticket-events').prepend('<li><a href="#!"> <span class="circle '+getIcon(ticketstatus[i])[0]+'-color z-depth-1-half"><i class="fa '+getIcon(ticketstatus[i])[1]+'" aria-hidden="true"></i></span> </a><div class="step-content z-depth-1 ml-xl-0 p-4"> <div class="view gradient-card-header blue-gradient"> <h4 class="mb-0">'+eventlog[i]+'</h4> </div> <!--/Card image--> <!--Card content--> <div class="card-body"> <p><i class="fa fa-credit-card mr-1" aria-hidden="true"></i> Ref. Number: <strong>'+ticketrefnumber+'</strong></p><p><i class="fa fa-flag mr-1" aria-hidden="true"></i> Status: <strong>'+ticketstatus[i]+'</strong></p> <p><i class="fa fa-eye mr-1" aria-hidden="true"></i> Description <strong>'+ticketdescription[i]+'</strong></p> <p><i class="fa fa-archive mr-1 mr-1" aria-hidden="true"></i> Type: <strong>'+tickettype[i]+'</strong></p> <p><i class="fa fa-calendar mr-1" aria-hidden="true"></i> Assigned To: <strong>'+ticketassigned_to[i]+'</strong></p></li>') 
                            }else{
                                //console.log('even');
                                $('#ticket-events').prepend('<li class="timeline-inverted"><a href="#!"> <span class="circle '+getIcon(ticketstatus[i])[0]+'-color z-depth-1-half"><i class="fa '+getIcon(ticketstatus[i])[1]+'" aria-hidden="true"></i></span> </a><!-- Section Description --> <div class="step-content z-depth-1 ml-xl-0 p-4"> <!--Card image--><div class="view gradient-card-header blue-gradient"> <h4 class="mb-0">'+eventlog[i]+'</h4> </div> <!--/Card image--> <!--Card content--> <div class="card-body"> <p><i class="fa fa-credit-card mr-1" aria-hidden="true"></i> Ref. Number: <strong>'+ticketrefnumber+'</strong></p><p><i class="fa fa-flag mr-1" aria-hidden="true"></i> Status: <strong>'+ticketstatus[i]+'</strong></p> <p><i class="fa fa-eye mr-1" aria-hidden="true"></i> Description <strong>'+ticketdescription[i]+'</strong></p> <p><i class="fa fa-archive mr-1 mr-1" aria-hidden="true"></i> Type: <strong>'+tickettype[i]+'</strong></p> <p><i class="fa fa-calendar mr-1" aria-hidden="true"></i> Assigned To: <strong>'+ticketassigned_to[i]+'</strong></p></div> <!--/.Card content--> </div> </div></li>') 
                            } 
                        }
                        $('#historyModal').modal('toggle');
                    }
            });

        }

        function getIcon(status) {
            switch(status){
                case 'raised':
                    return ['warning','fa-floppy-o'];
                    break;
                case 'inprocess':
                    return ['info','fa-cog fa-spin'];
                    break;
                case 'completed':
                    return ['success','fa-check'];
                    break;        
            }
        }
        function createAccordian(key,value,body){
            var $card = jQuery('<div/>',{'class':'card'});
            var $cardheader = jQuery('<div/>',{'class':'card-header','role':'tab'});
            var uniqueid=uuidv4();
            var $linktag = jQuery('<a/>',{'data-toggle':'collapse','data-parent':'#accordionEx','href':'#'+uniqueid,'aria-expanded':'true','aria-controls':uniqueid});
            var $headertag = jQuery('<h5/>',{'class':'mb-0'});
            
            var $tabpanel = jQuery('<div/>',{'id':uniqueid,'class':'collapse','role':'tabpanel'});
            var $cardbody = jQuery('<div/>',{'class':'card-body'});

            $headertag.html((value.title!=undefined)? value.title:value+'<i class="fa fa-angle-down"></i>');
            $linktag.append($headertag);
            $cardheader.append($linktag);
            $card.append($cardheader);
            if(value.name!=undefined){
                var bodyjson=$.parseJSON(value.name);
                $.each(bodyjson,function(k,val){
                    //bodyhtml+=val;
                    $cardbody.append(createAccordian(k,val,value.guides[k]));
                });
            }else{
                //console.log(body);
                var bodyjson=$.parseJSON(body);
                 $.each(bodyjson,function(k,val){
                     //console.log(val);
                     $cardbody.append('<p>'+val+'</p>');
                 });
            }
            //$cardbody.html(bodyhtml);
            $tabpanel.append($cardbody);
            $card.append($tabpanel);
            return $card;            
        }
        function showPackage(module,id){
            //console.log('show packages');
            $.get(module+'/'+id+'/packages',function(response){
                //console.log(response);
                if(response.error!=undefined){
                    toastr['error'](response.error);
                }else{
                    $('#showPackagesModal').modal('toggle');
                    $('#activepackages').html('');
                    $('#pastpackages').html('');
                    $.each(response[0],function(key,value){
                        //console.log(value.title);
                        $card=createAccordian(key,value);
                        ///console.log($card);
                        $('#activepackages').append($card);
                    });
                    $.each(response[1],function(key,value){
                        //console.log(value.title);
                        $card=createAccordian(key,value);
                        //console.log($card);
                        $('#pastpackages').append($card);
                    });
                }
            });
        }


    </script>
</body>
</html>