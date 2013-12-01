<?php
require_once("../cabecera.php");
session_start();
// Borramos toda la sesion
session_destroy();
echo 'Ha terminado la session <p><a href="index.php">index</a></p>';
?>
<!-- Ir a la pagina principal -->
<SCRIPT LANGUAGE="javascript"> location.href = "<?ruta_raiz()?>/index.php"; </SCRIPT>
