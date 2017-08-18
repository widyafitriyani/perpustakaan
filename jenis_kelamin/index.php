<?php
include('koneksi.php'); 
$query = $db->prepare("SELECT * FROM jenis_kelamin");
$query->execute();
?>
<title>Jenis Kelamin</title>
<link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
<script src="../bootstrap-3.3.7-dist/js/jQuery v3.2.0.js"></script>  
<script type="text/javascript" src="../bootstrap-3.3.3.7-dist/js/bootstrap.min.js"></script>
</head>
<body>
<div class="row">
        <?php include('../home.php'); ?>
        <div class="container">
        </div>
        <div class="panel panel-danger">
        <div class="panel-heading"><h2>Jenis Kelamin</h2></div>
        <div class="panel-body">
       <!--  <a href="create.php" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>Jenis Kelamin</a>
        <div>&nbsp; </div> -->
<!-- /.box-header -->
        <div class="box-body">
        <table class="table table-bordered table table-stripped ">
        <thead>
                <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Aksi</th>
                </tr>
                <?php $i=1; foreach ($query->fetchAll() as $value): ?>
                <tr>
                <td style="text-align: center"><?= $i ?></td>
                <td><?= $value['nama'] ?></td>
                <td>
<a href="update.php?id=<?= $value['id']; ?>">
<span class="glyphicon glyphicon-pencil"></span></a>
<a href="delete.php?id=<?= $value['id']; ?>">
<span class="glyphicon glyphicon-trash"></span></a>
<a href="view.php?id=<?= $value['id']; ?>">
<span class="glyphicon glyphicon-list"></span></a></td>
</tr>
<?php $i++; endforeach; ?>
</table>
</div>
<!-- /.box-body -->
</div>
