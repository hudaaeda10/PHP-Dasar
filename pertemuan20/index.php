<?php
    session_start();
    // panggil function
    require 'function.php';

    if ( !isset($_SESSION["login"] ) ) {
        header("Location: login.php") ;
        exit;
    }

    // mengatur pagination
    // konfigurasi
    $jumlahDataPerHalaman = 100;
    $jumlahData = count( query( "SELECT * FROM mahasiswa" ) ); // menghitung jumlah data
    $jumlahHalaman = ceil( $jumlahData / $jumlahDataPerHalaman ); // membuat hasil perhitungan menjadi bulatan ke atas dengan ceil()
    $halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
    $awalData = ( $jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

    $mahasiswa = query("SELECT * FROM mahasiswa LIMIT $awalData, $jumlahDataPerHalaman"); // limit memiliki dua parameter yaitu diawali dari data keberapa, berapa data per halamannya

    // jika tombol cari di tekan
    if ( isset($_POST["cari"]) ) {
        $mahasiswa = cari($_POST["keyword"]);
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .loader {
            width: 100px;
            position: absolute;
            top: 135px;
            left: 310px;
            z-index: -1;
            display: none;
        }
    </style>
    <title>Latihan 1</title>
</head>
<body>
    <a href="logout.php">Logout</a>

    <h1>Daftar Mahasiswa</h1>
    <a href="tambah.php">Tambah Data Mahasiswa</a>
    <br><br>
    <form action="" method="post">
        <input type="text" name="keyword" autofocus placeholder="Masukkan Keyword" autocomplete="off" size=40 id="keyword">
        <button type="submit" name="cari" id="tombol-cari">Cari!</button>
    </form>
    <img src="img/loader.gif" class="loader">
    <br><br>
    <!-- menambahkan tanda << -->
    <?php // if( $halamanAktif > 1 ) : ?>
        <!-- <a href="?halaman=<?//= $halamanAktif - 1; ?>">&laquo</a> -->
    <?php // endif; ?>
    
    <!-- navigasi -->
    <?php // for( $i = 1; $i <= $jumlahHalaman; $i++ ) : ?>
        <?php // if( $i == $halamanAktif ) : ?>
            <!-- <a href="?halaman=<?= $i; ?>" style="font-weight:bold; color:red;"> <?= $i; ?> </a> -->
        <?php // else : ?>
            <!-- <a href="?halaman=<?= $i; ?>"> <?= $i; ?> </a> -->
        <?php // endif; ?>
    <?php // endfor; ?>

<!-- menambahkan tanda >> -->
    <?php // if( $halamanAktif < $jumlahHalaman ) : ?>
            <!-- <a href="?halaman=<? // echo $halamanAktif + 1; ?>">&raquo</a> -->
    <?php //endif; ?>

    <br>
    <div id="container">
        <table border="1" cellspasing="0" cellpading="10" >
        <tr>
            <th>No.</th>
            <th>Action</th>
            <th>Gambar</th>
            <th>Nama</th>
            <th>NRP</th>
            <th>email</th>
            <th>jurusan</th>
        </tr>
        <tr>
        <?php $i=1;  ?>
        <?php foreach( $mahasiswa as $row ) : ?>
            <td><?= $i; ?></td>
            <td>
                <a href="ubah.php?id=<?= $row["id"]; ?>">Ubah</a> |
                <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin dihapus?')">Hapus</a>
            </td>
            <td><img src="img/<?php echo $row["gambar"] ?>" width="100""></td>
            <td><?php echo $row["nama"];  ?></td>
            <td><?php echo $row["nrp"];  ?></td>
            <td><?php echo $row["email"];  ?></td>
            <td><?php echo $row["jurusan"];  ?></td>
        </tr>
        <?php $i++ ?>
        <?php endforeach; ?>
        </table>
    </div>
</body>
<!-- memasang jquery -->
<script src="js/jquery-3.5.1.min.js"></script>
<!-- membuat pencarian dengan ajax -->
<script src="js/script.js"></script>
</html>