// panggil elemen-elemen pada file index.php
var keyword = document.getElementById('keyword');
var tombolCari = document.getElementById('tombol-cari');
var container = document.getElementById('container');

// tambahkan event yang akan dikerjakan
keyword.addEventListener('keyup', function() {
    // buat object ajax
    var xhr = new XMLHttpRequest();
    // cek kesiapan ajax
    xhr.onreadystatechange = function() {
        if ( xhr.readyState == 4 && xhr.status == 200 ) {
            container.innerHTML = xhr.responseText;
        }
    }

    // eksekusi ajax (dengan parameter 1: nama method, parameter 2: sumber ajax yang dieksekusi, parameter 3: apakah asynchronous (true))
    xhr.open('GET', 'ajax/mahasiswa.php?keyword=' + keyword.value, true);
    xhr.send();
});