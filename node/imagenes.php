<?php
    require_once("../cabecera.php");
    require_once("../clases/DBManager.php");
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
                $uname = $_SESSION["k_username"];
                $imgs = DBManager::GetUserImagesPaths($uname);
                if ($imgs != NULL){
                    echo ('<table BORDER="3" CELLPADDING="10" WIDTH="35%" ALIGN="center">'."\n"); 
                    echo ('<tr><td>Im&aacute;genes</td></tr>'."\n"); 
                    foreach ($imgs as $img){
                        $nombre = basename($img);
                        echo ('<tr><td><a href ="'.ruta_raiz().'/node/mapa.php?nombre='.$nombre.'"><img src="'.$img.'" HEIGHT="120" WIDTH="100%" ></a></td></tr>'."\n"); 
                    }
                    echo('</table>');
                }
                        
            }else if ($_GET["seccion"] == "zona"){
                /*
                 * 
                 * TRABAJO A REALIZAR
                 * 
                 */
            }
        }else{
?>
            <div class="container-fluid">
              <div class="row-fluid">

                <div class="span9">

                  <div class="hero-unit">
                      <h2>Suba sus imágenes</h2>
                        <p><a class="btn btn-primary btn-large" href="<?echo ruta_raiz();?>/node/imagenUpload.php">Pulse aquí...</a></p>
                  </div>

                  <div class="hero-unit">
                      <h2>Listado de sus imágenes</h2>
                        <p><a class="btn btn-primary btn-large" href="<?echo ruta_raiz();?>/node/imagenes.php?seccion=listado">Pulse aquí...</a></p>
                  </div>

                  <div class="hero-unit">
                      <h2>Buscar imágenes por zona</h2>
                        <p><a class="btn btn-primary btn-large" href="<?echo ruta_raiz();?>/node/imagenes.php?seccion=zona">Pulse aquí...</a></p>
                  </div>

                </div>
              </div>
            </div>
<?php
        }
    }
require_once("../pie.php");
?>