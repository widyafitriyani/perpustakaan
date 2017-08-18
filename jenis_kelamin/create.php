<link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
<script src="../bootstrap-3.3.7-dist/js/jQuery v3.2.0.js"></script>  
<script type="text/javascript" src="../bootstrap-3.3.3.7-dist/js/bootstrap.min.js"></script>
<body>
 		<?php include('../home.php'); ?>
        <div class="container">
        <section class="col-lg-12">
		<div class="table-responsive">
        </div>
    	<div class="panel panel-primary">
        <form action="aksi_create.php" method="POST">
		<table class="table table-border">
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><input class="form-control" type="text" name="nama"></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" value="Simpan" name="submit"></td>
		</tr>
	</table>
</form>