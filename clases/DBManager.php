<?php
set_include_path('./');
require_once 'Picture.php';

class DBManager{
    const IMAGES_TABLE = "imagenes";
    const USERS_TABLE = "usuarios";
    const PATH = "localhost";
    const UNAME = "root";
    const UPASS = "root";
    const DBNAME = "MyPhoto";
    
    private static $_conexion;
    private static $initialized = false;

       
    private static function initialize(){       
    	if (self::$initialized){
    		return;
        }
        try{
            self::$_conexion = mysql_connect(self::PATH, self::UNAME, self::UPASS, self::DBNAME);
            if (!self::$_conexion){
                return;
            }
        }catch(Exception $e){
            return;
        }
        self::$initialized = true;
    }
    
    public static function GetConnection() { self::initialize(); return self::$_conexion; }
    
    public static function AddUser($i_uname, $i_upass){
        self::initialize();
        $query = "INSERT INTO ". self::USERS_TABLE ."(nombre, password) VALUES('$i_uname', '$i_upass') ";
        mysql_query(self::$_conexion, $query);
        return mysql_commit(self::$_conexion);
    }
    
    public static function AddImage($i_picture){
        self::initialize();
        $query = "INSERT INTO ". self::IMAGES_TABLE ."(nombre, usuario, foto, tipo, longitud, latitud) VALUES('$i_picture->name', '$i_picture->owner', '$i_picture->path', '$i_picture->type', '$i_picture->longitud', '$i_picture->latitud') ";
        mysql_query(self::$_conexion, $query);
        return mysql_commit(self::$_conexion);
    }
            
    public static function GetUser($i_id){
        self::initialize();
        return 0;
    }
    
    public static function GetPicture($i_id){
        self::initialize();
        $query = "SELECT * FROM ". self::IMAGES_TABLE ." WHERE id = '$i_id'";
        $result = mysql_query(self::$_conexion, $query);
        $fila = mysql_fetch_array($result);
        if ($fila != NULL){
            $picture = new Picture($fila['nombre'], $fila['usuario'], $fila['foto'], $fila['tipo'], $fila['longitud'], $fila['latitud'], $fila['id']);
            return $picture;
        }
        return NULL;
    }
    
    public static function GetUserImagesPaths($i_uname){
        self::initialize();
        $query = "SELECT foto FROM ". self::IMAGES_TABLE ." WHERE usuario='$i_uname'";
        $result = mysql_query(self::$_conexion, $query);
        return mysql_fetch_array($result);
    }
    
    public static function GetImageLongAndLat($i_iname){
        self::initialize();
        $query = "SELECT longitud, latitud FROM ". self::IMAGES_TABLE ." WHERE nombre='$i_iname'";
        $result = mysql_query(self::$_conexion, $query);
        return mysql_fetch_array($result);
    }
    
    public static function AuthUser($i_uname, $i_upass){
        self::initialize();
        $query = "SELECT * FROM " . self::USERS_TABLE . " WHERE nombre=\"$i_uname\" AND password=\"$i_upass\" ";
        $result = mysql_query(self::$_conexion, $query);
        $fila = mysql_fetch_array($result);
        if ($fila != NULL){
            return true;
        }else{
            return false;
        }
    }
    
    public static function ExistUser($i_uname){
        self::initialize();
        $query = "SELECT * FROM " . self::USERS_TABLE . " WHERE nombre=\"$i_uname\" ";
        $result = mysql_query(self::$_conexion, $query);
        $fila = mysql_fetch_array($result);
        if ($fila != NULL){
            return true;
        }else{
            return false;
        }
    }
    
    public static function ExistImage($i_iname){
        self::initialize();
        $query = "SELECT * FROM " . self::IMAGES_TABLE . " WHERE nombre=\"$i_iname\" ";
        $result = mysql_query(self::$_conexion, $query);
        $fila = mysql_fetch_array($result);
        if ($fila != NULL){
            return true;
        }else{
            return false;
        }
    }
    
}

?>
