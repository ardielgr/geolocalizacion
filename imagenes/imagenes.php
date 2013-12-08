<?
    require_once("../cabecera.php");
?>
            <ul class="nav">
              <li><a href="<?ruta_raiz();?>/index.php">Home</a></li>
              <?
              if(!isset($_SESSION)){
                session_start();
                if ($_SESSION["k_username"] != null) {
              ?>
              <li><a href="<?ruta_raiz();?>/imagenes/imagenes.php">Imagenes</a></li>
              <?
                }
                }
              ?>
            </ul>
<?    
    require_once ("../menuderecha.php");
    require_once("../bbdd/bbdd.php");
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
<?
require_once("../pie.php");
?>