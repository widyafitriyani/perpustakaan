<?php
include('koneksi.php');
$query = $db->prepare("SELECT * FROM buku");
$query->execute();

function getJenis($id) {
	include('koneksi.php');
    $query = $db->prepare("SELECT * FROM jenis WHERE id = $id");
    $query->execute();
    $data = $query->fetch();

     return $data['jenis_buku'];
}
?>

<table border='1' class="table table-bordered table-stripped">
            <tr>
            <thead>
                <th>No</th>
                <th>Nama Buku</th>
                <th>Jenis Buku</th>
                <th>Cover</th>
                </thead>
            </tr>
             <?php $i=1; foreach ($query->fetchAll() as $value): ?>
             <tbody>
             <tr>
                <td style="text-align: center"><?= $i ?></td>
                <td><?= $value['nama'] ?></td>
                <td><?= getJenis($value['id_jenis']); ?></td>
                <td> <img width="100px" src="cover/<?= $value['cover'] ?>"> </td>
                </tr>
                 <?php $i++; endforeach; ?>
        </table>
        </tbody>
    