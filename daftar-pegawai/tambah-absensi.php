<?php 
include("header-absensi.php"); // memanggil file header.php
include("../koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
	<div class="container">
		<div class="content">
			<h2>Absen &raquo; Input Absen </h2>
			<hr />
			
			<?php
			if(isset($_POST['add'])){ 
				$tgl_absen		 = $_POST['tgl_absen'];
				$masuk   		 = $_POST['masuk'];
				$terlambat 		 = $_POST['terlambat'];
				$pulang	 		 = $_POST['pulang'];
				$lembur			 = $_POST['lembur'];
				
				
				$cek = mysqli_query($koneksi, "SELECT * FROM absensi WHERE tgl_absen='$tgl_absen'"); // query untuk memilih entri dengan tgl_absen terpilih
						$insert = mysqli_query($koneksi, "INSERT INTO absensi(tgl_absen, masuk, terlambat, pulang, lembur) VALUES('$tgl_absen','$masuk', '$terlambat', '$pulang', '$lembur')") or die(mysqli_error($koneksi)); // query untuk menambahkan data ke dalam database
						if($insert){ // jika query insert berhasil dieksekusi
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Absen Berhasil disimpan.</div>'; // maka tampilkan 'Absen Berhasil disimpan.'
						}else{ // jika query insert gagal dieksekusi
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Absen Gagal Di simpan!</div>'; // maka tampilkan 'Ups, Absen Gagal Di simpan!'
						}
				}else{ // mengecek jika tgl_absen yang akan ditambahkan sudah ada dalam database
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Tanggal Absen Sudah Ada..!</div>'; // maka tampilkan 'Tanggal Absen Sudah Ada..!'
				}
			?>
			<!-- bagian ini merupakan bagian form untuk menginput data yang akan dimasukkan ke database -->
			<form class="form-horizontal" action="" method="post">
			<div class="form-group">
					<label class="col-sm-3 control-label">Tanggal Absen</label>
					<div class="col-sm-12">
						<input type="date" name="tgl_absen" class="input-group datepicker form-control" date="" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Masuk</label>
					<div class="col-sm-12">
						<input type="time" name="masuk" class="input-group timepicker form-control" time="" data-time-format="hh-mm-ss"placeholder="hh-mm-ss" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Terlambat</label>
					<div class="col-sm-12">
						<input type="text" name="terlambat" class="form-control" placeholder="Terlambat" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Pulang</label>
					<div class="col-sm-12">
						<input type="time" name="pulang" class="input-group timepicker form-control" time="" data-time-format="hh-mm-ss"placeholder="hh-mm-ss" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Lembur</label>
					<div class="col-sm-12">
						<input type="text" name="lembur" class="form-control" placeholder="Lembur" required>
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