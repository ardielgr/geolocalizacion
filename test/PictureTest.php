<?php
require_once "./clases/Picture.php";

class PictureTest extends PHPUnit_Framework_TestCase{
    
    var $_picture;
    
    function setUp(){
        $this->_picture = new Picture(0, "user", "./imagenes/CIMG0240.JPG", 1.0, -0.57);
    }
    
    public function tearDown(){ }
    
    function testValidPath(){
        $this->assertTrue($this->_picture->validPath());
    }
    
    function testInvalidPath(){
        $this->_picture->path = "/foo/bar.jpg";
        $this->assertFalse($this->_picture->validPath());
    }
    
}

