

<div id="map2" style="min-height: 200px"></div>
   <?php
       require_once("../cabecera.php");
   ?>
            <ul class="nav">
              <li><a href="<?ruta_raiz();?>/index.php">Home</a></li>
              <?
                session_start();
                if ($_SESSION["k_username"] != null) {
              ?>
                <li class="active"><a href="<?echo "";?>">Mapa</a></li>
              <?
                }
              ?>
            </ul>
<?  
   require_once ("../menuderecha.php");
    require_once ("../bbdd/bbdd.php");
    $longitud = 0;
    $latitud = 0;
?>


    
<?
    require_once("../pie.php");
?>