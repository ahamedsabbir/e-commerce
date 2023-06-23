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

                                        <div class="alert alert-warning d-none fade show">
                                            <h4 class="mt-0 text-warning">Oh snap!</h4>
                                            <p class="mb-0">This form seems to be invalid :(</p>
                                        </div>

                                        <div class="alert alert-info d-none fade show">
                                            <h4 class="mt-0 text-info">Yay!</h4>
                                            <p class="mb-0">Everything seems to be ok :)</p>
                                        </div>

                                        <form action="{{ url('dashboard/subcategory/insert/function') }}" method="post"  enctype="multipart/form-data">
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
                                                <label for="category" class="form-label">Category * :</label>
                                                <select type="text" id="title" class="form-control" name="category" data-parsley-trigger="change" required="">
														<option value="">select</option>
													@forelse($category as $category_key => $category_value)
														<option value="{{ $category_value->id }}">{{ $category_value->name }}</option>
														@empty
														<option value="">empty</option>
													@endforelse
												</select>
                                            </div>
											<div class="mb-3">
                                                <label for="fonticon" class="form-label">Font Icon * :</label>
                                                <input type="text" id="fonticon" class="form-control" name="font_icon" value="{{ old('fonticon') }}" data-parsley-trigger="change" required="">
                                            </div>
                                            <div class="mb-3">
                                                <label for="icon" class="form-label">Icon * :</label>
                                                <input type="file" id="icon" class="form-control" name="icon" data-parsley-trigger="change" required="">
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