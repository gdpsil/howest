<?php
class Tobase {
    private $host     = "localhost";
    private $dbname   = "howest";
    private $user     = "root";
    private $password = "t7jm33p";
    private $port     = "3306";

    public $db = new PDO("mysql:host=localhost;dbname =howest", 'root', "t7jm33p");
    //$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    
    function conectarbase(){

        $conexion = new mysqli('localhost','root','t7jm33p','howest');
            if($conexion->connect_error){
                die(" Error Conexion base de Datos ". $conexion->connect_errno."  - ".$conexion->connect_error);
            }else{
                Return($conexion);
            }
    }
}
?>
