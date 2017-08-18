<title>Tambah Peminjaman Buku</title>
<link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
<script src="../bootstrap-3.3.7-dist/js/jQuery v3.2.0.js"></script>  
<script type="text/javascript" src="../bootstrap-3.3.3.7-dist/js/bootstrap.min.js"></script>
<?php
include('koneksi.php');

$query = $db->prepare("SELECT * FROM buku");
$query->execute();

function getJenis($id) {
    include('koneksi.php');
    $query = $db->prepare("SELECT * FROM user WHERE id = $id");
    $query->execute();
    $data = $query->fetch();

    return $data['id_user'];
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
			<td><select name="id_buku" class="form-control">
    <?php $i=1; foreach ($query->fetchAll() as $value): ?>
    <option value="<?= $value['id']; ?>"><?=$value['nama']; ?></option>
    <?php $i++; endforeach; ?>
    </select>
    </td>
		</tr>
		<tr>
			<td>Nama User</td>
			<td>:</td>
			<td><input type="text" name="id_user"
		</tr>
		<tr>
			<td>Waktu Peminjaman</td>
			<td>:</td>
			<td><input type="date" name="waktu_dipinjam" 
		</tr>
		<tr>
			<td>Waktu Pengembalian</td>
			<td>:</td>
			<td><input type="date" name="waktu_pengembalian"
			</td>
			<td colspan="2"><input type="submit" value="Simpan" name="submit"></td>

		</tr>
	</table>
</form>