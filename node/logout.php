<?php
require_once("../cabecera.php");
session_start();
// Borramos toda la sesion
session_destroy();
?>

<p><span>'Ha terminado la session.</span></p>

<!-- Ir a la pagina principal -->
<SCRIPT LANGUAGE="javascript"> location.href ="http://localhost/geolocalizacion/index.php"; </SCRIPT>
