<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

	<div class="h-100" data-simplebar>

		 <!-- User box -->
		<div class="user-box text-center">

			<img src="{{ asset('/adminto/assets/images/users/user-1.jpg') }}" alt="user-img" title="Mat Helme" class="rounded-circle img-thumbnail avatar-md">
				<div class="dropdown">
					<a href="#" class="user-name dropdown-toggle h5 mt-2 mb-1 d-block" data-bs-toggle="dropdown"  aria-expanded="false">Nowak Helme</a>
					<div class="dropdown-menu user-pro-dropdown">

						<!-- item-->
						<a href="javascript:void(0);" class="dropdown-item notify-item">
							<i class="fe-user me-1"></i>
							<span>My Account</span>
						</a>

						<!-- item-->
						<a href="javascript:void(0);" class="dropdown-item notify-item">
							<i class="fe-settings me-1"></i>
							<span>Settings</span>
						</a>

						<!-- item-->
						<a href="javascript:void(0);" class="dropdown-item notify-item">
							<i class="fe-lock me-1"></i>
							<span>Lock Screen</span>
						</a>

						<!-- item-->
						<a href="javascript:void(0);" class="dropdown-item notify-item">
							<i class="fe-log-out me-1"></i>
							<span>Logout</span>
						</a>

					</div>
				</div>

			<p class="text-muted left-user-info">Admin Head</p>

			<ul class="list-inline">
				<li class="list-inline-item">
					<a href="#" class="text-muted left-user-info">
						<i class="mdi mdi-cog"></i>
					</a>
				</li>

				<li class="list-inline-item">
					<a href="#">
						<i class="mdi mdi-power"></i>
					</a>
				</li>
			</ul>
		</div>

		<!--- Sidemenu -->
		<div id="sidebar-menu">

			<ul id="side-menu">

				<li class="menu-title">Navigation</li>
	
				<li>
					<a href="{{ url('home') }}">
						<i class="mdi mdi-view-dashboard-outline"></i>
						<span class="badge bg-success rounded-pill float-end">9+</span>
						<span> Dashboard </span>
					</a>
				</li>

				<li>
					<a href="{{ url('/dashboard/setting/update/page/1') }}">
						<i class="mdi mdi-view-dashboard-outline"></i>
						<span> Settings </span>
					</a>
				</li>
				
				<li class="menu-title mt-2">Apps</li>
				<li>
					<a href="#product" data-bs-toggle="collapse">
						<i class="mdi mdi-car-outline"></i>
						<span> Product</span>
						<span class="menu-arrow"></span>
					</a>
					<div class="collapse" id="product">
						<ul class="nav-second-level">
							<li>
								<a href="{{ url('dashboard/product/insert/page') }}">Insert</a>
							</li>
							<li>
								<a href="{{ url('dashboard/product/loop') }}">Show All</a>
							</li>
						</ul>
					</div>
				</li>
				<li>
					<a href="#category" data-bs-toggle="collapse">
						<i class="mdi mdi-car-outline"></i>
						<span> Category </span>
						<span class="menu-arrow"></span>
					</a>
					<div class="collapse" id="category">
						<ul class="nav-second-level">
							<li>
								<a href="{{ url('dashboard/category/insert/page') }}">Insert</a>
							</li>
							<li>
								<a href="{{ url('dashboard/category/loop') }}">Show All</a>
							</li>
						</ul>
					</div>
				</li>
				<li>
					<a href="#subcategory" data-bs-toggle="collapse">
						<i class="mdi mdi-car-outline"></i>
						<span> Sub Category </span>
						<span class="menu-arrow"></span>
					</a>
					<div class="collapse" id="subcategory">
						<ul class="nav-second-level">
							<li>
								<a href="{{ url('dashboard/subcategory/insert/page') }}">Insert</a>
							</li>
							<li>
								<a href="{{ url('dashboard/subcategory/loop') }}">Show All</a>
							</li>
						</ul>
					</div>
				</li>
				<li>
					<a href="#brand" data-bs-toggle="collapse">
						<i class="mdi mdi-car-outline"></i>
						<span> Brand</span>
						<span class="menu-arrow"></span>
					</a>
					<div class="collapse" id="brand">
						<ul class="nav-second-level">
							<li>
								<a href="{{ url('dashboard/brand/insert/page') }}">Insert</a>
							</li>
							<li>
								<a href="{{ url('dashboard/brand/loop') }}">Show All</a>
							</li>
						</ul>
					</div>
				</li>
			</ul>

		</div>
		<!-- End Sidebar -->

		<div class="clearfix"></div>

	</div>
	<!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->