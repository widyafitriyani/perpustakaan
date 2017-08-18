<?php

include('koneksi.php');

$id = $_GET['id'];

$nama = $_POST['nama'];
$id_jenis = $_POST['id_jenis'];

  $lokasi_file = $_FILES['cover']['tmp_name'];
  $tipe_file   = $_FILES['cover']['type'];
  $nama_file   = $_FILES['cover']['name'];
  $direktori   = "cover/$nama_file";
$penulis = $_POST['penulis'];

print $lokasi_file;
   
if (!empty($lokasi_file)) {
    move_uploaded_file($lokasi_file,$direktori);
}

print $nama.'<br>';
print $id_jenis.'<br>';
print $cover.'<br>';
print $penulis.'<br>';


$query = $db->prepare("INSERT INTO buku (nama, id_jenis, cover, penulis ) VALUES ('$nama','$id_jenis','$nama_file','$penulis')");


if($query->execute()){
	header("Location: index.php");
}

?>