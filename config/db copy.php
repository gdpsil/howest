<?php
class db{

    private $host     = "localhost";
    private $dbname   = "howest";
    private $user     = "root";
    private $password = "t7jm33p";
    private $port     = "3306";
    //private $opciones = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

    public function conexion() {
        try {

            $PDO = new PDO("mysql: host=".$this->host.";dbname".$this->dbname,$this->user,$this->password);
            $PDO->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);

            //print_r($PDO);

            return $PDO;
        } catch (PDOException $e) {
            return $e->getMessage();  
        }      
        // mysqli_connect($this->host,)
    }
};

/*
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