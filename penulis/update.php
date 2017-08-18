<link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
<script src="../bootstrap-3.3.7-dist/js/jQuery v3.2.0.js"></script>  
<script type="text/javascript" src="../bootstrap-3.3.3.7-dist/js/bootstrap.min.js"></script>
<body>

<?php 
$id = $_GET['id']; 
include('koneksi.php');
$query = $db->prepare("SELECT * FROM penulis WHERE 
	id = $id");
$query->execute();
$data = $query->fetch();

?>
		<div class="row">
        <?php 
        include('../home.php'); ?>
        <div class="container">
        </div>
        <div class="panel panel-primary">		
		<form action="aksi_update.php?id=<?= $id; ?>" method="POST">
		<table class="table table-bordred table table-stripped">
		<tr>
			<td>Nama Penulis</td>
			<td>:</td>
			<td><input type="text" name="nama" value="<?= $data['nama']; ?>"></td>
		</tr>
		<tr>
			<td>Id Jenis Kelamin</td>
			<td>:</td>
			<td><input type="text" name="id_jenis_kelamin" value="<?= $data['id_jenis_kelamin']; ?>"></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td>:</td>
			<td><input type="text" name="alamat" value="<?= $data['alamat']; ?>"></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" value="Simpan" name="submit"></td>
		</tr>
	</table>
</form>