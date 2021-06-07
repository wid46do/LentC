<?php
session_start();
require_once "function.php";
if (!isset($_SESSION["login"])) {
    echo "<script>location = 'login.php'</script>";
}
$idmobil = $_GET["id"];
$result = mysqli_query($connection, "SELECT * FROM mobil WHERE mobil_id='$idmobil'");
$row = mysqli_fetch_assoc($result);
if (isset($_POST["sewa"])) {
    $_SESSION["mobilid"] = $_POST["mobilid"];
    $_SESSION["date1"] = $_POST["date1"];
    $_SESSION["date2"] = $_POST["date2"];
    echo "<script>location = 'checkout.php'</script>";
}
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
    <title>Detail Produk</title>
    <link rel="stylesheet" href="./css/detail.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
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
    <main>
        <div class="con1">
            <div class="con1-1">
                <div class="con1-2">
                    <div class="con1-3">
                        <div class="con2-4">
                            <div class="preview">
                                <img src="./image/<?= $row["gambar"]; ?>" class="preview1" width="550" alt="" srcset="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="con2">
                    <div class="parameter">
                        <h1 class="display1">
                            <?= $row["Nama"]; ?>
                        </h1>
                        <p><?= $row["seats"]; ?> seats</p>
                        <hr>
                        <h6>WARNA<br><span>
                                <?= $row["warna"]; ?>
                            </span></h6>
                        <hr>
                        <div class="detail">
                            <h5>PASSENGERS : <span><?= $row["seats"]; ?></span></h5>
                            <h5>SUITCASES : <span><?= $row["suitcase"]; ?></span></h5>
                        </div>
                        <hr>
                        <div class="harga">
                            <h2>Rp<span><?= $row["harga_sewa"]; ?></span></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tepi">
            <form method="POST" name="form">
                <input type="hidden" value="<?= $row["mobil_id"]; ?>" name="mobilid">
                <input type="hidden" value="<?= $row["harga_sewa"]; ?>" name="hargasewa">
                <div class="pilih">
                    <div class="pilih2">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Input tanggal</label>
                            <div class="tanggal">
                                <label for="date"></label>
                                <input type="date" class="form-control" id="date" name="date1" placeholder="Tanggal Mulai" autocomplete="off" required>
                                <input type="date" class="form-control" id="date" name="date2" placeholder="Tanggal Mulai" autocomplete="off" required>
                            </div>
                            <small id="emailHelp" class="form-text text-muted">Masukkan tanggal pemesanan</small>
                        </div>
                        <div class="form-check">
                            <button type="submit" class="btn btn-primary" name="sewa">SEWA</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
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
                        <li><a href="regis.php">Daftar</a></li>
                        <li><a href="login.php">Masuk</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>