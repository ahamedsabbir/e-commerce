@if($errors->any())
	@foreach($errors->all() as $error)
	<div class="alert alert-warning alert-dismissible fade show" role="alert">
	  <strong>Error!</strong> {{ $error }}
	  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
	@endforeach
@endif
@if(session('error'))
	<div class="alert alert-warning alert-dismissible fade show" role="alert">
	  <strong>Error!</strong> {{ session('error') }}
	  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
@endif
@if(session('success'))
	<div class="alert alert-warning alert-dismissible fade show" role="alert">
	  <strong>Success!</strong> {{ session('success') }}
	  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
@endif
