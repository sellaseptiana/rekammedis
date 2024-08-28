<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
   	<div class="container">
   		<div class="collapse navbar-collapse" id="collapsibleNavId">
   			<ul class="navbar-nav ml-auto mt-2 mt-lg-0">

   			</ul>
   		</div>
   	</div>
   	</nav>
  <div class="container mt-5 mb-5">
            <div class="card">
                <div class="card-header">
               
									<div class="row">
                  <div class="float">
										<a href="<?=base_url('Petugas/pasien')?>"
											class="btn btn-danger mb-2">Kembali</a>
									</div>
										<div class="col-sm-12">
                    <div class="card" style="background-color: rgba(245, 245, 245, 0.9);">
                <div class="row">
                    <div class="card-body">
                        <center>
                            <h4 class="title"><strong>Detail Pasien</strong></h4><br><br>
                        </center>
                        <?= $this->session->flashdata('message') ?>

                        <div class="card-block">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id_pasien" value="<?= $pasien['id_pasien']; ?>">
                                <div class="form-group">
                                <div class="form-group row">
                                        <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;No KTP</strong>
                                            </label>
                                            <br>
                                            <label class="col-sm-8 col-form-label">
                                                <td> : <?= $pasien['no_ktp']; ?></td>
                                            </label>
                                        </div>

                                        <div class="form-group row">
                                        <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Nama</strong>
                                            </label>
                                            <br>
                                            <label class="col-sm-8 col-form-label">
                                                <td> : <?= $pasien['nama_pasien']; ?></td>
                                            </label>
                                        </div>

                                        <div class="form-group row">
                                        <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Umur</strong>
                                            </label>
                                            <br>
                                            <label class="col-sm-8 col-form-label">
                                                <td> : <?= $pasien['umur']; ?></td>
                                            </label>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Tanggal Lahir</strong>
                                            </label>
                                            <br>
                                            <label class="col-sm-8 col-form-label">
                                                <td> : <?= $pasien['tanggal_lahir']; ?></td>
                                            </label>
                                        </div>

                                        <div class="form-group row">
                                        <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Alamat</strong>
                                            </label>
                                            <br>
                                            <label class="col-sm-8 col-form-label">
                                                <td> : <?= $pasien['alamat']; ?></td>
                                            </label>
                                        </div>

                                        <div class="form-group row">
                                        <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp;Jenis Kelamin</strong>
                                            </label>
                                            <br>
                                            <label class="col-sm-8 col-form-label">
                                                <td> : <?= $pasien['jenis_kelamin']; ?></td>
                                            </label>
                                        </div>
                                        
                                        <div class="form-group row">
                                        <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp; No HP</strong>
                                            </label>
                                            <br>
                                            <label class="col-sm-8 col-form-label">
                                                <td> : <?= $pasien['no_hp']; ?></td>
                                            </label>
                                        </div>
                                        <div class="form-group row">
                                        <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp; Pendidikan terakhir</strong>
                                            </label>
                                            <br>
                                            <label class="col-sm-8 col-form-label">
                                                <td> : <?= $pasien['pendidikan']; ?></td>
                                            </label>
                                        </div>
                                        <div class="form-group row">
                                        <label class="col-sm-4 col-form-label"><strong>&emsp;&emsp;&emsp; Pekerjaan</strong>
                                            </label>
                                            <br>
                                            <label class="col-sm-8 col-form-label">
                                                <td> : <?= $pasien['pekerjaan']; ?></td>
                                            </label>
                                        </div>
                                        </div>
                                       

