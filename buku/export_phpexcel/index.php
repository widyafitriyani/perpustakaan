<?php
include('koneksi.php');
$query = $db->prepare("SELECT * FROM buku");
$query->execute();

function getJenis($id) {
    if (empty($id)) {
        return "Tidak ada jenis buku";
    }
    
    include('koneksi.php');
    $query = $db->prepare("SELECT * FROM jenis WHERE id = $id");
    $query->execute();
    $data = $query->fetch();

    return $data['jenis_buku'];
}

?>
<p><a href="export.php"><button>Export Data ke Excel</button></a></p>

<html>
<head>
    <title>Menu Buku</title>
<link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
<script src="../bootstrap-3.3.7-dist/js/jQuery v3.2.0.js"></script>  
<script type="text/javascript" src="../bootstrap-3.3.3.7-dist/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="bootstrap-3.3.7-dist/css/style1.css">
</head>
<body>
<div class="row">
        <?php include('../home.php'); ?>
        <div class="container">
        </div>
        <div class="panel panel-danger">
        <div class="panel-heading"><h2>Daftar Buku</h2></div>
        <div class="panel-body">
        <?php session_start();
                    if($_SESSION['role'] == 1){ ?>
        <a href="create.php" class="btn btn-primary"><i class="glyphicon glyphicon-plus "></i> Tambah Buku</a>
        <?php } ?>
        
        <div>&nbsp; </div>
<!-- /.box-header -->
    <div class="box-body">
        <table class="table table-bordered table-stripped">
            <thead>
            <tr>
                <th>No</th>
                <th>Nama Buku</th>
                <th>Jenis Buku</th>
                <th>Cover</th>
                <th>Aksi</th>
            </tr>
            <?php $i=1; foreach ($query->fetchAll() as $value): ?>
            <tr>
                <td style="text-align: center"><?= $i ?></td>
                <td><?= $value['nama'] ?></td>
                <td><?= getJenis($value['id_jenis']); ?></td>
                <td> <img width="100px" src="cover/<?= $value['cover'] ?>"> </td>
                <td>
                <?php session_start();
                    if($_SESSION['role'] == 1){ ?>
                    <a href="update.php?id=<?= $value['id']; ?>">
                    <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                    <a href="delete.php?id=<?= $value['id']; ?>">
                    <span class="glyphicon glyphicon-trash"></span> </a>
                    <a href="view.php?id=<?= $value['id']; ?>">
                    <span class="glyphicon glyphicon-list"></span> </a>
                       <?php } elseif($_SESSION['role'] == 2){ ?>
                        <a href="view.php?id=<?= $value['id']; ?>">
                    <span class="glyphicon glyphicon-list"></span> </a>
                    <a href="../peminjaman/pinjam.php?id=<?= $value['id']; ?>">
                    <span class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>Pinjam</a></span>

                    <?php } ?>
                </td>
            </tr>
            <?php $i++; endforeach; ?>
        </table>
    </div>
<!-- /.box-body -->
</div>