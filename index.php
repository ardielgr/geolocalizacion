<?
    require_once("./cabecera.php");
?>
            <ul class="nav">
              <li class="active"><a href="<?ruta_raiz();?>/index.php">Home</a></li>
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
    require_once ("./menuderecha.php");
?>
            
            

    <div class="container-fluid">
      <div class="row-fluid">

        <div class="span9">
          <div class="hero-unit">
            <h1>Proyecto de Geolocalización</h1>
            <p> En un entorno móvil como el actual, aprovechar el valor de la ubicación geográfica se ha convertido en una herramienta clave para sacar rendimiento a información que puede ser de vital importancia para las compañías. La tecnología de geolocalización se basa en el sistema de información geográfica GIS para la gestión, análisis y visualización de conocimiento geográfico. </p>
          </div>
         
        </div><!--/span-->
      </div><!--/row-->
    </div><!--/.fluid-container-->

<?
require_once("./pie.php");
?>
