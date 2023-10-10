<body class="animsition">
	<div class="page-wrapper">
		<!-- HEADER MOBILE-->
		<header class="header-mobile d-block d-lg-none">
			<div class="header-mobile__bar">
				<div class="container-fluid">
					<div class="header-mobile-inner">
						<a class="logo" href="#">
							<h3>Menu</h3>
						</a>
						<button class="hamburger hamburger--slider" type="button">
							<span class="hamburger-box">
								<span class="hamburger-inner"></span>
							</span>
						</button>
					</div>
				</div>
			</div>
			<nav class="navbar-mobile">
				<div class="container-fluid">
					<ul class="navbar-mobile__list list-unstyled">
						<li>
							<a href="<?= base_url() ?>"><i class="fas fa-globe"></i>Website</a>
						</li>
						<li>
							<a href="<?= base_url('admin') ?>"><i class="fas fa-map"></i>Pemetaan</a>
						</li>
						<li>
							<a href="<?= base_url('wisata') ?>"><i class="fas fa-location-arrow"></i>Lokasi</a>
						</li>


						<li>
							<a href="<?= base_url('icon') ?>"> <i class="fas fa-map-marker"></i>Icon</a>
						</li>
						<li>
							<a href="<?= base_url('user') ?>"> <i class="fas fa-user"></i>User</a>
						</li>
					</ul>
				</div>
			</nav>
		</header>
		<!-- END HEADER MOBILE-->

		<!-- MENU SIDEBAR-->
		<aside class="menu-sidebar d-none d-lg-block">
			<div class="logo">
				<a href="#">
					<h3>Admin GIS T Bayur</h3>
				</a>
			</div>
			<div class="menu-sidebar__content js-scrollbar1">
				<nav class="navbar-sidebar">
					<ul class="list-unstyled navbar__list">
						<li>
							<a href="<?= base_url() ?>"><i class="fas fa-globe"></i>Website</a>
						</li>
						<li>
							<a href="<?= base_url('admin') ?>"><i class="fas fa-map"></i>Pemetaan</a>
						</li>
						<li>
							<a href="<?= base_url('lokasi') ?>"><i class="fas fa-location-arrow"></i>Lokasi</a>
						</li>


						<li>
							<a href="<?= base_url('icon') ?>"> <i class="fas fa-map-marker"></i>Kategori</a>
						</li>
						<li>
							<a href="<?= base_url('user') ?>"> <i class="fas fa-user"></i>User</a>
						</li>


					</ul>
				</nav>
			</div>
		</aside>
		<!-- END MENU SIDEBAR-->

		<!-- PAGE CONTAINER-->
		<div class="page-container">
			<!-- HEADER DESKTOP-->
			<header class="header-desktop">
				<div class="section__content section__content--p30">
					<div class="container-fluid">
						<div class="header-wrap">
							<h3>GIS PELABUHAN TELUK BAYUR</h3>
							<div class="header-button">

								<div class="account-wrap">
									<div class="account-item clearfix js-item-menu">
										<div class="image">
											<img src="<?= base_url('foto/' . $this->session->userdata('foto')) ?>" alt="Foto_user" />
										</div>
										<div class="content">
											<a class="js-acc-btn" href="#"><?= $this->session->userdata('nama_user') ?></a>
										</div>
										<div class="account-dropdown js-dropdown">
											<div class="info clearfix">
												<div class="image">
													<a href="#">
														<img src="<?= base_url('foto/' . $this->session->userdata('foto')) ?>" alt="Foto_User" />
													</a>
												</div>
												<div class="content">
													<h5 class="name">
														<a href="#"><?= $this->session->userdata('nama_user') ?></a>
													</h5>
													<span class="email"><?= $this->session->userdata('email') ?></span>
												</div>
											</div>

											<div class="account-dropdown__footer">
												<a href="<?= base_url('auth/logout') ?>">
													<i class="zmdi zmdi-power"></i>Logout</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>
			<!-- HEADER DESKTOP-->
			<!-- MAIN CONTENT-->
			<div class="main-content">
				<div class="section__content section__content--p30">
					<div class="container-fluid">