@extends('layouts.default')

@section('content')

<div class="panel panel-success">
		<div class="panel-heading">List Products</div>

		<div class="panel-body">

		<div class='table-responsive'>
		<form action="/view" method="post" onsubmit="return showLoad('Delete product?')">
		  <table class='table table-bordered table-hover'>
		    <thead>
		      <tr>
		        <th>Sr No</th>
		        <th>Product NAME</th>
		        <th>Category</th>
		        <th>Product IMAGE</th>
		        <!-- <th>SIZE</th>
		        <th>QUANTITY</th> -->
		        <th>ACTION</th>
		      </tr>
		    </thead>
		    <tbody>
			<!-- iterate through the array of the stocks to display them -->
			<?php $i = 1; ?>
			@foreach($liststock as $liststocks)
				<tr>
					<td>{{$i++}}</td>
					<td>{{$liststocks->category_name}}</td>
					<td>{{$liststocks->stk_name}}</td>
					
					<td><img src='{{asset("storage/images/$liststocks->id.jpg")}}' width="150px" height="150px" class="img-thumbnail img-responsive" title="{{$liststocks->stk_name.' '.$liststocks->stk_type}}"/></td>
					<td align="center"><a href='/edit/{{$liststocks->id}}' data-toggle="tooltip" title="Update Stock" class='btn btn-success' onclick='return confirm("Edit product?");'><i class='fa fa-fw fa-edit'></i></a>
					<button type='submit' class='btn btn-danger' data-toggle="tooltip" title="Delete Stock"><i class='fa fa-fw fa-trash'></i></button></td>
					<td style='display:none;'><input type='text' name='delstock' value='{{$liststocks->id}}' style='display:none;'></td>
					{{ csrf_field() }}
				</tr>
			@endforeach

			</tbody>
				</table>
				</form>
				<!-- generate markup for pagination links -->
				<center>{{ $liststock->links() }}</center>
			</div>
		</div>
</div>

@stop
