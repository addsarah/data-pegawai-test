<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">
    

		<title>INPUT DATA Pegawai</title>


        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
  <link href="style/main.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script type="text/javascript">
  //<![CDATA[

    window.onload=function(){
      

!function(a){a(function(){a('[data-toggle="password"]').each(function(){var b = a(this); var c = a(this).parent().find(".input-group-text"); c.css("cursor", "pointer").addClass("input-password-hide"); c.on("click", function(){if (c.hasClass("input-password-hide")){c.removeClass("input-password-hide").addClass("input-password-show"); c.find(".fa").removeClass("fa-eye").addClass("fa-eye-slash"); b.attr("type", "text")} else{c.removeClass("input-password-show").addClass("input-password-hide"); c.find(".fa").removeClass("fa-eye-slash").addClass("fa-eye"); b.attr("type", "password")}})})})}(window.jQuery);


    }

  //]]>
  </script>

</head>
<body>
<!--ISI-->
	<div class="row">
		<div class="col-md-6">
			<h3 class="text-center">Halaman Login</h3>
	</div>

	<div class="col-md-12">
		<form method="post" action="login_proses.php">
			
			<div class="form-group">
				<span class="form-group-addon" id="basic-addon1">
					<span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
				<input type="text" name="nik" class="form-control" placeholder="Masukan NIP atau Nama" value="admin1">
			</div>

			<div class="form-group ">
                  <div class="input-group">
                    <input type="password" name="user_password" id="user_password" class="form-control" data-toggle="password" placeholder="Password"value="admin1_">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="fa fa-eye"></i>
                      </span>
                    </div>
                  </div>
                  <div class="invalid-feedback">Example invalid custom select feedback</div>
                </div>
	<div class="form-group">
		<button type="Submit" class="btn-btn-primary">Submit</button>
		</div>

<p class="copyright">Copyright &copy; 2022 by Sarah Adibah & Fika Nur Rizki</a>.<br/> Projek Website PKL.<br/>SMKN 46 Jakarta</p>
</form>





<!--AKHIR ISI-->

</div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script src="bootstrap/js/bootstrap.min.js"></script>

</body>

</html>