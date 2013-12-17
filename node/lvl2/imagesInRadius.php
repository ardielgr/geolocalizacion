<?php
    require_once ("./clases/DBManager.php");
    
    $iname = $_GET['img'];
    $longlat = DBManager::GetImageLongAndLat($iname);
    $longitud = $longlat[0];
    $latitud = $longlat[1];
    //$userPictures = DBManager::GetUserImages($_SESSION['k_username']);
    
    $centro = array(27.72, -17.95713);
    
    $radius = 10100;
    $imgsInRange = GetPicturesInRadius($_SESSION['k_username'], $centro, $radius);
    if ($imgsInRange){
        foreach ($imgsInRange as $img){
            echo "$img->name<br />";
        }
    }
        
    /**
     * Calcula la distancia (en metros) entre dos puntos expresados como latitud, longitud.
     * Hace uso de la fórmula 'Haversine'.
     * @param type $i_point1
     * @param type $i_point2
     */
    function GetDistanceLatLongPoints($i_point1, $i_point2){
        $R = 6371;  // km radio de la Tierra
        $dLat = deg2rad($i_point2[0]-$i_point1[0]);
        $dLon = deg2rad($i_point2[1]-$i_point1[1]);
        $lat1 = deg2rad($i_point1[0]);
        $lat2 = deg2rad($i_point2[0]);
        $a = sin($dLat/2) * sin($dLat/2) + sin($dLon/2) * sin($dLon/2) * cos($lat1) * cos($lat2);
        $c = 2 * atan2(sqrt($a), sqrt(1-$a));
        return $c * $R * 1000;
    }
    
    /**
     * Devuelve un array de objetos Picture con las fotos de un usuario en un radio
     * @param type $i_uname Usuario propietario de las fotos
     * @param type $i_center Punto central para calcular el radio
     * @param type $i_rad Radio (dado en metros) donde buscar imagenes
     */
    function GetPicturesInRadius($i_uname, $i_center, $i_rad){
        $userPictures = DBManager::GetUserImages($i_uname);
        $i = 0;
        foreach ($userPictures as $pic){
            $punto = array($pic->latitud, $pic->longitud);
            $dist = GetDistanceLatLongPoints($punto, $i_center);
            echo "$dist <= $i_rad?<br />"; // DEBUG
            if (($dist <= $i_rad)&&($dist != 0)){
                $result[$i] = $pic;
                $i++;
            }
        }
        return $result;
    }
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
        var lat = '<?php echo $centro[0];?>'
        var lon = '<?php echo $centro[1];?>'
        var rad = <?php echo $radius + 5 ."\n"; ?>
        var latlng = new google.maps.LatLng(lat, lon);
        var myOptions = {
          zoom: 13,
          center: latlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
        // Marcador del centro
        var marcador = new google.maps.Marker({
            position: latlng,
            map: map
        });
        // Marcadores de los puntos dentro del radio especificado
        <?php
            if ($imgsInRange){
                foreach ($imgsInRange as $img){
                   echo ("
        marcador = new google.maps.Marker({
            position: new google.maps.LatLng($img->latitud, $img->longitud),
            map: map
        });
                         ");
                }
            }
        ?>
        
        var circle = new google.maps.Circle({
            fillColor: '#AA0000',
            center: latlng,
            radius: rad,
            map: map
        });
        
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    <div class="hero-unit" id="map_canvas"></div>
