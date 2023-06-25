<?php 
include "header-absensi.php";
include("../koneksi.php");
?>
	<!-- Start container -->

	<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="tambah-absensi.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i>Tambah</a>
    </div>
    <div class="card">
        <div class="card-header">
            <h5 class="m-0 font-weight-bold text-primary text-center">Data Absensi</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tanggal Absen</th>
                        <th>Masuk</th>
                        <th>Terlambat</th>
                        <th>Pulang</th>
                        <th>Lembur</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = mysqli_query($koneksi, "SELECT * FROM absensi  ORDER BY tgl_absen DESC");
                        $no = 1;
                        while ($data = mysqli_fetch_array($query)) {
                        ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $data['tgl_absen'] ?></td>
                        <td><?= $data['masuk'] ?></td>
                        <td><?= $data['terlambat'] ?></td>
                        <td><?= $data['pulang'] ?></td>
                        <td><?= $data['lembur'] ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
	<!-- End container -->
<?php 
include("footer.php");
?>
