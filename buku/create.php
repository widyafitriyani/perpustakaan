<title>Menu Buku</title>
<link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
<script src="../bootstrap-3.3.7-dist/js/jQuery v3.2.0.js"></script>  
<script type="text/javascript" src="../bootstrap-3.3.3.7-dist/js/bootstrap.min.js"></script>
<body>
<?php
include('koneksi.php');
$query = $db->prepare("SELECT * FROM jenis");
$query->execute();
$data = $query->fetchAll();


include('koneksi.php');
$query = $db->prepare("SELECT * FROM penulis");
$query->execute();
$penulis = $query->fetchAll();

?>
        <?php 
        include('../home.php'); ?>
        <div class="container">
        <section class="col-lg-12">
		<div class="table-responsive">
         </div>
        <div class="panel panel-primary">
        <form enctype="multipart/form-data" action="aksi_create.php" method="POST">
<table class="table table-border">
<tr>
<td>Nama Buku</td>
<td>:</td>
<td><input class="form-control" type="text" name="nama" required></td>
<tr>
	<td>Jenis Buku</td>
	<td>:</td>
	<td><select name="id_jenis" class="form-control" required>
    <?php $i=1; foreach ($data as $value): ?>
    <option value="<?= $value['id']; ?>"><?=$value['jenis_buku']; ?></option>
    <?php $i++; endforeach; ?>
    </select>
    </td>
</tr>
<tr>
    <td>Cover</td>
    <td>:</td>
    <td><input type="file" name="cover"></td>
</tr>
<tr>
            <td>Penulis</td>
            <td>:</td>
            <td><select name="penulis" class="form-control">
            <?php $i=1; foreach ($penulis as $value): ?>
            <option value="<?= $value['id']; ?>"><?=$value['nama']; ?></option>
            <?php $i++; endforeach; ?>
            </select>
            </td>
</tr>
<td colspan="2"><input type="submit" value="Simpan" name="submit"></td>
</tr>
</table>
</form>
