<?php
     // array asosiative 
     $mahasiswa = [
          [
               "nama"      => "Huda Aeda",
               "nrp"       => "03222123",
               "email"     => "huda@gmail.com",
               "jurusan"   => "Teknik Informatika",
               "gambar"    => "default-user-image.png"
          ],
          [
               "nama"      => "Ulrich Stren",
               "nrp"       => "032284723",
               "email"     => "ulrich@gmail.com",
               "jurusan"   => "Teknik Industri",
               "gambar"    => "gaun.jpg"
          ],
          [
               "nama"      => "Aelita Stren",
               "nrp"       => "032142873",
               "email"     => "aelita@gmail.com",
               "jurusan"   => "Teknik Sipil",
               "gambar"    => "jam mainan.jpg"
          ],
     ];
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>GET</title>
</head>
<body>
     <h1> Daftar Mahasiswa </h1>
     <ul>
     <?php foreach( $mahasiswa as $mhs) : ?>
          <li>
               <a href="latihan2.php?nama=<?= $mhs["nama"]; ?>&nrp=<?= $mhs["nrp"]; ?>&email=<?= $mhs["email"]; ?>&jurusan=<?= $mhs["jurusan"]; ?>&gambar=<?= $mhs["gambar"]; ?>"><?php echo $mhs["nama"] ?></a>
          </li>
     <?php endforeach; ?>
     </ul>
</body>
</html>

