<link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
<script src="../bootstrap-3.3.7-dist/js/jQuery v3.2.0.js"></script>  
<script type="text/javascript" src="../bootstrap-3.3.3.7-dist/js/bootstrap.min.js"></script>
<body>
<?php

$id = $_GET['id'];
include ('koneksi.php');

$query = $db->prepare("SELECT * FROM penerbit WHERE id = $id");
$query->execute();
$data = $query->fetch();

?>
<div class="row">
        <?php include('../home.php'); ?>
        <div class="container">
         </div>
         <div class="panel panel-primary">
<table class="table table-bordred ">
	<tr>
		<td>Nama</td>
		<td>:</td>
		<td><?php print $data['nama']; ?></td>
	</tr>
</table>