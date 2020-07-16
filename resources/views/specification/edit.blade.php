@extends('backtemplate')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div id="add">
			<h1>Add Category </h1>
			<form action="{{route('specification.update',$specification->id)}}" method="post" enctype="multipart/form-data">
				@csrf
				@method('PUT')
			 
				<div class="row form-group">
					<div class="col-md-3 ">
						<label>Cpu </label>
					</div>
					<div class="col-md-5">
						<input type="name" name="cpu" class="form-control" value="{{$specification->cpu}}">
					</div>
					
				</div>
				<div class="row  form-group">
					<div class="col-md-3 ">
						<label>Memory</label>
					</div>
					<div class="col-md-5">
						<input type="name" name="memory" class="form-control" value="{{$specification->memory}}">
					</div>
					
				</div>
				
				<div class="row  form-group">
					<div class="col-md-3 ">
						<label>Mobile</label>
					</div>
					<div class="col-md-5">
						<select name="category_id"  class="form-control">
							<option>Choose Category</option>
							@foreach($categories as $category)
							<option value="{{$category->id}}"
								@if($category->id == $specification->category_id)
								{{'selected'}}
								@endif
								>{{$category->name}}</option>
							@endforeach
						</select>
					</div>
					
				</div>

				

				<div class="row  form-group">
					<div class="col-md-3 ">
						<label>Main_camera</label>
					</div>
					<div class="col-md-5">
						<input type="text" name="main_camera" class="form-control" value="{{$specification->main_camera}}">
					</div>
					
				</div>

				<div class="row  form-group">
					<div class="col-md-3 ">
						<label>selfie_camera</label>
					</div>
					<div class="col-md-5">
						<input type="text" name="selfie_camera" class="form-control" value="{{$specification->selfie_camera}}">
					</div>
					
				</div>
				<div class="row  form-group">
					<div class="col-md-3 ">
						<label>Battery</label>
					</div>
					<div class="col-md-5">
						<input type="text" name="battery" class="form-control" value="{{$specification->battery}}">
					</div>
					
				</div>
				<div class="row  form-group">
					<div class="col-md-3 ">
						<label>Feature</label>
					</div>
					<div class="col-md-5">
						<input type="text" name="features" class="form-control" value="{{$specification->features}}">
					</div>
					
				</div>
					<div class="row  form-group">
					<div class="col-md-3 ">
						<label>os</label>
					</div>
					<div class="col-md-5">
						<input type="text" name="os" class="form-control" value="{{$specification->os}}">
					</div>
					
				</div>
				<div class="row  form-group">
					<div class="col-md-3 ">
						<label>Display</label>
					</div>
					<div class="col-md-5">
						<input type="text" name="display" class="form-control" value="{{$specification->display}}">
					</div>
					
				</div>
				<div class="row  form-group">
					<div class="col-md-3 ">
						<label>Capacity</label>
					</div>
					<div class="col-md-5">
						<input type="text" name="capacity" class="form-control" value="{{$specification->capacity}}">
					</div>
					
				</div>
				<div class="row  form-group">
					<div class="col-md-3 ">
						<label>price</label>
					</div>
					<div class="col-md-5">
						<input type="text" name="price" class="form-control" value="{{$specification->price}}">
					</div>
					
				</div>
				<div class="row  form-group">
					<div class="col-md-3 ">
						<label>release Date</label>
					</div>
					<div class="col-md-5">
						<input type="date" name="date" class="form-control" value="{{$specification->date}}">
					</div>
					
				</div>

				<div class="row  form-group">
					<div class="col-md-3 ">
						<label>review</label>
					</div>
					<div class="col-md-5">
						<textarea name="review" class="form-control">{{$specification->review}}</textarea>
					</div>
					
				</div>

				<div class="row  form-group">
					<div class="col-md-3 ">
						<label>Youtube url</label>
					</div>
					<div class="col-md-5">
						<input type="text" name="youtube" class="form-control" value="{{$specification->youtube}}">
					</div>
					
				</div>
				<div class="row  form-group">
					<div class="col-md-3 ">
						<label>image</label>
					</div>
					<div class="col-md-4">
						<input type="file" name="image" class="form-control">
					</div>
					<div class="col-md-5">
						<input type="hidden" name="old_image" value="{{$specification->image}}">
						<img src="{{$specification->image}}" width="150" height="150">
					</div>
					
				</div>
				
					<div class="row  form-group">
					<div class="col-md-3 ">
						<label>CPU Rank</label>
					</div>
					<div class="col-md-5">
						<input type="text" name="cpu_rank" class="form-control" value="{{$specification->cpu_rank}}">
					</div>
					
				</div>
                
                <div class="row  form-group">
					<div class="col-md-3 ">
						<label>GPU Rank </label>
					</div>
					<div class="col-md-5">
						<input type="text" name="gpu_rank" class="form-control" value="{{$specification->gpu_rank}}">
					</div>
					
				</div>
				
				<div class="row  form-group">
					<div class="col-md-3 ">
						<label>Memory Rank</label>
					</div>
					<div class="col-md-5">
						<input type="text" name="memory_rank" class="form-control" value="{{$specification->memory_rank}}">
					</div>
					
				</div>
				
				<div class="row  form-group">
					<div class="col-md-3 ">
						<label>UX Rank</label>
					</div>
					<div class="col-md-5">
						<input type="text" name="ux_rank" class="form-control" value="{{$specification->ux_rank}}">
					</div>
					
				</div>
				<div class="row  form-group">
					<div class="col-md-3 ">
						<label>Total</label>
					</div>
					<div class="col-md-5">
						<input type="text" name="total" class="form-control" value="{{$specification->total}}">
					</div>
					
				</div>


				<div class="offset-7 col-md-3">
					<input type="submit" value="ADD" class="btn btn-info">
				</div>
				
			</form>
		</div>
		<!--  -->
		

	 
		
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