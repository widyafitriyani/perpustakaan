<?php
include ('koneksi.php');
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-pdf");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=data buku.pdf");
 
// Tambahkan table
include 'data.php';
?>
