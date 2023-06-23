@extends('galio/app')
@section('content')
	<div class="wrapper">
		@include('galio/inc/header')
		@include('galio/inc/slider')
		@include('galio/inc/banner')
		<!-- page wrapper start -->
		<div class="page-wrapper pt-6 pb-28 pb-md-6 pb-sm-6 pt-xs-36">
			<div class="container">
				<div class="row">
					@include('galio/inc/left')
					@include('galio/inc/right')
				</div>
			</div>
		</div>
		<!-- page wrapper end -->
		@include('galio/inc/brand')
		@include('galio/inc/latest')
		@include('galio/inc/footer')
	</div>
@endsection