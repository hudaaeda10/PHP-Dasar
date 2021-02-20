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
        $gambar = htmlspecialchars($data["gambar"]);

        // Masukkan inputan ke dalam database
        $query = "INSERT INTO mahasiswa VALUES ('', '$nrp', '$nama', '$email', '$jurusan', '$gambar')";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
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
        $gambar = htmlspecialchars($data["gambar"]);

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


?>