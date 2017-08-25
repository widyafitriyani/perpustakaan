<!DOCTYPE html>
<header><title>Maps Penerbit Buku</title></header> 

<link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css"/>
<script src="../bootstrap-3.3.7-dist/js/jQuery v3.2.0.js"></script>  
<script type="text/javascript" src="../bootstrap-3.3.3.7-dist/js/bootstrap.min.js"></script>
<body>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAYtGR-_wqs70-D1UFQt9HOLfATApUQdoY&callback=initMap" type="text/javascript"></script>
    <script>
    function initialize(a,b,c,d) {
  var myLatlng = new google.maps.LatLng(a, b);
  var mapOptions = {
    zoom: 15,
    center: myLatlng
  }
  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
  var marker = new google.maps.Marker({
    position: myLatlng,
    map: map,
    title: d});
}
    </script>
<style>
      html, body, #map-canvas {
        
        height: 90%;
        padding: 5px;
        
      }
    </style>
<body>
<div class="panel panel-primary">
      <div class="panel-heading"><h2>Maps Penerbit Buku</h2>
      </div>
  </div>
  <div class="row">
  <div class="col-sm-4">
 <table border="2">
  <thead>
   <td>ID</td><td>Nama</td><td>Latitude</td><td>Longitude</td><td>Tool</td>
  </thead>
  <tbody>

<?php
include 'koneksi.php';
$query = $db->prepare("SELECT * FROM penerbit");
 $query->execute();
foreach ($query->fetchAll() as $data) {
 $id = $data['id'];
 $nama = $data['nama'];
 $alamat = $data['alamat'];
 $lat = $data['latitude'];
 $lng = $data['longitude'];
 echo "<tr><td>$id</td><td>$nama</td><td>$lat</td><td>$lng</td><td><button onclick='initialize($lat,$lng,\"$nama\",\"$alamat\")' class='btn btn-primary'><i class='glyphicon glyphicon-map-marker'></i> Maps</button></td></tr>";
}
?>
  </tbody>
 </table>
 </div>
 <div class="col-sm-8">
 <div id='map-canvas' style="width: 875px; height: 425px;"></div>
 </div>
</body>