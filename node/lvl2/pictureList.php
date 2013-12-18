<?php
require_once("./clases/DBManager.php");

$uname = $_SESSION["k_username"];
$imgs = DBManager::GetUserImages($uname);
if ($imgs != NULL){
    echo ('<table BORDER="3" CELLPADDING="10" WIDTH="35%" ALIGN="center">'."\n"); 
    echo ('<tr><td>Im&aacute;genes</td></tr>'."\n"); 
    foreach ($imgs as $img){
        echo ('<tr><td><a href ="'.ruta_raiz().'/?node=mapa&imgID='.$img->id.'"><img src="'.$img->path.'" HEIGHT="120" WIDTH="100%" ></a></td></tr>'."\n"); 
    }
    echo('</table>');
}

