@extends('master')
@section('header')
	<h1 >Sub Categories</h1>	
@endsection

@section('content')
	<div class="col-md-12">
		<a href="{{ route('categories.create') }}" class="btn btn-primary btn-flat">Add New Sub-Category</a>
		<!-- <input class="form-control" style="float:right; width: 35%" type="text" id="search" placeholder="Searching.."> -->
	</div>
	
	<table class="table table-responsive" id="categories-table" >
	    <thead>
	        <th>#</th>
	        <th>Name</th>
	        <th>Description</th>
	        <th>Image</th>
	        <th>Parent</th>
	        <th class="wrapping">Action</th>
	    </thead>
	    <tbody>
	   @foreach($subCategories as $key => $cat)
	        <tr>
	            <td>{{ ++$key }}</td>
	            <td>{{ $cat->name }}</td>
	            <td>{{ $cat->description }}</td>
	            <td ><img style="width: 50px;height: 50px" src="{{ asset('images/categories/'.$cat->category_image) }}" alt=""></td>
				<td>{{ $cat->parent_category->name }}</td>
	            <td>
	                <div class='btn btn-group wrapping-buttons'>
	                   
	                    <a href="{{ route('categories.edit',$cat->id) }}" class='btn  btn-info btn-xs'>edit</a>

	                    <form  method="post" action="{{ route('categories.destroy',$cat->id) }}">
							{{ csrf_field() }}
	                    	<button class='btn btn-danger btn-xs' type="submit">Delete</button>
	                    	
	                    	<input type="hidden" name="_method" value="DELETE">
	                	</form>
	                </div>
	            </td>
	        </tr>
		@endforeach

	    </tbody>
	</table>
	{{ $subCategories->links() }}
@endsection