<?php
session_start();
require 'functions.php';

// cek cookie
if (isset($_COOKIE['id_user']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id_user'];
    $key = $_COOKIE['key'];

    // ambil username
    $result = mysqli_query($conn, "SELECT username FROM multiuser WHERE id_user = $id");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if ($key === hash('sha256', $row['username'])) {
        $_SESSION['login'] = true;
    }
}
if (isset($_SESSION['login'])) {
    $username = $_SESSION['username'];
    $result = mysqli_query($conn, "SELECT level FROM multiuser WHERE username = '$username'");
    $r = mysqli_fetch_array($result);
    $level = isset($r['level']);
    if ($r['level'] == "admin") {
        header("location: admin.php");
    } else if ($r['level'] == "user") {
        header("location: menuMakanan.php");
    }

    exit;
}

// submit button
if (isset($_POST["login"])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $result = mysqli_query($conn, "SELECT * FROM multiuser WHERE username = '$user'");
    $r = mysqli_fetch_array($result);
    $username = isset($r['username']);
    $password = isset($r['password']);
    $level = isset($r['level']);

    if ($user == $username && $pass == $password) {
        if ($r['level'] == "admin") {
            $_SESSION["login"] = true;
            $_SESSION['username'] = $user;
            header("location: admin.php");
        } else if ($r['level'] == "user") {
            $_SESSION["login"] = true;
            $_SESSION['username'] = $user;
            header("location: menuMakanan.php");
        }
        // cek remember me
        if (isset($_POST['remember'])) {
            // cookie
            setcookie('id_user', $row['id_user'], time() + 60);
            setcookie('key', hash('sha256', $row['username']), time() + 60);
        }
    }

    $error = true;
}

if (isset($error)) {
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
    <link rel="stylesheet" href="../assets/css/style.css">
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
    <title>HomePage</title>
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
                        <a class="nav-link active utama" href="index.php"><i class="fa fa-home"></i> HomePage <span class="sr-only">(current)</span></a>
                        <a class="nav-link" href="contact.php"><i class="fa fa-address-card"></i> contact</a>
                        <a class="nav-link" href="about.php"><i class="fa fa-users"></i> About</a>
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
                            <input type="text" name="username" id="username" autocomplete="off" class="form-control validate" required>
                        </div>

                        <div class="md-form">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" autocomplete="off" class="form-control validate" required>
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

    <!-- carousel  -->
    <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../assets/img/homepage/carousel1.jpg" class="d-block w-100">
                <div class="carousel-caption d-none d-md-block">
                    <h2>Selamat datang di Tokoko Restaurant.</h2>
                    <p>Kami menyediakan makanan terbaik untuk anda yang disajikan oleh chef-chef handal.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="../assets/img/homepage/carousel2.jpg" class="d-block w-100">
                <div class="carousel-caption d-none d-md-block">
                    <h2>Website restoran terbaik.</h2>
                    <p>Kami melayani pelanggan dengan pelayanan terbaik.</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- card -->
    <div class="container my-4">
        <h2 class="text-center mb-4">Menu yang sedang PROMO!</h2>
        <div class="row mb-2">
            <div class="col-md-6">
                <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <h4><strong class="d-inline-block text-danger">Promo Paket</strong></h4>
                        <p class="card-text mb-auto"><strong>Ayam goreng</strong> <br>Rp 10.000</p>
                        <button class="btn btn-success btn-sm btn-promo" data-toggle="modal" data-target="#myModal">Pesan sekarang!</button>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img class="bd-placeholder-img" width="250" height="250" src="../assets/img/homepage/foods/ayam_goreng.jpg" />
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <h4><strong class="d-inline-block text-success">Promo Makanan</strong></h4>
                        <p class="card-text mb-auto"><strong>Rendang</strong> <br>Rp 10.000</p>
                        <button class="btn btn-success btn-sm btn-promo" data-toggle="modal" data-target="#myModal">Pesan sekarang!</button>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img class="bd-placeholder-img" width="250" height="250" src="../assets/img/homepage/foods/rendang.jpg" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-2">
        <div class="row mb-2">
            <div class="col-md-6">
                <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <h4><strong class="d-inline-block text-success">Promo Makanan</strong></h4>
                        <p class="card-text mb-auto"><strong>Paket 1</strong> <br>Rp 15.000</p>
                        <button class="btn btn-success btn-sm btn-promo" data-toggle="modal" data-target="#myModal">Pesan sekarang!</button>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img class="bd-placeholder-img" width="250" height="250" src="../assets/img/homepage/foods/paket1.jpg" />
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <h4><strong class="d-inline-block text-info">Promo Minuman</strong></h4>
                        <p class="card-text mb-auto"><strong>Jus Alpukat</strong> <br>Rp 5.000</p>
                        <button class="btn btn-success btn-sm btn-promo" data-toggle="modal" data-target="#myModal">Pesan sekarang!</button>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img class="bd-placeholder-img" width="250" height="250" src="../assets/img/homepage/foods/jus_alpukat.jpg" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- section Gallary -->
    <h2 class="text-center my-3">Menu Favorit</h2>
    <hr>
    <div class="container mb-5">
        <div class="card-deck">
            <div class="card">
                <img src="../assets/img/menu/makanan/ikan_sambal.jpg" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title text-center">Ikan sambal</h5>
                    <p class="card-desc text-center">Rp 10.000</p>
                    <button class="btn btn-info btn-sm btn-favorit" data-toggle="modal" data-target="#myModal">Pesan sekarang!</button>
                </div>
            </div>
            <div class="card">
                <img src="../assets/img/menu/makanan/kari_ayam.jpg" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title text-center">Kari ayam</h5>
                    <p class="card-desc text-center">Rp 10.000</p>
                    <button class="btn btn-info btn-sm btn-favorit" data-toggle="modal" data-target="#myModal">Pesan sekarang!</button>
                </div>
            </div>
            <div class="card">
                <img src="../assets/img/menu/makanan/sate.jpg" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title text-center">Sate</h5>
                    <p class="card-desc text-center">Rp 10.000</p>
                    <button class="btn btn-info btn-sm btn-favorit" data-toggle="modal" data-target="#myModal">Pesan sekarang!</button>
                </div>
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
        var mybutton = document.getElementById("myBtn");
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

        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
</body>

</html>