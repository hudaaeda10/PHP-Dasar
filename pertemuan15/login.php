<?php
require 'function.php';

if ( isset($_POST["login"]) ) {
    // maasukkan inputan ke variabel
    $username = $_POST["username"];
    $password = $_POST["password"];

    // menyimpan nilai username apakah sesuai dengan yang input
    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    //  mengecek ada berapa baris yang ada pada variabel $result
    if ( mysqli_num_rows($result) === 1 ) {
        // cek password
        $row = mysqli_fetch_assoc($result);
        if ( password_verify($password, $row["password"]) ) {
            header("Location: index.php");
            exit;
        }
    }
    $error = true;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
</head>
<body>
    <h1>Login Sistem</h1>
    <?php if( isset($error) ) : ?>
        <p  style="color: red; font-style: italic">
            username / password salah!
        </p>
    <?php endif; ?>
    <form action="" method="post">
        <ul>
            <li>
                <label for="username">Username</label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <button type="submit" name="login">Login</button>
            </li>
        </ul>
    </form>
</body>
</html>