<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>TDWR</title>
	<link rel="shortcut icon" href="/logo.webp">
	<!-- Custom fonts for this template-->
	<link href="/sb-admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

	<!-- Custom styles for this template-->
	<link rel="stylesheet" href="/dataTables.bootstrap4.min.css">
	<link href="/sb-admin/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::asset('sweetalert/sweetalert2.min.css')}}">
	@yield('css')
</head>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #00adef;">
			<!-- Sidebar - Brand -->
			<div class="d-flex justify-content-center my-3">
				<a class="navbar-brand my-1 p-0 mr-0" href="/admin"><img src="/logo.webp" width="80%"></a>
			</div>
			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<!-- Nav Item - Dashboard -->
			<li class="nav-item @if (Request::segment(1) == 'admin' && Request::segment(2) == '') active @endif">
				<a class="nav-link" href="/admin">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Dashboard</span></a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider">

            <li class="nav-item @if (Request::segment(2) == 'products') active @endif">
				<a class="nav-link" href="/admin/products">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Products</span></a>
			</li>

			<!-- Nav Item - Pages Collapse Menu -->
			{{-- <li class="nav-item ">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
					<i class="fas fa-fw fa-cog"></i>
					<span>Manage</span>
				</a>
				<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<a class="collapse-item ">Provinsi</a>
						<a class="collapse-item ">Kabupaten</a>
					</div>
				</div>
			</li> --}}

			<!-- Divider -->
			<hr class="sidebar-divider d-none d-md-block">

			<!-- Sidebar Toggler (Sidebar) -->
			<div class="text-center d-none d-md-inline">
				<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div>

		</ul>
		<!-- End of Sidebar -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">
				<!-- Topbar -->
				<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

					<!-- Sidebar Toggle (Topbar) -->
					<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
						<i class="fa fa-bars"></i>
					</button>

					<div class="d-sm-flex align-items-center justify-content-between mx-auto">
						<h1 class="h3 mb-0 text-gray-800"><?= $title ?>
						</h1>
					</div>
                    <ul class="navbar-nav">
						<!-- Nav Item - User Information -->
						<li class="nav-item dropdown no-arrow">
							<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="far fa-user-circle fa-2x mr-3"></i>
							</a>
							<!-- Dropdown - User Information -->
							<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
								<a class="dropdown-item" href="/logout">
									<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
									Logout
								</a>
							</div>
						</li>

					</ul>


					<!-- Topbar Navbar -->

				</nav>
				<!-- End of Topbar -->
            	@yield('contents')
			</div>

				<!-- End of Main Content -->
				<!-- Footer -->
				<footer class="footer bg-white">
					<div class="container">
						<div class="copyright text-center">
							<span>© 2021 All Rights Reserved</span>
						</div>
					</div>
				</footer>
				<!-- End of Footer -->

		</div>
				<!-- End of Content Wrapper -->

	</div>
				<!-- End of Page Wrapper -->

				<!-- Scroll to Top Button-->
				<a class="scroll-to-top rounded" href="#page-top">
					<i class="fas fa-angle-up"></i>
				</a>

				<!-- Bootstrap core JavaScript-->
				<script src="/sb-admin/vendor/jquery/jquery.min.js"></script>
				<script src="/sb-admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

				<!-- Core plugin JavaScript-->
				<script src="/sb-admin/vendor/jquery-easing/jquery.easing.min.js"></script>

				<!-- Custom scripts for all pages-->
				<script src="/sb-admin/js/sb-admin-2.min.js"></script>
                <script src="{{URL::asset('sweetalert/sweetalert2.all.min.js')}}"></script>
        @yield('scripts')

				@if (Session::has('message'))
						<script>
								Swal.fire(
										'Success!',
										'{{ Session::get('message')}}',
										'success')
						</script>
				@endif
				@if (Session::has('error'))
						<script>
								Swal.fire(
										'Error!',
										'{{ Session::get('error')}}',
										'error')
						</script>
				@endif
	</body>
</html>

