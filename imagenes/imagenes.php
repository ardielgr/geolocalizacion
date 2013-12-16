<?php
    require_once("../cabecera.php");
    require_once("../bbdd/bbdd.php");
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
?>
    <div class="container-fluid">
      <div class="row-fluid">

        <div class="span9">
        
          <div class="hero-unit">
              <h2>Suba sus imágenes</h2>
                <p><a class="btn btn-primary btn-large" href="<?ruta_raiz();?>/propiedades/fimagen.php">Pulse aquí...</a></p>
          </div>
            
          <div class="hero-unit">
              <h2>Listado de sus imágenes</h2>
                <p><a class="btn btn-primary btn-large" href="<?ruta_raiz();?>/mapa/listado.php">Pulse aquí...</a></p>
          </div>
            
          <div class="hero-unit">
              <h2>Buscar imágenes por zona</h2>
                <p><a class="btn btn-primary btn-large" href="<?ruta_raiz();?>/mapa/busqueda_zona.php">Pulse aquí...</a></p>
          </div>
         
        </div><!--/span-->
      </div><!--/row-->
    </div><!--/.fluid-container-->
<?php
    }
require_once("../pie.php");
?>