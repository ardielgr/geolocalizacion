<?php

class Picture{
    var $id;
    var $owner;
    var $path;
    var $longitud;
    var $latitud;
    
    function Picture ($i_id, $i_owner, $i_path, $i_long, $i_lat){
        $this->id = $i_id;
        $this->owner = $i_owner;
        $this->path = $i_path;
        $this->longitud = $i_long;
        $this->latitud = $i_lat;
    }
    
    function validPath(){ return file_exists($this->path); }
}

?>