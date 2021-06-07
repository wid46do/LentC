<?php
session_start();
require_once "function.php";
if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $result = mysqli_query($connection, "SELECT * FROM user WHERE username = '$username'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row["username"] === "admin") {
            if (password_verify($password, $row["password"])) {
                $_SESSION["SuperLogin"] = true;
                header("location: admin.php");
                exit;
            } else $error = true;
        }
        if (password_verify($password, $row["password"])) {
            $_SESSION["login"] = true;
            $_SESSION["username"] = $row["id_user"];
            header("location: home.php");
            exit;
        }
    }

    $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/login.css">
</head>

<body>
    <div class="background">
        <div class="tengah">
            <a href="home.php">
                <img src="image/LentC 2.png" alt="">
            </a>
        </div>

        <form class="box" action="" method="POST" name="form">
            <div class="pilihan">
            <h1>Masuk</h1>
            <a href="regis.php">Daftar</a>
            </div>
            <label for="username"> Username </label>
            <input type="text" id="username" name="username">
            <label for="password"> Password </label>
            <input type="password" id="password" name="password"><br>
            <button type="submit" id="submit" name="login">Login</button>
        </form>
    </div>
</body>

</html>