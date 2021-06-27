<?php 
  require_once('../assets/includes/koneksi.php');

    if (!isset($_SESSION["login"]))
    {
          header("Location: index.php");
          exit;
    }
  
  if(isset($_POST['btnKonfirmasi'])) {
    $tanggal = date("Y-m-d H:i:s");
    $waktuOrder = $_POST['waktu'];
    $tanggalOrder = $_POST['tanggalOrderan'];
    $harga = $_POST['harga'];
    $order = $_POST['order'];
    $id = $_SESSION['username'];

    $sql = "INSERT INTO pesanan (idPelanggan,tanggalDipesan,tanggalOrderan,waktuOrderan,orderan,harga) VALUES
            ('$id','$tanggal','$tanggalOrder','$waktuOrder','$order','$harga')";
    
    if($koneksi->query($sql)===TRUE) {
      echo "
            <script>
                alert('Pesanan berhasil');
                document.location.href = 'menuMakanan.php';
            </script>
          ";
    } else {
        echo "Terjadi kesalahan: " .$sql."<br/>".$koneksi->error;
    }
  }
?>