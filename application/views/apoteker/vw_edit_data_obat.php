<div class="container-fluid">
	<div class="container">
		<div class="container mt-5 mb-5">
			<div class="card">
				<div class="card-header">
					<div class="float">
						<a href="<?= base_url('Apoteker/index') ?>" class="btn btn-danger mb-2">Kembali</a>
					</div>
					<center>
						<h4 class="title"><strong>Edit Obat</strong></h4><br><br>
					</center </div> <div class="card-body">
					<form action="<?= site_url('Apoteker/edit_obat/' . $obat['id_obat']); ?>" method="post">
						<input type="hidden" name="id_obat" value="<?= $obat['id_obat']; ?>">
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">Nama Obat</label>
							<div class="col-sm-9">
								<input type="text" name="nama_obat" class="form-control form-control-user"
									value="<?= isset($obat['nama_obat']) ? $obat['nama_obat'] : ''; ?>">
								<?= form_error('nama_obat', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">Jenis Obat</label>
							<div class="col-sm-9">
								<input type="text" name="jenis_obat" class="form-control form-control-user"
									value="<?= isset($obat['jenis_obat']) ? $obat['jenis_obat'] : ''; ?>">
								<?= form_error('jenis_obat', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
						</div>
						
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">Stok</label>
							<div class="col-sm-9">
								<input type="text" name="stok" class="form-control form-control-user"
									value="<?= isset($obat['stok']) ? $obat['stok'] : ''; ?>">
								<?= form_error('stok', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">Expire</label>
							<div class="col-sm-9">
								<input type="date" name="expire" class="form-control" id="expire"
									value="<?= isset($obat['expire']) ? $obat['expire'] : ''; ?>">
								<?= form_error('expire', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
						</div>
						<button type="submit" name="update" class="btn btn-primary float-right">Update</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
