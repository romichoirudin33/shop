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

  <div class="card">
    <div class="card-body">
      <h6 class="card-title">Pesanan anda</h6>
    <table class="table table-bordered text-sm">
			<thead>
				<tr class="text-center text-uppercase">
					<th class="text-left" width="35%">detail pemesan</th>
					<th>detail barang</th>
					<th colspan="2">total pembayaran</th>
          <th>aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1; ?>
				<?php foreach ($data as $key) { ?>
				<tr class="text-center">
					<td class="text-left">
            <?= $key->name ?> <br>
            <i class="fas fa-map-marker-alt"></i> <?= $key->send_to ?>
          </td>
          <td class="text-left">
            <?php
              $this->db->where('payment_id', $key->id);
              $detail = $this->db->get('detail_payments')->result();
              foreach ($detail as $i) { ?>
              <b><?= $i->product_amount ?> x <?= $i->product_name ?></b> <br>
              @Rp. <?= number_format($i->product_price, 0, ',', '.') ?> <br>
            <?php }
            ?>
          </td>
          <td>
            <?php if ($key->is_pay == 'N') { ?>
              <label class="badge badge-pill badge-secondary">Belum di bayar</label>
            <?php } else { ?>
              <label class="badge badge-pill badge-success">Sudah di bayar</label>     <br>
              <a href="<?= base_url('assets/photo_invoice/'.$key->invoice) ?>" target="_blank">
                <i class="fas fa-receipt"></i> Bukti transfer
              </a>
            <?php } ?>
          </td>
					<td class="text-right">
						Rp. <?= number_format($key->total_payment, 0, ',', '.') ?>
					</td>
          <td>
            <?php if ($key->is_delivery == 'N' and $key->is_pay == 'Y') { ?>
              <label class="badge badge-pill badge-secondary">Tunggu di kirim</label>
            <?php } elseif ($key->is_delivery == 'N') { ?>
              <label class="badge badge-pill badge-secondary">Tunggu di kirim</label>
            <?php } else { ?>
              <label class="badge badge-pill badge-success">Sudah di dikirim</label>
            <?php } ?>
          </td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
    </div>
  </div>

  

	</div>
</div>
