<?php
require_once "./clases/Picture.php";

class PictureTest extends PHPUnit_Framework_TestCase{
    
    var $_picture;
    
    function setUp(){
        $this->_picture = new Picture("CIMG0240.JPG", "user", "./imagenes/CIMG0240.JPG", "image/jpeg", 1.0, -0.57, 0);
    }
    
    public function tearDown(){ }
    
    function testInvalidPath(){
        $this->_picture->path = "/foo/bar.jpg";
        $this->assertFalse($this->_picture->validPath());
    }
   
}

