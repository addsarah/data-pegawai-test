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

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Halo <?= $_SESSION['nama']?></h1>
    </div>

    <!-- Content Row -->
    <?php
    date_default_timezone_set('asia/jakarta');
    $i = $_SESSION['id'];
    $tgl = date('Y-m-d');
    $query = mysqli_query($koneksi, "SELECT * FROM absensi WHERE karyawan = '$i' AND tgl_absen = '$tgl'");
    $data = mysqli_fetch_array($query);
    $cek = mysqli_num_rows($query);
    $now = date('H:i');
    if ($cek != 1) {
        $set_buka = "06:30";
        $set_tutup = "12:00";
        // $jam_masuk = "12:01";
        if($now < $set_buka) {
            echo "absen masuk dibuka jam 06:30";
        }else if($now <= $set_tutup){
            echo "absen masuk ditutup jam 12:00";
    ?>
    <form action="absen.php?a=M" method="post">
        <button type="submit" name="submit" class="btn btn-success btn-block btn-lg">Absen Masuk</button>
    </form>
    <?php }?>

    <?php }else if($cek == 1){ 
    $buka_pulang = '12:01';
    $set_pulang_akhir = '23:59';
    if($data['pulang'] != null){
        echo "Absen hari ini telah selesai";
    }else{
        if($now < $buka_pulang){
            echo "absen pulang dibuka jam 12:01";
        }else{ 
    ?>
    <form action="absen.php?a=P" method="post">
        <button type="submit" name="submit" class="btn btn-warning btn-block btn-lg">Absen Pulang</button>
    </form>
    <?php }?>

    <?php
        }
    }?>
</div>
<!-- /.container-fluid -->
<?php
    require('../template/footer.php');
}
?>