<?php 
include("header-keluarga.php"); // memanggil file header.php
include("../koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
	<div class="container">
		<div class="content">
			<h2>Riwayat Keluarga &raquo; Tambah Data</h2>
			<hr />
			
			<?php
			if(isset($_POST['add'])){ 
				$nik		     = $_POST['nik'];
				$nama   		 = $_POST['nama'];
				$hubungan 		 = $_POST['hubungan'];
				$tempat_lahir	 = $_POST['tempat_lahir'];
				$tanggal_lahir	 = $_POST['tanggal_lahir'];
				$jenis_kelamin 	 = $_POST['jenis_kelamin'];
				$pekerjaan		 = $_POST['pekerjaan'];
				
				
				$cek = mysqli_query($koneksi, "SELECT * FROM tb_keluarga WHERE nik='$nik'"); // query untuk memilih entri dengan nik terpilih
						$insert = mysqli_query($koneksi, "INSERT INTO tb_keluarga(nik, nama, hubungan, tempat_lahir, tanggal_lahir, jenis_kelamin, pekerjaan) VALUES('$nik','$nama', '$hubungan', '$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin', '$pekerjaan')") or die(mysqli_error($koneksi)); // query untuk menambahkan data ke dalam database
						if($insert){ // jika query insert berhasil dieksekusi
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Riwayat Keluarga Berhasil Di Simpan.</div>'; // maka tampilkan 'Riwayat Keluarga Berhasil Di Simpan.'
						}else{ // jika query insert gagal dieksekusi
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Riwayat  Keluarga Gagal Di simpan!</div>'; // maka tampilkan 'Ups, Riwayat Keluarga Gagal Di simpan!'
						}
				}else{ // mengecek jika nik yang akan ditambahkan sudah ada dalam database
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>NIK Sudah Ada..!</div>'; // maka tampilkan 'NIK Sudah Ada..!'
				}
			?>
			<!-- bagian ini merupakan bagian form untuk menginput data yang akan dimasukkan ke database -->
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">NIK</label>
					<div class="col-sm-12">
						<input type="number" name="nik" class="form-control" placeholder="NIK" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Nama</label>
					<div class="col-sm-12">
						<input type="text" name="nama" class="form-control" placeholder="Nama" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Hubungan</label>
					<div class="col-sm-12">
						<select name="hubungan" class="form-control" required>
							<option value=""> ----- </option>
							<option value="Suami">Suami</option>
							<option value="Istri">Istri</option>
							<option value="Anak Kandung">Anak Kandung</option>
                            <option value="Anak Angkat">Anak Angkat</option>
                            <option value="Anak Tiri">Anak Tiri</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Tempat Lahir</label>
					<div class="col-sm-12">
						<input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Tanggal Lahir</label>
					<div class="col-sm-12">
						<input type="date" name="tanggal_lahir" class="input-group datepicker form-control" date="" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Jenis Kelamin</label>
					<div class="col-sm-12">
						<select name="jenis_kelamin" class="form-control" required>
							<option value=""> ----- </option>
							<option value="Perempuan">Perempuan</option>
							<option value="Laki - Laki">Laki - Laki</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Pekerjaan</label>
					<div class="col-sm-12">
						<input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-12">
						<input type="submit" name="add" class="btn btn-sm btn-primary" value="Simpan" data-toggle="tooltip" title="Simpan Riwayat Keluarga">
						<a href="index.php" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Batal"><i class="fas fa-times-circle"></i> Batal</a>
					</div>
				</div>
			</form> <!-- /form -->
		</div> <!-- /.content -->
	</div> <!-- /.container -->
<?php 
include("footer.php"); // memanggil file footer.php
?>