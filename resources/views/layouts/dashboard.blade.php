@extends('app')

@section('link-head')
	<link href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet">
	<link href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css" rel="stylesheet">
	<link href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css" rel="stylesheet">
	<link href="/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet">
	<link href="/plugins/overlayScrollbars/css/OverlayScrollbars.min.css" rel="stylesheet">
@endsection

@section('content')
	<div class="wrapper">
		@if (!env('APP_DEBUG'))
			<div class="preloader flex-column justify-content-center align-items-center">
				<img alt="AdminLTELogo" class="animation__shake" height="60" src="/dist/img/AdminLTELogo.png" width="60">
			</div>
		@endif
		@include('components.navbar')
		@include('components.sidebar')
		<div class="content-wrapper">
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1 class="m-0">{{ $title ?? 'Not set' }}</h1>
						</div>
						{{-- <div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active">{{ $title ?? 'Not set' }}</li>
							</ol>
						</div> --}}
					</div>
				</div>
			</div>
            @yield('inner-content')
		</div>
		@include('components.footer')
	</div>
	<script src="/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
	<script src="/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
	<script src="/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
	<script src="/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
	<script src="/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
	<script src="/plugins/jszip/jszip.min.js"></script>
	<script src="/plugins/pdfmake/pdfmake.min.js"></script>
	<script src="/plugins/pdfmake/vfs_fonts.js"></script>
	<script src="/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
	<script src="/plugins/datatables-buttons/js/buttons.print.min.js"></script>
	<script src="/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
	<script src="/plugins/moment/moment.min.js"></script>
	<script src="/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
	<script src="/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
