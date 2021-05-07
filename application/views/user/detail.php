<div class="row mb-5">
	<div class="col-md-3">
		<div class="card shadow-sm bg-white mb-4">
			<div class="card-body">
				<h5 class="card-title">
					<i class="fas fa-shopping-cart"></i> Atur pesanan
				</h5>
				<form
					action="<?= site_url('product/detail/'.$data->id) ?>"
					method="post"
				>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<button
								class="btn btn-outline-secondary shadow-none"
								type="button"
								id="button-minus"
								onclick="change_amount('minus')"
							>
								<i class="fas fa-minus"></i>
							</button>
						</div>
						<label class="form-control text-center" id="text_amount">1</label>
						<div class="input-group-append">
							<button
								class="btn btn-outline-secondary shadow-none"
								type="button"
								id="button-plus"
								onclick="change_amount('plus')"
							>
								<i class="fas fa-plus"></i>
							</button>
						</div>
					</div>
					<div class="form-group">
						<label class="text-muted text-sm">Sub Total</label> <br />
						<label class="font-weight-bold">Rp. </label>
						<label class="font-weight-bold" id="text_sub_total"
							><?= number_format($data->price, 0, ',', '.') ?></label
						>
					</div>
					<input
						type="hidden"
						name="user_id"
						value="<?= $this->session->userdata('id') ?>"
					/>
					<input type="hidden" name="product_id" value="<?= $data->id ?>" />
					<input type="hidden" name="amount" id="amount" value="1" />
					<input
						type="hidden"
						name="price"
						id="price"
						value="<?= $data->price ?>"
					/>
					<input
						type="hidden"
						name="total_price"
						id="total_price"
						value="<?= $data->price ?>"
					/>

					<div class="form-group">
						<?php if (!$this->session->userdata('id')) { ?>
						<a
							class="btn btn-success btn-block"
							href="<?= site_url('login?redirect=product/detail/'.$data->id) ?>"
						>
							<i class="fas fa-plus"></i> Keranjang
						</a>
						<?php }else{ ?>
						<button
							type="submit"
							name="submit"
							value="submit"
							class="btn btn-success btn-block"
						>
							<i class="fas fa-plus"></i> Keranjang
						</button>
						<?php } ?>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-9">
		<div class="card shadow-sm bg-white">
			<div class="card-body">
				<div class="row mb-4">
					<div class="col-md-6">
						<img
							src="<?= base_url('assets/photo_product/'.$data->photo) ?>"
							class="img-fluid"
						/>
					</div>
					<div class="col-md-6">
						<h5 class="card-title font-weight-bold mb-1"><?= $data->name ?></h5>
						<p class="card-text text-muted text-sm mt-0">
							Kategori
							<?= $data->category ?> <br />
							<b class="text-success">
								Rp.
								<?= number_format($data->price, 0, ',', '.') ?>
							</b>
						</p>
						<?= $data->description ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
