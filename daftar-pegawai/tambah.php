<?php 
include("header.php"); // memanggil file header.php
include("../koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
	<div class="container">
		<div class="content">
			<h2>Data Pegawai &raquo; Tambah Data</h2>
			<hr />
			
			<?php
			if(isset($_POST['add'])){ 
				$nip		     = $_POST['nip'];
				$nama_pegawai   = $_POST['nama_pegawai'];
				$jabatan  		 = $_POST['jabatan'];
				$tgl_masuk		 = $_POST['tgl_masuk'];
				$divisi			 = $_POST['divisi'];
				
				
				$cek = mysqli_query($koneksi, "SELECT * FROM tb_pegawai WHERE nip='$nip'"); // query untuk memilih entri dengan nip terpilih
						$insert = mysqli_query($koneksi, "INSERT INTO tb_pegawai(nip, nama_pegawai, jabatan, tgl_masuk, divisi) VALUES('$nip','$nama_pegawai', '$jabatan', '$tgl_masuk', '$divisi')") or die(mysqli_error()); // query untuk menambahkan data ke dalam database
						if($insert){ // jika query insert berhasil dieksekusi
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Pegawai Berhasil Di Simpan.</div>'; // maka tampilkan 'Data Pegawai Berhasil Di Simpan.'
						}else{ // jika query insert gagal dieksekusi
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Pegawai Gagal Di simpan!</div>'; // maka tampilkan 'Ups, Data Pegawai Gagal Di simpan!'
						}
				}else{ // mengecek jika nip yang akan ditambahkan sudah ada dalam database
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>NIP Sudah Ada..!</div>'; // maka tampilkan 'NIP Sudah Ada..!'
				}
			?>
			<!-- bagian ini merupakan bagian form untuk menginput data yang akan dimasukkan ke database -->
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">NIP</label>
					<div class="col-sm-12">
						<input type="number" name="nip" class="form-control" placeholder="NIP" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Nama Pegawai</label>
					<div class="col-sm-12">
						<input type="text" name="nama_pegawai" class="form-control" placeholder="Nama Pegawai" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Jabatan</label>
					<div class="col-sm-12">
						<select name="jabatan" class="form-control" required>
							<option value=""> ----- </option>
							<option value="Technical Support">Technical Support</option>
							<option value="Finance">Finance</option>
							<option value="Manager">Manager</option>
                            <option value="Supervisor">Supervisor</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Tgl Masuk</label>
					<div class="col-sm-12">
						<input type="date" name="tgl_masuk" class="input-group datepicker form-control" date="" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Divisi</label>
					<div class="col-sm-12">
						<input type="text" name="divisi" class="form-control" placeholder="Divisi" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-12">
						<input type="submit" name="add" class="btn btn-sm btn-primary" value="Simpan" data-toggle="tooltip" title="Simpan Data Pegawai">
						<a href="index.php" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Batal"><i class="fas fa-times-circle"></i> Batal</a>
					</div>
				</div>
			</form> <!-- /form -->
		</div> <!-- /.content -->
	</div> <!-- /.container -->
<?php 
include("footer.php"); // memanggil file footer.php
?>