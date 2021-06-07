<?php
session_start();
require_once "function.php";
function dateDiffInDays($date1, $date2)
{
    $diff = strtotime($date2) - strtotime($date1);
    return abs(round($diff / 86400));
}
if (!isset($_SESSION["login"])) {
    echo "<script>location = 'index.php'</script>";
}
$mobilid = $_SESSION["mobilid"];
$date1 = $_SESSION["date1"];
$date2 = $_SESSION["date2"];

$result = mysqli_query($connection, "SELECT * FROM mobil WHERE mobil_id = '$mobilid'");
$row = mysqli_fetch_assoc($result);
$hasil = dateDiffInDays($date2, $date1) * $row["harga_sewa"];
if (isset($_GET["bayar"])) {
    $iduser = $_SESSION["username"];
    mysqli_query($connection, "INSERT INTO pemesanan VALUE ('', '$mobilid', '$iduser', '$date1', '$date2', '$hasil')");
    echo "
    <script>
    alert('Pembayaran anda telah berhasil!');
    document.location.href= 'mybooking.php';
    </script>
    ";
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
    <title>Checkout</title>
    <link rel="stylesheet" href="./css/checkout.css">
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
    <div id="wrapper">
        <div class="payment">
            <div class="payment_product">
                <div>
                    <img width="450px" height="450px" src="image/<?= $row["gambar"] ?>" alt="">
                    <h2><?= $row["Nama"] ?></h2>
                    <div class="harga">
                        Rp.<?= $row["harga_sewa"] ?>
                    </div>
                </div>
            </div>
            <div class="payment_bill">
                <h3>Informasi Pembayaran</h3>
                <ul>
                    <li>
                        <span>Nama Mobil</span>
                        <span><?= $row["Nama"] ?></span>
                    </li>
                    <li>
                        <span>Tanggal Booking</span>
                        <span><?= $date1 ?> - <?= $date2 ?></span>
                    </li>
                    <li>
                        <span>Harga/hari</span>
                        <span>Rp.<?= $row["harga_sewa"] ?></span>
                    </li>
                    <li>
                        <span>Subtotal</span>
                        <span>Rp.<?= $hasil ?></span>
                    </li>
                </ul>
                <hr>
                <form action="" method="GET">
                    <button type="submit" class="btn" name="bayar">Bayar</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>