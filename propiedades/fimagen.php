
<?
    require_once("../cabecera.php");
?>
            <ul class="nav">
              <li><a href="<?ruta_raiz();?>/index.php">Home</a></li>
              <?
                session_start();
                if ($_SESSION["k_username"] != null) {
              ?>
              <li><a href="<?ruta_raiz();?>/imagenes/imagenes.php">Imagenes</a></li>
              <?
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
            <form action='propiedades.php' method='POST' enctype="multipart/form-data">
                <label for="file">Nombre del archivo:</label>
                    <input type="file" name="imagen" id="file">
                    <input type="submit" name="subir" value="Subir imagen"><br />
            </form>
          </div>
         
        </div><!--/span-->
      </div><!--/row-->
    </div><!--/.fluid-container-->
<?
require_once("../pie.php");
?>