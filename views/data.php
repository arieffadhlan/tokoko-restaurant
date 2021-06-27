<?php
require_once('drink.php');
require_once('food.php');

$paket1 = new Food('Paket1', 15000, '../assets/img/menu/paket/paket1.jpg', 1);
$paket2 = new Food('Paket2', 15000, '../assets/img/menu/paket/paket2.jpg', 1);
$paket3 = new Food('Paket3', 15000, '../assets/img/menu/paket/paket2.jpg', 1);
$ayamGoreng = new Food('AyamGoreng', 10000, '../assets/img/menu/makanan/ayam_goreng.jpg', 'dingin');
$gorengan = new Food('Gorengan', 5000, '../assets/img/menu/makanan/gorengan.jpg', 'panas');
$IkanSambal = new Food('IkanSambal', 10000, '../assets/img/menu/makanan/ikan_sambal.jpg', 3);
$kariAyam = new Food('KariAyam', 10000, '../assets/img/menu/makanan/kari_ayam.jpg', 1);
$rendang = new Food('Rendang', 10000, '../assets/img/menu/makanan/rendang.jpg', 1);
$sate = new Food('Sate', 10000, '../assets/img/menu/makanan/sate.jpg', 1);
$sayurKangkung = new Food('SayurKangkung', 8000, '../assets/img/menu/makanan/sayur_kangkung.jpg', 1);
$telurBalado = new Food('TelurBalado', 8000, '../assets/img/menu/makanan/telur_balado.jpg', 1);
$telurDadar = new Food('TelurDadar', 8000, '../assets/img/menu/makanan/telur_dadar.jpg', 1);
$jusAlpukat = new Drink('JusAlpukat', 5000, '../assets/img/menu/minuman/jus_alpukat.jpg', 1);
$jusKuini = new Drink('JusKuini', 5000, '../assets/img/menu/minuman/jus_kuini.jpg', 1);
$tehManis = new Drink('TehManis', 5000, '../assets/img/menu/minuman/teh_manis.jpg', 1);

$menus = array($paket1, $paket2, $paket3, $ayamGoreng, $gorengan, $IkanSambal, $kariAyam, $rendang, $sate, $sayurKangkung,
$telurBalado, $telurDadar, $jusAlpukat, $jusKuini, $tehManis);

$menus = array($paket1, $paket2, $paket3, $ayamGoreng, $IkanSambal, $kariAyam, $rendang, $sate, $sayurKangkung, $telurBalado, 
$telurDadar, $gorengan, $jusAlpukat, $jusKuini, $tehManis);

?>