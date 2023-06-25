<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Data Pegawai</title>
	<link rel="shortcut icon" href="img/logo_ilmututorial_32x32.jpg" type="image/x-icon" />
    <!-- Bootstrap -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="../bootstrap/fontawesome/css/all.css" rel="stylesheet">
	<link href="../bootstrap/css/bootstrap-datepicker.css" rel="stylesheet">
	<!-- JS -->
	<script src="../bootstrap/js/jquery.min.js"></script>
	<script src="../bootstrap/js/popper.min.js"></script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>
	<script src="../bootstrap/js/tooltip.js"></script>
	<script src="../bootstrap/js/bootstrap-datepicker.js"></script>
    <link href="../daftar-pegawai/style.css" rel="stylesheet">
	<!-- JS Fontawesome-->
	<script src="../bootstrap/fontawesome/js/all.min.js"></script>

	<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();
	});
	</script>

  </head>
<body>
	<!-- Start navbar -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container">
			
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				<div class="navbar-nav">
					<a class="nav-item nav-link" href="home.php">
						<i class="fas fa-home"></i> Beranda </a>
					<a class="nav-item nav-link active" href="keluarga.php">
						<i class="fas fa-users"></i> Riwayat Keluarga</a>
					<a class="nav-item nav-link" href="absensi.php">
						<i class="fas fa-calendar-alt"></i> Absensi</a>		
				</div>
			</div>
			<form class="form-inline my-2 my-lg-0" method="POST" name="cari" action="cari.php" role="search">
				<div class="form-group">
					<input class="form-control mr-sm-2" type="text" name="carinik" placeholder="Search NIK Keluarga" aria-label="Search">
				</div>
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit" id="submit" value="search">Search</button>
			</form>

			<ul class="navbar-nav d-none d-lg-flex">
        <li class="nav-item dropdown">
          <a href="#" class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown">
            <img src="/images/user_pc.svg" alt="" class="rounded-circle mr-2 profile-picture"/>
            Hi, Adzkia
          </a>
          <div class="dropdown-menu">
            <a href="" class="dropdown-item">Dashboard</a>
            <a href="" class="dropdown-item"
              >Settings</a
              >
            <div class="dropdown-divider"></div>
            <a href="/" class="dropdown-item">Logout</a>
          </div>
         </li>
         <li class="nav-item">
           <a href="#" class="nav-link d-line-block-mt-2">
             <img src="" alt="" />
           </a>
         </li>
        </ul>

        <!-- Mobile Menu -->
        <ul class="navbar-nav d-block d-lg-none">
          <li class="nav-item">
            <a href="#" class="nav-link">Hi, Azkia </a>
          </li>
        </ul>
		</div>
	</nav>

	<!-- End navbar -->