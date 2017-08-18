<link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
<script src="../bootstrap-3.3.7-dist/js/jQuery v3.2.0.js"></script>  
<script type="text/javascript" src="../bootstrap-3.3.3.7-dist/js/bootstrap.min.js"></script>
<body>
<div class="row">
        <?php include('../home.php'); ?>
        <div class="container">
         </div>
         <div class="panel panel-primary">
<?php
include ('koneksi.php');
$id = $_GET['id'];
$query = $db->prepare("SELECT * FROM peminjaman WHERE id = $id");
$query->execute();
$data = $query->fetch();

function getbuku($id) {
	include ('koneksi.php');
$query = $db->prepare("SELECT * FROM buku WHERE id = $id");
$query->execute();
$data = $query->fetch();

return $data['nama'];
}

function getuser($id) {
include ('koneksi.php');
$query = $db->prepare("SELECT * FROM user WHERE id = $id");
$query->execute();
$data = $query->fetch();

return $data['nama'];
}

?>
<table class="table table-stripped">
	<tr>
		<td>Nama Buku</td>
		<td>:</td>
		<td><?php print getbuku ($data['id_buku']); ?></td>
	</tr>
	<tr>
		<td>Nama User</td>
		<td>:</td>
		<td><?php print getuser ($data['id_user']); ?></td>
	</tr>
	<tr>
		<td>Waktu Peminjaman</td>
		<td>:</td>
		<td><?php print $data['waktu_dipinjam']; ?></td>
	</tr>
	<tr>
		<td>Waktu Pengembalian</td>
		<td>:</td>
		<td><?php print $data['waktu_pengembalian']; ?></td>
	</tr>
</table>