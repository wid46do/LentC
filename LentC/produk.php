<?php
session_start();
require_once "function.php";
if(!isset($_SESSION["login"])){
    echo "<script>location = 'index.php'</script>";
}
$result = mysqli_query($connection, "SELECT * FROM mobil");
$username = $_SESSION["username"];
$sayaUser = mysqli_query($connection, "SELECT * FROM user WHERE id_user = '$username'");
$rowUser = mysqli_fetch_assoc($sayaUser);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk</title>
    <link rel="stylesheet" href="./css/produk.css">
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
                <a><?= $rowUser["username"] ?></a>
                <a href="logout.php">Logout</a>
            </ul>
        </div>
    </div>
    <div class="con2">
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <a href="detail.php?id=<?= $row["mobil_id"]; ?>">
                <div class="con3">
                    <img src="./image/<?= $row["gambar"]; ?>" alt="">
                    <h3>
                        <?= $row["Nama"]; ?>
                    </h3>
                    <h4>
                        <?= $row["warna"]; ?>
                    </h4>
                    <h4>Rp.
                        <?= $row["harga_sewa"]; ?>
                    </h4>
                </div>
            </a>
        <?php endwhile; ?>
    </div>
    <footer class="bawah">
        <img src="./image/LentC 2.png" alt="" class="gambar2">
        <div class="container5">
            <div class="row">
                <div class="footer-col">
                    <h4>Perusahaan</h4>
                    <ul>
                        <li><a href="home.php#about">Tentang</a></li>
                        <li><a href="produk.html">Produk</a></li>
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