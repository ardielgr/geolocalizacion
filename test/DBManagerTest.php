<?php

require_once "./clases/DBManager.php";

class DBManagerTest extends PHPUnit_Framework_TestCase{
    
    public function testInstanciarYConectar(){
        
        $this->assertNotNull(DBManager::GetConnection());
    }
    
    public function testGetPicture(){
        $this->assertNotNull(DBManager::GetPicture(1));
    }
    
    public function testGetPictureFail(){
        $this->assertNull(DBManager::GetPicture(-15));
    }
    
    public function testGetUser(){
        $this->assertNotNull(DBManager::GetUser(1));
    }
    
    public function testGetUserFail(){
        $this->assertNotNull(DBManager::GetUser(-15));
    }
    
    public function testAuthUser(){
        $this->assertTrue(DBManager::AuthUser("root", "root"));
    }
    public function testAuthUserFail(){
        $this->assertFalse(DBManager::AuthUser("pepito", "nosecuantos"));
    }
}

