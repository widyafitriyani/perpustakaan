<title>Penulis</title>
<link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css"/>
<script src="../bootstrap-3.3.7-dist/js/jQuery v3.2.0.js"></script>  
<script type="text/javascript" src="../bootstrap-3.3.3.7-dist/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.js"></script>
<body>
<div class="row">
<?php 
        include('../home.php'); ?>
        <div class="container">
        </div>
        <div class="panel panel-danger">
        <div class="panel-heading"><h2>Penulis</h2></div>
        <div class="panel-body">
        <a href="create.php" class="btn btn-primary"><i class="glyphicon glyphicon-plus "></i>Tambah Penulis</a>
         <a href="grafik.php"><button type="button" class="btn btn.info">Grafik</button></a>
         
        <div>&nbsp; </div>
        
<?php
include('koneksi.php'); 

/*CONTOH SELECT * FROM*/
$query = $db->prepare("SELECT * FROM penulis");
$query->execute();

function getJumlah($id){
    include('koneksi.php');
    $query = $db->prepare("SELECT COUNT(id) FROM buku WHERE penulis = $id");
    $query->execute();
    return $query->fetchColumn();
}

?>
<!-- /.box-header -->
    <div class="box-body">
        <table class="table table-bordered table table-stripped">
            <thead>
            <tr>
                <th>No</th>
                <th>Nama Penulis</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Jumlah</th>
                <th>Aksi</th>
            </tr>
            <?php $i=1; foreach ($query->fetchAll() as $value): ?>
            <tr>
                <td style="text-align: center"><?= $i ?></td>
                <td><?= $value['nama'] ?></td>
                <td><?= $value['id_jenis_kelamin'] ?></td>
                <td><?= $value['alamat'] ?></td>
                <td><?= getJumlah($value['id']) ?></td>
                <td>
                    <a href="update.php?id=<?= $value['id']; ?>">
                    <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                    <a href="delete.php?id=<?= $value['id']; ?>">
                    <span class="glyphicon glyphicon-trash"></span>
                    </a>
                    <a href="view.php?id=<?= $value['id']; ?>">
                    <span class="glyphicon glyphicon-list"></span>
                    </a>
                </td>
            </tr>
            <?php $i++; endforeach; ?>
        </table>
    </div>
<!-- /.box-body -->
</div>
