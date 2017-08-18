<?php  
    // Lampirkan db dan User
    require_once "koneksi.php";
    require_once "user.php";

    //Buat object user
    $user = new user($db);

    //Jika sudah login
    if($user->isLoggedIn()){
        header("location: index.php"); //redirect ke index
    }

    //jika ada data yg dikirim
    if(isset($_POST['kirim'])){
        $nama = $_POST['nama'];
         $username = $_POST['username'];
        $password = $_POST['password'];

        // Proses login user
        if($user->login($nama, $username, $password)){
            header("location: index.php");
        }else{
            // Jika login gagal, ambil pesan error
            $error = $user->getLastError();
        }
    }
 ?>


<!DOCTYPE html>  
<html>  
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
        <script src="../bootstrap-3.3.7-dist/js/jQuery v3.2.0.js"></script>  
        <script type="text/javascript" src="../bootstrap-3.3.3.7-dist/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="login-page">
          <div class="form">
            <form class="login-form" method="post">
              <?php if (isset($error)): ?>
                  <div class="error">
                      <?php echo $error ?>
                  </div>
              <?php endif; ?>
              <input type="nama" name="nama" placeholder="nama" required/>
              <input type="username" name="username" placeholder="username" required/>
              <input type="password" name="password" placeholder="password" required/>
              <button type="submit" name="kirim">login</button>
              <p class="message">Not registered? <a href="register.php">Create an account</a></p>
            </form>
          </div>
        </div>
    </body>
</html>  