@extends('layouts.default')

@section('content')

 <!-- display success message -->
@if (Session::has('message'))
   <div class="alert alert-success">{{ Session::get('message') }}</div>
@endif

<div class="panel panel-success">
		<div class="panel-heading">Edit Product</div>
		<form action="/update" method="post" onsubmit="return showLoad('Update Data?')">
      {{ csrf_field() }}
		<div class="panel-body">

      <div class="form-group {{ $errors->has('stype') ? 'has-error' : '' }}">
  			<label class="label-control">Select category</label>
  			<select name="stype" class="form-control" required="required">
  				<option value=''>Please choose category</option>
  			<?php

  				// $types = array('T-Shirt','Sweater','Jacket','Formal Shirt');

  				foreach($category as $category)
  				{
  					if($editstock->stk_type == $category->id)
  					{
  						echo "<option value='$category->id' selected>$category->category_name</option>";
  					}
  					else
  					{
  						echo "<option value='$category->id'>$category->category_name</option>";
  					}
  				}
  			?>
  			</select>
  			@if ($errors->has('stype'))
            <span class="help-block alert alert-danger">
                <strong>{{ $errors->first('stype') }}</strong>
            </span>
        @endif
			</div>

      <div class="form-group {{ $errors->has('sname') ? 'has-error' : '' }}">
  			<label class="label-control">Stock Name/Description</label>
  			<input type="text" name="sname" class="form-control" placeholder="Please input stock name/description" required="required" value="{{$editstock->stk_name}}">
  			@if ($errors->has('sname'))
            <span class="help-block alert alert-danger">
                <strong>{{ $errors->first('sname') }}</strong>
            </span>
        @endif
			</div>

			<div class="col-md-3 hidden">
        <div class="form-group {{ $errors->has('ssize') ? 'has-error' : '' }}">
    			<label class="label-control">Stock Size</label>
    			<select name="ssize" class="form-control" >
    				<option value=''>Please choose stock size</option>
    				<?php
    					$size = array('S','M','L','XL');
    					foreach($size as $size)
    					{
    						if($editstock->stk_size == $size)
    						{
    							echo "<option value='$size' selected>$size</option>";
    						}
    						else
    						{
    							echo "<option value='$size'>$size</option>";
    						}
    					}
    				?>
    			</select>
    			@if ($errors->has('ssize'))
              <span class="help-block alert alert-danger">
                  <strong>{{ $errors->first('ssize') }}</strong>
              </span>
          @endif
        </div>
			</div>


			<div class="col-md-2 hidden">
        <div class="form-group {{ $errors->has('squantity') ? 'has-error' : '' }}">
    			<label class="label-control">Stock Quantity</label>
    			<input type="number" name="squantity" class="form-control" placeholder="Insert quantity" value="{{$editstock->stk_qty}}">
    			@if ($errors->has('squantity'))
              <span class="help-block alert alert-danger">
                  <strong>{{ $errors->first('squantity') }}</strong>
              </span>
          @endif
        </div>
      </div>
			<br>

			<input type = "hidden" name = "sid" value = "{{$editstock->id}}">

	</div>
	<div class="panel-footer">
		<button type="submit" name="submit" class="btn btn-success">Update</button>
	</div>
	</form>
</div>

@stop
