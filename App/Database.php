<?php
namespace App;
use \PDO;
final class Database  
{  
    private $bd;  
    private $dns;
    private $user;
    private $pass;
    public function __construct() { 
        $this->dns='mysql:dbname=universidad;host=localhost';
        $this->user='root';
        $this->pass='j1990d21';
        if (!isset($this->bd)) {  
            $this->bd = new PDO($this->dns, $this->user, $this->pass);            
            $this->bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    }        
    /*
     * función que usaremos para interactuar con los modelos
     */
    public function getConnect() { 
        return $this->bd;  
    }        
}  
?>  