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

          