<?php
    // panggil function
    require 'function.php';
    $mahasiswa = query("SELECT * FROM mahasiswa");

    // ambil data (fetch) dari object result
    // mysqli_fetch_row() // mengembalikan array numerik
    // mysqli_fetch _assoc() // mengembalikan array assosiative
    // mysqli_fetch_array() // mengembalikan ke duanya
    // mysqli_fetch_object() // tidak mengembalikan array numerik atau assosiative
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 1</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>
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
            <a href="">Ubah</a> |
            <a href="">Hapus</a>
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
</body>
</html>