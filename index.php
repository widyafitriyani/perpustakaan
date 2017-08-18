<?php
session_start();


ini_set('display_errors', 1);

include 'koneksi.php';

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = $db->prepare("SELECT * FROM user WHERE username = '$username' AND password = '$password'");

  $query->execute();
  $count = $query->fetchColumn();

  if ($count != false) {
    $query->execute();
    $user = $query->fetch();

     $_SESSION['id_user'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['role'] = $user['role'];
    header('location: home.php');
  } else {
    echo "<script>alert('Your Account Invalid')</script>";
  }
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <div class="jumbotron">
    <title>Login Perpustakaan</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
<script src="bootstrap-3.3.7-dist/js/jQuery v3.2.0.js"></script>  
<script type="text/javascript" src="bootstrap-3.3.3.7-dist/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/style1.css">
</head>
<body>
<div class="row">
<div class="container">
<div class="col-sm-6">
  <form method="POST">
    <div class="form">
    <h3 class="sign-up-title" style="color:dimgray; text-align: center">Welcome back! Please login</h3> 
      <h2 style="text-align: center;"><b>Login Perpustakaan</b><hr width="70%"></h2>
        <div class="form-group">
          <label for="usr">Username:</label>
          <input type="text" class="form-control" name="username" required></input>
            </div>
        <div class="form-group">
          <label for="pwd">Password:</label>
          <input type="password" class="form-control" name="password" required></input>
            </div>  
            <button class="btn btn btn-info" name="login">Login</button>
            </div>
        </div>
      </div>  
    </div>
  </form> 
</div>  
</div>
</body>
