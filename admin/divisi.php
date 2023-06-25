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
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="tambah_divisi.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i>Tambah</a>
    </div>
    <div class="card">
        <div class="card-header">
            <h5 class="m-0 font-weight-bold text-primary text-center">Data Divisi</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Divisi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = mysqli_query($koneksi, "SELECT * FROM divisi ORDER BY id_divisi DESC");
                        $no = 1;
                        while ($data = mysqli_fetch_array($query)) {
                        ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $data['nama_divisi'] ?></td>
                        <td>
                            <a href="edit_divisi.php?id=<?= $data['id_divisi'] ?>" class="btn btn-warning btn-sm"
                                onclick="return confirm('Yakin Ubah Data ini?')">
                                Edit
                            </a>
                            <a href="hapus_divisi.php?id=<?= $data['id_divisi'] ?>" class="btn btn-danger btn-sm"
                                onclick="return confirm('Hapus Data ini?')">
                                Hapus
                            </a>
                        </td>
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