@extends('layouts.default')

@section('content')

 <!-- display success message -->
@if (Session::has('message'))
   <div class="alert alert-success">{{ Session::get('message') }}</div>
@endif

<div class="panel panel-success">
		<div class="panel-heading">Add Category</div>
		<form action="/insertcategory" method="post" enctype="multipart/form-data" onsubmit="return showLoad('Insert Category Data?')">
		{{ csrf_field() }}
		<div class="panel-body">

      <div class="form-group {{ $errors->has('cname') ? 'has-error' : '' }}">
  			<label class="label-control">Add Category</label>
  			<input type="text" name="cname" class="form-control" placeholder="Category Name" value="{{ old('cname') }}" required="required">
  			@if ($errors->has('cname'))
            <span class="help-block alert alert-danger">
                <strong>{{ $errors->first('cname') }}</strong>
            </span>
        @endif
    </div>

	</div>
	<div class="panel-footer">
		<button type="submit" name="submit" class="btn btn-success">Insert</button>
		<button type="reset" name="reset" class="btn btn-warning" onclick="return confirm('Reset/clear form?');">Reset</button>
	</div>
	</form>
</div>

@push('scripts')
  <script type="text/javascript">
  	// for bootstrap file input
  	$(function(){
  		 $("input.fileinput").fileinput({
              allowedFileExtensions: ["jpg", "jpeg"], // set allowed file format
              maxFileSize: 3000, //set file size limit, 1000 = 1MB
          });
  	});
  </script>
@endpush

@stop
