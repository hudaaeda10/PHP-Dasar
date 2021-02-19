<?php
     // Date
     // Untuk menampilkan tanggal dalam format tertentu
     // echo date("l, D-M-Y");

     // Time
     // UNIX Time / EPOCH Time
     // Detik yang berlalu sejak tahun 1970
     // echo time();
     // echo date('d M Y', time()+ 60*60*24*100);


     // mktime
     // Membuat sendiri detik
     // mktime(0,0,0,0,0,0);
     // Jam, Menit, Detik, Bulan, Tanggal, Tahun
     // echo date("l", mktime(0,0,0,11,21,1998));

     // strtotime
     // mengubah string menjadi waktu
     echo date("l", strtotime("21 Nov 1998"));


?>