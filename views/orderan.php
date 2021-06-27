<?php 
    require_once ('../assets/includes/koneksi.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="../assets/css/pesanan.css">
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
        <title>Orderan</title>
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
							<a class="nav-link active utama" href="orderan.php"><i class="fa fa-shopping-basket"></i> Orderan <span class="sr-only">(current)</a>
                            <a class="nav-link" href="admin.php"><i class="fa fa-users"></i> Admin </span></a>
							<button class="btn button1" data-toggle="modal" data-target="#myModal"><i class="fa fa-user"></i> <a href="logout.php">Logout</a></button>
						</div>
					</div>
				</div>
			</nav>
        </header>

        <!-- tabel -->
        <div class="container mb-5 mt-3 data-tabel">
            <table class="table table-striped table-bordered" style="width: 100%" id="datatables">
                    <thead>
                        <tr>
                            <th style="text-align: center; padding-bottom: 30px;">Nomor</th>
                            <th style="text-align: center; padding-bottom: 18px;">Id</th>
                            <th style="text-align: center; padding-bottom: 18px;">User</th>
                            <th style="text-align: center; padding-bottom: 18px;">Tanggal Orderan</th>
                            <th style="text-align: center; padding-bottom: 18px;">Waktu Orderan</th>
                            <th style="text-align: center; padding-bottom: 23px;">Orderan</th>
                            <th style="text-align: center; padding-bottom: 23px;">Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  
                            $user = $_SESSION['username'];
                            $query = "SELECT * FROM pesanan";
                            $hasil = mysqli_query($koneksi, $query);
                        ?>
                        <?php 
                            $i = 1;
                            foreach($hasil as $data) : 
                        ?>
                        <tr>
                            <td style="text-align: center;"><?= $i; ?></td>
                            <td style="text-align: center;"><?= $data['idPesanan']; ?></td>
                            <td style="text-align: center;"><?= $data['idPelanggan']; ?></td>
                            <td style="text-align: center;"><?= $data['tanggalOrderan']; ?></td>
                            <td style="text-align: center;"><?= $data['waktuOrderan']; ?></td>
                            <td style="text-align: center;"><?= $data['orderan']; ?></td>
                            <td style="text-align: center;"><?= $data['harga']; ?></td>
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