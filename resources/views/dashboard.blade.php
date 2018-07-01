@extends('myspace')
@section('breadcrumb')
<p>Home</p>
@endsection
@section('content')
@if(isset($packages))
@foreach($packages->chunk(3) as $chunkpackages)
<div class="row">
	@foreach($chunkpackages as $package)
	<div class="col-md-4">
		<div class="card card-cascade narrower d-flex mb-5">

			<!--Card image-->
			<div class="view overlay hm-white-slight">
				<img src="{{$package['image']}}" class="img-fluid" alt="">
				<a href="#">
					<div class="mask waves-effect waves-light"></div>
				</a>
			</div>

			<!--Card content-->
			<div class="card-body">
				<!--Title-->
				<h4 class="card-title">{{$package['title']}}</h4>
				<!--Text-->
				<p class="card-text">{{$package['description']}}</p>
			</div>

			<!--Card footer-->
			<div class="card-footer links-light">
		<!-- <span class="left pt-2">
			Package Duration 
		</span>
		<span class="right"> 
			
		</span> -->
		<div>Package Duration</div>
		<div class="progress">
			<div class="progress-bar" role="progressbar" style="width: {{$package->progress}}%" aria-valuenow="{{$package->progress}}" aria-valuemin="0" aria-valuemax="100"></div>
		</div>
	</div>

</div>

</div>
@endforeach
</div>
@endforeach
@else
<div class="row">
	No Packages
</div>
@endif
@endsection
@section('js')
@endsection