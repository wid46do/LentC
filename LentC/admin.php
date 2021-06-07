<?php
session_start();
require_once "function.php";
if (!isset($_SESSION["SuperLogin"])) {
    var_dump($_SESSION["SuperLogin"]);
    exit;
}

$mobil = query("SELECT * FROM mobil");

if (isset($_POST["cari"])) {
    $mobil = cari($_POST["keyword"]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="./css/admin.css">
</head>

<body>
    <div class="container1">
        <div class="container_child1-1">
            <img src="./image/LentC 2 warna.png" alt="" class="logo">
        </div>
        <div class="navbar1">
            <ul class="navbar2">
                <a href="logout.php">Logout</a>
            </ul>
        </div>
    </div>
    <div class="main">
        <div class="content">
            <div class="atas">
                <h1>Daftar Mobil</h1>
            </div>
            <br>
            <div class="tabel">
                <div class="tabel1">
                    <a href="tambah.php">Tambah data mobil</a>
                    <form action="" method="POST">
                        <input type="text" name="keyword" size="40" autofocus placeholder="masukan keyword pencarian.." autocomplete="off">
                        <button type="submit" name="cari">Cari</button>
                    </form>
                </div>
                <div class="tabel2">
                    <table cellpadding="10" cellspacing="5">
                        <thead>
                            <th>No.</th>
                            <th>aksi</th>
                            <th>Gambar</th>
                            <th>Nama</th>
                            <th>Seats</th>
                            <th>Suitcases</th>
                            <th>Warna</th>
                            <th>Harga Sewa</th>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($mobil as $row) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td>
                                        <a href="ubah.php?id=<?= $row["mobil_id"]; ?>">ubah</a> |
                                        <a href="hapus.php?id=<?= $row["mobil_id"]; ?>" onclick="return confirm('yakin?')">hapus</a>
                                    </td>
                                    <td>
                                        <img src="./image/<?= $row["gambar"]; ?>" width="50" alt="">
                                    </td>
                                    <td><?= $row["Nama"]; ?></td>
                                    <td><?= $row["seats"]; ?></td>
                                    <td><?= $row["suitcase"]; ?></td>
                                    <td><?= $row["warna"]; ?></td>
                                    <td><?= $row["harga_sewa"]; ?></td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>