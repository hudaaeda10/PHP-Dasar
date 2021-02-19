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
     <title>Latihan Array Asosiative</title>
</head>
<body>
     <h1>Daftar Mahasiswa</h1>
     <?php foreach( $mahasiswa as $mhs)  : ?>
          <ul>
               <li>
                    <img src="img/<?= $mhs["gambar"]; ?>">
               </li>
               <li> Nama      : <?php echo $mhs["nama"];  ?></li>
               <li> NRP       : <?php echo $mhs["nrp"];  ?></li>
               <li> Jurusan   : <?php echo $mhs["jurusan"];  ?></li>
               <li> Email     : <?php echo $mhs["email"];  ?></li>
               
          </ul>
     <?php endforeach; ?> 
</body>
</html>