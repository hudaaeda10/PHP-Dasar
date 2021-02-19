<?php
// cek apakah tombol admin sudah di pencet?
     if(isset($_POST["submit"])) {
     // cek usernmae dan password
          if($_POST["username"] == "admin" && $_POST["password"] == "123"){
     // Jika bener redirect ke halaman admin
               header("Location: admin.php");
               exit;
          } else {
     // Jika salah munculkan pesan error
               $error = true;
          }

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
     <h1>Silahkan Login</h1>
     <ul>
          <?php if(isset($error)) : ?>
               <p style="color:red; font-style: italic;">Username / Password Salah!</p>
          <?php endif; ?>
          <form action="" method="post">
               <li>
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username">
               </li>
               <li>
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
               </li>
               <button type="submit" name="submit">Simpan</button>
          </form>
     </ul>
</body>
</html>