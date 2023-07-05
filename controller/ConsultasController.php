<?php
class consultas extends dbconexion{

    public function select_cliente(){
        $sqlp = dbconexion::conexion()->prepare("Select * from clientes order by nombre ASC");
        $sqlp->execute();

        return $array = $sqlp->fetchAll(PDO::FETCH_ASSOC);

    }

    public function insertar_cliente($nom,$direc,$local,$pais,$tel,$contact){
        $sqla = dbconexion::conexion()->prepare("insert into clientes (nombre,direccion,localidad,pais, telefono,contacto) values ('$nom','$direc','$local','$pais','$tel','$contact')");
        if ($sqla->execute()){
            $resultado = self::select_cliente();
            return $resultado;
        };
    }

    public function update_cliente($modif,$nom,$direc,$local,$pais,$tel,$contact){
        $sqlu = dbconexion::conexion()->prepare("update clientes set nombre=$nom,direccion=$direc,localidad=$local,
        pais=$pais,telefono=$tel,contacto=$contact where id=$modif");
        if ($sqlu->execute()){
            $resultado = self::select_cliente();
            return $resultado;
        };
    }

    public function eliminar_cliente($id){
        $sqld=dbconexion::conexion()->prepare("DELETE FROM clientes WHERE id='".$id."'");
        $sqld->execute();
        if ($sqld->rowCount() > 0) {
            $resultado = self::select_cliente();
            return $resultado;
            // return "Se elimino correctamente el registro";
        }else{
            return "Ocurrio un problema";
        }
    }

    public function editar_cliente($id){
        $sql = dbconexion::conexion()->prepare("SELECT * FROM clientes WHERE id='".$id."'");
        if($sql->execute()){
            return $array = $sql->fetchAll(PDO::FETCH_ASSOC);
        }else {
            return "error";
        }
    }

}

?>