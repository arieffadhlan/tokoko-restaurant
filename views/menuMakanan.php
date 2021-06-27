<?php
require_once('data.php');
require_once('menu.php');

session_start();

if (!isset($_SESSION["login"])) {
	header("Location: index.php");
	exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- css -->
	<link rel="stylesheet" href="../assets/css/cssdoc/bootstrap.css">
	<link rel="stylesheet" href="../assets/css/menu.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">

	<!-- js -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/7f64318ca4.js" crossorigin="anonymous"></script>

	<!-- icon dan title -->
	<link rel="icon" href="../assets/img/restaurant.png" type="icon/x-image">
	<title>Menu</title>
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
						<a class="nav-link active utama" href="menuMakanan.php"><i class="fa fa-bars"></i> Menu <span class="sr-only">(current)</span></a>
						<a class="nav-link" href="pesanan.php"><i class="fa fa-shopping-basket"></i> Pesanan</a>
						<button class="btn button1" data-toggle="modal" data-target="#myModal"><i class="fa fa-user"></i> <a href="logout.php">Logout</a></button>
					</div>
				</div>
			</div>
		</nav>
	</header>

	<!-- menu-title -->
	<div class="image-container">
		<div class="text">MENU</div>
	</div>

	<!-- card -->
	<!-- paket -->
	<div class="container">
		<div class="row justify-content-center">
			<form class="row justify-content-center" method="post" action="keranjang.php">
				<?php foreach ($menus as $menu) : ?>
					<div class="col-md-4">
						<div id="content" class="card" style="width: 20rem;">
							<img src="<?php echo $menu->getImage() ?>" class="card-img-top" alt="design">
							<div class="card-body">
								<h5 class="card-item text-center"><?php echo $menu->getName() ?></h5>
								<p class="card-desc">Rp.<?php echo $menu->getTaxIncludedPrice() ?> (termasuk pajak)</p>
								<span class="jumlah">Qty: </span>
								<input type="number" value="0" style="width: 60px" min="0" max="20" name="<?php echo $menu->getName() ?>">
							</div>
						</div>
					</div>
				<?php endforeach ?>
				<button type="submit" class="btn btn-primary pesan" style="margin-top: 30px; font-size: 25px;" name="pesan">PESAN</button>
			</form>
		</div>
	</div>

	<!-- go to top -->
	<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-angle-up" aria-hidden="true"> TOP</i></button>

	<!-- footer -->
	<div class="footer text-center">
		<div class="copyright">
			<span>Created by : Tokoko Restaurant</span>
			<span>&copy;Copyright Tokoko Restaurant</span>
		</div>
	</div>

	<script>
		// go to top
		//Get the button
		var mybutton = document.getElementById("myBtn");

		// When the user scrolls down 20px from the top of the document, show the button
		window.onscroll = function() {
			scrollFunction()
		};

		function scrollFunction() {
			if (document.body.scrollTop > 90 || document.documentElement.scrollTop > 90) {
				mybutton.style.display = "block";
			} else {
				mybutton.style.display = "none";
			}
		}

		// When the user clicks on the button, scroll to the top of the document
		function topFunction() {
			document.body.scrollTop = 0;
			document.documentElement.scrollTop = 0;
		}
	</script>
</body>

</html>