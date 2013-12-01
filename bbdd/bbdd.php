<?php
    function insertar($nom, $usu, $fot, $tip, $lon, $lat){
        $_conexion = mysqli_connect('localhost','root','','geolocalizacion'); //abrir conexión
        if (!$_conexion) //si no se puede establecer la conexión
            die('Error de Conexión (' . mysqli_connect_errno() . ') '. mysqli_connect_error());        

        $sql = "INSERT INTO imagenes(nombre, usuario, foto, tipo, longitud, latitud) VALUES('$nom', '$usu', '$fot','$tip', $lon, $lat)";
        mysqli_query($_conexion, $sql); // introduce los valores en la base de datos
        mysqli_commit($_conexion);
       // echo "El resultado de la consulta fue:".mysql_error();
        if (!$sql) {
            die("Fallo en la insercion de registro en la Base de Datos:" . mysql_error());
        }
        mysqli_close($_conexion); //cerrar conexión
    }
    
    function eliminar($nom, $usu){
        echo $nom;
        $_conexion = mysqli_connect('localhost','root','','geolocalizacion'); //abrir conexión
        if (!$_conexion) //si no se puede establecer la conexión
            die('Error de Conexión (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
        $sql = "DELETE FROM imagenes WHERE nombre = '$nom' and usuario = '$usu'"; //mirar como es para eliminar
        mysqli_query($_conexion, $sql); // introduce los valores en la base de datos
        mysqli_commit($_conexion);
       // echo "El resultado de la consulta fue:".mysql_error();
        if (!$sql) {
            die("Fallo en la insercion de registro en la Base de Datos:" . mysql_error());
        }
        mysqli_close($_conexion); //cerrar conexión
    }  
    
    function seleccionartodos($usu){
       $_conexion = mysqli_connect('localhost','root','','geolocalizacion'); //abrir conexión
       if (!$_conexion) //si no se puede establecer la conexión
          die('Error de Conexión (' . mysqli_connect_errno() . ') '. mysqli_connect_error()); //mirar lo que hacen estas funciones xD
        $sql = "SELECT nombre, foto FROM imagenes WHERE usuario = '$usu'";
        $result = mysqli_query($_conexion, $sql); // introduce los valores en la base de datos
       // echo "El resultado de la consulta fue:".mysql_error();
        if (!$sql) {
            die("Fallo en la insercion de registro en la Base de Datos:" . mysql_error());
        }
        mysqli_close($_conexion); //cerrar conexión          
        return $result;
    }
    
    function seleccionarll($nom){
        $_conexion = mysqli_connect('localhost','root','','geolocalizacion'); //abrir conexión
        if (!$_conexion) //si no se puede establecer la conexión
            die('Error de Conexión (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
        $sql = "SELECT longitud, latitud FROM imagenes WHERE nombre = '$nom' ";
        $result = mysqli_query($_conexion, $sql,MYSQLI_STORE_RESULT); // introduce los valores en la base de datos
        if (!$sql) {
            die("Fallo en la insercion de registro en la Base de Datos:" . mysql_error());
        }
        mysqli_close($_conexion); //cerrar conexión
        return mysqli_fetch_row($result);
    }
    
    function insertarlogin($nom, $pass){
        $_conexion = mysqli_connect('localhost','root','','geolocalizacion'); //abrir conexión
        if (!$_conexion) //si no se puede establecer la conexión
            die('Error de Conexión (' . mysqli_connect_errno() . ') '. mysqli_connect_error());        
        $sql = "INSERT INTO usuarios(nombre, password) VALUES('$nom','$pass')";
        if (!mysqli_query($_conexion, $sql)) {
            echo "Se ha producido un error en la inserción del usuario: ".mysqli_error($_conexion);
        }
        mysqli_commit($_conexion);
        if (!$sql) {
            die("Fallo en la insercion de registro en la Base de Datos:" . mysql_error());
        }
        mysqli_close($_conexion); //cerrar conexión
    }
    
    function seleccionarpassword($nom){
        $_conexion = mysqli_connect('localhost','root','','geolocalizacion'); //abrir conexión
        if (!$_conexion) //si no se puede establecer la conexión
            die('Error de Conexión (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
        $sql = "SELECT nombre, password FROM usuarios WHERE nombre = '$nom' ";
        $result = mysqli_query($_conexion, $sql); // introduce los valores en la base de datos
        mysqli_commit($_conexion);
        if (!$sql) {
            die("Fallo en la insercion de registro en la Base de Datos:" . mysql_error());
        }
        mysqli_close($_conexion); //cerrar conexión
        return $result;
    }
    
    function seleccionarusuario($nom){
        $_conexion = mysqli_connect('localhost','root','','geolocalizacion'); //abrir conexión
        if (!$_conexion) //si no se puede establecer la conexión
            die('Error de Conexión (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
        $sql = "SELECT nombre FROM usuarios WHERE nombre = '$nom' ";
        $result = mysqli_query($_conexion, $sql); // introduce los valores en la base de datos
        mysqli_commit($_conexion);
        if (!$sql) {
            die("Fallo en la insercion de registro en la Base de Datos:" . mysql_error());
        }
        mysqli_close($_conexion); //cerrar conexión
        return $result;
    }    
?>