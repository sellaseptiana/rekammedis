<div class="container-fluid">
	<div class="container">

		<div class="container mt-5 mb-5">
			<div class="card">
				<div class="card-header">
					<div class="float">
						<a href="<?= base_url('Apoteker/obat') ?>" class="btn btn-danger mb-2">Kembali</a>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="card" style="background-color: rgba(245, 245, 245, 0.9);">
								<div class="card-header">
									<center>
										<h4 class="title"><strong>Tambah Data</strong></h4><br><br>
									</center>
									<div class="card-body">
										<form action="" method="POST" enctype="multipart/form-data">
											<div class="form-group row">
												<label class="col-sm-2 col-form-label">Nama Obat</label>
												<div class="col-sm-10">
													<input type="text" name="nama_obat" value="<?= set_value('nama_obat'); ?>"
														class="form-control form-control-user" id="nama_obat" placeholder="Masukkan Nama Obat">
													<?= form_error('nama_obat', '<small class="text-danger pl-3">', '</small>'); ?>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-2 col-form-label">Jenis Obat</label>
												<div class="col-sm-10">
													<input type="text" name="jenis_obat" value="<?= set_value('jenis_obat'); ?>"
														class="form-control form-control-user" id="jenis_obat" placeholder="Masukkan Jenis Obat">
													<?= form_error('jenis_obat', '<small class="text-danger pl-3">', '</small>'); ?>
												</div>
											</div>
											
											<div class="form-group row">
												<label class="col-sm-2 col-form-label">Stok</label>
												<div class="col-sm-10">
													<input type="text" name="stok" value="<?= set_value('stok'); ?>"
														class="form-control form-control-user" id="stok" placeholder="Masukkan Stok Obat">
													<?= form_error('stok', '<small class="text-danger pl-3">', '</small>'); ?>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-2 col-form-label">Expire</label>
                        <div class="col-sm-10">
												<input type="date" name="expire"
														value="<?= set_value('expire'); ?>"
														class="form-control form-control-user" id="expire"
														placeholder="Masukkan Tanggal Expire">
																<?= form_error('expire', '<small class="text-danger pl-3">', '</small>'); ?>
												</div>
											</div>
											<div class="float-right">
												<button type="submit" name="tambah" id="btnSimpan"
													class="btn btn-primary float-right">Simpan</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>