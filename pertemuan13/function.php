<?php
    // menghubungkan php ke database 
    $conn = mysqli_connect("localhost", "root", "", "phpdasar");

    function query($query) {
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows= [];
        while( $row = mysqli_fetch_assoc($result) ) {
            $rows[] = $row;
        }
        return $rows;
    }

    // tambah data
    function tambah($data) {
        global $conn;
        // Ambil data dari tiap elemen dalam form
        $nrp = htmlspecialchars($data["nrp"]);
        $nama = htmlspecialchars($data["nama"]);
        $email = htmlspecialchars($data["email"]);
        $jurusan = htmlspecialchars($data["jurusan"]);
        // upload gambar
        $gambar = upload();
        if ( !$gambar ) {
            return false;
        }        
        // Masukkan inputan ke dalam database
        $query = "INSERT INTO mahasiswa VALUES ('', '$nrp', '$nama', '$email', '$jurusan', '$gambar')";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function upload() {
        $namaFile = $_FILES['gambar']['name'];
        $ukuranFile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpName = $_FILES['gambar']['tmp_name'];

        // cek apakah ada file kosong?
        if ( $error === 4 ) {
            echo "<script>
                        alert('Pilih File Dahulu');
                    </script>
            ";
            return false;
        }

        // cek apakah yanng diupload adalah gambar
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if ( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
            echo "<script>
                        alert('Yang anda upload bukan gambar');
                    </script>";
            return false;   
        }

        // cek apakah ukuran file terlalu besar?
        if ( $ukuranFile > 1000000 ) {
            echo "<script>
                        alert('Ukuran gambar terlalu besar!');
                    </script>";
            return false;   
        }   

        // Ketika upload tidak ada permasalahan dan siap di upload
        // generate nama file baru
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;
        move_uploaded_file($tmpName, 'img/'. $namaFileBaru);

        return $namaFileBaru;
    }

    function hapus($id) {
        global $conn;
        // hapus data di table
        mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
        return mysqli_affected_rows($conn);
    }

    // ubah data
    function ubah($data) {
        global $conn;
        // Ambil data dari tiap elemen dalam form
        $id = $data["id"];
        $nrp = htmlspecialchars($data["nrp"]);
        $nama = htmlspecialchars($data["nama"]);
        $email = htmlspecialchars($data["email"]);
        $jurusan = htmlspecialchars($data["jurusan"]);
        $gambarLama  = htmlspecialchars($data["gambarLama"]);

        // cek apakah user mengupload gambar baru
        if ( $_FILES["gambar"]["error"] === 4 ) {
            $gambar = $gambarLama;
        } else {
            $gambar = upload();
        }


        // Masukkan inputan ke dalam database
        $query = "UPDATE mahasiswa SET 
            nrp = '$nrp',
            nama = '$nama',
            email = '$email',
            jurusan = '$jurusan',
            gambar = '$gambar'
        WHERE id = $id;
        ";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function cari($keyword) {
        $query = "SELECT * FROM mahasiswa WHERE nama LIKE '%$keyword%' 
        OR nrp LIKE '%$keyword%' 
        OR email LIKE '%$keyword%'
        OR jurusan LIKE '%$keyword%'";
        return query($query);
    }


?>