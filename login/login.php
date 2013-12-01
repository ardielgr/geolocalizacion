<?php
    require_once ("../cabecera.php");
?>
    <ul class="nav">
        <li class="active"><a href="<?ruta_raiz();?>/index.php">Home</a></li>
    </ul>
<?    
    require_once ("../menuderecha.php");
    require_once("../bbdd/bbdd.php");
    function Ingreso(){
        ?>
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
         
        </div><!--/span-->
      </div><!--/row-->
    </div><!--/.fluid-container-->
        <?php
    }
    if (isset($_POST["usuario"])){ 
        if(trim($_POST["usuario"]) != '' && trim($_POST["password"]) != ''){
            $usuario = $_POST["usuario"]; 
            $password = $_POST["password"];
            $sql = seleccionarpassword($usuario);
            $row = mysqli_fetch_array($sql);
            if($row["nombre"] == $usuario){ //si existe el usuario en la bbdd
                if($row["password"] == $password) { //si la contraseña coincide con la almacenada
                    $_SESSION["k_username"] = $row["nombre"];
                    echo 'Has sido logueado correctamente '.$_SESSION["k_username"].' <p>';
                    ?>
                    <SCRIPT LANGUAGE="javascript"> location.href = "<?ruta_raiz();?>/index.php" </SCRIPT>
                    <?php
                }
                else{
                    echo 'Password incorrecto';
                    Ingreso();
                }
            }
            else{
                echo 'Usuario no existente en la base de datos';
                Ingreso();
            }
        }
        else{
            echo 'Debe especificar un usuario y password';
            Ingreso();
        }
    }
    else{ 
        Ingreso();
    }
  
    require_once ("../pie.php");
    
?>
