<?
    require_once("../cabecera.php");
?>
            <ul class="nav">
              <li><a href="<?ruta_raiz();?>/index.php">Home</a></li>
              <?
             
                session_start();
                if ($_SESSION["k_username"] != null) {
              ?>
              <li><a href="<?ruta_raiz();?>/mapa/listado.php">Imagenes</a></li>
              <li class="active"><a href="<?ruta_raiz();?>/propiedades/fimagen.php">Subir Imagen</a></li>
              <?
                }
                
              ?>
            </ul>
<?    
    require_once ("../menuderecha.php");
    require_once("coordenadas.php");
    require_once("../bbdd/bbdd.php");
    $usuario = $_SESSION["k_username"];
    //var_dump ($_FILES["imagen"]);
    $exif = exif_read_data($_FILES["imagen"]["tmp_name"], 'IDF0',true);

    $imagen = $_FILES["imagen"]["tmp_name"];


    $ruta_destino = "../imagenes/";
    $nombre_imagen = trim($_FILES["imagen"]["name"]);
    $ruta = $ruta_destino.$nombre_imagen; 
    move_uploaded_file($imagen, $ruta);

    $nombre = $_FILES["imagen"]["name"];
    $tipo = $exif['FILE']["MimeType"];
    $lon = getGps($exif['GPS']["GPSLongitude"], $exif['GPS']['GPSLongitudeRef']);
    $lat = getGps($exif['GPS']["GPSLatitude"], $exif['GPS']['GPSLatitudeRef']);
    eliminar($nombre, $usuario);
    insertar($nombre, $usuario, $ruta, $tipo, $lon, $lat);
?>
    <div class="container-fluid">
      <div class="row-fluid">

        <div class="span9">
          <div class="hero-unit">
              <h2>Se ha subido la imagen correctamente.</h2>
            <p><a class="btn btn-primary btn-large" href="<?ruta_raiz();?>/imagenes/imagenes.php">Volver al listado de imágenes</a></p>
            <p><a class="btn btn-primary btn-large" href="<?ruta_raiz();?>/propiedades/fimagen.php">Subir una nueva imagen</a></p>
          </div>
         
        </div><!--/span-->
      </div><!--/row-->
    </div><!--/.fluid-container-->
<?
require_once("../pie.php");
?>