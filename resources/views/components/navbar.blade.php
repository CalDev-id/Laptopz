<nav class="main-header navbar navbar-expand {{ session('dark-mode') ? 'dark-mode' : 'navbar-light' }}">
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
		</li>
	</ul>
	<ul class="navbar-nav ml-auto">
		<li class="nav-item">
			<a class="nav-link" href="/dark-mode" role="button">
				<i class="fas fa-{{ session('dark-mode') ? 'moon' : 'sun' }}"></i>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" data-widget="fullscreen" href="#" role="button">
				<i class="fas fa-expand-arrows-alt"></i>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" role="button"><i class="fas fa-sign-out-alt mr-1"></i>{{ __(' Logout') }}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
		</li>
	</ul>
</nav>
