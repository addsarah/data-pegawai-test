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
            <h5 class="m-0 font-weight-bold text-primary text-center">Tambah Divisi</h5>
        </div>
        <div class="card-body">
            <form action="input_divisi.php" method="post">
                <div class="form-group">
                    <label for="">Divisi</label>
                    <input type="text" class="form-control" name="divisi" required>
                </div>
                <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<?php
    require('../template/footer.php');
}
?>