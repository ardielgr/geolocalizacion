<?php
   session_start();
   require_once("./cabecera.php");
   
   $nodes = array("imagenUpload", "imagenes", "login", "logout", "mapa", "registro");
   
   if (($_GET["node"] == NULL)||(!in_array($_GET["node"], $nodes))){
?>
    <div class="container-fluid">
      <div class="row-fluid">

        <div class="span9">
          <div class="hero-unit">
            <h1>Proyecto de Geolocalización</h1>
            <p> En un entorno móvil como el actual, aprovechar el valor de la ubicación geográfica se ha convertido en una herramienta clave para sacar rendimiento a información que puede ser de vital importancia para las compañías. La tecnología de geolocalización se basa en el sistema de información geográfica GIS para la gestión, análisis y visualización de conocimiento geográfico. </p>
          </div>
         
        </div>
      </div>
    </div>

<?php
   }else{
       require_once 'node/'.$_GET['node'].'.php';
   }
require_once("./pie.php");
?>
