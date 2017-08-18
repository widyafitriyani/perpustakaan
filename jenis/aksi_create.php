<?php

include('koneksi.php');

$jenis_buku = $_POST['jenis_buku'];

print $jenis_buku.'<br>';

$query = $db->prepare("INSERT INTO jenis (jenis_buku) VALUES ('$jenis_buku')");


if($query->execute()){
	header("Location: index.php");
}

?>