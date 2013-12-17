<?php
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
        if ($_GET["seccion"] != NULL){
            if ($_GET["seccion"] == "listado"){
                require_once './node/lvl2/pictureList.php';        
            }else if ($_GET["seccion"] == "zona"){
                require_once './node/lvl2/imagesInRadius.php';
            }
        }else{
?>
            <div class="container-fluid">
              <div class="row-fluid">

                <div class="span9">

                  <div class="hero-unit">
                      <h2>Suba sus imágenes</h2>
                        <p><a class="btn btn-primary btn-large" href="<?echo ruta_raiz();?>/?node=imagenUpload">Pulse aquí...</a></p>
                  </div>

                  <div class="hero-unit">
                      <h2>Listado de sus imágenes</h2>
                        <p><a class="btn btn-primary btn-large" href="<?echo ruta_raiz();?>/?node=imagenes&seccion=listado">Pulse aquí...</a></p>
                  </div>

                  <div class="hero-unit">
                      <h2>Buscar imágenes por zona</h2>
                        <p><a class="btn btn-primary btn-large" href="<?echo ruta_raiz();?>/?node=imagenes&seccion=zona">Pulse aquí...</a></p>
                  </div>

                </div>
              </div>
            </div>
<?php
        }
    }
?>