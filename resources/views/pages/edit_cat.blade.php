@extends('layouts.default')

@section('content')

 <!-- display success message -->
@if (Session::has('message'))
   <div class="alert alert-success">{{ Session::get('message') }}</div>
@endif

<div class="panel panel-success">
		<div class="panel-heading">Edit Category</div>
		<form action="/update_category" method="post" onsubmit="return showLoad('Update Data?')">
      {{ csrf_field() }}
		<div class="panel-body">

      <div class="form-group {{ $errors->has('sname') ? 'has-error' : '' }}">
  			<label class="label-control">Category Name/Description</label>
  			<input type="text" name="cname" class="form-control" placeholder="Category Name" required="required" value="{{$editcategory->category_name}}">
  			@if ($errors->has('sname'))
            <span class="help-block alert alert-danger">
                <strong>{{ $errors->first('sname') }}</strong>
            </span>
        @endif
			</div>
			<br>

			<input type = "hidden" name = "sid" value = "{{$editcategory->id}}">

	</div>
	<div class="panel-footer">
		<button type="submit" name="submit" class="btn btn-success">Update</button>
	</div>
	</form>
</div>

@stop
