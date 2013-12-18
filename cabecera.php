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
    <link href="<?ruta_raiz();?>/gmap3-menu.css" rel="stylesheet">  
    <script src="http://localhost/geolocalizacion/jquery.min.js"></script>  
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>

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
