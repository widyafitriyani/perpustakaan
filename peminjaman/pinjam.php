<title>Tambah Peminjaman Buku</title>
<link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
<script src="../bootstrap-3.3.7-dist/js/jQuery v3.2.0.js"></script>  
<script type="text/javascript" src="../bootstrap-3.3.3.7-dist/js/bootstrap.min.js"></script>
<?php
session_start();
include('koneksi.php');

$query = $db->prepare("SELECT * FROM buku");
$query->execute();

function getBuku($id) {
    include('koneksi.php');
    $query = $db->prepare("SELECT * FROM buku WHERE id = $id");
    $query->execute();
    $data = $query->fetch();

    return $data['nama'];
}

?>

<body>
<div class="row">
        <?php include('../home.php'); ?>
        <div class="container">
        </div>
        <div class="panel panel-primary">
        <form action="aksi_create.php" method="POST">
        
		<table class="table table-bordred">
		<tr>
			<td>Nama Buku</td>
			<td>:</td>
			<td>
				<?php print getBuku($_GET['id']); ?>
				<input type="hidden" name="id_buku" value="<?= $_GET['id'] ?>">		
			</td>
		</tr>
		<tr>
			<td>Nama User</td>
			<td>:</td>
			<td>
				<?php print $_SESSION['username']; ?>
				<input type="hidden" name="id_user" value="<?= $_SESSION['id_user'] ?>">		
			</td>
		</tr>
		<tr>
			<td>Waktu Peminjaman</td>
			<td>:</td>
			<td><input class="form-control" name="waktu_dipinjam" readonly value="<?php print date("Y-m-d"); ?>"></input></td> 
		</tr>
		<tr>
			<td>Waktu Pengembalian</td>
			<td>:</td>
			<td><input class="form-control" name="waktu_pengembalian" readonly value="<?php print date("Y-m-d", strtotime('+1 week')); ?>"></input></td> 
			</tr>
			<td colspan="2"><input type="submit" value="Simpan" name="submit"></td>

		</tr>
	</table>
</form>