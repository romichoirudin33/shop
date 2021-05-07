<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title><?= $this->Company_model->first()->name ?></title>

		<!-- Bootstrap core CSS -->
		<link
			rel="stylesheet"
			href="<?= base_url('assets/plugins/bootstrap/css/bootstrap.min.css'); ?>"
		/>
		<link
			rel="stylesheet"
			href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
			integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
			crossorigin="anonymous"
		/>

		<!-- Favicons -->
		<link
			rel="icon"
			href="<?= base_url('assets/'.$this->Company_model->first()->logo) ?>"
			sizes="32x32"
			type="image/png"
		/>

		<style>
			* {
				font-family: "Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande",
					"Lucida Sans", Arial, sans-serif;
			}

			body {
				background-color: #fdfdfd;
			}

			.bg-white {
				background-color: #fff;
			}

			.text-sm {
				font-size: smaller;
			}
		</style>
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-light bg-white shadow">
			<a class="navbar-brand" style="color: #d986d7" href="<?= site_url('/') ?>">
				<img
					src="<?= base_url('assets/'.$this->Company_model->first()->logo) ?>"
					width="30"
					height="30"
					class="d-inline-block align-top"
					alt=""
				/>
				<?= $this->Company_model->first()->name ?>
			</a>
			<button
				class="navbar-toggler"
				type="button"
				data-toggle="collapse"
				data-target="#navbarNav"
				aria-controls="navbarNav"
				aria-expanded="false"
				aria-label="Toggle navigation"
			>
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item mr-3">
						<a class="nav-link" href="<?= site_url('/') ?>">
							<i class="fas fa-home"></i> Beranda</a
						>
					</li>

					<?php if (!$this->session->userdata('id')) { ?>
					<li class="nav-item mr-2 mt-1">
						<a
							href="<?= site_url('login') ?>"
							class="align-middle btn btn-outline-secondary btn-sm"
						>
							Masuk
						</a>
						<a
							href="<?= site_url('register') ?>"
							class="btn btn-outline-secondary btn-sm"
						>
							Daftar
						</a>
					</li>
					<?php } else { ?>

					<li class="nav-item">
						<div class="btn-group">
							<a
								type="button"
								class="nav-link dropdown-toggle"
								data-toggle="dropdown"
								aria-haspopup="true"
								aria-expanded="false"
							>
								<img
									src="<?= base_url('assets/photo_user/'.$this->session->userdata('photo')) ?>"
									width="20"
									height="20"
									class="rounded-circle"
								/>
								<?= $this->session->userdata('name') ?>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<a href="<?= site_url('profil') ?>" class="dropdown-item">Profil</a>
								<a href="<?= site_url('pemesanan') ?>" class="dropdown-item">History Pemesanan</a>
								<a
									href="<?= site_url('login/destroy') ?>"
									onclick="return confirm('Anda yakin akan logout ?')"
									class="dropdown-item"
								>
									<i class="fas fa-sign-out-alt"></i> Sign out
								</a>
							</div>
						</div>
					</li>
					<?php } ?>
				</ul>
			</div>
		</nav>

		<main class="container mt-4">
		<?php isset($content) ? $this->load->view($content) : ''; ?>
		</main>
		<script src="<?= base_url('assets/plugins/jquery.min.js'); ?>"></script>
		<script src="<?= base_url('assets/plugins/bootstrap/js/popper.min.js'); ?>"></script>
		<script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>

		<script>
			function change_amount(isAdd){
				var amount = 1;
				if (isAdd == 'plus'){
					amount = parseInt( $('#amount').val()) + 1;
				}else{
					amount = parseInt( $('#amount').val()) - 1;
				}
				if (amount == 0) amount = 1;
				var price = parseInt($('#price').val());
				$('#amount').val(amount);
				$('#total_price').val(price * amount);
				$('#text_amount').html(amount);
				$('#text_sub_total').html((price * amount).toLocaleString('id-ID'))
			}
		</script>
	</body>
</html>
