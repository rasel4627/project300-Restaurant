@extends('backend.admin_layout')
@section('admin_content')

 @php
   $category = DB::table('categories')->where('publication_status',1)->get();
 @endphp

<ul class="breadcrumb"> 
	<li>
		<i class="icon-home"></i>
		<a href="{{url('/dashboard')}}">Home</a>
		<i class="icon-angle-right"></i> 
	</li>
	<li>
		<i class="icon-edit"></i>
		<a href="{{ url('/add-product') }}">Add Food</a>
	</li>
</ul>		
<div class="row-fluid sortable">
<div class="box span12">
	<div class="box-header" data-original-title>
		<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Food</h2>
	</div>
	<div class="box-content">
		<form class="form-horizontal" action="{{url('/store-product')}}" method="post" enctype="multipart/form-data">
		  @csrf
		  <fieldset>
			<div class="control-group">
			  <label class="control-label" for="date01">Food Name</label>
			  <div class="controls">
				<input type="text" class="input-xlarge" name="product_name" required="">
			  </div>
			</div>

			<div class="control-group">
				<label class="control-label" for="selectError3">Food Category</label>
				<div class="controls">
				  <select id="selectError3" name="category_id">
				  	<option>Select Category</option>
                        @foreach($category as $row){?>
					       <option value="{{$row->category_id}}">{{$row->category_name}}</option>
					     @endforeach
				  </select>
				</div>
			</div>
        
			<div class="control-group hidden-phone">
			  <label class="control-label" for="textarea2">Food Short Description</label>
			  <div class="controls">
				<textarea id="editor" name="product_short_description" rows="3" ></textarea>
			  </div>
			</div>


			<div class="control-group">
			  <label class="control-label" for="date01">Food Price</label>
			  <div class="controls">
				<input type="text" class="input-xlarge" name="product_price" required="">
			  </div>
			</div>

			<div class="control-group">
			  <label class="control-label" for="fileInput">Image</label>
			  <div class="controls">
				<input class="input-file uniform_on" name="product_image" id="fileInput" type="file" onchange="readURL(this);" required="">
				<img src="" id="one" >
			  </div>
			</div> 

			<div class="control-group">
			  <label class="control-label" for="textarea2">Publication Status</label>
			  <div class="controls">
			  	<label class="checkbox inline">
				<input type="checkbox" name="publication_status" value="1">
				</label>
			  </div>
			</div>

			<div class="form-actions">
			  <button type="submit" class="btn btn-primary">Add Food</button>
			  <button type="reset" class="btn">Cancel</button>
			</div>
		  </fieldset>
		</form>   
	</div>
</div>
</div>

<script src="{{asset('public/backend/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript">
function readURL(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
          $('#one')
              .attr('src', e.target.result)
              .width(100)
              .height(90);
      };
      reader.readAsDataURL(input.files[0]);
  }
}
</script>
@endsection