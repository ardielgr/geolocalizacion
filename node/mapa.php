<?php
    require_once ("./clases/DBManager.php");
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
        if (isset($_GET['imgID'])){
            $imgID = $_GET['imgID'];
            $img = DBManager::GetPicture($imgID);
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
            var lon = '<?php echo $img->longitud;?>'
            var lat = '<?php echo $img->latitud;?>'
            var nom = '<?php echo $img->name;?>'
            var latlng = new google.maps.LatLng(lat, lon);
            var myOptions = {
              zoom: 13,
              center: latlng,
              mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.getElementById("map_canvas"),
                myOptions);
            var marcador = new google.maps.Marker({
                position: latlng,
                map: map,
                title: nom
            });
            var infoWin = new google.maps.InfoWindow({
                position: latlng,
                map: map,
                content: '<?php echo ("<img src=\"$img->path\" height=\"100\" width=\"100\" >"); ?>'
            });
          }
          window.onload=initialize;
        </script>
        <div class="hero-unit" id="map_canvas"></div>
<?php
        }
    }
?>