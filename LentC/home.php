<?php
session_start();
require_once "function.php";
if (!isset($_SESSION["login"])) {
    echo "<script>location = 'index.php'</script>";
}
$username = $_SESSION["username"];
$result = mysqli_query($connection, "SELECT * FROM user WHERE id_user = '$username'");
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
    <link rel="stylesheet" href="./css/home.css">
</head>

<body>
    <div class="container1">
        <div class="container_child1-1">
            <img src="./image/LentC 2 warna.png" alt="" class="logo">
        </div>
        <div class="navbar1">
            <ul class="navbar2">
                <a href="home.php">Home</a>
                <a href="#produk">Produk</a>
                <a href="mybooking.php">My Booking</a>
                <a><?= $row["username"] ?></a>
                <a href="logout.php">Logout</a>
            </ul>
        </div>
    </div>
    <div class="container2">
        <img src="./image/mobil1.jpg" alt="" class="gambar1">
        <div class="container_child2">
            <h1>LentC membawa kemanapun anda pergi</h1>
            <p>Menyewa mobil menjadi lebih mudah dan nyaman. <br>Tersedia di berbagai kota.</p>
        </div>
    </div>
    <div class="container3" id="produk">
        <h2>Pelajari produk kami lebih lanjut</h2>
        <div class="cover_container_child3">
        <div class="container_child3">
                <a href="produk.php" class="opsi">
                    <h3>With Driver</h3>
                    <p>Mobil lengkap dengan pengemudi. <br> Manjakan diri anda.</p>
                </a>
            </div>
            <div class="container_child3">
                <a href="produk.php" class="opsi2">
                    <h3>Without Driver</h3>
                    <p>Mobil tanpa pengemudi. <br> Bebaskan diri anda.</p>
                </a>
            </div>
        </div>
    </div>
    <div class="container4" id="about">
        <h2>Tentang kami</h2>
        <div class="content">
            <img src="./image/logotok2.png" alt="">
            <h3>LentC melayani persewaan mobil yang tersedia di beberapa kota.<br>
                Melalui aplikasi kami, anda dapat memesan mobil secara mudah <br>
                dengan berbagai pilihan sesuai dengan kebutuhan anda.</h3>
        </div>
    </div>
    <footer class="bawah">
        <img src="./image/LentC 2.png" alt="" class="gambar2">
        <div class="container5">
            <div class="row">

                <div class="footer-col">
                    <h4>Perusahaan</h4>
                    <ul>
                        <li><a href="#about">Tentang</a></li>
                        <li><a href="produk.php">Produk</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Gabung</h4>
                    <ul>
                        <li><a href="regis.php">Daftar</a></li>
                        <li><a href="login.php">Masuk</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="copy" style="display:flex; justify-content:center;">
            <h3 style="color: white;">&#169;Copyright 2021-Ruben Emanuel Widagdo</h3>
        </div>
    </footer>
</body>

</html>