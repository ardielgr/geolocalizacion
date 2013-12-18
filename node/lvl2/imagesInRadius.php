<?php
    require_once ("./clases/DBManager.php");

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
            if (($dist <= $i_rad)&&($dist != 0)){
                $result[$i] = $pic;
                $i++;
            }
        }
        return $result;
    }
    
    
    
    if ($_SESSION["k_username"] == NULL){
      echo('
      <div class="container-fluid">
      <div class="row-fluid">
        <div class="span9">
          <div class="hero-unit">
              <h2>No tiene los permisos necesarios para ver esta secci&oacute;n</h2>
          </div>
         </div>
      </div>
      </div>
      ');
    }else{
        $uname = $_SESSION["k_username"];
        if (!isset($_POST['imgID'])){
        ?>
        <div class="container-fluid">
          <div class="row-fluid">
            <div class="span9">
              <div class="hero-unit">
                <form action='<?echo ruta_raiz();?>/?node=imagenes&seccion=zona' method='POST' enctype="multipart/form-data">
                    <label for="select">Imagen de referencia:</label>
                    <select name="imgID">
                        <?php
                            $imgs = DBManager::GetUserImages($uname);
                            foreach ($imgs as $img){
                                echo ("<option value=\"$img->id\">$img->name</option>");
                            }
                        ?>
                    </select>
                    <label for="number"> Radio(metros):</label>
                    <input type="number" value="500" name="radio" min="100" max="99999">
                    <input type="submit" value="Buscar"><br />
                </form>
              </div>

            </div>
          </div>
        </div>
        <?php
        }else if (isset($_POST['radio'])){
            $imgID = $_POST['imgID'];
            $radius = $_POST['radio'];
            $img = DBManager::GetPicture($imgID);
            $centro = array($img->latitud, $img->longitud);
            $imgsInRange = GetPicturesInRadius($uname, $centro, $radius);
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
            title: '$img->name',
            map: map
        });
                         ");
                   echo ("
            var infoWin = new google.maps.InfoWindow({
                position: new google.maps.LatLng($img->latitud, $img->longitud),
                map: map,
                content: '<img src=\"$img->path\" height=\"100\" width=\"100\" >'
        });
                        ");
                }
            }
        ?>
        
        var circle = new google.maps.Circle({
            fillColor: '#AA0000',
            center: latlng,
            radius: rad,
            strokeWeight: 1,
            map: map
        });
        
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    <div class="hero-unit" id="map_canvas"></div>

<?php
        }
    }
?>