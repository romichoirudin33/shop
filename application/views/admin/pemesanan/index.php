<div
	class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
>
	<h1 class="h2">Pemesanan</h1>
	<div class="btn-toolbar mb-2 mb-md-0">
		<div class="btn-group mr-2">
			<a
				href="<?= site_url('admin/produk/create') ?>"
				class="btn btn-sm btn-outline-secondary"
			>
				<i class="fas fa-plus"></i> Tambah
			</a>
		</div>
	</div>
</div>

<?php if ($this->session->flashdata('info')): ?>
<div
	class="alert alert-success alert-dismissible fade show shadow-sm"
	role="alert"
>
	<strong>Info</strong>
	<?php echo $this->session->flashdata('info'); ?>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
<?php endif; ?>

<div class="card">
	<div class="card-body">
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
              <a href="<?= site_url('admin/pemesanan/finish/'.$key->id) ?>" class="btn btn-outline-secondary btn-sm" onclick="return confirm('Anda yakin telah memproses dan mengirim barang ini  ?')">
                <i class="fas fa-check"></i> Kirim barang
              </a>
            <?php } elseif ($key->is_delivery == 'N') { ?>
              <label class="badge badge-pill badge-info">Tunggu Dibayar</label>
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
