<?php
    class homecontroller{
        private $MODEL;
        public function __construct()
        {
            require_once("/Applications/XAMPP/xamppfiles/htdocs/howest/model/homemodel.php");
            $this->MODEL = new homemodel();      
        }

        public function guardarUsuario($correo,$password){
     
            $valor = $this->MODEL->agregarNuevoUsuario($this->limpiarcorreo($correo),$this->encriptarcontraseña($this->limpiarcadena($password)));
            echo "El VALOR es: ";
            if($valor){ echo "Todo Ok";}else{echo "todop p lorto";}
            //die();
            return $valor;
        }
        public function limpiarcadena($campo){
            $campo = strip_tags($campo);
            $campo = filter_var($campo, FILTER_UNSAFE_RAW);
            $campo = htmlspecialchars($campo);
            return $campo;
        }
        public function limpiarcorreo($campo){
            $campo = strip_tags($campo);
            $campo = filter_var($campo, FILTER_SANITIZE_EMAIL);
            $campo = htmlspecialchars($campo);
            return $campo;
        }
        public function encriptarcontraseña($password){
            return password_hash($password,PASSWORD_DEFAULT);
        }
        public function verificarusuario($correo,$password){
            if(empty($correo) || empty($password)){
                $error = "<li>  Datos Incompletos </li>";
                header("Location:login.php?error=".$error."&&correo=".$correo."&&contraseña=".$password);
            }else{
                $keydb = $this->MODEL->obtenerclave($correo);
                echo "homecontroller 39 entre verifica usuario: ".$correo." - ".$keydb;
                if(!$keydb){
                    return false;
                }else{
                    echo "HC 45 Else del pass";
                    return (password_verify($password,$keydb)) ? true : false;
                }
            }
        }
    }

       // echo "entre a funcion publica guardarusuario ".$correo."  Pass: ".$password."<br>";
/*
            $statement = $this->PDO->prepare("INSERT INTO usuarios values(null, :correo, :password)");
            $statement->bindParam(":correo",$correo);
            $statement->bindParam(":password",$password);
            try {
                $statement->execute();
                return true;
            } catch (PDOException $e) {
                echo "Error al conectar a la base de datos: " . $e->getMessage();
                return false;
            }

*/


?>