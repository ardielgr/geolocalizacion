<?php
// Borramos toda la sesion
session_destroy();
?>

<p><span>'Ha terminado la session.</span></p>

<!-- Ir a la pagina principal -->
<SCRIPT LANGUAGE="javascript"> location.href ="<?echo ruta_raiz();?>"; </SCRIPT>
