<?php

require_once __DIR__ . '/vendor/autoload.php';
    // panggil function
     require 'function.php';
$mahasiswa = query("SELECT * FROM mahasiswa");
$mpdf = new \Mpdf\Mpdf();

$html = '<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="css/cetak.css">
     <title>Cetak PDF</title>
</head>
<body>
     <h1> Daftar Mahasiswa</h1>
     <table border="1" cellspasing="0" cellpading="10" >
     <tr>
          <th>No.</th>
          <th>Gambar</th>
          <th>Nama</th>
          <th>NRP</th>
          <th>email</th>
          <th>jurusan</th>
     </tr>';
     $i = 1;
     foreach( $mahasiswa as $row ) {
          $html .= '<tr>
               <td>' .$i++ .  '</td>
               <td> <img src="img/' .$row["gambar"]. '" width="50"> </td>
               <td> '.$row["nama"].' </td>
               <td> '.$row["nrp"].' </td>
               <td> '.$row["email"].' </td>
               <td> '.$row["jurusan"].' </td>
          </tr>';
     }
     $html .='</table>
</body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output('daftar-mahasiswa.pdf', \Mpdf\Output\Destination::INLINE);


?>
