<?php
set_include_path('./');
require_once 'Picture.php';

/**
 * Clase encargada de obtener e insertar elementos en las tablas de la base de
 * datos a un nivel superior al del SGBD (Sistema Gestor de Bases de Datos).
 * Se trata de una clase "estática". Esto se ha conseguido utilizando el patrón
 * singleton para el acceso e inicialización de la variable que almacena la 
 * conexión con la base de datos.
 */
class DBManager{
    const IMAGES_TABLE = "imagenes";
    const USERS_TABLE = "usuarios";
    const PATH = "localhost";
    const UNAME = "root";
    const UPASS = "root";
    const DBNAME = "MyPhoto";
    
    private static $_conexion;
    private static $initialized = false;

    /**
     * Inicializa los valores de la clase estática.
     * Establece el valor de la variable $initialized a TRUE si se ha
     * conseguido conectar correctamente con la base de datos.
     */
    private static function initialize(){       
            if (self::$initialized){
                    return;
        }
        try{
            self::$_conexion = mysqli_connect(self::PATH, self::UNAME, self::UPASS, self::DBNAME);
            if (!self::$_conexion){
                return;
            }
        }catch(Exception $e){
            return;
        }
        self::$initialized = true;
    }
    
    /**
     * Acceso a la variable de conexión.
     * @return Referencia a la variable con la conexión a la base de datos
     */
    public static function GetConnection() { self::initialize(); return self::$_conexion; }
    
    /**
     * Añade un usuario a la base de datos.
     * @param string $i_uname Nombre de usuario
     * @param string $i_upass Clave de acceso del usuario
     * @return bool TRUE si se realiza correctamente, FALSE en caso contrario
     */
    public static function AddUser($i_uname, $i_upass){
        self::initialize();
        $query = "INSERT INTO ". self::USERS_TABLE ."(nombre, password) VALUES('$i_uname', '$i_upass') ";
        mysqli_query(self::$_conexion, $query);
        return mysqli_commit(self::$_conexion);
    }
    
    /**
     * Añade una imagen a la base de datos.
     * @param Picture $i_picture Objeto con la imagen a insertar
     * @return bool TRUE si se realiza correctamente, FALSE en caso contrario
     */
    public static function AddImage($i_picture){
        self::initialize();
        $query = "INSERT INTO ". self::IMAGES_TABLE ."(nombre, usuario, foto, tipo, longitud, latitud) VALUES('$i_picture->name', '$i_picture->owner', '$i_picture->path', '$i_picture->type', '$i_picture->longitud', '$i_picture->latitud') ";
        mysqli_query(self::$_conexion, $query);
        return mysqli_commit(self::$_conexion);
    }

    /**
     * Obtiene la imagen especificada desde la base de datos
     * @param int $i_id Identificador de la imagen
     * @return \Picture|null
     */
    public static function GetPicture($i_id){
        self::initialize();
        $query = "SELECT * FROM ". self::IMAGES_TABLE ." WHERE id = '$i_id'";
        $result = mysqli_query(self::$_conexion, $query);
        $fila = mysqli_fetch_array($result);
        if ($fila != NULL){
            $picture = new Picture($fila['nombre'], $fila['usuario'], $fila['foto'], $fila['tipo'], $fila['longitud'], $fila['latitud'], $fila['id']);
            return $picture;
        }
        return NULL;
    }
    
    /**
     * Obtiene un array con todas las imágenes del usuario especificado
     * @param string $i_uname Nombre del usuario
     * @return \Picture[]
     */
    public static function GetUserImages($i_uname){
        self::initialize();
        $query = "SELECT * FROM ". self::IMAGES_TABLE ." WHERE usuario='$i_uname'";
        $result = mysqli_query(self::$_conexion, $query);
        $i = 0;
        while ($img = mysqli_fetch_array($result)){
            $images[$i] = new Picture($img[1], $img[2], $img[3], $img[4], $img[5], $img[6], $img[0]);
            $i++;
        }
        return $images;
    }
    
    /**
     * Verifica si la autenticación especificada es correcta.
     * @param string $i_uname Nombre del usuario a autenticar
     * @param string $i_upass Contraseña  del usuario a autenticar
     * @return boolean TRUE si es correcta, FALSE si no lo es
     */
    public static function AuthUser($i_uname, $i_upass){
        self::initialize();
        $query = "SELECT * FROM " . self::USERS_TABLE . " WHERE nombre=\"$i_uname\" AND password=\"$i_upass\" ";
        $result = mysqli_query(self::$_conexion, $query);
        $fila = mysqli_fetch_array($result);
        if ($fila != NULL){
            return true;
        }else{
            return false;
        }
    }
    
    /**
     * Compruieba si existe un usuario en la base de datos
     * @param string $i_uname Nombre del usuario a localizar
     * @return boolean TRUE si existe, FALSE si no es así
     */
    public static function ExistUser($i_uname){
        self::initialize();
        $query = "SELECT * FROM " . self::USERS_TABLE . " WHERE nombre=\"$i_uname\" ";
        $result = mysqli_query(self::$_conexion, $query);
        $fila = mysqli_fetch_array($result);
        if ($fila != NULL){
            return true;
        }else{
            return false;
        }
    }
    /**
     * Compruieba si existe una imagen en la base de datos
     * @param string $i_iname Nombre de la imagen a localizar
     * @return boolean TRUE si existe, FALSE si no es así
     */
    public static function ExistImage($i_iname){
        self::initialize();
        $query = "SELECT * FROM " . self::IMAGES_TABLE . " WHERE nombre=\"$i_iname\" ";
        $result = mysqli_query(self::$_conexion, $query);
        $fila = mysqli_fetch_array($result);
        if ($fila != NULL){
            return true;
        }else{
            return false;
        }
    }
    
}

?>
