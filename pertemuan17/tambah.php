<?php
    session_start();
    // panggil function
    require 'function.php';

    if ( !isset($_SESSION["login"] ) ) {
        header("Location: login.php") ;
        exit;
    }
    
    require 'function.php';
    $conn = mysqli_connect("localhost", "root", "", "phpdasar");

    // pengecekkan apakah sudah di submit atau belum
    if( isset($_POST["submit"] ) ) {
        
        // cek apakah data berhasil dimasukkan atau tidak
        if ( tambah($_POST) > 0 ) {
            echo "
            <script>
                alert('data berhasil dimasukkan');
                document.location.href = 'index.php';
            </script>
            ";
        } else {
            echo "
            <script>
            alert('data gagal dimasukkan');
            document.location.href = 'index.php';
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
    <title>Tambah Data Mahasiswa</title>
</head>
<body>
    <h1>Tambah Data Mahasiswa</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="nrp">Masukkan NRP :</label>
                <input type="text" name="nrp" id="nrp" required>
            </li>
            <li>
                <label for="nama">Masukkan Nama :</label>
                <input type="text" name="nama" id="nama" required>
            </li>
            <li>
                <label for="email">Masukkan Email :</label>
                <input type="text" name="email" id="email" required>
            </li>
            <li>
                <label for="jurusan">Masukkan Jurusan :</label>
                <input type="text" name="jurusan" id="jurusan" required>
            </li>
            <li>
                <label for="gambar">Masukkan Gambar :</label>
                <input type="file" name="gambar" id="gambar">
            </li>
            <li>
                <button type="submit" name="submit">Tambah Data!</button>
            </li>
        </ul>
    </form>
</body>
</html>