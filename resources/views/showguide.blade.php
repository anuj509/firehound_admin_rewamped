	@extends('myspace')
	@section('breadcrumb')
	<p>{{$guide->name}}</p>
	@endsection
	@section('css')
	@stop
	@section('content')
	<div class="main-wrapper">
		<div class="container-fluid">

			<div class="row">
			<!--Main column-->
			<div class="col-lg-10 col-md-10">
				<div class="text-center">
					<section class="mb-5">

						<nav class="navbar navbar-expand-lg navbar-dark mdb-color">
							<span class="related-content-heading">
								<strong>Related topics: </strong>
							</span>
							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav1" aria-controls="navbarNav1" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon"></span>
							</button>
							<div class="collapse navbar-collapse text-center" id="navbarNav1">
								<ul class="navbar-nav mr-auto text-center">
									<li class="nav-item"><a id="javascript-related-1" class="nav-link" href="#">Material select</a></li>
									<li class="nav-item"><a id="javascript-related-2" class="nav-link" href="#">Date picker</a></li>
									<li class="nav-item"><a id="javascript-related-3" class="nav-link" href="#">Alerts</a></li>
									<li class="nav-item"><a id="javascript-related-4" class="nav-link" href="#">Lightbox</a></li>
									<li class="nav-item"><a id="javascript-related-5" class="nav-link" href="#">Collapse</a></li>                        		                    </ul>
								</div>
							</nav>

						</section>

						<!--Section: Dynamic content wrapper-->
						<section id="dynamicContentWrapper-docsPanel" class="mb-5">

						</section>
						<!--Section: Dynamic content wrapper-->


					</div>
					<!--Section: Doc content-->
					<section class="documentation">

						<!--Section: Intro-->
						<section>

							<!--Title-->
							<h1 class="main-title">{{ucfirst($guide->name)}}</h1>
						</section>
						<!--/Section: Intro-->

						<hr class="my-5">
						@foreach(json_decode($guide->topics,true) as $key => $topic)
						<!--Section: -->
						<section>
							
							<!--Title-->
							<h2 class="title"><strong>{{ucfirst($topic)}}</strong></h2>
							<div class="col-md-12">
								<?php echo json_decode($guide->content,true)[$key]; ?>
							</div>

						</section>
						<!--/Section: -->
						@endforeach
					</section>
		<!--/Section: Doc content-->
	</div>
	<!--/.Main column-->
	<!-- Right Sidebar -->
	<div class="col-md-2">
		<div id="scrollspy" class="sticky">
			<ul class="nav nav-pills smooth-scroll flex-column" data-allow-hashes="true">
				<li class="nav-item"><a class="nav-link active" href="#introduction">Introduction</a></li>
				@foreach(json_decode($guide->topics,true) as $key => $topic)
				<li class="nav-item"><a class="nav-link">{{$topic}}</a></li>
				@endforeach
			</ul>
			</div>
		</div>
		<div class="col-md-10">
			<!--/. Right Sidebar -->

		</div>
	</div>
</div>

	@stop
	@section('js')
	<script>
		$('body').scrollspy({
	        target: '#scrollspy'
	    })

	    $(function () {
	        $(".sticky").sticky({
	            topSpacing: 90,
	            zIndex: 2,
	            stopper: "#footer"
	        });
	        $('.sticky li a').each(function(key,value){
				$(value).attr('href','#'+($(value).text()).replace(/[^a-z0-9]/gi, '-').toLowerCase());
			});
			$('.documentation section').each(function(key,value){
				if(key!=0){
					$(value).attr('id',($(value).find('h2').text().trim()).replace(/[^a-z0-9]/gi, '-').toLowerCase());
				}else{
					$(value).attr('id','introduction');
				}
			});
	    });
	</script>
	@stop