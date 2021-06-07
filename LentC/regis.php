<?php
require_once "function.php";
if (isset($_POST["daftar"])) {
    $username = $_POST["username"];
    $nama_lengkap = $_POST["nama_lengkap"];
    $password = $_POST["password"];
    $result = mysqli_query($connection, "SELECT * FROM user WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>alert('Username Sudah Dipakai')</script>";
        return false;
    }
    $password = password_hash($password, PASSWORD_DEFAULT);
    $result = mysqli_query($connection, "INSERT INTO user VALUES('', '$username', '$nama_lengkap', '$password')");
    if (mysqli_affected_rows($connection) > 0) {
        echo "<script>alert('data berhasil ditambah')</script>";
        header("location: login.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" href="./css/regis.css">
</head>
<body>
    <div class="container1">
        <div class="container_child1-1">
            <img src="./image/LentC 2.png" alt="" class="logo">
        </div>
        <div class="navbar1">
            <ul class="navbar2">
                <a href="login.php">Login</a>
            </ul>
        </div>
    </div>
    <div class="container2">
        <h1  class="marigabung">Mari bergabung<br>bersama kami</h1>
        <div class="container_child2">
            <div class="container_child2-1">
                <form action="" method="POST" name="form">
                    <input type="text" id="username" name="username" placeholder="Username"><br>
                    <br>
                    <input type="text" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap"><br>
                    <br>
                    <input type="password" id="password" name="password" placeholder="Password"><br>
                    <br>
                    <button type="submit" name="daftar"> Daftar </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>