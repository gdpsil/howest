<?php
    class homemodel{
        private $PDO;
        public function __construct()
        {
            require_once('../config/db.php');

            $pdo = new db();
            $this->PDO = $pdo->conexion();
            
        }

        public function agregarNuevoUsuario($correo,$password){
    
            $statement = $this->PDO->prepare("INSERT INTO usuarios values(null, :correo, :password)");
            //$statement = $this->PDO->prepare("INSERT INTO usuarios (correo,password) values (?,?) ");

            $statement->bindParam(1,$correo);
            $statement->bindParam(2,$password);

            //$statement->bindParam(":correo",$correo);
            //$statement->bindParam(":password",$password);
            try {
                $statement->execute();
                echo "Homemodel usuario agregado.".$correo." - ".$password."<br>";
                //die();
                return true;
            } catch (PDOException $e) {
                echo "Error al conectar a la base de datos: " . $e->getMessage();
                return false;
            }

        }

       
        public function obtenerclave($correo){
            $conexion = new mysqli("localhost","root","t7jm33p","howest");
            if($conexion->connect_error){                
                die(" Error Conexion base de Datos ". $conexion->connect_errno."  - ".$conexion->connect_error);            
            }else{
           
            $sql = "SELECT password FROM usuarios WHERE correo = '$correo' ";   
            $result = $conexion->query($sql);
            
            echo "HM 74 Result tiene: ".print_r($result)."<br>";

            if ( $result->num_rows >= 0) {
                echo "HM 77 entre en el if de resutl <br>";
                $row = $result->fetch_assoc();
                echo "HM 79 resultado es : ".$row['password']."<br>";
                return $row['password'];
            }else{
                echo "HM 82 sali por el false";
                return false;
            }     
            }   
        }
          
        public function conectarbase(){
            $conexion = new mysqli("localhost","root","t7jm33p","howest");
            if($conexion->connect_error){
                
                die(" Error Conexion base de Datos ". $conexion->connect_errno."  - ".$conexion->connect_error);
            }else{

                $agr = $conexion->prepare("insert into usuarios (correo, password) values ( ?, ? )" );
                //$agr = $this->PDO->prepare("insert into usuarios (correo, password) values ( ?, ? )" );

                $agr->bind_param('ss',$correo,$password);
                $agr->execute();
            
            }
        }

    }


?>