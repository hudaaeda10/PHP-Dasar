<?php
    require 'function.php';
    $conn = mysqli_connect("localhost", "root", "", "phpdasar");

    // menggambil id
    $id = $_GET["id"];

    // menjalankan query
    $mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

    // pengecekkan apakah sudah di submit atau belum
    if( isset($_POST["submit"] ) ) {
        // cek apakah data berhasil diubah atau tidak
        if ( ubah($_POST) > 0 ) {
            echo "
            <script>
                alert('data berhasil diubah');
                document.location.href = 'index.php';
            </script>
            ";
        } else {
            echo "
            <script>
            alert('data gagal diubah');
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
    <title>Ubah Data Mahasiswa</title>
</head>
<body>
    <h1>Ubah Data Mahasiswa</h1>
    <form action="" method="post">
        <input type="hidden" name = "id" value="<?= $mhs["id"]; ?>">
        <ul>
            <li>
                <label for="nrp">Masukkan NRP :</label>
                <input type="text" name="nrp" id="nrp" required value="<?= $mhs["nrp"]; ?>">
            </li>
            <li>
                <label for="nama">Masukkan Nama :</label>
                <input type="text" name="nama" id="nama" required value="<?= $mhs["nama"]; ?>">
            </li>
            <li>
                <label for="email">Masukkan Email :</label>
                <input type="text" name="email" id="email" required value="<?= $mhs["email"]; ?>">
            </li>
            <li>
                <label for="jurusan">Masukkan Jurusan :</label>
                <input type="text" name="jurusan" id="jurusan" required value="<?= $mhs["jurusan"]; ?>">
            </li>
            <li>
                <label for="gambar">Masukkan Gambar :</label>
                <input type="text" name="gambar" id="gambar" required value="<?= $mhs["gambar"]; ?>">
            </li>
            <li>
                <button type="submit" name="submit">Ubah Data!</button>
            </li>
        </ul>
    </form>
</body>
</html>