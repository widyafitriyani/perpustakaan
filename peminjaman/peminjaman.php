<?php
include('koneksi.php');
$query = $db->prepare("SELECT * FROM peminjaman");
$query->execute();

function getBuku($id){
    include('koneksi.php'); 
    /*CONTOH SELECT * FROM*/
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

<title>Peminjaman Buku</title>
<link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css"/>
<script src="../bootstrap-3.3.7-dist/js/jQuery v3.2.0.js"></script>  
<script type="text/javascript" src="../bootstrap-3.3.3.7-dist/js/bootstrap.min.js"></script>
<body>
<div class="row">
        <?php 
        include('../home.php'); ?>
        <div class="container">
        </div>
        <div class="panel panel-danger">
        <div class="panel-heading"><h2>Peminjaman Buku</h2></div>
        <div class="panel-body">
        <?php session_start();
                    if($_SESSION['role'] == 1){ ?>
        <a href="create.php" class="btn btn-primary"><i class="glyphicon glyphicon-plus "></i>Pinjam Buku</a>
        <?php } ?>
        <div>&nbsp; </div>
<!-- /.box-header -->
        <div class="box-body">
        <table class="table table-bordered table-stripped">
        <thead>
            <tr>
           
                <th>No</th>
                <th>Nama Buku</th>
                <th>Nama User</th>
                <th>Waktu Peminjaman</th>
                <th>Waktu Pengembalian </th>
                <th>Aksi</th>
                 
            </tr>
            <?php $i=1; foreach ($query->fetchAll() as $value): ?>
            <tr>
                <td style="text-align: center"><?= $i ?></td>
                <td><?= getBuku($value['id_buku']);?></td>
                <td><?= getUser($value['id_user']);?></td>
                <td><?= $value['waktu_dipinjam'] ?></td>
                <td><?= $value['waktu_pengembalian'] ?></td>
                <td>
                 <?php session_start();
                    if($_SESSION['role'] == 1){ ?>
                    <a href="update.php?id=<?= $value['id']; ?>">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                    <a href="delete.php?id=<?= $value['id']; ?>">
                        <span class="glyphicon glyphicon-trash">  
                        </span>
                    </a>
                    <a href="view.php?id=<?= $value['id']; ?>">
                    <span class="glyphicon glyphicon-list"></span> </a>
    
                    
                    <?php }if($_SESSION['role'] == 2){ ?>
                     <a href="view.php?id=<?= $value['id']; ?>">
                    <span class="glyphicon glyphicon-list"></span> </a>
                    <?php } ?>
                </td>
            </tr>
            <?php $i++; endforeach; ?>
        </table>
    </div>
<!-- /.box-body -->
</div>