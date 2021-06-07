<?php
require_once "function.php";
$id = $_GET["id"];
$mobil = query("SELECT * FROM mobil WHERE mobil_id = '$id'")[0];
if (isset($_POST["submit"])) {
    if (ubah($_POST) > 0) {
        echo "
        <script>
        alert('Data berhasil diubah!');
        document.location.href= 'admin.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Data gagal diubah!');
        document.location.href= 'admin.php';
        </script>
        ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah data mobil</title>
    <link rel="stylesheet" href="css/ubah.css">
</head>

<body>
    <div class="main">
        <div class="judul">
            <h1>Ubah data mobil</h1>
        </div>
        <div class="isi">
            <div class="input">
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $mobil["mobil_id"]; ?>">
                    <input type="hidden" name="gambarLama" value="<?= $mobil["gambar"]; ?>">
                    <ul>
                        <li>
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" required value="<?= $mobil["Nama"]; ?>">
                        </li>
                        <li>
                            <label for="seats">Seats</label>
                            <input type="text" name="seats" id="seats" required value="<?= $mobil["seats"]; ?>">
                        </li>
                        <li>
                            <label for="suitcases">Suitcases</label>
                            <input type="text" name="suitcases" id="suitcases" required value="<?= $mobil["suitcase"]; ?>">
                        </li>
                        <li>
                            <label for="warna">Warna</label>
                            <input type="text" name="warna" id="warna" required value="<?= $mobil["warna"]; ?>">
                        </li>
                        <li>
                            <label for="harga">Harga Sewa</label>
                            <input type="text" name="harga" id="harga" required value="<?= $mobil["harga_sewa"]; ?>">
                        </li>
                        <li>
                            <label for="gambar">Gambar</label><br>
                            <img src="image/<?= $mobil["gambar"]; ?>" width="50"> <br>
                            <input type="file" name="gambar" id="gambar">
                        </li>
                        <li>
                            <button type="submit" name="submit">Ubah Data!</button>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </div>
</body>

</html>