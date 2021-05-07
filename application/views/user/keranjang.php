<div class="row mb-5">
	<div class="col-md-3">
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
		<?php
    $total_bayar = 0;
    $user_id = $this->session->userdata('id') ?>
		<?php if ($user_id) { ?>
		<div class="card shadow-sm bg-white mb-4">
			<div class="card-body">
				<h5 class="card-title">
					<i class="fas fa-shopping-cart"></i> Keranjang Anda
				</h5>
				<div class="row">
					<div class="col-md-6">
						<?php if (count($this->Chart_model->getChartsUser($user_id)) == 0) {
						?>
						<h6 class="card-subtitle mt-2 mb-2 text-muted">Tidak ada barang</h6>
						<?php } ?>
						<ul class="list-group list-group-flush">
							<?php foreach ($this->Chart_model->getChartsUser($user_id) as $c)
							{ ?>
							<?php $total_bayar+=$c->total_price ?>
							<li class="list-group-item p-1">
								<div class="row">
									<div class="col-3 pr-0">
										<img
											src="<?= base_url('assets/photo_product/'.$c->photo) ?>"
											class="img-fluid"
										/>
									</div>
									<div class="col-9">
										<b class="text-break" style="font-size: smaller">
											(<?= $c->amount ?>x)
											<?= $c->name ?>
										</b>
										<br />
										<b class="text-info" style="font-size: smaller"
											>Rp.
											<?= number_format($c->total_price, 0, ',', '.') ?></b
										>
										<a
											href="<?= site_url('keranjang/destroy/'.$c->id) ?>"
											class="btn btn-danger btn-sm float-right"
											onclick="return confirm('Hapus barang ini dari keranjang ?')"
										>
											<i class="fas fa-trash"></i>
										</a>
									</div>
								</div>
							</li>
							<?php } ?>
						</ul>
					</div>
					<div class="col-md-6">
						<b>Total Bayar</b>
						<h5>
							Rp.
							<?= number_format($total_bayar, 0, ',', '.') ?>
						</h5>
						<?php if($total_bayar>0){ ?>
						<a
							href="<?= site_url('keranjang/checkout') ?>"
							class="btn btn-success"
						>
							<i class="fas fa-shopping-bag"></i> Lanjutkan Pembayaran
						</a>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
</div>
