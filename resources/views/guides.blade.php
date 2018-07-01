@extends('myspace')
@section('breadcrumb')
<p>Guides</p>
@endsection
@section('css')
<!-- jPList Core -->
        <link href="{{url('/css/jplist.core.min.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{url('/css/jplist.textbox-filter.min.css')}}" rel="stylesheet" type="text/css" />
		<!-- jPList views control -->
		<link href="{{url('/css/jplist.list-grid-view.min.css')}}" rel="stylesheet" type="text/css" />
@stop
@section('content')
<!-- demo -->
<div id="demo" class="box jplist">
					<nav class="navbar blue-gradient bg-faded">
					<!-- ios button: show/hide panel -->
					<div class="jplist-ios-button">
						<i class="fa fa-sort"></i>
						Actions
					</div>
					<!-- panel -->
					<div class="jplist-panel box panel-top">						
						<!-- items per page dropdown -->
						<div 
						   class="jplist-drop-down" 
						   data-control-type="items-per-page-drop-down" 
						   data-control-name="paging" 
						   data-control-action="paging">
						   
						   <ul>
							 <li><span data-number="2"> 2 per page </span></li>
							 <li><span data-number="5"> 5 per page </span></li>
							 <li><span data-number="10" data-default="true"> 10 per page </span></li>
							 <li><span data-number="all"> View All </span></li>
						   </ul>
						</div>
											
						<!-- sort dropdown -->
						<div 
							class="jplist-drop-down" 
							data-control-type="sort-drop-down" 
							data-control-name="sort" 
							data-control-action="sort"
							data-datetime-format="{month}/{day}/{year}"> <!-- {year}, {month}, {day}, {hour}, {min}, {sec} -->
												
							<ul>
								<li><span data-path="default">Sort by</span></li>
								<li><span data-path=".title" data-order="asc" data-type="text">Title A-Z</span></li>
								<li><span data-path=".title" data-order="desc" data-type="text">Title Z-A</span></li>
								<li><span data-path=".desc" data-order="asc" data-type="text">Description A-Z</span></li>
								<li><span data-path=".desc" data-order="desc" data-type="text">Description Z-A</span></li>
							</ul>
						</div>

						<!-- filter by title -->
						<div class="text-filter-box">
											
							<i class="fa fa-search  jplist-icon"></i>
												
							<!--[if lt IE 10]>
							<div class="jplist-label">Filter by Title:</div>
							<![endif]-->
												
							<input 
								data-path=".title" 
								type="text" 
								value="" 
								placeholder="Filter by Title" 
								data-control-type="textbox" 
								data-control-name="title-filter" 
								data-control-action="filter"
							/>
						</div>
											
						<!-- filter by description -->
						<div class="text-filter-box">
												
							<i class="fa fa-search  jplist-icon"></i>
												
							<!--[if lt IE 10]>
							<div class="jplist-label">Filter by Description:</div>
							<![endif]-->
												
							<input 
								data-path=".desc" 
								type="text" 
								value="" 
								placeholder="Filter by Description" 
								data-control-type="textbox" 
								data-control-name="desc-filter" 
								data-control-action="filter"
							/>	
						</div>
						<!-- filter by type -->
						<div class="text-filter-box">
												
							<i class="fa fa-search  jplist-icon"></i>
												
							<!--[if lt IE 10]>
							<div class="jplist-label">Filter by Description:</div>
							<![endif]-->
												
							<input 
								data-path=".type" 
								type="text" 
								value="" 
								placeholder="Filter by Guide Type" 
								data-control-type="textbox" 
								data-control-name="desc-filter" 
								data-control-action="filter"
							/>	
						</div>

						<!-- pagination results -->
						<div 
						   class="jplist-label" 
						   data-type="Page {current} of {pages}" 
						   data-control-type="pagination-info" 
						   data-control-name="paging" 
						   data-control-action="paging">
						</div>
												
						<!-- pagination control -->
						<div 
						   class="jplist-pagination" 
						   data-control-type="pagination" 
						   data-control-name="paging" 
						   data-control-action="paging">
						</div>
						
					</div>
					<!-- panel end -->
					</nav>
					<!-- data -->   
					<div class="list box text-shadow">
						@foreach($guides as $key => $guide)
								<div class="list-item box" style="padding: 2%;">		
									<!--Grid column-->
							            <div class="card card-image" style="background-image: url('{{$guide->image}}');">
							                <div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4 rounded">
							                    <div class="col-md-12">
							                        <h6 class="green-text">
							                            <i class="fa fa-eye"></i>
							                            <strong class="type"> {{$guide->type}}</strong>
							                        </h6>
							                        <h3 class="py-3 font-bold">
							                            <strong class="title">{{$guide->name}}</strong>
							                        </h3>
							                        <p class="pb-3 desc">
							                        	Learn about topics : <b><?php echo implode("</b>,<b>",json_decode($guide->topics,true));?></b>
							                        </p>
							                        <a class="btn btn-success btn-rounded btn-md" href="/guides/{{$guide->id}}">
							                            <i class="fa fa-clone left"></i> View Guide</a>
							                    </div>
							                </div>
							            </div>
							        
							        <!--Grid column-->
								</div>
						@endforeach
					</div>
					<!-- data -->
					<div class="box jplist-no-results text-shadow align-center">
						<p>No results found</p>
					</div>	
</div>
<!-- demo end -->


</section>
<!--Section: Blog v.3-->
@endsection
@section('js')
<script src="{{url('/js/jplist.core.min.js')}}"></script>
        <!-- jPList Sort Bundle -->
        <script src="{{url('/js/jplist.sort-bundle.min.js')}}"></script>

        <!-- jPList Pagination Bundle -->
        <script src="{{url('/js/jplist.pagination-bundle.min.js')}}"></script>

        <!-- Textbox Filter Control -->
        <script src="{{url('/js/jplist.textbox-filter.min.js')}}"></script>
		
		<!-- view -->
		<script src="{{url('js/jplist.list-grid-view.min.js')}}"></script>
        
<script>
 $('document').ready(function(){

   //check all jPList javascript options here
   $('#demo').jplist({				
      itemsBox: '.list', 
      itemPath: '.list-item', 
      panelPath: '.jplist-panel'	
   });
});
</script>
@endsection