<?php

include('koneksi.php');

$id = $_GET['id'];

$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];

print $nama.'<br>';
print $alamat.'<br>';
print $latitude.'<br>';
print $longitude.'<br>';

$query = $db->prepare("UPDATE penerbit SET nama = '$nama', alamat = '$alamat' , latitude = '$latitude', longitude = '$longitude' WHERE id=$id");

if($query->execute()){
	header("Location: index.php");
}
?>