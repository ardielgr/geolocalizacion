<?php
    require_once("./clases/DBManager.php");
    
    if (isset($_POST["username"])){
        $username = $_POST["username"];
        $password = $_POST["password"];
        $password2 = $_POST["password2"];
        if($username==NULL | $password==NULL | $password2==NULL){
            echo ("<span>Debe rellenar todos los campos</span><br />");
            Registro();
        }
        else{
            if($password!=$password2){
                echo ("<span>Las contrase&ntilde;as no coinciden.</span><br />");
                Registro();
            }
            else{
                if (DBManager::ExistUser($username)){
                    echo ("<span>El nombre de usuario est&aacute; ya en uso.</span><br />");
                    Registro();
                }
                else{
                    DBManager::AddUser($username, $password);
                    echo ("<span>El usuario $username ha sido registrado de manera satisfactoria.</span><br />");
                    // Iniciamos sesión al crear nuevo usuario
                    session_start();
                    $_SESSION["k_username"] = $username;
                    echo ('<SCRIPT LANGUAGE="javascript"> location.href = "../index.php" </SCRIPT>');

                }
            }
        }
    }
    else{
        Registro();
    }
    
    function Registro(){
    echo ('
    <div class="container-fluid">
      <div class="row-fluid">

        <div class="span9">
          <div class="hero-unit">
              <form action="'.ruta_raiz().'/?node=registro" method="post">
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
    ');
    }
?>