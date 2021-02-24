<?php
sleep(1);
require '../function.php';

$keyword = $_GET["keyword"];

$query = "SELECT * FROM mahasiswa WHERE nama LIKE '%$keyword%' 
                OR nrp LIKE '%$keyword%' 
                OR email LIKE '%$keyword%'
                OR jurusan LIKE '%$keyword%'";

$mahasiswa = query($query);
?>

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