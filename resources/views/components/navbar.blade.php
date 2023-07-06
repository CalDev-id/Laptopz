<nav class="main-header navbar navbar-expand {{ session('dark-mode') ? 'dark-mode' : 'navbar-light' }}">
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
		</li>
	</ul>
	<ul class="navbar-nav ml-auto">
		<li class="nav-item">
			<a class="nav-link" href="#" role="button">
				<i class="fas fa-{{ session('dark-mode') ? 'sun' : 'moon' }}"></i>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" data-widget="fullscreen" href="#" role="button">
				<i class="fas fa-expand-arrows-alt"></i>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="#" role="button"><i class="fas fa-sign-out-alt"></i></a>
		</li>
	</ul>
</nav>
