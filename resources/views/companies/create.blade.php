@extends('master')

@section('header')
	<h1>Create New Company</h1>
@endsection

@section('content')
	 <div class="row">
       <div class="col-md-12 ">

		<form method="POST" action="{{ route('companies.store') }}" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="form-group col-md-6">
			    <label for="name">Name</label>
			    <input type="text" class="form-control" id="name" name="name" pattern=".*\S+.*" required>
			</div>

			<div class="form-group col-md-6">
			    <label for="address">Address</label>
			    <input type="text" class="form-control" id="address" name="address" pattern=".*\S+.*" required>
			</div>
			
			<div class="form-group col-md-6">
			    <label for="description">Description</label>
			    <textarea type="text" class="form-control" id="description" name="description" rows="8"pattern=".*\S+.*" required></textarea>
			</div>		
			
			<div class="form-group col-md-6">
			    <label for="category_id">Select category of company</label>
			    <select name="category_id" id="category_id" class="form-control" required>
			    	<option value="" selected >please select category</option>
			    	@foreach($categories as $category)
				    	<optgroup label="{{ $category->name }}">
							@if($category->children)
								@foreach($category->children as $subCategory)
				    				<option class="child_category" value="{{ $subCategory->id }}" require>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $subCategory->name }}</option>
				    			@endforeach
				    		@endif
						</optgroup>
					@endforeach
			    </select>
			</div>
			
			<div class="form-group col-md-6">
			    <label for="company_image">Company Image</label>
			    <input type="file" class="form-control" id="company_image" name="company_image" accept="image/*" required>
			</div>

			<div class="form-group col-md-6">
			    <label for="lat">Latitude</label>
			    <input type="text" class="form-control" id="lat" name="lat" required>
			</div>				

			<div class="form-group col-md-6">
			    <label for="long">Langtude</label>
			    <input type="text" class="form-control" id="long" name="long" required>
			</div>

			<div  id="dynamic-field">
				<div class="form-group col-md-6" >
				    <label for="phone">Phone</label>
				    <button type="button" class="btn pull-right btn-defualt btn-sm" id="add-more" >
				    	<i class="glyphicon glyphicon-plus"></i>
				    </button> 
				    <input type="tel" class="form-control" id="phone" name="phone[]" pattern="[0-9]{11}" minlength="8" maxlength="11" required>
				</div>
			</div>

		  <div class="form-groub col-md-12">
		  	<button type="submit" class="btn btn-primary">Add Company</button>
		  </div>		  

		</form>

		

	</div>	
    </div>
@endsection