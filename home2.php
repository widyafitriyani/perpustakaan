<?php
error_reporting(E_ERROR | E_PARSE);
session_start();

 if(isset($_SESSION['username'])) { ?>

<!DOCTYPE html>
<html>

  <head>
    <title>Perpustakaan PPI</title>
    <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
<script src="bootstrap-3.3.7-dist/js/jQuery v3.2.0.js"></script>  
<script type="text/javascript" src="bootstrap-3.3.3.7-dist/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/style1.css">
 </head>
 <script src='http://nestoriko.googlepages.com/welcome.js' type='text/javascript'></script>
 <body>
  <div class="container">
  <div class="jumbotron">

  <h2>Perpustakaan</h2>
  <script>
document.write("WELCOME TO MY WEBSITE, " + getname() + "!");
</script>
  <div class="row">
    <div class="col-md-3">
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="http://localhost/perpustakaan-ppi/home.php">Home</a></li>

                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
             <div class="col-sm-9">
              <div class="panel-body">
              <h1> Hai <?=$_SESSION['user'] ?> selamat datang </h1>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <?php if($_SESSION['role'] == 1){ ?>
              <ul class="nav navbar-nav">
                <li><a href="http://localhost/perpustakaan-ppi/buku/index.php">Buku</a></li>
                <li><a href="http://localhost/perpustakaan-ppi/jenis/index.php">Jenis</a></li>
                <li><a href="http://localhost/perpustakaan-ppi/jenis_kelamin/index.php">Jenis Kelamin</a></li>
                <li><a href="http://localhost/perpustakaan-ppi/peminjaman/peminjaman.php">Peminjaman</a></li>
                <li><a href="http://localhost/perpustakaan-ppi/penerbit/index.php">Penerbit</a></li>
                <li><a href="http://localhost/perpustakaan-ppi/penulis/index.php">Penulis</a></li>
                <li><a href="http://localhost/perpustakaan-ppi/user/index.php">User</a></li>
                <li><a href="http://localhost/perpustakaan-ppi/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout </a></li>
              </ul>
              
                <?php } elseif($_SESSION['role'] == 2){ ?>
                <ul class="nav navbar-nav">
                  <li><a href="http://localhost/perpustakaan-ppi/buku/index.php">Buku</a></li>
                  <li><a href="http://localhost/perpustakaan-ppi/peminjaman/peminjaman.php">Peminjaman</a></li>
                  <li><a href="http://localhost/perpustakaan-ppi/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout </a></li>
                <?php } ?>
            </div>
          </div>
        </nav>    
    <script src="bootstrap-3.3.7-dist/js/jQuery v3.2.0.js"></script>
    <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
  </body>
</html>

<?php 

print_r($_SESSION);


?>

<?php } else {
  session_destroy();
  
  if(basename(__FILE__) == 'home.php'){
    header('location: index.php');
  } else{
    header('location: ../../../index.php');
  }

}

?>