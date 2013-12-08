<!DOCTYPE html>
<html lang="en">
<?
function ruta_raiz() {
 //   $directorio = explode("/", $_SERVER['PHP_SELF']); //recoge la direccion donde se encuentra el script en ejecución y la separa por /
    //echo "http://".$_SERVER["HTTP_HOST"]."/".$directorio[1]; // devuelve la direccion raiz del servidor al que se accede
    echo "http://localhost/geolocalizacion";
}
?>
  <head>
    <meta charset="utf-8">
    <title>Proyecto Geolocalizacion</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="<?ruta_raiz();?>/bootstrap/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="<?ruta_raiz();?>/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
    <script src="<?ruta_raiz();?>/jquery.min.js"></script>

    
<link rel="stylesheet" href="<?ruta_raiz();?>/gmap3-menu.css">
	<script src="<?ruta_raiz();?>/gmap3.min.js"></script>
	<script src="<?ruta_raiz();?>/gmap3-menu.js"></script>    
    
    <!-- MAPS -->
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script>

$(document).ready(function() {
	

      var map = null;
      var marker = null;

function createMarker(latlng, name, html) {
    var contentString = html;
    var marker = new google.maps.Marker({
        position: latlng,
        map: map,
        zIndex: Math.round(latlng.lat()*-100000)<<5
        });

    google.maps.event.addListener(marker, 'click', function() {
alert(latlng.lat()+","+latlng.lng());
        	//$("#latitud").val( latlng.lat() );
	    	//$("#longitud").val( latlng.lng() );

        });
    google.maps.event.trigger(marker, 'click');    
    return marker;
}

 

function initialize() {


  var myOptions = {
    zoom: 12,
    center: new google.maps.LatLng(28.48197,-16.301908),
    mapTypeControl: false,
    mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
    navigationControl: false,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }

  map = new google.maps.Map( document.getElementById("map2") , myOptions );
 
  google.maps.event.addListener(map, 'click', function(event) {
         if (marker) {
            marker.setMap(null);
            marker = null;
         }
     marker = createMarker(event.latLng);
     
  });

}

initialize();








});

	    </script>

<!-- FIN MAPS -->
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand">GEOLOCALIZACIÓN</a>

          