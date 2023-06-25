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
    <div class="card my-5">
        <div class="card-header">
            <h5 class="m-0 font-weight-bold text-primary text-center">Tambah Divisi</h5>
        </div>
        <div class="card-body">
            <form action="input_karyawan.php" method="post">
                <div class="form-group">
                    <label for="">NIP</label>
                    <?php
                    $qn = mysqli_query($koneksi,"SELECT MAX(nip) AS max_code FROM karyawan");
                    $dn = mysqli_fetch_array($qn);
                    $a = $dn['max_code'];
                    $urut = (int)substr($a, 4, 3);
                    $urut++;
                    $id = "NIP". sprintf("%03s", $urut);
                    ?>
                    <input type="text" class="form-control" name="nip" value="<?= $id?>" required readonly>
                </div>
                <div class="form-group">
                    <label for="">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama" required>
                </div>
                <div class="form-group">
                    <label for="">Gender</label>
                    <select name="gender" id="gender" class="form-control">
                        <option value="">Pilih Gender</option>
                        <option value="L">Laki-Laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Divisi</label>
                    <select name="divisi" id="" class="form-control">
                        <option value="">Pilih Divisi</option>
                        <?php
                        $qd = mysqli_query($koneksi,"SELECT * FROM divisi");
                        while($dd = mysqli_fetch_array($qd)){
                        ?>
                        <option value="<?= $dd['id_divisi']?>"><?= $dd['nama_divisi']?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" class="form-control" name="username" required>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="text" class="form-control" name="password" required>
                </div>
                <div class="form-group">
                    <label for="">Level</label>
                    <select name="level" id="" class="form-control">
                        <option value="">Pilih Level</option>
                        <option value="1">Admin</option>
                        <option value="2">User</option>
                    </select>
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