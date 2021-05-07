<div class="py-5 text-center">
	<img
		class="d-block mx-auto mb-4"
		src="<?= base_url('assets/'.$this->Company_model->first()->logo) ?>"
		alt=""
		width="72"
		height="72"
	/>
	<h2>Checkout form</h2>
	<p class="text-muted">
		Terimakasih telah melakukan order di
		<?= $this->Company_model->first()->name ?>. <br />
		Silahkan lakukan transfer serta mengisi data alamat dengan jelas. <br />
		Pastikan barang yang telah di pesan sudah benar
	</p>
	<?php
    $total_bayar = 0;
    $user_id = $this->session->userdata('id') ?>
</div>
<div class="row mb-5">
	<div class="col-md-4 order-md-2 mb-4">
		<h4 class="d-flex justify-content-between align-items-center mb-3">
			<span class="text-muted">Keranjang Anda</span>
			<span class="badge badge-secondary badge-pill">
				<?= count($this->Chart_model->getChartsUser($user_id)) ?>
			</span>
		</h4>
		<ul class="list-group mb-3">
			<?php foreach ($this->Chart_model->getChartsUser($user_id) as $c) { ?>
			<?php $total_bayar+=$c->total_price ?>
			<li class="list-group-item d-flex justify-content-between lh-condensed">
				<div>
					<a href="<?= site_url('product/detail/'.$c->product_id) ?>">
						<h6 class="my-0"><?= $c->name ?></h6>
					</a>
					<small class="text-muted">(<?= $c->amount ?>x)</small>
				</div>
				<span class="text-muted"
					>Rp.
					<?= number_format($c->total_price, 0, ',', '.') ?></span
				>
			</li>
			<?php } ?>
			<li class="list-group-item d-flex justify-content-between">
				<span>Total (Rp)</span>
				<strong><?= number_format($total_bayar, 0, ',', '.') ?></strong>
			</li>
		</ul>
		<hr class="mb-4" />
		<h4 class="d-flex justify-content-between align-items-center mb-3">
			<span class="text-muted">Bank Transfer</span>
		</h4>
		<h6 class="text-muted">Silahkan transfer ke salah satu bank disini</h6>
		<ul class="list-group list-group-flush">
			<li class="list-group-item bg-transparent">
				<div class="row">
					<div class="col-3 pr-0">
						<img
							src="<?= base_url('assets/logo-bca.png') ?>"
							class="img-fluid mt-2"
						/>
					</div>
					<div class="col-9">
						<div>
							<h6 class="my-0">6827 1872 23</h6>
							<small class="text-muted">A.n CV Mamazi Sukses Bersama</small>
						</div>
					</div>
				</div>
			</li>
			<li class="list-group-item bg-transparent">
				<div class="row">
					<div class="col-3 pr-0">
						<img
							src="<?= base_url('assets/logo-mandiri.png') ?>"
							class="img-fluid mt-2"
						/>
					</div>
					<div class="col-9">
						<div>
							<h6 class="my-0">161 00 0182368 5</h6>
							<small class="text-muted">A.n CV Mamazi Sukses Bersama</small>
						</div>
					</div>
				</div>
			</li>
			<li class="list-group-item bg-transparent">
				<div class="row">
					<div class="col-3 pr-0">
						<img
							src="<?= base_url('assets/logo-bni.png') ?>"
							class="img-fluid mt-2"
						/>
					</div>
					<div class="col-9">
						<div>
							<h6 class="my-0">009 916 0279</h6>
							<small class="text-muted">A.n CV Mamazi Sukses Bersama</small>
						</div>
					</div>
				</div>
			</li>
		</ul>
	</div>
	<div class="col-md-8 order-md-1">
		<h4 class="mb-3">Data Pemesan</h4>
		<form
			class="needs-validation"
			method="post"
			action="<?= site_url('keranjang/continue_payment') ?>"
			enctype="multipart/form-data"
		>
			<input type="hidden" name="user_id" value="<?= $user_id ?>" />
			<div class="row">
				<div class="col-md-6 mb-3">
					<label for="firstName">Name</label>
					<input type="text" class="form-control" value="<?= $user->name ?>" />
				</div>
				<div class="col-md-6 mb-3">
					<label for="lastName">Email</label>
					<input type="text" class="form-control" value="<?= $user->email ?>" />
				</div>
			</div>
			<div class="mb-3">
				<label for="address">Alamat</label>
				<textarea name="send_to" cols="3" class="form-control">
<?= $user->address ?></textarea
				>
			</div>
			<hr class="mb-4" />

			<h4 class="mb-3">Payment</h4>
			<div class="row">
				<div class="col-md-6">
					<label for="cc-name">Bukti Pembayaran</label>
					<input type="file" name="invoice" class="form-control" />
				</div>
			</div>
			<hr class="mb-4" />
			<button
				class="btn btn-primary btn-lg btn-block"
				type="submit"
				name="submit"
				value="submit"
			>
				Continue to checkout
			</button>
		</form>
	</div>
</div>
