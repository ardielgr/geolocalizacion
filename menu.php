    <div class="navbar navbar-inverse navbar-fixed-top">
       <div class="navbar-inner">
          <div class="container-fluid">
             <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
             </a>
          <a class="brand">GEOLOCALIZACIÓN</a>
          <ul class="nav">
             <li class="active"><a href="<?echo ruta_raiz();?>/index.php">Home</a></li>
<?php
    if (@$_SESSION['k_username'] == null) {
       echo ('
         </ul>
         <ul class="navbar-text pull-right">
            <a href="'.ruta_raiz().'/node/registro.php" class="navbar-link">Registrarse</a>
            <a href="'.ruta_raiz().'/node/login.php" class="navbar-link">Logearse</a>
         </ul>
       ');
    } else {
        echo('
             <li><a href="'.ruta_raiz().'/node/imagenes.php">Imagenes</a></li>
          </ul>
          <ul class="nav">
            <li style="color:red;width:100%;padding-left:8em">'.@$_SESSION['k_username'].'</li>
          </ul>
          <ul class="navbar-text pull-right">
             <a href="'.ruta_raiz().'/node/logout.php" class="navbar-link">Desconectarse</a> 
          </ul>
        ');
    }   
?>
<!-- A CONTINUACIÓN CERRAMOS TODAS LAS SECCIONES ABIERTAS EN CABECERA.PHP -->
          </div><!--/.nav-collapse -->
       </div>
    </div>
            