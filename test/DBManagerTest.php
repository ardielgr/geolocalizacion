<?php

require_once "./clases/DBManager.php";

class DBManagerTest extends PHPUnit_Framework_TestCase{
    
    var $_dbMan;
    
    function setUp(){
        $this->_dbMan = new DBManager('localhost', 'root', 'root', 'MyPhoto');
    }
    
    public function tearDown(){ }
    
    public function testInstanciarYConectar(){
        $this->_dbMan = new DBManager('localhost', 'root', 'root', 'MyPhoto');
        $this->assertNotNull($this->_dbMan->_conexion);
    }
    
    public function testInstanciarYConectarFail(){
        $this->_dbMan = new DBManager('localhost', 'invalid', 'invalid', 'MyPhoto');
        $this->assertNull($this->_dbMan->_conexion);
    }
    
    public function testGetPicture(){
        $this->assertNotNull($this->_dbMan->GetPicture(1));
    }
    
    public function testGetPictureFail(){
        $this->assertNull($this->_dbMan->GetPicture(-15));
    }
    
    public function testGetUser(){
        $this->assertNotNull($this->_dbMan->GetUser(1));
    }
}

