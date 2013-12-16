<?php
    if (@$_SESSION['k_username'] == null) {
        ?>
       <ul class="navbar-text pull-right">
            <a href="<?ruta_raiz();?>/node/registro.php" class="navbar-link">Registrarse</a>
            <a href="<?ruta_raiz();?>/node/login.php" class="navbar-link">Logearse</a>
       </ul>
        <?php
    } else {
        ?>
        <ul class="navbar-text pull-right">
            <a href="<?ruta_raiz();?>/node/logout.php" class="navbar-link">Desconectarse</a> 
        </ul>
        <?php
    }   
?>
          </div><!--/.nav-collapse -->
        </div>
      </div>

