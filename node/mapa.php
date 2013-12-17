<?php
    require_once ("./clases/DBManager.php");
    
    $iname = $_GET['nombre'];
    $longlat = DBManager::GetImageLongAndLat($iname);
    $longitud = $longlat[0];
    $latitud = $longlat[1];
?>
    <style type="text/css">
      html { height: 100% }
      body { height: 100%; margin: 50px; padding: 0px }
      #map_canvas { height: 60% }
    </style>
    <script type="text/javascript"
        src="https://maps.google.com/maps/api/js?sensor=false">
    </script>
    <script type="text/javascript">
      function initialize(){
        var lon = '<?php echo $longitud;?>'
        var lat = '<?php echo $latitud;?>'
        var nom = '<?php echo $iname;?>'
        var latlng = new google.maps.LatLng(lat, lon);
        var myOptions = {
          zoom: 13,
          center: latlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("map_canvas"),
            myOptions);
        var marcador = new google.maps.Marker({
            position: new google.maps.LatLng(lat, lon),
            map: map,
            title: nom
        });
      }
      window.onload=initialize;
    </script>
    <div class="hero-unit" id="map_canvas"></div>