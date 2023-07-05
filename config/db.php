<?php
class db{
    private $host     = "localhost";
    private $dbname   = "howest";
    private $user     = "root";
    private $password = "t7jm33p";
    private $port     = "3306";
    private $opciones = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

    static public function conexion(){
    
        try {
           $con = new PDO("mysql:host = 'localhost'; dbname = 'howest'",'$this->user','$this->password');
           //$con->exec('set names utf8')
           return $con;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
 
/*

$pdo = new PDO("mysql:host={$host};dbname={$dbname}",$user,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);

    //print_r($PDO);
echo "desde el config: <br>";
$obj = new db();
$conexion= $obj->conexion();
print_r($conexion);
echo "<br>";

try {
    $tablas = $conexion->query("select * from usuarios");
        print_r($tablas);
        echo "Tabla: ".$tablas;
        echo "<br>";

} catch (PDOException $e ) {
    $e->getMessage();
}
die();
*/

?>