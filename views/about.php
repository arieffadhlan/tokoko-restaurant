<?php 
    session_start();
    require 'functions.php';

    // cek cookie
    if (isset($_COOKIE['id_user']) && isset($_COOKIE['key']))
    {
        $id = $_COOKIE['id_user'];
        $key = $_COOKIE['key'];

        // ambil username
        $result = mysqli_query($conn, "SELECT username FROM multiuser WHERE id_user = $id");
        $row = mysqli_fetch_assoc($result);

        // cek cookie dan username
        if ($key === hash('sha256', $row['username']))
        {
            $_SESSION['login'] = true;
        }
    }
    if (isset($_SESSION['login']))
    {
        $username = $_SESSION['username'];
        $result = mysqli_query($conn, "SELECT level FROM multiuser WHERE username = '$username'");
        $r = mysqli_fetch_array($result);
        $level = isset($r['level']);
        if($r['level'] == "admin"){
            header("location: admin.php");
        }
        else if($r['level'] == "user"){
            header("location: menuMakanan.php");
        }
        
        exit;
    }

    // submit button
    if (isset($_POST["login"]))
    {
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $result = mysqli_query($conn, "SELECT * FROM multiuser WHERE username = '$user'");
        $r = mysqli_fetch_array($result);
        $username = isset($r['username']);
        $password = isset($r['password']);
        $level = isset($r['level']);
        
        if ($user == $username && $pass == $password) {
            if($r['level'] == "admin"){
                $_SESSION["login"] = true;
                $_SESSION['username'] = $user;
                header("location: admin.php");
            }
    
            else if($r['level'] == "user"){
                $_SESSION["login"] = true;
                $_SESSION['username'] = $user;
                header("location: menuMakanan.php");
            }
            // cek remember me
            if (isset($_POST['remember']))
            {
                // cookie
                setcookie('id_user', $row['id_user'], time() + 60);
                setcookie('key', hash('sha256', $row['username']), time() + 60);
            }
        }

        $error = true;
    }

    if (isset($error))
    {
        echo
            "
                <script>
                    alert('Username atau Password anda salah!');
                    window.location= 'index.php';
                </script>
            ";
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
        <link rel="stylesheet" href="../assets/css/about.css">
        <link rel="stylesheet" href="../assets/css/cssdoc/bootstrap.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">

		<!-- js -->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
		<script src="https://kit.fontawesome.com/7f64318ca4.js" crossorigin="anonymous"></script>

		<!-- icon dan title -->
		<link rel="icon" href="../assets/img/restaurant.png" type="icon/x-image">
		<title>About</title>
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
                            <a class="nav-link" href="index.php"><i class="fa fa-home"></i> HomePage</a>
                            <a class="nav-link" href="contact.php"><i class="fa fa-address-card"></i> contact</a>
                            <a class="nav-link active utama" href="about.php"><i class="fa fa-users"></i> About<span class="sr-only">(current)</span></a>
							<button class="btn button1" data-toggle="modal" data-target="#myModal"><i class="fa fa-user"></i> Login</button>
						</div>
					</div>
				</div>
            </nav>
        </header>
        
        <!-- login modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
            
                    <!-- Modal Header -->
                    <div class="modal-header text-center">
                        <h4 class="modal-title  text-center w-100 dark-grey-text font-weight-bold">Login</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-lable="close">&times;</button>
                    </div>
                
                    <!-- Modal body -->
                    <div class="modal-body mx-4">
                        <form action="" method="POST">
                            <div class="md-form">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" autocomplete="off"  class="form-control validate" required>
                            </div>

                            <div class="md-form">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" autocomplete="off"  class="form-control validate" required>
                            </div>

                            <div class="md-form">
                                <input type="checkbox" name="remember" id="remember">
                                <label for="remember">Remember me</label>
                            </div>
                            
                            <div class="text-center mb-3">
                                <button type="reset" name="reset" class="btn btn-danger">Reset</button>
                                <button type="submit" name="login" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <p>Belum punya akun? <a class="regis" href="registrasi.php">Registrasi!</a></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- content  -->
        <div class="container my-4">
            <div class="row about d-flex justify-content-center align-items-center">
                <div class="col-md-7">
                    <h2 class="featurette-heading"><span class="text-muted">koki Terbaik</span></h2>
                    <p class="lead">Masakan yang akan disajikan dibuat oleh para koki terbaik yang telah diseleksi untuk membuatkan masakan kepada pelanggan.</p>
                </div>
                <div class="col-md-5">
                    <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
                        src="../assets/img/about/about1.jpg" alt="">
                </div>
            </div>

            <div class="row featurette d-flex justify-content-center align-items-center">
                <div class="col-md-7 order-md-2">
                    <h2 class="featurette-heading"><span class="text-muted">Bahan Masakan Bekualitas</span></h2>
                    <p class="lead">Kami menggunakan bahan masakan terbaik sehingga membuat masakan menjadi lebih enak dan mempunyai cita rasa yang khas.</p>
                </div>
                <div class="col-md-5 order-md-1">
                    <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
                        src="../assets/img/about/about2.jpg" alt="">
                </div>
            </div>

            <div class="row featurette d-flex justify-content-center align-items-center">
                <div class="col-md-7">
                    <h2 class="featurette-heading"><span class="text-muted">Pelayanan Terbaik</span></h2>
                    <p class="lead">Kami memberikan pelayanan terbaik sehingga memberikan kepuasan dan pengalaman yang baik kepada pelanggan.</p>
                </div>
                <div class="col-md-5">
                    <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
                        src="../assets/img/about/about3.jpg" alt="">
                </div>
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

        <!-- Optional JavaScript -->
        <script>
            // go to top
            //Get the button
                var mybutton = document.getElementById("myBtn");

                // When the user scrolls down 20px from the top of the document, show the button
                window.onscroll = function() {scrollFunction()};

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