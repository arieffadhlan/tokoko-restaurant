<?php
    session_start();

    // hubungkan ke functions.php
    require 'functions.php';

    // ambil data di URL
    $id = $_GET["id"];

    // query data mahasiswa berdasarkan id
    $user = query("SELECT * FROM multiuser WHERE id_user = $id")[0];

     // cek apakah tombol submit sudah ditekan atau belum
    if (isset($_POST["submit"]))
    {
        // cek apakah data berhasil ditambahkan atau tidak
        if (ubah($_POST) > 0)
        {
            echo 
            "
            <script>
                alert('Data berhasil diubah!');
                document.location.href = 'admin.php';
            </script>
            ";
        } else
        {
            echo 
            "
            <script>
                alert('Tidak ada data yang diubah!');
                document.location.href = 'admin.php';
            </script>
            ";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="../assets/css/ubah.css">
        <link rel="stylesheet" href="../assets/css/cssdoc/bootstrap.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">

		<!-- js -->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
        <link rel="text/javascript" href="../assets/js/jsdoc/bootstrap.js">
        <script src="https://kit.fontawesome.com/7f64318ca4.js" crossorigin="anonymous"></script>

        <!-- icon dan title -->
		<link rel="icon" href="../assets/img/restaurant.png" type="icon/x-image">
        <title>Ubah data</title>
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
							<a class="nav-link" href="admin.php"><i class="fa fa-user"></i> Admin</a>
							<button class="btn button1" data-toggle="modal" data-target="#myModal"><i class="fa fa-user"></i> <a href="logout.php">Logout</a></button>
						</div>
					</div>
				</div>
			</nav>
        </header>

        <!-- form -->
        <div class="container mb-5 mt-3">
            <form action="" method="POST" class="form-ubah">
                <h1 class=" title-ubah">Form Ubah</h1>
                <input type="hidden" name="id_user" value="<?= $user["id_user"]; ?>">
                    <div class="form-group">
                        <div class="col-md-11 mb-3">
                            <label for="nama_user"><strong>Nama Lengkap : </strong></label>
                            <input type="text" name="nama_user" id="nama_user" value="<?= $user["nama_user"]; ?>" class="form-control"  autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-11 mb-3">
                            <label for="username"><strong>Username : </strong></label>
                            <input type="text" name="username" id="username" value="<?= $user["username"]; ?>" class="form-control" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-11 mb-3">
                            <label for="email"><strong>Email : </strong></label>
                            <input type="email" name="email" id="email" value="<?= $user["email"]; ?>" class="form-control" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-11 mb-3">
                            <label for="level"><strong>Level : </strong></label>
                            <input type="text" name="level" id="level" value="<?= $user["level"]; ?>" class="form-control" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-11 mb-3">
                            <button type="submit" name="submit" class="btn btn-success">Submit</button>
                            <button type="reset" name="reset" class="btn btn-danger">Reset</button>
                            <button type="submit" name="kembali" class="btn btn-primary"><a href="admin.php">Kembali.</a></button>
                        </div>
                    </div>
            </form>
        </div>
    </body>
</html>