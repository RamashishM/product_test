@extends('layouts.default')

@section('content')

<div class="panel panel-success">
		<div class="panel-heading">List Category</div>

		<div class="panel-body">

		<div class='table-responsive'>
		<form action="/view" method="post" onsubmit="return showLoad('Delete category?')">
		  <table class='table table-bordered table-hover'>
		    <thead>
		      <tr>
		        <th>ID</th>
		        <th>NAME</th>
		        <th>ACTION</th>
		      </tr>
		    </thead>
		    <tbody>
			<!-- iterate through the array of the stocks to display them -->
			@foreach($listcategory as $listcategory)
				<tr>
					<td>{{$listcategory->id}}</td>
					<td>{{$listcategory->category_name}}</td>
					<td align="center"><a href='/edit_cat/{{$listcategory->id}}' data-toggle="tooltip" title="Update category" class='btn btn-success' onclick='return confirm("Edit category?");'><i class='fa fa-fw fa-edit'></i></a>
					<a href='/delete_cat/{{$listcategory->id}}' data-toggle="tooltip" title="Update category" class='btn btn-danger' onclick='return confirm("Delete category?");'><i class='fa fa-fw fa-trash'></i></a></td>
					<td style='display:none;'><input type='text' name='delstock' value='{{$listcategory->id}}' style='display:none;'></td>
					{{ csrf_field() }}
				</tr>
			@endforeach

			</tbody>
				</table>
				</form>
				<!-- generate markup for pagination links -->
			</div>
		</div>
</div>

@stop
