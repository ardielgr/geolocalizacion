<?php
    require_once ("../cabecera.php");
    require_once("../clases/DBManager.php");
       
    if (isset($_POST["usuario"])){
        if(trim($_POST["usuario"]) != '' && trim($_POST["password"]) != ''){
            $usuario = $_POST["usuario"]; 
            $password = $_POST["password"];
            $db = new DBManager('localhost', 'root', 'root', 'MyPhoto');
            if ($db->AuthUser($usuario, $password)){
                session_start();
                $_SESSION["k_username"] = $usuario;
                echo ("<span>Has sido logueado correctamente $_SESSION[k_username]</span>");
                echo ('<SCRIPT LANGUAGE="javascript"> location.href="'.ruta_raiz().'/index.php" </SCRIPT>');
            }else{
                echo ('<span>Debe especificar un usuario y password correctos</span>');
                Ingreso();
            }
        }else{
            echo '<span>Debe especificar un usuario y password</span>';
            Ingreso();
        }
    }else{ 
        Ingreso();
    }

    function Ingreso(){
    echo <<<END
    <div class="container-fluid">
      <div class="row-fluid">

        <div class="span9">
          <div class="hero-unit">
            <form action="login.php" method="post">
                <table border="0">
                    <tr>
                        <td>Usuario:</td> 
                        <td><input type="text" name="usuario" size="30" maxlength="20" /></td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input type="password" name="password" size="40" maxlength="10" /></td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Ingresar"/></td>
                    </tr>
                </table>
            </form>
              
          </div>
         
        </div>
      </div>
    </div>
END;
    }
    require_once ("../pie.php");
?>
