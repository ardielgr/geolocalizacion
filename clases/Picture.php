<?php

class Picture{
    public $id;
    public $name;
    public $owner;
    public $path;
    public $type;
    public $longitud;
    public $latitud;
    
    function Picture ($i_name, $i_owner, $i_path, $i_type, $i_long, $i_lat, $i_id = NULL){
        $this->id = $i_id;
        $this->name = $i_name;
        $this->owner = $i_owner;
        $this->path = $i_path;
        $this->type = $i_type;
        $this->longitud = $i_long;
        $this->latitud = $i_lat;
    }
    
    function validPath(){ return file_exists($this->path); }
}

?>