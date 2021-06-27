<?php
     session_start();

     // koneksi ke database
     require 'functions.php';
     $users = query("SELECT * FROM multiuser");
?>
<!DOCTYPE html>
<html lang="en">
     <head>
          <!-- Required meta tags -->
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

          <!-- Bootstrap CSS -->
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
          <link rel="stylesheet" href="../assets/css/admin.css">
          <link rel="stylesheet" href="../assets/DataTables/datatables.min.css">
          <link rel="stylesheet" href="../assets/css/cssdoc/bootstrap.css">
          <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">

		<!-- js -->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
          <link rel="text/javascript" href="../js/jsdoc/bootstrap.js">
          <script src="https://kit.fontawesome.com/7f64318ca4.js" crossorigin="anonymous"></script>


		<!-- icon dan title -->
		<link rel="icon" href="../assets/img/restaurant.png" type="icon/x-image">
          <title>Halaman Admin</title>
     </head>
     <body>
          <!-- navbar -->
		<header>
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
				<div class="container" id="navbar-right">
					<span class="navbar-brand">Tokoko Restaurant</span>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
						<div class="navbar-nav ml-auto">
                                   <a class="nav-link" href="orderan.php"><i class="fa fa-shopping-basket"></i> Orderan</a>
							<a class="nav-link active utama" href="admin.php"><i class="fa fa-users"></i>Admin <span class="sr-only">(current)</span></a>
							<button class="btn button1" data-toggle="modal" data-target="#myModal"><i class="fa fa-user"></i> <a href="logout.php">Logout</a></button>
						</div>
					</div>
				</div>
			</nav>
          </header>

          <!-- tabel -->
          <div class="container mt-3 data-tabel">
               <table class="table table-striped table-bordered" style="width: 100%; margin-right: 100px;" id="datatables">
                    <thead>
                         <tr>
                              <th style="text-align: center;">No.</th>
                              <th style="text-align: center;">Aksi</th>
                              <th style="text-align: center;">Nama Lengkap</th>
                              <th style="text-align: center;">Username</th>
                              <th style="text-align: center; width: 110px; ">Password</th>
                              <th style="text-align: center;">Email</th>
                              <th style="text-align: center;">Level</th>
                         </tr>
                    </thead>
                    <tbody>
                         <?php $i = 1; ?>
                         <?php foreach($users as $user) : ?>
                         <tr>
                              <td style="text-align: center;"><?= $i; ?></td>
                              <td style="text-align: center;">
                                   <button class="btn btn-success">
                                        <a href="ubah.php?id=<?= $user["id_user"]; ?>">Ubah</a>
                                   </button>
                                   <button class="btn btn-danger">
                                        <a href="hapus.php?id=<?= $user["id_user"]; ?>" onclick="return confirm('Yakin?');">Hapus</a>
                                   </button>
                              </td>
                              <td style="text-align: center;"><?= $user["nama_user"]; ?></td>
                              <td style="text-align: center;"><?= $user["username"]; ?></td>
                              <td style="text-align: center; word-break: break-all;"><?= $user["password"]; ?></td>
                              <td style="text-align: center;"><?= $user["email"]; ?></td>
                              <td style="text-align: center;"><?= $user["level"]; ?></td>
                         </tr>
                         <?php $i++ ?>
                         <?php endforeach; ?>
                    </tbody>
               </table>
          </div>

          <script src="../assets/DataTables/datatables.min.js"></script>
          <script>
               $(document).ready( function () {
                    $('#datatables').DataTable();
               });
          </script>
     </body>
</html>