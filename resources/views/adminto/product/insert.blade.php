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
                <div class="content">
                    <!-- Start Content-->
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Parsley Examples</h4>
                                        <p class="sub-header">Parsley is a javascript form validation library. It helps you provide your users with feedback on
                                        their form submission before sending it to your server.</p>
										@include('adminto/inc/alert')
                                        <form action="{{ url('dashboard/product/insert/function') }}" method="post"  enctype="multipart/form-data">
                                            @csrf
											<div class="mb-3">
                                                <label for="name" class="form-label">Name * :</label>
                                                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" data-parsley-trigger="change" required="">
                                            </div>
                                            <div class="mb-3">
                                                <label for="title" class="form-label">Title * :</label>
                                                <input type="text" id="title" class="form-control" name="title" value="{{ old('title') }}" data-parsley-trigger="change" required="">
                                            </div>
											<div class="mb-3">
                                                <label for="quantity" class="form-label">Quantity  * :</label>
                                                <input type="number" id="quantity" class="form-control" name="quantity" value="{{ old('quantity') }}" data-parsley-trigger="change" required="">
                                            </div>
											<div class="mb-3">
                                                <label for="price" class="form-label">Price  * :</label>
                                                <input type="number" id="price" class="form-control" name="price" value="{{ old('price') }}" data-parsley-trigger="change" required="">
                                            </div>
											<div class="mb-3">
                                                <label for="thumb" class="form-label">Thumb * :</label>
                                                <input type="file" id="thumb" class="form-control" name="thumb" data-parsley-trigger="change" required="">
                                            </div>
											<div class="mb-3">
                                                <label for="photo" class="form-label">Photo * :</label>
                                                <input type="file" id="photo" class="form-control" name="photo[]" multiple required="">
                                            </div>
											<div class="mb-3">
                                                <label for="category" class="form-label">Category * :</label>
                                                <select id="categoris" class="form-control" name="category">
														<option value="">select</option>
													@forelse($category as $category_key => $category_value)
														<option value="{{ $category_value->id }}">{{ $category_value->name }}</option>
														@empty
														<option value="">empty</option>
													@endforelse
												</select>
                                            </div>
											<div class="mb-3">
                                                <label for="subcategory" class="form-label">Sub category * :</label>
                                                <select id="subcategoris" class="form-control" name="subcategory"></select>
                                            </div>
											<div class="mb-3">
                                                <label for="brand" class="form-label">Brand * :</label>
                                                <select id="title" class="form-control" name="brand" data-parsley-trigger="change" required="">
														<option value="">select</option>
													@forelse($brand as $brand_key => $brand_value)
														<option value="{{ $brand_value->id }}">{{ $brand_value->name }}</option>
														@empty
														<option value="">empty</option>
													@endforelse
												</select>
                                            </div>
											<div class="mb-3">
                                                <label for="description" class="form-label">Description * :</label>
												<textarea id="editor" class="ckeditor form-control" name="description" name="description" data-parsley-trigger="change" required="">{{ old('description') }}</textarea>
											</div>
                                            <div>
                                                <input type="submit" class="btn btn-success" name="submit" value="insert">
                                            </div>
                                        </form>
                                    </div>
                                </div> <!-- end card-->
                            </div> <!-- end col-->
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
$('#categoris').change(function(){
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