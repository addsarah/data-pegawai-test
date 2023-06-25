<?php 
include("header-keluarga.php");
include("../koneksi.php");


?>
	<div class="container">
		<div class="content">
			<h2>Data Keluarga</h2>
			<hr/>
			
			<?php
			if(isset($_GET['aksi']) == 'delete'){
				$nik= $_GET['nik']; // ambil nilai nik
				$cek = mysqli_query($koneksi, "SELECT * FROM tb_keluarga WHERE nik='$nik'"); // query untuk memilih entri dengan nik yang dipilih
				if(mysqli_num_rows($cek) == 0){ // mengecek jika tidak ada entri nik yang dipilih
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>'; // maka tampilkan 'Data tidak ditemukan.'
				}else{ // mengecek jika terdapat entri nik yang dipilih
					$delete = mysqli_query($koneksi, "DELETE FROM tb_keluarga WHERE no='$nik'"); // query untuk menghapus
					if($delete){ // jika query delete berhasil dieksekusi
						echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil dihapus.</div>'; // maka tampilkan 'Data berhasil dihapus.'
					}else{ // jika query delete gagal dieksekusi
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>'; // maka tampilkan 'Data gagal dihapus.'
					}
				}
			}

			
			if (isset($_GET['edit'])){
				$id = $_GET['id'];
				$result = $mysqli->query("SELECT * FROM tb_keluarga WHERE id=$id") or die($mysqli->error());
				if (count($result)==1){
					$row = $result->fetch_array();
					$name = $row['name'];
					$location = $row['location'];
				}
			}
			
			?>
			<!-- bagian ini untuk memfilter data berdasarkan pekerjaan -->
			<form class="form-inline" method="get">
				<div class="form-group">
					<select name="filter" class="form-control" onchange="form.submit()">
						<option value="0">Filter Data keluarga</option>
						<?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL);  ?>
						<option value="Pelajar" <?php if($filter == 'Pelajar'){ echo 'selected'; } ?>>Pelajar</option>
						<option value="Karyawan Swasta" <?php if($filter == 'Karyawan Swasta'){ echo 'selected'; } ?>>Karyawan Swasta</option>
					</select>
				</div>
			</form> <!-- end filter -->
			<br />
			<!-- memulai tabel responsive -->
			<div class="table-responsive">
				<table class="table table-striped table-hover">
					<tr>
						<th>No</th>
						<th>NIK</th>
						<th>Nama Keluarga</th>
						<th>Hubungan</th>
						<th>Tempat Lahir</th>
						<th>Tanggal Lahir</th>
						<th>Jenis Kelamin</th>
						<th>Pekerjaan</th>
						<th>Action</th>
					</tr>
					<?php
					if($filter){
						$sql = mysqli_query($koneksi, "SELECT * FROM tb_keluarga WHERE pekerjaan='$filter' ORDER BY nik ASC"); // query jika filter dipilih
					}else{
						$sql = mysqli_query($koneksi, "SELECT * FROM tb_keluarga ORDER BY nik ASC"); // jika tidak ada filter maka tampilkan semua entri
					}
					if(mysqli_num_rows($sql) == 0){ 
						echo '<tr><td colspan="7">Data Tidak Ada.</td></tr>'; // jika tidak ada entri di database maka tampilkan 'Data Tidak Ada.'

					}else{ // jika terdapat entri maka tampilkan datanya
						$no = 1; // mewakili data dari nomor 1
						while($row = mysqli_fetch_assoc($sql)){ // fetch query yang sesuai ke dalam array
							echo '
							<tr>
								<td>'.$no.'</td>
								<td>'.$row['nik'].'</td>
								<td>'.$row['nama'].'</td>
								<td>'.$row['hubungan'].'</td>
								<td>'.$row['tempat_lahir'].'</td>
								<td>'.$row['tanggal_lahir'].'</td>
								<td>'.$row['jenis_kelamin'].'</td>
								<td>'.$row['pekerjaan'].'</td>
								<td>';
								if($row['pekerjaan'] == 'Karyawan Swasta'){
									echo '<span class="label label-success"></span>';
								}
								else if ($row['pekerjaan'] == 'Pelajar' ){
									echo '<span class="label label-info">Pelajar</span>';
								}
							echo '
								
									<a href="edit.php?nik='.$row['nik'].'" title="Edit Data" data-toggle="tooltip" class="btn btn-primary btn-sm"><i class="fas fa-user-edit" aria-hidden="true"></i></a>

									<a href="data.php?aksi=delete&nik='.$row['nik'].'" title="Hapus Data" data-toggle="tooltip" onclick="return confirm(\'Anda yakin akan menghapus data '.$row['nik'].'?\')" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
								</td>
							</tr>
							';
							$no++; // mewakili data kedua dan seterusnya
						}
					}
					?>
				</table>

				<a href="tambah-keluarga.php" title="Tambah Data" data-toggle="tooltip" class="btn btn-primary btn-sm"><i class="fas fa-edit" aria-hidden="true"></i> Tambah Data Keluarga</a>
			</div> <!-- /.table-responsive -->
		</div> <!-- /.content -->
	</div> <!-- /.container -->

	
	<tr>
	<tr>

	

<?php 
include("footer.php"); // memanggil file footer.php
?>