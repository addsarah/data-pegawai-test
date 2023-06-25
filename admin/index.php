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
</div>
<!-- /.container-fluid -->
<?php
    require('../template/footer.php');
}
?>