@extends('adminto/app')
@section('style')
	<!-- third party css -->
	<link href="{{ asset('adminto/assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('adminto/assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('adminto/assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('adminto/assets/libs/datatables.net-select-bs5/css//select.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
	<!-- third party css end -->
@endsection
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
                                        <h4 class="mt-0 header-title">Default Example</h4>
                                        <p class="text-muted font-14 mb-3">
                                            DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: <code>$().DataTable();</code>.
                                        </p>
										<form action="{{ url('/dashboard/product/group/remove/') }}" method="get">
											<table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
												@csrf
												<thead>
												<tr class="text-center">
													<th></th>
													<th>Thumb</th>
													<th>Name</th>
													<th>Title</th>
													<th>Quantity</th>
													<th>Price</th>
													<th>Action</th>
												</tr>
												</thead>
												<tbody>
												@forelse($product as $product_key => $product_value)
												<tr>
													<td class="text-center"><input type="checkbox" id="vehicle3" name="product[]" value="{{ $product_value->id }}"></td>
													<td class="text-center"><a href="{{ asset('/uploads/'.$product_value->thumb) }}"><img style="width:40px;" src="{{ asset('/uploads/'.$product_value->thumb) }}" /></a></td>
													<td>{{ $product_value->name }}</td>
													<td>{{ $product_value->title }}</td>
													<td>{{ $product_value->quantity }}</td>
													<td>{{ $product_value->price }}</td>
													<td class="text-center">
														<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
														  <div class="btn-group" role="group">
															<button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
															  Action
															</button>
															<ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
															  <li><a class="dropdown-item" href="{{ url('dashboard/product/update/page/'.$product_value->id) }}">Edit</a></li>
															  <li><a class="dropdown-item" href="{{ url('dashboard/product/remove/'.$product_value->id) }}">Delete</a></li>
															</ul>
														  </div>
														</div>
													</td>
												</tr>
												@empty
													<tr class="text-center">
														<td colspan="100" style="color:red;">No data</td>
													</tr>
												@endforelse
												</tbody>
											</table>
											<button class="btn btn-warning" type="submit" name="submit" value="delete">Delete</button>
										</form>
                                    </div>
                                </div>
                               
                            </div>
                        </div> <!-- end row -->       
                        
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
	<!-- third party js -->
	<script src="{{ asset('adminto/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('adminto/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
	<script src="{{ asset('adminto/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
	<script src="{{ asset('adminto/assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
	<script src="{{ asset('adminto/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
	<script src="{{ asset('adminto/assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
	<script src="{{ asset('adminto/assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
	<script src="{{ asset('adminto/assets/libs/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
	<script src="{{ asset('adminto/assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
	<script src="{{ asset('adminto/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
	<script src="{{ asset('adminto/assets/libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>
	<script src="{{ asset('adminto/assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
	<script src="{{ asset('adminto/assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
	<!-- third party js ends -->

	<!-- Datatables init -->
    <script src="{{ asset('adminto/assets/js/pages/datatables.init.js') }}"></script>
@endsection