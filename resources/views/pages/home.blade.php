@extends('layouts.default')

@section('content')

 <!-- display success message -->
@if (Session::has('message'))
   <div class="alert alert-success">{{ Session::get('message') }}</div>
@endif

<div class="panel panel-success">
		<div class="panel-heading">Insert Products</div>
		<form action="/home" method="post" enctype="multipart/form-data" onsubmit="return showLoad('Insert Data?')">
		{{ csrf_field() }}
		<div class="panel-body">

      <div class="form-group {{ $errors->has('stype') ? 'has-error' : '' }}">
  			<label class="label-control">Select Category</label>
  			<select name="stype" class="form-control" >
  				<option value=''>Please choose category</option>
  				@foreach($category as $category)
            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
          @endforeach
  			</select>
         @if ($errors->has('stype'))
            <span class="help-block alert alert-danger">
                <strong>{{ $errors->first('stype') }}</strong>
            </span>
        @endif
      </div>

      <div class="form-group {{ $errors->has('sname') ? 'has-error' : '' }}">
  			<label class="label-control">Product Name/Description</label>
  			<input type="text" name="sname" class="form-control" placeholder="Please input product name/description" value="{{ old('sname') }}" required="required">
  			@if ($errors->has('sname'))
            <span class="help-block alert alert-danger">
                <strong>{{ $errors->first('sname') }}</strong>
            </span>
        @endif
    </div>

			<div class="row hidden">
				<div class="col-md-3">
          <div class="form-group {{ $errors->has('ssize') ? 'has-error' : '' }}">
  					<label class="label-control">Product Size</label>
  					<select name="ssize" class="form-control" >
  						<option value=''>Please choose Product size</option>
  						<option value='S'>S</option>
  						<option value='M'>M</option>
  						<option value='L'>L</option>
  						<option value='XL'>XL</option>
  					</select>
  					@if ($errors->has('ssize'))
                <span class="help-block alert alert-danger">
                    <strong>{{ $errors->first('ssize') }}</strong>
                </span>
            @endif
          </div>
				</div>


				<div class="col-md-2">
          <div class="form-group {{ $errors->has('squantity') ? 'has-error' : '' }}">
  					<label class="label-control">Product Quantity</label>
  					<input type="number" name="squantity" class="form-control" placeholder="Insert quantity" value="{{ old('sname') }}">
  					@if ($errors->has('squantity'))
                <span class="help-block alert alert-danger">
                    <strong>{{ $errors->first('squantity') }}</strong>
                </span>
            @endif
          </div>
				</div>
			</div>


			<div class="row">
				<div class="col-md-5">
          <div class="form-group {{ $errors->has('fileUpload') ? 'has-error' : '' }}">
  					<label class="label-control">Upload Photo</label>
  					<input type="file" name="fileUpload" class="form-control fileinput" data-show-upload="false" required="required">
  					<i>Note: Only jpg,jpeg,png,gif file allowed. Max size: 3MB</i>
  					@if ($errors->has('fileUpload'))
                <span class="help-block alert alert-danger">
                    <strong>{{ $errors->first('fileUpload') }}</strong>
                </span>
            @endif
          </div>
				</div>
			</div>
			<br>

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
              allowedFileExtensions: ["jpg", "jpeg","png","gif"], // set allowed file format
              maxFileSize: 3000, //set file size limit, 1000 = 1MB
          });
  	});
  </script>
@endpush

@stop
