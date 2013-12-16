<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Proyecto Geolocalizacion</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="http://localhost/geolocalizacion/bootstrap/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="http://localhost/geolocalizacion/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
    <script src="http://localhost/geolocalizacion/jquery.min.js"></script>

    
<link rel="stylesheet" href="<?ruta_raiz();?>/gmap3-menu.css">
	<script src="http://localhost/geolocalizacion/gmap3.min.js"></script>
	<script src="http://localhost/geolocalizacion/gmap3-menu.js"></script>    
    
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
                $latitud_mapa1 = latlng.lat();
                $longitud_mapa1 = latlng.lng();
                
 
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
     marker2 = createMarker(event.latLng); //Tal vez no funciona
     
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
<?php
    require_once 'menu.php';
    function ruta_raiz(){
        return "http://localhost/geolocalizacion";
    }
?>
