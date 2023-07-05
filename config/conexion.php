<?php
const server="localhost";
const db="howest";
const user="root";
const password="t7jm33p";
const utf8="utf8";

const SGDB = "mysql:host=" .server.";dbname=" .db.";charset=" .utf8;

class dbconexion{
    protected function conexion(){
        $con = new PDO(SGDB,user,password);
        return $con;
    }
}
?>