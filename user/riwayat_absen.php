<?php
require('../setup/koneksi.php');
session_start();
if (empty($_SESSION['level'])) {
    header('location: ../login.php');
} else {
    require('../template/header.php');
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5 class="m-0 font-weight-bold text-primary text-center">Data Absensi</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Divisi</th>
                        <th>Masuk</th>
                        <th>Terlambat</th>
                        <th>Pulang</th>
                        <th>Lembur</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i = $_SESSION['id'];
                        $query = mysqli_query($koneksi, "SELECT * FROM absensi JOIN karyawan ON absensi.karyawan = karyawan.nip JOIN divisi ON karyawan.divisi = divisi.id_divisi WHERE karyawan = '$i' ORDER BY tgl_absen DESC");
                        $no = 1;
                        while ($data = mysqli_fetch_array($query)) {
                        ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $data['nama_karyawan'] ?></td>
                        <td><?= $data['nama_divisi'] ?></td>
                        <td><?= $data['masuk'] ?></td>
                        <td><?= $data['terlambat'] ?></td>
                        <td><?= $data['pulang'] ?></td>
                        <td><?= $data['lembur'] ?></td>
                        <td><?= $data['tgl_absen'] ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<?php
    require('../template/footer.php');
}
?>