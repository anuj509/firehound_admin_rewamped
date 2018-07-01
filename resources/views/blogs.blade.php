@extends('myspace')
@section('breadcrumb')
<p>Blogs</p>
@endsection
@section('css')
<!-- jPList Core -->
        <link href="{{url('/css/jplist.core.min.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{url('/css/jplist.textbox-filter.min.css')}}" rel="stylesheet" type="text/css" />
@stop
@section('content')
<!--Section: Blog v.3-->
<section class="py-4">
        
    <!--Section heading-->
    <h2 class="h1 text-center mb-5">Recent posts</h2>
    <!--Section description-->
    <!-- <p class="text-center mb-5 pb-5">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
    occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> -->

<div id="demo">
	<nav class="navbar blue-gradient bg-faded">
	<div class="jplist-ios-button">
        <i class="fa fa-sort"></i>
        Actions
    </div>
    <!-- panel -->
	<div class="jplist-panel">						

	<div class="text-filter-box">
	   <i class="fa fa-search  jplist-icon"></i>
	   <input 
	      data-path=".b_title" 
	      type="text" 
	      value="" 
	      placeholder="Filter by Title" 
	      data-control-type="textbox" 
	      data-control-name="title-filter" 
	      data-control-action="filter"
	   />
	</div>
	<!-- items per page dropdown -->
    <div
            class="jplist-drop-down"
            data-control-type="items-per-page-drop-down"
            data-control-name="paging"
            data-control-action="paging">

        <ul>
            <li><span data-number="3"> 3 per page </span></li>
            <li><span data-number="5"> 5 per page </span></li>
            <li><span data-number="10" data-default="true"> 10 per page </span></li>
            <li><span data-number="all"> View All </span></li>
        </ul>
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
	</nav>
	<div class="list">
	@if(isset($blogs))
	@foreach($blogs as $blog)
    <div class="list-item">
    <hr class="mb-5">	
    <!--Grid row-->
    <div class="row">

    <!--Grid column-->
    <div class="col-lg-5 col-xl-4 mb-4">
        <!--Featured image-->
        <div class="view overlay hm-white-slight rounded z-depth-1-half">
        <img src="{{$blog->image}}" class="img-fluid" alt="First sample image">
        <a>
            <div class="mask"></div>
        </a>
        </div>
    </div>
    <!--Grid column-->

    <!--Grid column-->
    <div class="col-lg-7 col-xl-7 ml-xl-4 mb-4">
        <h3 class="mb-3 font-bold dark-grey-text">
        <strong class="b_title">{{$blog->title}}</strong>
        </h3>
        <?php
        	$max_length = 500;

        	if (strlen($blog->content) > $max_length)
			{
			    $offset = ($max_length - 3) - strlen($blog->content);
			    $s = substr($blog->content, 0, strrpos($blog->content, ' ', $offset)) . '...';
				echo $s;
			}else{
				echo $blog->content;
			}
			
        ?>
        <p>by
        <a class="font-bold dark-grey-text">{{$blog->posted_by}}</a>, {{$blog->created_at}}</p>
        <a class="btn btn-primary btn-md" data-target="#modalBlog" onclick="showblog('{{$blog->id}}')">Read more</a>
    </div>
    <!--Grid column-->

    </div>
    <!--Grid row-->

    <!-- <hr class="mb-5"> -->
	</div>
	@endforeach
	@endif
</div>
<!-- no results found -->
<div class="jplist-no-results">
  <p>No results found</p>
</div>
</div>
    

</section>
<!--Section: Blog v.3-->

<!--Modal: modalSocial-->
<div class="modal fade" id="modalBlog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-frame modal-full-height modal-top modal-fluid" role="document">

        <!--Content-->
        <div class="modal-content">

            <!--Header-->
            <div class="modal-header light-blue darken-3 white-text">
                <h4 class="title"><i class="fa fa-users"></i> Spread the word!</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="container">
            	<!--Section: Blog v.4-->
 <section class="section pt-5 mt-4 pb-3">
        
    <!--Grid row-->
    <div class="row">
    <div class="col-md-12">
        <!--Featured image-->
        <div class="card card-cascade wider reverse">
        <div class="view overlay hm-white-slight">
            <img id="blog_image" alt="Wide sample post image">
        </div>

        <!--Post data-->
        <div class="card-body text-center">
            <h2>
            <a class="font-bold" id="blog_title"></a>
            </h2>
            <p id="blog_sign"></p>
        </div>
        <!--Post data-->
        </div>

        <!--Excerpt-->
        <div class="excerpt mt-5" id="content">
        
        </div>
    </div>
    </div>
    <!--Grid row-->

    

</section>
<!--Section: Blog v.4-->
            </div>

        </div>
        <!--/.Content-->

    </div>
</div>
<!--Modal: modalSocial-->

@endsection
@section('js')
<script src="{{url('/js/jplist.core.min.js')}}"></script>
        <!-- jPList Sort Bundle -->
        <script src="{{url('/js/jplist.sort-bundle.min.js')}}"></script>

        <!-- jPList Pagination Bundle -->
        <script src="{{url('/js/jplist.pagination-bundle.min.js')}}"></script>

        <!-- Textbox Filter Control -->
        <script src="{{url('/js/jplist.textbox-filter.min.js')}}"></script>

        
<script>
 $('document').ready(function(){

   //check all jPList javascript options here
   $('#demo').jplist({				
      itemsBox: '.list', 
      itemPath: '.list-item', 
      panelPath: '.jplist-panel'	
   });

   $.extend({
	  getUrlVars: function(){
	    var vars = [], hash;
	    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
	    for(var i = 0; i < hashes.length; i++)
	    {
	      hash = hashes[i].split('=');
	      vars.push(hash[0]);
	      vars[hash[0]] = hash[1];
	    }
	    return vars;
	  },
	  getUrlVar: function(name){
	    return $.getUrlVars()[name];
	  }
	});

   var getUrlParameter = function getUrlParameter(sParam) {
	    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
	        sURLVariables = sPageURL.split('&'),
	        sParameterName,
	        i;

	    for (i = 0; i < sURLVariables.length; i++) {
	        sParameterName = sURLVariables[i].split('=');

	        if (sParameterName[0] === sParam) {
	            return sParameterName[1] === undefined ? true : sParameterName[1];
	        }
	    }
	};

   if ($.getUrlVar("blog") != null) {
	    var blog_id = getUrlParameter('blog');
	    showblog(blog_id);
	}



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
@endsection