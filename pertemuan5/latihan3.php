<?php
     $mahasiswa = 
     [
          [
               "Huda Aeda", "0222134221", "Teknik Informatika", "hudaeda@gmail.com"
          ],
          [
               "Ulrich Stren", "02212451233", "Teknik Industri", "ulrich@gmail.com"
          ],
          [
               "Tanaka Kun", "02221564223", "Teknik Sipil", "tanaka@gmail.com"
          ],
     ];
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Latihan 3</title>
</head>
<body>
     <h1>Daftar Mahasiswa</h1>
     <?php foreach( $mahasiswa as $mhs ) : ?>
     <ul> 
          <li><?php echo $mhs[0]; ?></li>
          <li><?php echo $mhs[1]; ?></li>
          <li><?php echo $mhs[2]; ?></li>
          <li><?php echo $mhs[3]; ?></li>
     </ul>
     <?php endforeach; ?>
</body>
</html>