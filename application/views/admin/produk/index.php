<div
	class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
>
	<h1 class="h2">Produk Kami</h1>
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
		<table class="table table-bordered table-sm">
			<thead>
				<tr class="text-center text-uppercase">
					<th>no</th>
					<th>photo</th>
					<th>nama</th>
					<th>harga</th>
					<th>kategori</th>
					<th>aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1; ?>
				<?php foreach ($data as $key) { ?>
				<tr class="text-center">
					<td><?= $no++ ?></td>
					<td width="15%">
						<img
							class="img-fluid"
							src="<?= base_url('assets/photo_product/'.$key->photo) ?>"
						/>
					</td>
					<td class="text-left"><?= $key->name ?></td>
					<td class="text-right">
						<?= number_format($key->price, 0, ',', '.') ?>
					</td>
					<td><?= $key->category ?></td>
					<td>
						<a
							href="<?= site_url('admin/produk/edit/'.$key->id) ?>"
							class="btn btn-primary btn-sm"
						>
							<i class="fas fa-edit"></i>
						</a>
						<a
							href="<?= site_url('admin/produk/destroy/'.$key->id) ?>"
							class="btn btn-danger btn-sm"
							onclick="return confirm('Anda yakin hapus data ini ?')"
						>
							<i class="fas fa-trash"></i>
						</a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>
