<div
	class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
>
	<h1 class="h2">Dashboard</h1>
	<div class="btn-toolbar mb-2 mb-md-0">
		<div class="btn-group mr-2">
			<button type="button" class="btn btn-sm btn-outline-secondary">
				Hello,
				<?=  $this->session->userdata('name'); ?>
			</button>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-3">
		<a
			href="<?= site_url('admin/produk') ?>"
			class="text-secondary text-decoration-none"
		>
			<div class="card" style="border-radius: 25px">
				<div class="card-body text-center">
					<h1><i class="fas fa-list"></i></h1>
					<h5>
						Produk
						<span class="badge bg-secondary text-white"
							><?= count($products) ?></span
						>
					</h5>
				</div>
			</div>
		</a>
	</div>
	<div class="col-md-3">
		<a
			href="<?= site_url('admin/pemesanan') ?>"
			class="text-secondary text-decoration-none"
		>
			<div class="card" style="border-radius: 25px">
				<div class="card-body text-center">
					<h1><i class="fas fa-chart-pie"></i></h1>
					<h5>
						Pemesanan
						<span class="badge bg-secondary text-white"
							><?= count($pemesanan) ?></span
						>
					</h5>
				</div>
			</div>
		</a>
	</div>
	<div class="col-md-3">
		<a
			href="<?= site_url('admin/pelanggan') ?>"
			class="text-secondary text-decoration-none"
		>
			<div class="card" style="border-radius: 25px">
				<div class="card-body text-center">
					<h1><i class="fas fa-users"></i></h1>
					<h5>
						Pelanggan
						<span class="badge bg-secondary text-white"
							><?= count($user_pelanggan) ?></span
						>
					</h5>
				</div>
			</div>
		</a>
	</div>
	<div class="col-md-3">
		<a
			href="<?= site_url('admin/user_admin') ?>"
			class="text-secondary text-decoration-none"
		>
			<div class="card" style="border-radius: 25px">
				<div class="card-body text-center">
					<h1><i class="fas fa-user"></i></h1>
					<h5>
						User Admin
						<span class="badge bg-secondary text-white"
							><?= count($user_admin) ?></span
						>
					</h5>
				</div>
			</div>
		</a>
	</div>
</div>
