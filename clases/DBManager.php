<?php
set_include_path('./');
require_once 'Picture.php';

class DBManager{
    const IMAGES_TABLE = "imagenes";
    const USERS_TABLE = "usuarios";
    var $_path;
    var $_uname;
    var $_upass;
    var $_dbname;
    var $_conexion;

    
    // Constructor
    function DBManager($i_path, $i_uname, $i_pass, $i_dbname){
        $this->_path = $i_path;
        $this->_uname = $i_uname;
        $this->_upass = $i_pass;
        $this->_dbname = $i_dbname;
        
        try{
            $this->_conexion = mysqli_connect($this->_path, $this->_uname, $this->_upass, $this->_dbname);
            if (!$this->_conexion){
                //die ('Error de Conexión (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
                return NULL;
            }
        }catch(Exception $e){
            return NULL;
        }
    }
    
    function GetPicture($i_id){
        $query = "SELECT * FROM ". self::IMAGES_TABLE ." WHERE id = '$i_id'";
        $result = mysqli_query($this->_conexion, $query);
        $fila = mysqli_fetch_array($result);
        if ($fila != NULL){
            $picture = new Picture($fila['id'], $fila['usuario'], $fila['foto'], $fila['longitud'], $fila['latitud']);
            return $picture;
        }
        return NULL;
    }
    
    function AddUser($i_uname, $i_upass){
        $query = "INSERT INTO ". self::USERS_TABLE ."(nombre, password) VALUES('$i_uname', '$i_upass') ";
        mysqli_query($this->_conexion, $query);
        return mysqli_commit($this->_conexion);
    }
    
    function AddImage($i_picture){
        $query = "INSERT INTO ". self::IMAGES_TABLE ."(nombre, usuario, foto, tipo, longitud, latitud) VALUES('$i_picture->name', '$i_picture->owner', '$i_picture->path', '$i_picture->type', '$i_picture->longitud', '$i_picture->latitud') ";
        mysqli_query($this->_conexion, $query);
        return mysqli_commit($this->_conexion);
    }
            
    function GetUser($i_id){
        return 0;
    }
    
    function GetUserImagesPaths($i_uname){
        $query = "SELECT foto FROM ". self::IMAGES_TABLE ." WHERE usuario='$i_uname'";
        $result = mysqli_query($this->_conexion, $query);
        return mysqli_fetch_array($result);
    }
    
    function GetImageLongAndLat($i_iname){
        $query = "SELECT longitud, latitud FROM ". self::IMAGES_TABLE ." WHERE nombre='$i_iname'";
        $result = mysqli_query($this->_conexion, $query);
        return mysqli_fetch_array($result);
    }
    
    function AuthUser($i_uname, $i_upass){
        $query = "SELECT * FROM " . self::USERS_TABLE . " WHERE nombre=\"$i_uname\" AND password=\"$i_upass\" ";
        $result = mysqli_query($this->_conexion, $query);
        $fila = mysqli_fetch_array($result);
        if ($fila != NULL){
            return true;
        }else{
            return false;
        }
    }
    
    function ExistUser($i_uname){
        $query = "SELECT * FROM " . self::USERS_TABLE . " WHERE nombre=\"$i_uname\" ";
        $result = mysqli_query($this->_conexion, $query);
        $fila = mysqli_fetch_array($result);
        if ($fila != NULL){
            return true;
        }else{
            return false;
        }
    }
    
    function ExistImage($i_iname){
        $query = "SELECT * FROM " . self::IMAGES_TABLE . " WHERE nombre=\"$i_iname\" ";
        $result = mysqli_query($this->_conexion, $query);
        $fila = mysqli_fetch_array($result);
        if ($fila != NULL){
            return true;
        }else{
            return false;
        }
    }
    
}

?>