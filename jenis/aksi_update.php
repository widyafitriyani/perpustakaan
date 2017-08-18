<?php

include('koneksi.php');

$id = $_GET['id'];

$jenis_buku = $_POST['jenis_buku'];

print $jenis_buku.'<br>';

$query = $db->prepare("UPDATE jenis SET jenis_buku = '$jenis_buku' WHERE id=$id");

if($query->execute()) {
	header("Location: index.php");
}

?>