<aside
    class="main-sidebar elevation-4 {{ session('dark-mode') ? 'sidebar-dark-primary' : 'sidebar-light-primary' }}">
	<a class="brand-link" href="{{ route('dashboard.index') }}">
		<img alt="Laptopz Logo" class="brand-image img-circle" src="/dist/img/laptopz.png" style="opacity: .8">
		<span class="brand-text font-weight-light">Laptopz</span>
	</a>
	<div class="sidebar">
		<div class="user-panel d-flex mt-3 mb-3 pb-3">
			<div class="image">
				<img alt="User Image" class="img-circle elevation-2" src="/dist/img/profile.png">
			</div>
			<div class="info">
				<a class="d-block" href="#">{{ Auth::user()->name }}</a>
			</div>
		</div>
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-accordion="false" data-widget="treeview" role="menu">
				<li class="nav-item">
					<a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard.index') }}">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>Dashboard</p>
					</a>
				</li>
                @if(Auth::user()->roles == 'Administrator')
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('user') ? 'active' : '' }}" href="{{ route('user.index') }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>User</p>
                        </a>
                    </li>
                @endif
                <li class="nav-header">KRITERIA</li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('kriteria') || Request::is('kriteria/*/edit') ? 'active' : '' }}" href="{{ route('kriteria.index') }}">
                        <i class="fas fa-globe nav-icon"></i>
                        <p>Semua</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('kriteria/1') || Request::is('subkriteria/1/edit') ? 'active' : '' }}" href="{{ route('kriteria.display', 1) }}">
                        <i class="fas fa-memory nav-icon"></i>
                        <p>Kapasitas RAM</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('kriteria/2') || Request::is('subkriteria/2/edit') ? 'active' : '' }}" href="{{ route('kriteria.display', 2) }}">
                        <i class="fas fa-microchip nav-icon"></i>
                        <p>Jenis Processor</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('kriteria/3') || Request::is('subkriteria/3/edit') ? 'active' : '' }}" href="{{ route('kriteria.display', 3) }}">
                        <i class="fas fa-cogs nav-icon"></i>
                        <p>Core & Thread Processor</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('kriteria/4') || Request::is('subkriteria/4/edit') ? 'active' : '' }}" href="{{ route('kriteria.display', 4) }}">
                        <i class="fas fa-database nav-icon"></i>
                        <p>Kapasitas Penyimpanan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('kriteria/5') || Request::is('subkriteria/5/edit') ? 'active' : '' }}" href="{{ route('kriteria.display', 5) }}">
                        <i class="fas fa-hdd nav-icon"></i>
                        <p>Jenis Penyimpanan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('kriteria/6') || Request::is('subkriteria/6/edit') ? 'active' : '' }}" href="{{ route('kriteria.display', 6) }}">
                        <i class="fas fa-tv nav-icon"></i>
                        <p>Resolusi Layar</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('kriteria/7') || Request::is('subkriteria/7/edit') ? 'active' : '' }}" href="{{ route('kriteria.display', 7) }}">
                        <i class="fas fa-dumbbell nav-icon"></i>
                        <p>Berat</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('kriteria/8') || Request::is('subkriteria/8/edit') ? 'active' : '' }}" href="{{ route('kriteria.display', 8) }}">
                        <i class="fas fa-battery-full nav-icon"></i>
                        <p>Kapasitas Baterai</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('kriteria/9') || Request::is('subkriteria/9/edit') ? 'active' : '' }}" href="{{ route('kriteria.display', 9) }}">
                        <i class="fas fa-money-bill nav-icon"></i>
                        <p>Harga</p>
                    </a>
                </li>
                <li class="nav-header">ALTERNATIF</li>
				<li class="nav-item">
					<a class="nav-link {{ Request::is('alternatif*') ? 'active' : '' }}" href="{{ route('alternatif.index') }}">
						<i class="fas fa-laptop nav-icon"></i>
						<p>Laptop</p>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link {{ Request::is('penilaian') ? 'active' : '' }}" href="{{ route('penilaian.index') }}">
						<i class="fas fa-book nav-icon"></i>
						<p>Penilaian</p>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link {{ Request::is('perhitungan') ? 'active' : '' }}" href="{{ route('perhitungan.index') }}">
						<i class="fas fa-calculator nav-icon"></i>
						<p>Perhitungan</p>
					</a>
				</li>
				<br>
				<br>
				<br>
				<br>
			</ul>
		</nav>
	</div>
</aside>
