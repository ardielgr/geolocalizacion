<?php
    require_once ("../cabecera.php");
    require_once("../bbdd/bbdd.php");
    
    if (isset($_POST["username"])){
        $username = $_POST["username"];
        $password = $_POST["password"];
        $password2 = $_POST["password2"];
        if($username==NULL | $password==NULL | $password2==NULL){ //si hay campos en blanco...
            echo "Un campo está vacio.";
            Registro(); //MIRAR COMO LLAMAR DE NUEVO AL FORMULARIO DE REGISTRO
        }
        else{
            if($password!=$password2){ //si las contraseñas introducidas no coinciden...
                echo "Las contraseñas no coinciden";
                Registro();
            }
            else{
                $checkuser = seleccionarusuario($username);
                $username_exist = mysqli_num_rows($checkuser);
                if ($username_exist > 0) { //si el usuario existe
                    echo "El nombre de usuario está ya en uso";
                    Registro();
                }
                else{
                    insertarlogin($username, $password);
                    echo 'El usuario '.$username.' ha sido registrado de manera satisfactoria.<br />';
                    ?>
                     <SCRIPT LANGUAGE="javascript"> location.href = "../index.php" </SCRIPT>
                    <?php

                }
            }
        }
    }
    else{
        Registro();
    }
    
    function Registro(){
    echo <<<END
    <div class="container-fluid">
      <div class="row-fluid">

        <div class="span9">
          <div class="hero-unit">
              <form action="registro.php" method="post">
              <table border="0">
                <tr>
                    <td>Usuario:</td> 
                    <td><input type="text" name="username" size="30" maxlength="20" /></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password" size="40" maxlength="10" /></td>
                </tr>
                <tr>
                    <td>Confirma:</td>
                    <td><input type="password" name="password2" size="40" maxlength="10" /></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Registrar"/></td>
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