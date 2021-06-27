<?php
     // hubungkan ke functions.php
     require 'functions.php';
     
     if (isset($_POST["register"]))
     {
          if (registrasi($_POST) > 0)
          {
               echo 
               "
                    <script>
                         alert('user baru berhasil ditambahkan');
                    </script>
               ";
               echo "<script>window.location.replace('index.php');</script>";
               return true;
          } else
          {
               echo mysqli_error($conn);
          }
          
          exit;
     }
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">

          <!-- css -->
          <link rel="stylesheet" href="../assets/css/cssdoc/bootstrap.css">
          <link rel="stylesheet" href="../assets/css/registrasi.css">
          <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">

          <!-- js -->
          <script type="text/javascript" src="../assets/js/jsdoc/jquery351.js"></script>
          <script type="text/javascript" src="../assets/js/jsdoc/bootstrap.js"></script>
          <script type="text/javascript" src="../assets/js/jsdoc/bootstrap.min.js"></script>
          <script src="https://kit.fontawesome.com/7f64318ca4.js" crossorigin="anonymous"></script>

          <!-- icon dan title -->
          <link rel="icon" href="../assets/img/restaurant.png" type="icon/x-image">
          <title>Form registrasi</title>
	</head>
	<body>
		<div class="register-page">
			<div class="form-content">
				<div class="form-image">
					<img src="../assets/img/food.jpg" alt="image">
				</div>
				<form class="form-detail" action="" method="POST">
                         <h2>Form Registrasi</h2>
                         <div class="form-row">
                              <input type="hidden" name="fullname" id="fullname" class="input-form" placeholder="Nama Lengkap" autocomplete="off" required autofocus>
                         </div>
                         <div class="form-row">
                              <input type="text" name="fullname" id="fullname" class="input-form" placeholder="Nama Lengkap" autocomplete="off" required autofocus>
                         </div>
                         <div class="form-row">
                              <input type="text" name="username" id="username" class="input-form" placeholder="Username" autocomplete="off" required autofocus>
                         </div>
                         <div class="form-row">
                              <input type="password" name="password" id="password" class="input-form" placeholder="Password" autocomplete="off" required>
                         </div>
                         <div class="form-row">
                              <input type="password" name="password2" id="password2" class="input-form" placeholder="Konfirmasi Password" autocomplete="off" required>
                         </div>
                         <div class="form-row">
                              <input type="email" name="email" id="email" class="input-form" placeholder="Email" autocomplete="off" required>
                         </div>
                         <div class="form-button">
						<button type="reset" name="reset" class="reset btn btn-danger">Reset</button>
                              <button type="submit" name="register" class="register btn btn-success">Submit</button>
					</div>
					<p class="baliklogin text-center">Sudah mempunyai akun? Silakan <a href="login.php">Login</a></p>
                    </form>
			</div>
		</div>
	</body>
</html>