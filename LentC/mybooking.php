<?php
session_start();
require_once "function.php";
if (!isset($_SESSION["login"])) {
    echo "<script>location = 'index.php'</script>";
}
$username = $_SESSION["username"];
$sayaUser = mysqli_query($connection, "SELECT * FROM pemesanan WHERE id_user = '$username'");
$rowUser = mysqli_fetch_assoc($sayaUser);
$mobil = mysqli_query($connection, "SELECT pemesanan.id_pemesanan, mobil.Nama , mobil.seats, mobil.suitcase, mobil.gambar FROM pemesanan INNER JOIN mobil ON pemesanan.id_mobil = mobil.mobil_id WHERE id_user = '$username' ");
$result = mysqli_query($connection, "SELECT * FROM user WHERE id_user = '$username'");
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/mybooking.css">
</head>

<body>
    <div class="container1">
        <div class="container_child1-1">
            <img src="./image/LentC 2 warna.png" alt="" class="logo">
        </div>
        <div class="navbar1">
            <ul class="navbar2">
                <a href="home.php">Home</a>
                <a href="home.php#produk">Produk</a>
                <a href="mybooking.php">My Booking</a>
                <a><?= $row["username"] ?></a>
                <a href="logout.php">Logout</a>
            </ul>
        </div>
    </div>
    <div class="daftar">
        <h2 class="riwayat">Riwayat Pemesanan</h2>
        <hr>
        <?php while ($rowMobil = mysqli_fetch_assoc($mobil)) : ?>
            <div class="isi">
                <div class="preview">
                    <img src="image/<?= $rowMobil["gambar"] ?>" alt="" srcset="">
                </div>
                <div class="spesifikasi">
                    <h3><?= $rowMobil["Nama"] ?></h3>
                    <p><?= $rowMobil["seats"] ?> Seats</p>
                    <p><?= $rowMobil["suitcase"] ?> Suitcases</p>
                    <p>Aktif</p>
                </div>
            </div>
        <?php endwhile ?>
        <hr>
    </div>
    <footer class="bawah">
        <img src="./image/LentC 2.png" alt="" class="gambar2">
        <div class="container5">
            <div class="row">
                <div class="footer-col">
                    <h4>Perusahaan</h4>
                    <ul>
                        <li><a href="home.php#about">Tentang</a></li>
                        <li><a href="produk.php">Produk</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Gabung</h4>
                    <ul>
                        <li><a href="regis.html">Daftar</a></li>
                        <li><a href="login.html">Masuk</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>