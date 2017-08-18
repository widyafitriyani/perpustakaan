<link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
<script src="../bootstrap-3.3.7-dist/js/jQuery v3.2.0.js"></script>  
<script type="text/javascript" src="../bootstrap-3.3.3.7-dist/js/bootstrap.min.js"></script>
<body>

<?php 
$id = $_GET['id']; 
include('koneksi.php');

$query = $db->prepare("SELECT * FROM peminjaman WHERE id = $id");
$query->bindValue(':id', $_GET['id']);
$query->execute();
$data = $query->fetch();

    $query = $db->prepare("SELECT * FROM buku");
    $query->execute();
    $buku = $query->fetchAll();


function getBuku($id) {
    include('koneksi.php');
    $query = $db->prepare("SELECT * FROM buku WHERE id = $id");
    $query->execute();
    $data = $query->fetch();

    return $data['nama'];
}

function getUser($id) {
    include('koneksi.php');
    $query = $db->prepare("SELECT * FROM user WHERE id = $id");
    $query->execute();
    $data = $query->fetch();

    return $data['nama'];
}

?>

		<div class="row">
        <?php 
        include('../home.php'); ?>
        <div class="container">
        </div>
        <div class="panel panel-primary">
		<form action="aksi_update.php?id=<?php print $id; ?>" method="POST">
		<table class="table table-bordred table table-stripped">

		<tr>
			<td>Nama Buku</td>
			<td>:</td>
			<td><select name="id_buku" class="form-control">
				<?php $i=1; foreach ($buku as $value): ?>
				<option value="<?= $value['id']; ?>"><?= $value['nama']; ?></option>
				<?php $i++; endforeach; ?>
			</select></td>
		</tr>
		<tr>
			<td>Nama User</td>
			<td>:</td>
			<td><input class="form-control" type="text" name="id_user" readonly value="<?=($data['id_user']); ?>"></input></td>
		</tr>
		<tr>
			<td>Waktu Peminjaman</td>
			<td>:</td>
			<td><input class="form-control" type="date" name="waktu_dipinjam" value="<?=$data['waktu_dipinjam']; ?>"></td>
		<tr>
			<td>Waktu Pengembalian</td>
			<td>:</td>
			<td><input class="form-control" type="date" name="waktu_pengembalian" value="<?=$data['waktu_pengembalian']; ?>"></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" value="Simpan" name="submit"></td>
		</tr>
	</table>
</form>