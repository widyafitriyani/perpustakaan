<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
 if($_SESSION['role'] == 1) { ?>
<link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
<script src="../bootstrap-3.3.7-dist/js/jQuery v3.2.0.js"></script>  
<script type="text/javascript" src="../bootstrap-3.3.3.7-dist/js/bootstrap.min.js"></script>
</head>
<body>
<div class="row">
        <?php include('../home.php'); ?>
        <div class="container">
         </div>
         <div class="panel panel-primary">
<?php 

$id = $_GET['id']; 

include('koneksi.php');

$query = $db->prepare("SELECT * FROM user WHERE id = $id");
$query->execute();
$data = $query->fetch();

?>
<form action="aksi_update.php?id=<?php print $id; ?>" method="POST">
	<table class="table table-bordred">
		<tr>
			<td>nama</td>
			<td>:</td>
			<td><input type="text" name="nama" value="<?= $data['nama']; ?>"></td>
			<tr>
			<td>username</td>
			<td>:</td>
			<td><input type="text" name="username" value="<?= $data['username']; ?>"></td>
			<tr>
			<td>password</td>
			<td>:</td>
			<td><input type="text" name="password" value="<?= $data['password']; ?>"></td>
			<tr>
			<td>role</td>
			<td>:</td>
			<td><input type="text" name="role" value="<?= $data['role']; ?>"></td>
		<tr>
			<td colspan="2"><input type="submit" value="Simpan" name="submit"></td>
		</tr>
	</table>
</form>

<?php } else {

	header('Location: ../index.php');
}
?>