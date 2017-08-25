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

$query = $db->prepare("INSERT INTO penerbit (nama, alamat, latitude, longitude) VALUES ('$nama','$alamat','$latitude','$longitude')");


if($query->execute()){
	header("Location: index.php");
}

?>