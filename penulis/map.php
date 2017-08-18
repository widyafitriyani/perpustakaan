<?php
include("koneksi.php");
?>
	<div id="dvMap" style="width: 1000px; height: 550px"></div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAYtGR-_wqs70-D1UFQt9HOLfATApUQdoY&callback=initMap" async defer></script>
	<script type="text/javascript">
		var markers = [
		<?php
		$sql = mysqli_query($db, "SELECT * FROM lokasi");
		while(($data =  mysqli_fetch_assoc($sql))) {
		?>
		{
                 "lat": '<?php echo $data['lat']; ?>',
				 "long": '<?php echo $data['long']; ?>',
				 "alamat": '<?php echo $data['alamat']; ?>'
		},
		<?php
		}
		?>
    ];
    </script>
    <script type="text/javascript">
        window.onload = function () {

            var mapOptions = {
		        center: new google.maps.LatLng(-2.2459632,116.2409634),
                zoom: 5,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }; 
            var infoWindow = new google.maps.InfoWindow();
            var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);

            for (i = 0; i < markers.length; i++) {
                var data = markers[i];
				var latnya = data.lat;
				var longnya = data.long;
				
				var myLatlng = new google.maps.LatLng(latnya, longnya);
                var marker = new google.maps.Marker({
                    position: myLatlng,
                    map: map,
                    title: data.alamat
                });
                (function (marker, data) {
                    google.maps.event.addListener(marker, "click", function (e) {
                        infoWindow.setContent('<b>Lokasi</b> :' + data.alamat + '<br>');
                        infoWindow.open(map, marker);
                    });
                })(marker, data);
            }
        }
    </script>