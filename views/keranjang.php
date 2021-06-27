<?php 
  require_once('data.php');
  require_once('../assets/includes/koneksi.php');

  if (!isset($_SESSION["login"]))
  {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Konfirmasi</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/keranjang.css">
    <link href='https://fonts.googleapis.com/css?family=Pacifico|Lato' rel='stylesheet' type='text/css'>
  </head>
  <body>
    <div class="order-wrapper">
      <h2>Keranjang</h2>
      <?php $totalPayment = 0 ?>
      
      <?php foreach ($menus as $menu): ?>
        <?php 
          $orderCount = $_POST[$menu->getName()];
          $menu->setOrderCount($orderCount);
          $totalPayment += $menu->getTotalPrice();
          
        ?>
        <p class="order-amount">
          <?php echo $menu->getName() ?>
          x
          <?php echo $orderCount ?>
        </p>
        <p class="order-price">Rp.<?php echo $menu->getTotalPrice() ?></p>
      <?php endforeach ?>
      <h3>Harga total: Rp. <?php echo $totalPayment ?></h3>
      
      <form action="konfirmasi.php" method="POST">
      <input type="text" name="order" style="display: none;" value="
      <?php 
        $totalPayment = 0;
        foreach ($menus as $menu) {
          $orderCount = $_POST[$menu->getName()];
          $menu->setOrderCount($orderCount);
          $totalPayment += $menu->getTotalPrice();
          
          echo $menu->getName(); 
          echo " x ";
          echo $orderCount;
          echo " = ";
          echo $menu->getTotalPrice();
          echo "<br>";
        }    
      ?>
      ">
      <input type="number" name="harga" style="display: none;" value="<?php echo $totalPayment ?>">
      <span>Waktu diambil</span><input type="time" name="waktu"  class="form-control" onkeyup="Waktumasuk();" required style="width: 120px;"><br>
      <span>Tanggal diambil</span><input type="date" name="tanggalOrderan" required style="width: 150px;"><br>
      <input type="submit" value=Konfirmasi name="btnKonfirmasi">
      </form>

  </body>
</html>