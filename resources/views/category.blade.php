@extends('backtemplate')
@section('content')
<div class="row">
	<div class="col-md-12">
		<h1>Category </h1>
		<form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
			@csrf
			<div class="row mt-5">
				<div class="col-md-3 ">
				<label>Category Name</label>
			</div>
			<div class="col-md-5">
				<input type="name" name="name" class="form-control">
			</div>
			
			</div>
			<div class="row mt-5">
				<div class="col-md-3 ">
				<label>Brand Name</label>
			</div>
			<div class="col-md-5">
				<select name="brand_id" class="form-control">
					<option disabled selected >Choose Brand </option>
					@foreach($brands as $brand)
					<option value="{{$brand->id}}">{{$brand->name}}</option>
					@endforeach
				</select>

			</div>
			
			</div>
			<div class="row mt-5">
				<div class="col-md-3 ">
				<label>Type Name</label>
			</div>
			<div class="col-md-5">
				<select name="type_id" class="form-control">
					<option disabled selected >Choose Brand </option>
					@foreach($types as $type)
					<option value="{{$type->id}}">{{$type->name}}</option>
					@endforeach
				</select>
			</div>
			
			</div>

			<div class="col-md-3">
				<input type="submit" value="ADD">
			</div>
			
		</form>
		
		

	<div class="col-md-8 offset-2 mt-5">

		<table class="table table-dark table-sm">
			<tr>
				<th>NO.</th>
				<th>Category Name</th>
				<th>Brand Name</th>
				<th>Type Name</th>
				<th>Action</th>
			</tr>
			@foreach($categories as $category)
			<tr>
				<td>{{$category->id}}</td>
				<td>{{$category->name}}</td>
				<td>{{$category->brand->name}}</td>
				<td>{{$category->type->name}}</td>
				 <td>
                      <form action="{{route('category.destroy',$category->id)}}" method="post">
                        @method('Delete')
                        @csrf
                        <input type="submit" name="btnsubmit" value="Delete" class="btn btn-danger">
                      </form>
                  </td>
			</tr>
			@endforeach
		</table>
	</div>
		
	</div>
	
</div>

@endsection