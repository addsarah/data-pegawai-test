<?php
require('../setup/koneksi.php');
session_start();
if (empty($_SESSION['level'])) {
    header('location: ../login.php');
} else {
    require('../template/header.php');
    $id = $_GET['id'];
    $query = mysqli_query($koneksi,"SELECT * FROM divisi WHERE id_divisi = '$id'");
    $data = mysqli_fetch_array($query);
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5 class="m-0 font-weight-bold text-primary text-center">Tambah Divisi</h5>
        </div>
        <div class="card-body">
            <form action="update_divisi.php?id=<?= $data['id_divisi']?>" method="post">
                <div class="form-group">
                    <label for="">Divisi</label>
                    <input type="text" class="form-control" name="divisi" value="<?= $data['nama_divisi']?>" required>
                </div>
                <button type="submit" class="btn btn-primary" name="update">Update</button>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<?php
    require('../template/footer.php');
}
?>