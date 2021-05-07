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
		<div class="card shadow-sm bg-white">
			<div class="card-body">
				<div class="row">
					<?php foreach ($products as $key) { ?>
					<div class="col-md-3 mb-4">
						<div class="card">
							<img
								src="<?= base_url('assets/photo_product/'.$key->photo) ?>"
								class="card-img-top"
								alt="..."
							/>
							<div class="card-body p-2">
								<h5 class="card-title font-weight-bold text-sm mb-1">
									<?= $key->name ?>
								</h5>
								<p class="card-text text-muted text-sm">
									Rp.
									<?= number_format($key->price, 0, ',', '.') ?>
								</p>
								<a
									href="<?= site_url('product/detail/'.$key->id) ?>"
									class="card-link"
									>Pre Order Now</a
								>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
