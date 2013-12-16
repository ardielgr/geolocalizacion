<?php
    require_once("../cabecera.php");
    require_once("../clases/DBManager.php");
    require_once("../clases/Gps.php");
    require_once("../clases/Picture.php");
    
    if (isset($_FILES["imagen"])){
        $usuario = $_SESSION["k_username"];
        $tmp_name = $_FILES["imagen"]["tmp_name"];
        $ruta_destino = "../imagenes/";
        $iname = trim($_FILES["imagen"]["name"]);
        if ($tipo == "image/jpeg"){
            $path = $ruta_destino.$iname;
            move_uploaded_file($tmp_name, $path);  // Copiamos el fichero en su carpeta de destino
            $exif = exif_read_data($path, 0, true);
            $tipo = $exif['FILE']["MimeType"];
            $lon = Gps::getGps($exif['GPS']["GPSLongitude"], $exif['GPS']['GPSLongitudeRef']);
            $lat = Gps::getGps($exif['GPS']["GPSLatitude"], $exif['GPS']['GPSLatitudeRef']);

            $db = new DBManager('localhost', 'root', 'root', 'MyPhoto');
            $img = new Picture($iname, $usuario, $path, $tipo, $lon, $lat);
            if (!$db->ExistImage($iname)){
                if ($db->AddImage($img)){
                    echo ("<span>Imagen $iname a&ntilde;adida a la base de datos.</span><br />");
                }
            }
        }
    }else{
?>
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span9">
          <div class="hero-unit">
            <form action='imagenUpload.php' method='POST' enctype="multipart/form-data">
                <label for="file">Nombre del archivo:</label>
                    <input type="file" name="imagen" id="file">
                    <input type="submit" name="subir" value="Subir imagen"><br />
            </form>
          </div>
         
        </div>
      </div>
    </div>
<?php
    }
    require_once("../pie.php");
?>