<link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
<script src="../bootstrap-3.3.7-dist/js/jQuery v3.2.0.js"></script>  
<script type="text/javascript" src="../bootstrap-3.3.3.7-dist/js/bootstrap.min.js"></script>
</head>
<body>
<div class="row">
        <?php include('../home.php'); ?>
        <div class="container"></div>
    	<div class="panel panel-primary">
        <form enctype="multipart/form-data">
<?php
$id = $_GET['id'];
include ('koneksi.php');
$query = $db->prepare("SELECT * FROM buku WHERE id = $id");
$query->execute();
$data = $query->fetch();

function getJenis($id) {
    include('koneksi.php');
    $query = $db->prepare("SELECT * FROM jenis WHERE id = $id");
    $query->execute();
    $data = $query->fetch();

    return $data['jenis_buku'];
}

?>
<table class="table table-stripped">
	<tr>
		<td>Nama Buku</td>
		<td>:</td>
		<td><?php print $data['nama']; ?></td>
	</tr>
	<tr>
		<td>Jenis Buku</td>
		<td>:</td>
		<td><?php print getJenis ($data['id_jenis']); ?></td>
	</tr>
	<tr>
	<td>Cover</td>
	<td>:</td>
	<td> <img width="200px" src="cover/<?php print $data['cover']; ?>"/></td>
</tr>
	</table>