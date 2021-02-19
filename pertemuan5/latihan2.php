<?php
     // pengulangan array
     // for atau foreach
     $angka = [1, 4, 6, 3, 2, 6, 7, 21, 43];
     
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Latihan Array</title>
     <style>
          .kotak {
               width: 50px;
               height: 50px;
               background-color: salmon;
               text-align: center;
               line-height: 50px;
               margin:3px;
               float: left;
          }
          .clear { clear: both; }
     </style>
</head>
<body>
     <!-- pengulangan dengan for -->
     <?php for($i = 0; $i < count($angka); $i++) { ?>
          <div class="kotak"><?php echo $angka[$i]; ?></div>
     <?php } ?>
     
     <div class="clear"></div>

     <!-- pengulangan dengan foreach bagian 1 -->
     <?php foreach( $angka as $a ) { ?>
          <div class="kotak"><?php echo $a; ?></div>
     <?php } ?>

     <div class="clear"></div>

     <!-- pengulangan dengan foreach bagian 1 -->
     <?php foreach( $angka as $a ) : ?>
          <div class="kotak"><?php echo $a; ?></div>
     <?php endforeach; ?>
</body>
</html>