<aside
	class="main-sidebar elevation-4 {{ session('dark-mode', false) ? 'sidebar-dark-primary' : 'sidebar-light-primary' }}">
	<a class="brand-link" href="index3.html">
		<img alt="AdminLTE Logo" class="brand-image img-circle elevation-3" src="/dist/img/AdminLTELogo.png" style="opacity: .8">
		<span class="brand-text font-weight-light">{{ env('APP_NAME') }}</span>
	</a>
	<div class="sidebar">
		<div class="user-panel d-flex mt-3 mb-3 pb-3">
			<div class="image">
				<img alt="User Image" class="img-circle elevation-2" src="/dist/img/user2-160x160.jpg">
			</div>
			<div class="info">
				<a class="d-block" href="#">Alexander Pierce</a>
			</div>
		</div>
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-accordion="false" data-widget="treeview" role="menu">
				<li class="nav-item">
					<a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="dashboard">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>Dashboard</p>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">
						<i class="nav-icon fas fa-circle"></i>
						<p>
							Kriteria
							<i class="fas fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a class="nav-link" href="#">
								<i class="far fa-circle nav-icon"></i>
								<p>Kriteria 1</p>
							</a>
						</li>
					</ul>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a class="nav-link" href="#">
								<i class="far fa-circle nav-icon"></i>
								<p>Kriteria 2</p>
							</a>
						</li>
					</ul>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a class="nav-link" href="#">
								<i class="far fa-circle nav-icon"></i>
								<p>Kriteria 3</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">
						<i class="fas fa-circle nav-icon"></i>
						<p>Alternatif</p>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">
						<i class="fas fa-circle nav-icon"></i>
						<p>Penilaian</p>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">
						<i class="fas fa-circle nav-icon"></i>
						<p>Perhitungan</p>
					</a>
				</li>
				<li class="nav-header">LABEL</li>
				<li class="nav-item">
					<a class="nav-link {{ Request::is('test') ? 'active' : '' }}" href="test">
						<i class="fas fa-circle nav-icon"></i>
						<p>Test</p>
					</a>
				</li>
			</ul>
		</nav>
	</div>
</aside>
