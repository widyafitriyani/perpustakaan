<link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
<script src="../bootstrap-3.3.7-dist/js/jQuery v3.2.0.js"></script>  
<script type="text/javascript" src="../bootstrap-3.3.3.7-dist/js/bootstrap.min.js"></script>
</head>
<body>
<div class="row">
        <?php include('../home.php'); ?>
        <div class="container"></div>
    	<div class="panel panel-primary">
    	<form action="aksi_create.php" method="POST">
<?php
include ('koneksi.php');
$id = $_GET['id'];
$query = $db->prepare("SELECT * FROM jenis WHERE id = $id");
$query->execute();
$data = $query->fetch();
	?>
<table class="table table-stripped">
	<tr>
		<td>Jenis Buku</td>
		<td>:</td>
		<td><?php print $data['jenis_buku']; ?></td>
	</tr>
</table>