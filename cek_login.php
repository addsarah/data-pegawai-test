<?php
require('setup/koneksi.php');
if(isset($_POST['submit'])){
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$user' and password = '$pass'");
    $data = mysqli_fetch_array($query);
    $cek = mysqli_num_rows($query);
    $id = $data['id_user'];
    $user = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM user JOIN karyawan ON user.id_user = karyawan.nip
    WHERE id_user ='$id'"));
    if($cek == 1){
        session_start();
        $_SESSION['nama'] = $user['nama_karyawan'];
        $_SESSION['level'] = $user['level'];$_SESSION['id'] = $id;
        // var_dump($_SESSION['level']);die;
        if($data['level'] == "1"){
            echo"<script>alert('Halo admin');window.location='admin/'</script>";
        }else{
            echo"<script>alert('Login berhasil');window.location='user/'</script>";
        }
    }else{
        echo"<script>alert('Login gagal');window.location='login.php'</script>";
    }
}