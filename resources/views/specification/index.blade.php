@extends('backtemplate')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div id="add">
			<h1>Add Specification </h1>
			<form action="{{route('specification.store')}}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="row  form-group">
					<div class="col-md-3 ">
						<label>Mobile</label>
					</div>
					<div class="col-md-5">
						<select name="category_id"  class="form-control">
							<option>Choose Category</option>
							@foreach($categories as $category)
							<option value="{{$category->id}}">{{$category->name}}</option>
							@endforeach
						</select>
					</div>
					
				</div>

				<div class="row form-group">
					<div class="col-md-3 ">
						<label>Cpu </label>
					</div>
					<div class="col-md-5">
						<input type="name" name="cpu" class="form-control">
					</div>
					
				</div>
				<div class="row  form-group">
					<div class="col-md-3 ">
						<label>Memory</label>
					</div>
					<div class="col-md-5">
						<input type="name" name="memory" class="form-control">
					</div>
					
				</div>
				
				
				

				<div class="row  form-group">
					<div class="col-md-3 ">
						<label>Main_camera</label>
					</div>
					<div class="col-md-5">
						<input type="text" name="main_camera" class="form-control">
					</div>
					
				</div>

				<div class="row  form-group">
					<div class="col-md-3 ">
						<label>selfie_camera</label>
					</div>
					<div class="col-md-5">
						<input type="text" name="selfie_camera" class="form-control">
					</div>
					
				</div>
				<div class="row  form-group">
					<div class="col-md-3 ">
						<label>Battery</label>
					</div>
					<div class="col-md-5">
						<input type="text" name="battery" class="form-control">
					</div>
					
				</div>
				<div class="row  form-group">
					<div class="col-md-3 ">
						<label>Feature</label>
					</div>
					<div class="col-md-5">
						<input type="text" name="features" class="form-control">
					</div>
					
				</div>
					<div class="row  form-group">
					<div class="col-md-3 ">
						<label>os</label>
					</div>
					<div class="col-md-5">
						<input type="text" name="os" class="form-control">
					</div>
					
				</div>
				<div class="row  form-group">
					<div class="col-md-3 ">
						<label>Display</label>
					</div>
					<div class="col-md-5">
						<input type="text" name="display" class="form-control">
					</div>
					
				</div>
				<div class="row  form-group">
					<div class="col-md-3 ">
						<label>Capacity</label>
					</div>
					<div class="col-md-5">
						<input type="text" name="capacity" class="form-control">
					</div>
					
				</div>
				<div class="row  form-group">
					<div class="col-md-3 ">
						<label>price</label>
					</div>
					<div class="col-md-5">
						<input type="text" name="price" class="form-control">
					</div>
					
				</div>
				<div class="row  form-group">
					<div class="col-md-3 ">
						<label>release Date</label>
					</div>
					<div class="col-md-5">
						<input type="date" name="date" class="form-control">
					</div>
					
				</div>

				<div class="row  form-group">
					<div class="col-md-3 ">
						<label>image</label>
					</div>
					<div class="col-md-5">
						<input type="file" name="image" class="form-control">
					</div>
					
				</div>


				<div class="row  form-group">
					<div class="col-md-3 ">
						<label>review</label>
					</div>
					<div class="col-md-5">
						<textarea name="review" class="form-control"></textarea>
					</div>
					
				</div>

				<div class="row  form-group">
					<div class="col-md-3 ">
						<label>Youtube url</label>
					</div>
					<div class="col-md-5">
						<input type="text" name="youtube" class="form-control">
					</div>
					
				</div>

				<div class="offset-7 col-md-3">
					<input type="submit" value="ADD" class="btn btn-info">
				</div>
				
			</form>
		</div>
		<!--  -->
		

	<div class="col-md-8 offset-2 mt-5">

		<table class="table table-dark table-sm">
			<tr>
				<th>NO.</th>
				 
				<th>Mobile</th>
				<th colspan="2">Action</th>
			</tr>
			@foreach($specifications as $specification)
			<tr>
				<td>{{$specification->id}}</td>
				 
			 
				<td>{{$specification->category->name}}</td>
				<td>
				 	<a href="{{route('specification.edit',$specification->id)}}" class="btn btn-secondary "  >Edit</a>
				</td>
				<td> 	
	                    <form action="{{route('specification.destroy',$specification->id)}}" method="post">
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


@section('script')
<script type="text/javascript">
	$(document).ready(function(){
		$('#add').show();
		$('#edit').hide();

		$.ajaxSetup({
        headers:{
          'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
      });
		$('.editspecification').click(function(){
			var id = $(this).data('id');
			alert(id);
			 $.get('/specification/show/',{id,id},function(response){
			 	var specification = response.specification;
			 	var category = response.category;
			 	var brand = response.brand;
			 	var specification_name = specification.specification_name;
			 	var specification_price = specification.specification_price;
			 	var image = specification.image;
			 	var id = specification.id;
			 	$('#id').val(id);
			 	$('#specification_name').val(specification_name);
			 	$('#specification_price').val(specification_price);
			 	$('#image').attr('src',image);
			 	$('#oldimg').val(image); 
			 })
			$('#add').hide();
			$('#edit').show(1000);
			
		})
	})
</script>

@endsection