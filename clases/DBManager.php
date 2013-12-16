<?php
require_once './clases/Picture.php';

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
        $query = "SELECT * FROM " . self::IMAGES_TABLE . " WHERE id = '$i_id'";
        $result = mysqli_query($this->_conexion, $query);
        $fila = mysqli_fetch_array($result);
        if ($fila != NULL){
            $picture = new Picture($fila['id'], $fila['usuario'], $fila['foto'], $fila['longitud'], $fila['latitud']);
            return $picture;
        }
        return NULL;
    }
    
    function GetUser($i_id){
        return 0;
    }
    
}

?>