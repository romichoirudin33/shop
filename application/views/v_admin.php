<html>
	<head>
		<title>Admin</title>
		<link
			rel="stylesheet"
			href="<?= base_url('assets/plugins/bootstrap/css/bootstrap.min.css'); ?>"
		/>
		<link
			rel="stylesheet"
			href="<?= base_url('assets/plugins/datatables/dataTables.bootstrap4.min.css'); ?>"
		/>
		<link
			rel="stylesheet"
			href="<?= base_url('assets/plugins/dashboard.css'); ?>"
		/>
		<link
			rel="stylesheet"
			href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
			integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
			crossorigin="anonymous"
		/>
		<link
			href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css"
			rel="stylesheet"
		/>
		<style>
			body {
				background-color: #eee;
			}
			.btn-xs {
				padding: 0.1rem 0.25rem;
				font-size: 0.65rem;
				line-height: 1.5;
				border-radius: 0.1rem;
			}
			.text-sm {
				font-size: 13;
			}
			.bd-placeholder-img {
				font-size: 1.125rem;
				text-anchor: middle;
				-webkit-user-select: none;
				-moz-user-select: none;
				-ms-user-select: none;
				user-select: none;
			}

			@media (min-width: 768px) {
				.bd-placeholder-img-lg {
					font-size: 3.5rem;
				}
			}
		</style>
	</head>
	<body>
		<nav
			class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow"
		>
			<a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Admin</a>
			<button
				class="navbar-toggler position-absolute d-md-none collapsed"
				type="button"
				data-toggle="collapse"
				data-target="#sidebarMenu"
				aria-controls="sidebarMenu"
				aria-expanded="false"
				aria-label="Toggle navigation"
			>
				<span class="navbar-toggler-icon"></span>
			</button>
			<ul class="navbar-nav px-3">
				<li class="nav-item text-nowrap">
					<a
						class="nav-link"
						href="<?= site_url('login/destroy?role=admin') ?>"
						onclick="return confirm('Anda yakin akan logout ?')"
					>
						Sign out
					</a>
				</li>
			</ul>
		</nav>
		<div class="container-fluid">
			<div class="row">
				<nav
					id="sidebarMenu"
					class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse"
				>
					<div class="sidebar-sticky pt-3">
						<ul class="nav flex-column">
							<li class="nav-item">
								<a class="nav-link active" href="#">
									<i class="fas fa-home"></i>
									Dashboard <span class="sr-only">(current)</span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?= site_url('admin/produk') ?>">
									<i class="fas fa-list"></i>
									Product
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?= site_url('admin/pelanggan') ?>">
									<i class="fas fa-users"></i>
									Pelanggan
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?= site_url('admin/user_admin') ?>">
									<i class="fas fa-user"></i>
									User Admin
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?= site_url('admin/pemesanan') ?>">
									<i class="fas fa-chart-pie"></i>
									Pemesanan
								</a>
							</li>
							<!-- <h6
								class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted"
							>
								<span>Laporan</span>
							</h6>
							<li class="nav-item">
								<a class="nav-link" href="#">
									<i class="fas fa-file"></i>
									Minggu ini
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
									<i class="fas fa-file"></i>
									Bulan ini
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
									<i class="fas fa-file"></i>
									3 Bulan
								</a>
							</li> -->
						</ul>
					</div>
				</nav>
				<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
					<?php isset($content) ? $this->load->view($content) : ''; ?>
				</main>
			</div>
		</div>

		<!-- <nav
			class="navbar navbar-expand-lg navbar-dark pl-5 pr-5 shadow-sm"
			style="background-color: #6c757d"
		>
			<a class="navbar-brand" href="<?= site_url('/') ?>">Admin</a>
			<button
				class="navbar-toggler"
				type="button"
				data-toggle="collapse"
				data-target="#navbarSupportedContent"
				aria-controls="navbarSupportedContent"
				aria-expanded="false"
				aria-label="Toggle navigation"
			>
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="<?= site_url('/admin'); ?>"
							>Home <span class="sr-only">(current)</span></a
						>
					</li>
					<li class="nav-item dropdown">
						<a
							class="nav-link dropdown-toggle"
							href="#"
							id="navbarDropdown"
							role="button"
							data-toggle="dropdown"
							aria-haspopup="true"
							aria-expanded="false"
						>
							Setting
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="<?= site_url('admin/produk'); ?>"
								>Produk</a
							>
							<a
								class="dropdown-item"
								href="<?= site_url('admin/user_admin'); ?>"
								>Pengguna Admin</a
							>
							<a
								class="dropdown-item"
								href="<?= site_url('admin/user_seller'); ?>"
								>Pembeli
							</a>
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= site_url('admin/pemesanan_baru') ?>"
							>Pemesanan Baru</a
						>
					</li>
				</ul>
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a
							class="nav-link"
							href="<?= site_url('login/destroy?role=admin') ?>"
							onclick="return confirm('Anda yakin akan logout ?')"
							>Logout</a
						>
					</li>
				</ul>
			</div>
		</nav>

		<div class="container pt-3 pb-5">
			<?php if ($this->session->flashdata('info')): ?>
			<div
				class="alert alert-warning alert-dismissible fade show shadow-sm"
				role="alert"
			>
				<strong>Info</strong>
				<?php echo $this->session->flashdata('info'); ?>
				<button
					type="button"
					class="close"
					data-dismiss="alert"
					aria-label="Close"
				>
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?php endif; ?>

			<h4 class="mb-3"><?= isset($title) ? $title: '' ?></h4>
			<div class="card shadow-sm">
				<div class="card-body">
					<?php isset($content) ? $this->load->view($content) : ''; ?>
				</div>
			</div>
		</div> -->

		<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
		<script src="<?= base_url('assets/plugins/jquery.min.js'); ?>"></script>
		<script src="<?= base_url('assets/plugins/bootstrap/js/popper.min.js'); ?>"></script>
		<script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>
		<script src="<?= base_url('assets/plugins/dashboard.js'); ?>"></script>
		<script src="<?= base_url('assets/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
		<script src="<?= base_url('assets/plugins/datatables/dataTables.bootstrap4.min.js'); ?>"></script>
		<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
		<script>
			$(document).ready(function () {
				$(".table").DataTable();
				$("#summernote").summernote({height:300});
			});
		</script>
	</body>
</html>
