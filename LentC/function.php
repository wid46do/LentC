<?php
$connection = mysqli_connect("localhost", "root", "", "rentalmobildb");

function query($query){
    global $connection;
    $result = mysqli_query($connection, $query);
    $rows = [];
    while($row=mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}


function tambah($data){
    global $connection;

    $nama = htmlspecialchars($data["nama"]);
    $seats = htmlspecialchars($data["seats"]);
    $suitcases = htmlspecialchars($data["suitcases"]);
    $warna = htmlspecialchars($data["warna"]);
    $harga = htmlspecialchars($data["harga"]);
    
    $gambar = upload();
    if(!$gambar){
        return false;
    }

    $query = "INSERT INTO mobil
    VALUE
    ('', '$nama', '$seats', '$suitcases', '$warna', '$harga', '$gambar')
    ";

    mysqli_query($connection, $query);

    return mysqli_affected_rows($connection);
}


function upload(){
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    if($error === 4){
        echo"<script>
        alert('pilih gambar terlebih dahulu!');
        </script>";
        return false;
    }
    echo $_COOKIE,$_FILES,$namaFile,$_ENV;

    
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'jfif'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower (end($ekstensiGambar));
    if(!in_array($ekstensiGambar,$ekstensiGambarValid)){
        echo "<script>
        alert('yang anda upload bukan gambar!');
        </script>";
        return false;
    }

    if($ukuranFile > 1000000){
        echo "<script>
        alert('ukuran gambar terlalu besar!');
        </script>";
        return false;
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar; 

    move_uploaded_file($tmpName, 'image/' . $namaFileBaru);
    return $namaFileBaru;
}


function hapus($id){
    global $connection;
    mysqli_query($connection, "DELETE FROM mobil WHERE mobil_id = '$id'");
    return mysqli_affected_rows($connection);
}


function ubah($data){
    global $connection;

    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $seats = htmlspecialchars($data["seats"]);
    $suitcases = htmlspecialchars($data["suitcases"]);
    $warna = htmlspecialchars($data["warna"]);
    $harga = htmlspecialchars($data["harga"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);
    
    if($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    $query = "UPDATE mobil SET 
    Nama = '$nama', 
    seats = '$seats', 
    suitcase = '$suitcases',
    warna = '$warna',
    harga_sewa = '$harga',
    gambar = '$gambar'
    WHERE mobil_id = '$id'";

    mysqli_query($connection, $query);

    return mysqli_affected_rows($connection);
}


function cari($keyword){
    $query = "SELECT * FROM mobil WHERE Nama LIKE '%$keyword%' OR seats LIKE '%$keyword%' OR suitcase LIKE '%$keyword%' OR warna LIKE '%$keyword%' OR harga_sewa LIKE '%$keyword%'";
    return query($query);
}
?>