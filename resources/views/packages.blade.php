@extends('myspace')
@section('breadcrumb')
<p>Tickets</p>
@endsection
@section('css')
@stop
@section('content')
	<div class="col-md-8">

    <!-- Nav tabs -->
    <ul class="nav nav-tabs nav-justified blue-gradient">
        <li class="nav-item waves-effect waves-light">
            <a class="nav-link active" data-toggle="tab" href="#panel1" role="tab" aria-selected="false">Current Packages</a>
        </li>
        <li class="nav-item waves-effect waves-light">
            <a class="nav-link" data-toggle="tab" href="#panel2" role="tab" aria-selected="false">Past Packages</a>
        </li>
    </ul>
    <!-- Tab panels -->
    <div class="tab-content card">
        <!--Panel 1-->
        <div class="tab-pane fade active show" id="panel1" role="tabpanel">
        	<!--Accordion wrapper-->
			<div class="accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
				@foreach($activepackages as $key => $value)
			    <!-- Accordion card -->
			    <div class="card">

			        <!-- Card header -->
			        <div class="card-header" role="tab" id="headingOne">
			            <a data-toggle="collapse" data-parent="#accordionEx" href="#collapse{{$key}}" aria-expanded="true" aria-controls="collapseOne">
			                <h5 class="mb-0">
			                    {{$value['title']}} <i class="fa fa-angle-down"></i>
			                </h5>
			            </a>
			        </div>

			        <!-- Card body -->
			        <div id="collapse{{$key}}" class="collapse" role="tabpanel" aria-labelledby="headingOne">
			            <div class="card-body">
			            	<p>Payment ID : <b>{{$value['payment_id']}}</b></p>
			            	<p>Request ID : <b>{{$value['payment_request_id']}}</b></p>
			            	<p>Purchase On : <b>{{$value['created_at']}}</b></p>
			            	<p>Duration : <b>{{$value['duration']}}</b></p>
			            	<p></p>
			            	<p>{{$value['description']}}</p>
			            	@foreach(json_decode($value['name'],true) as $index => $val)
								<!-- Accordion card -->
							    <div class="card">

							        <!-- Card header -->
							        <div class="card-header" role="tab" id="headingOne">
							            <a data-toggle="collapse" data-parent="#accordionEx" href="#collapse{{$key}}{{$index}}" aria-expanded="true" aria-controls="collapseOne">
							                <h5 class="mb-0">
							                    {{$val}} <i class="fa fa-angle-down rotate-icon"></i>
							                </h5>
							            </a>
							        </div>

							        <!-- Card body -->
							        <div id="collapse{{$key}}{{$index}}" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
							            <div class="card-body">
							                <ul>
							                @foreach(json_decode($value['guides'][$index],true) as $idx => $content)
												<li>{{$content}}</li>
							                @endforeach
							                </ul>
							            </div>
							        </div>
							    </div>
							    <!-- Accordion card -->
			            	@endforeach
			                
			            </div>
			        </div>
			    </div>
			    <!-- Accordion card -->
				@endforeach
			    
			</div>
			<!--/.Accordion wrapper-->
        </div>
        <!--/.Panel 1-->
        <!--Panel 2-->
        <div class="tab-pane fade" id="panel2" role="tabpanel">
        	<!--Accordion wrapper-->
			<div class="accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
				@foreach($pastpackages as $key => $value)
			    <!-- Accordion card -->
			    <div class="card">

			        <!-- Card header -->
			        <div class="card-header" role="tab" id="headingOne">
			            <a data-toggle="collapse" data-parent="#accordionEx" href="#pcollapse{{$key}}" aria-expanded="true" aria-controls="collapseOne">
			                <h5 class="mb-0">
			                    {{$value['title']}} <i class="fa fa-angle-down"></i>
			                </h5>
			            </a>
			        </div>

			        <!-- Card body -->
			        <div id="pcollapse{{$key}}" class="collapse" role="tabpanel" aria-labelledby="headingOne">
			            <div class="card-body">
			            	<p>Payment ID : <b>{{$value['payment_id']}}</b></p>
			            	<p>Request ID : <b>{{$value['payment_request_id']}}</b></p>
			            	<p>Purchase On : <b>{{$value['created_at']}}</b></p>
			            	<p>Duration : <b>{{$value['duration']}}</b></p>
			            	<p></p>
			            	<p>{{$value['description']}}</p>
			            	@foreach(json_decode($value['name'],true) as $index => $val)
								<!-- Accordion card -->
							    <div class="card">

							        <!-- Card header -->
							        <div class="card-header" role="tab" id="headingOne">
							            <a data-toggle="collapse" data-parent="#accordionEx" href="#pcollapse{{$key}}{{$index}}" aria-expanded="true" aria-controls="collapseOne">
							                <h5 class="mb-0">
							                    {{$val}} <i class="fa fa-angle-down rotate-icon"></i>
							                </h5>
							            </a>
							        </div>

							        <!-- Card body -->
							        <div id="pcollapse{{$key}}{{$index}}" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
							            <div class="card-body">
							                <ul>
							                @foreach(json_decode($value['guides'][$index],true) as $idx => $content)
												<li>{{$content}}</li>
							                @endforeach
							                </ul>
							            </div>
							        </div>
							    </div>
							    <!-- Accordion card -->
			            	@endforeach
			                
			            </div>
			        </div>
			    </div>
			    <!-- Accordion card -->
				@endforeach
			    
			</div>
			<!--/.Accordion wrapper-->
        </div>
        <!--/.Panel 2-->
    </div>


</div>	
@stop
@section('js')
@stop