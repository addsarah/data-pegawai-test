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
            <form action="" method="post">
                <div class="form-group form-row">
                    <div class="col">
                        <input type="text" name="tgl1" class="form-control" id="datepicker" placeholder="Dari" readonly
                            required>
                    </div>
                    <div class="col">
                        <div class="input-group">
                            <input type="text" name="tgl2" class="form-control" id="datepicker1" placeholder="Sampai"
                                readonly required>
                            <div class="input-group-append">
                                <button type="submit" name="proses" class="btn btn-primary">Proses</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <?php
        if(isset($_POST['proses'])){
            $tgl1 = $_POST['tgl1'];
            $tgl2 = $_POST['tgl2'];
        ?>
        <div class="card-body">
            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <td colspan="9" align="center">
                            <h5 class="m-0 font-weight-bold text-primary text-center">
                                Laporan Absensi Karyawan Dari <?php echo $tgl1 ?> s/d <?php echo $tgl2 ?>
                            </h5>
                        </td>
                    </tr>
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
                        $query = mysqli_query($koneksi, "SELECT * FROM absensi JOIN karyawan ON absensi.karyawan = karyawan.nip JOIN divisi ON karyawan.divisi = divisi.id_divisi WHERE tgl_absen BETWEEN '$tgl1' AND '$tgl2' ORDER BY tgl_absen DESC");
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
            <a href="laporan_csv.php?t1=<?=$tgl1?>&&t2=<?=$tgl2?>" class="btn btn-sm btn-success">Export CSV</a>
        </div>
        <?php } ?>
    </div>
</div>
<!-- /.container-fluid -->
<?php
    require('../template/footer.php');
}
?>