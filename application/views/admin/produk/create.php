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

<div class="card">
	<div class="card-body">
		<form
			action="<?= site_url('admin/produk/create') ?>"
			method="post"
			enctype="multipart/form-data"
		>
			<div class="row">
				<div class="col-4">
					<div class="form-group">
						<label for="name">Nama Barang</label>
						<input type="text" class="form-control" name="name" />
					</div>
					<div class="form-group">
						<label for="category">Kategori</label>
						<input type="text" class="form-control" name="category" />
					</div>
					<div class="form-group">
						<label for="price">Harga</label>
						<input
							type="text"
							class="form-control"
							name="price"
							onkeyup="this.value=this.value.replace(/[^\d]/,'')"
						/>
					</div>
					<div class="form-group">
						<label for="photo">Photo</label>
						<input type="file" class="form-control" name="photo" />
					</div>
					<div class="form-group">
						<button
							class="btn btn-primary"
							type="submit"
							name="submit"
							value="submit"
						>
							<i class="fas fa-save"></i> Simpan
						</button>
						<a
							href="<?= site_url('admin/produk') ?>"
							class="btn btn-outline-secondary"
						>
							<i class="fas fa-arrow-left"></i> Kembali
						</a>
					</div>
				</div>
				<div class="col-8">
					<div class="form-group">
						<label for="">Description</label>
						<textarea
							id="summernote"
							name="description"
							style="height: 500px"
						></textarea>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
