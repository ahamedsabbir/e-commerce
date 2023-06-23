@extends('adminto/app')
@section('content')
	<!-- Begin page -->
        <div id="wrapper">

			@include('adminto/inc/top')
            

            @include('adminto/inc/left')

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
         
            <div class="content-page">
				@include('adminto/inc/alert')
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-8">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Parsley Examples</h4>
                                        <p class="sub-header">Parsley is a javascript form validation library. It helps you provide your users with feedback on
                                        their form submission before sending it to your server.</p>

                                        <div class="alert alert-warning d-none fade show">
                                            <h4 class="mt-0 text-warning">Oh snap!</h4>
                                            <p class="mb-0">This form seems to be invalid :(</p>
                                        </div>

                                        <div class="alert alert-info d-none fade show">
                                            <h4 class="mt-0 text-info">Yay!</h4>
                                            <p class="mb-0">Everything seems to be ok :)</p>
                                        </div>

                                        <form action="{{ url('dashboard/product/update/function/'.$product->id) }}" method="post"  enctype="multipart/form-data">
                                            @csrf
											<div class="mb-3">
                                                <label for="name" class="form-label">Name * :</label>
                                                <input type="text" class="form-control" name="name" id="name" value="{{ $product->name }}" data-parsley-trigger="change" required="">
                                            </div>
                                            <div class="mb-3">
                                                <label for="title" class="form-label">Title * :</label>
                                                <input type="text" id="title" class="form-control" name="title" value="{{ $product->title }}" data-parsley-trigger="change" required="">
                                            </div>
											<div class="mb-3">
                                                <label for="quantity" class="form-label">Quantity  * :</label>
                                                <input type="number" id="quantity" class="form-control" name="quantity" value="{{ $product->quantity }}" data-parsley-trigger="change" required="">
                                            </div>
											<div class="mb-3">
                                                <label for="price" class="form-label">Price  * :</label>
                                                <input type="number" id="price" class="form-control" name="price" value="{{ $product->price }}" data-parsley-trigger="change" required="">
                                            </div>
                                            <div class="mb-3">
                                                <label for="thumb" class="form-label">Thumb * :</label>
                                                <input type="file" id="thumb" class="form-control" name="thumb" data-parsley-trigger="change">
                                            </div>
											<div class="mb-3">
                                                <label for="photo" class="form-label">Photo * :</label>
                                                <input type="file" id="photo" class="form-control" name="photo[]" data-parsley-trigger="change" multiple>
                                            </div>
											<div class="mb-3">
                                                <label for="category" class="form-label">Category * :</label>
                                                <select id="categoris" class="form-control" name="category">
														<option value="">select</option>
													@forelse($category as $category_key => $category_value)
														<option value="{{ $category_value->id }}" {{ $category_value->id == $product->category ? 'selected' : '' }}>{{ $category_value->name }}</option>
														@empty
														<option value="">empty</option>
													@endforelse
												</select>
                                            </div>
											<div class="mb-3">
                                                <label for="subcategory" class="form-label">Sub category * :</label>
                                                <select id="subcategoris" class="form-control" name="subcategory">
													<option value="{{ App\Models\Subcategory::find($product->subcategory)->id }}">{{ App\Models\Subcategory::find($product->subcategory)->name }}</option>
												</select>
                                            </div>
											<div class="mb-3">
                                                <label for="brand" class="form-label">Brand * :</label>
                                                <select id="title" class="form-control" name="brand" data-parsley-trigger="change" required="">
														<option value="">select</option>
													@forelse($brand as $brand_key => $brand_value)
														<option value="{{ $brand_value->id }}" {{ $brand_value->id == $product->brand ? 'selected' : '' }}>{{ $brand_value->name }}</option>
														@empty
														<option value="">empty</option>
													@endforelse
												</select>
                                            </div>
											<div class="mb-3">
                                                <label for="description" class="form-label">Description * :</label>
												<textarea id="editor" class="ckeditor form-control" name="description" name="description" data-parsley-trigger="change" required="">{{ $product->description }}</textarea>
											</div>
                                            <div>
                                                <input type="submit" class="btn btn-success" name="submit" value="update">
                                            </div>
                                        </form>
                                    </div>
                                </div> <!-- end card-->
                            </div> <!-- end col-->
							<div class="col-4">
								<h4 class="text-center">Thumb</h4><hr />
								<a href="{{ asset('/uploads/'.$product->thumb) }}" ><img class="img-thumbnail" src="{{ asset('/uploads/'.$product->thumb) }}" /></a>
								<div class="row py-3">
									<h4 class="text-center">Photo</h4><hr />
									@if($product->photo != '')	
										@foreach(explode(", ", $product->photo) as $photo_key => $photo_value)
										<div class="col-6 text-center py-1">
											<a href="{{ asset('/uploads/'.$photo_value) }}" ><img class="img-thumbnail" src="{{ asset('/uploads/'.$photo_value) }}" alt="image"/></a>
											<a class="btn btn-danger" href="{{ url('/dashboard/product/file/delete/'.$product->id.'?file='.$photo_value) }}">Delete</a>
										</div>
										@endforeach
									@endif
								</div>
							<div>
                        </div>
                        <!-- end row-->     
                   
                    </div> <!-- container-fluid -->

                </div> <!-- content -->

                @include('adminto/inc/footer')

            </div>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->
	@include('adminto/inc/right')
@endsection
@section('script')
<script>
$('#categoris').click(function(){
	var category = $('#categoris').val();
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$.ajax({
		type : 'POST',
		url : '/dashboard/ajax/get/subcategory/data',
		data : {category:category},
		success : function(data){
			$('#subcategoris').html(data);
		}
	});
});
</script>
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
<script type="text/javascript">
CKEDITOR.replace('editor', {
	filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
	filebrowserUploadMethod: 'form'
});
</script>
@endsection