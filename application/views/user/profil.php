<div class="row mb-5">
	<div class="col-md-3">
		<?php if ($this->session->userdata('id')) { ?>
		<div class="card shadow-sm bg-white mb-4">
			<div class="card-body">
				<h5 class="card-title">
					<i class="fas fa-shopping-cart"></i> Keranjang Anda
				</h5>
				<?php if (count($this->Chart_model->getChartsUser($this->session->userdata('id')))
				== 0) { ?>
				<h6 class="card-subtitle mt-2 mb-2 text-muted">Tidak ada barang</h6>
				<?php } ?>
				<ul class="list-group list-group-flush">
					<?php foreach ($this->Chart_model->getChartsUser($this->session->userdata('id'))
					as $c) { ?>
					<li class="list-group-item p-1">
						<div class="row">
							<div class="col-3 pr-0">
								<img
									src="<?= base_url('assets/photo_product/'.$c->photo) ?>"
									class="img-fluid"
								/>
							</div>
							<div class="col-9">
								<b class="text-break" style="font-size: smaller"
									>(<?= $c->amount ?>x)
									<?= $c->name ?></b
								>
								<br />
								<b class="text-info" style="font-size: smaller"
									>Rp.
									<?= number_format($c->total_price, 0, ',', '.') ?></b
								>
							</div>
						</div>
					</li>
					<?php } ?>
				</ul>
			</div>
			<div class="card-footer">
				<a
					href="<?= site_url('keranjang') ?>"
					class="btn btn-success btn-block <?= count($this->Chart_model->getChartsUser($this->session->userdata('id'))) > 0 ? '' : 'disabled' ?>"
				>
					Bayar (<?= count($this->Chart_model->getChartsUser($this->session->userdata('id')))
					?>)
				</a>
			</div>
		</div>
		<?php } ?>

		<div class="card shadow-sm bg-white">
			<div class="card-body">
				<h5 class="card-title">Kategori</h5>
				<ul class="nav flex-column">
					<?php foreach ($this->Product_model->getCategories() as $c) { ?>
					<li class="nav-item">
						<a
							class="nav-link p-0 text-secondary"
							href="<?= site_url('/?category='.$c->category) ?>"
							><?= $c->category ?></a
						>
					</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-md-9">
		<?php if ($this->session->flashdata('info')): ?>
		<div
			class="alert alert-success alert-dismissible fade show shadow-sm"
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
		<div class="card shadow-sm bg-white">
			<div class="card-body">
				<div class="row">
					<div class="col-md-6 text-center">
						<img
							src="<?= base_url('assets/photo_user/'.$data->photo) ?>"
							alt=""
							class="w-100"
						/>
					</div>
					<div class="col-md-6">
						<form
							action="<?= site_url('profil') ?>"
							method="post"
							enctype="multipart/form-data"
						>
							<input type="hidden" name="id" value="<?= $data->id ?>" />
							<div class="form-group text-sm">
								<label for="name" class="text-capitalize m-0">name</label>
								<input
									type="text"
									name="name"
									class="form-control form-control-sm shadow-none"
									value="<?= $data->name ?>"
								/>
							</div>
							<div class="form-group text-sm">
								<label for="email" class="text-capitalize m-0">email</label>
								<input
									type="email"
									name="email"
									class="form-control form-control-sm shadow-none"
									value="<?= $data->email ?>"
								/>
							</div>
							<div class="form-group text-sm">
								<label for="username" class="text-capitalize m-0"
									>username</label
								>
								<input
									type="text"
									name="username"
									class="form-control form-control-sm shadow-none"
									value="<?= $data->username ?>"
									readonly
								/>
							</div>
							<div class="form-group text-sm">
								<label for="photo" class="text-capitalize m-0">photo</label>
								<input
									type="file"
									name="photo"
									class="form-control shadow-none"
								/>
								<span class="text-block text-muted"
									>Isi kolom jika foto ingin diganti</span
								>
							</div>
							<div class="form-group text-sm">
								<label for="address" class="text-capitalize m-0">Alamat</label>
								<textarea
									name="address"
									cols="3"
									class="form-control shadow-none"
								>
<?= $data->address ?></textarea
								>
							</div>
							<div class="form-group">
								<button
									type="submit"
									class="btn btn-success"
									name="submit"
									value="submit"
								>
									<i class="fas fa-save"></i> Simpan Perubahan
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
