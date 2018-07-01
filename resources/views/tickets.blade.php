@extends('myspace')
@section('breadcrumb')
<p>Tickets</p>
@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('js/vendor/datatables/css/dataTables.bootstrap4.min.css')}}"/>
@stop
@section('content')
<div class="card">
<div class="card-body">
<h3 class="card-title"><button type="button" class="btn btn-outline-info waves-effect" data-toggle="modal" data-target="#createModal">Create</button></h3>
<table class="table table-striped table-bordered datatable" cellspacing="0" width="100%">
<thead>
	<th>ID</th>
	<th>Title</th>
	<th>Status</th>
	<th>Description</th>
	<th>Type</th>
	<th>Assigned To</th>
</thead>
<tbody>
	@if(isset($tickets))
	@foreach($tickets as $ticketarr)
	<?php
	$ticket=array(); 
	foreach ($ticketarr as $key => $value) {
		$ticket[$key]=is_array(json_decode($value,true))? json_decode($value,true)[0]:$value;
	?>
	<?php
	}
	?>
	<tr>
		<td>{{$ticket['id']}}</td>
		<td>{{$ticket['title']}}</td>
		<td>{{$ticket['status']}}</td>
		<td>{{$ticket['description']}}</td>
		<td>{{$ticket['type']}}</td>
		<td>{{$ticket['assigned_to']}}</td>
	</tr>
	@endforeach
	@endif
</tbody>
</table>
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
          		<form method="post" action="{{route('ticket.save')}}" id="createModalForm" enctype="multipart/form-data">
          			<div class="md-form"> <i class="fa fa-user prefix grey-text"></i>
					    <input type="text" name="title" class="form-control" required>
					    <label>Title</label>
					</div>
					<div class="md-form"> <i class="fa fa-pencil prefix"></i>
					    <textarea name="description" class="md-textarea" required></textarea>
					    <label>Description</label>
					</div>
					<div class="md-form">
					    <select class="mdb-select" name="type" required>
					        <option value="" disabled selected>Choose your option</option>
					        <option value="type1">type1</option>
					        <option value="type2">type2</option>
					        <option value="type3">type3</option>
					    </select>
					    <label>Ticket Type</label>
					</div>
					{{csrf_field()}}
                <button type="submit" id="createformsubmit" style="display:none;">
          		</form>      
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="document.getElementById('createformsubmit').click()">Save</button>
            </div>
        </div>
    </div>
</div>	
@stop
@section('js')
<script type="text/javascript" src="{{asset('js/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/vendor/datatables/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('js/jquery.validate.js')}}"></script>
<script>
	$('.datatable').DataTable( {
                    "order": [[ 0, "desc" ]],
                    dom: 'lBfrtip',
                    "columnDefs": [
                        {
                            "targets": [ 0 ],
                            "visible": false,
                            "searchable": true
                        }
                    ]
                } );
	$('.mdb-select').material_select();
	$(document).ready(function () {
          $('#createModalForm').submit(function(e){
          	console.log('preventing Default');
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
                                }
                                toastr[response.msgtype](response.body);
                                setTimeout(function(){ location.reload(); }, 2000);
                            }
                        }    
                    });
                return false;
                }
            });  
        });

</script>
@stop