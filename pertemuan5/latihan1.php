<?php
// array
// variabel yang dpat memiliki banyak nilai
// elemen pada array boleh memiliki banyak tipe data yang berbeda
// pasangan antara key dan value
// key merupakan index, yang dimulai dari 0

// membuat array
// cara lama
$hari = array("senin", "selasa", "rabu");
// cara baru
$bulan = ["Januari", "Februari", "Maret"];
$arr1 = [123, "tulisan", FALSE];

// menampilkan data array
// menggunakan var_dump() / print_r()
// var_dump($hari);
// echo "<br>";
// print_r($hari);
// echo "<br>";

// Menampilkan satu element array
// echo $hari[0];
// echo "<br>";
// echo $bulan[1];


// Menambahkan array
var_dump($hari);
$hari[] = "Kamis";
echo "<br>";
$hari[] = "Jumat";
echo "<br>";
var_dump($hari);




?>