<?php
    require_once "../config/conexion.php";
    require_once "../controller/ConsultasController.php";
    if (!isset($_POST['tipo_operacion'])){
        $tipo_consulta = 'mostrar';    
    }else{
        $tipo_consulta = $_POST['tipo_operacion'];
    } 
    //echo $tipo_consulta;
    
    switch ($tipo_consulta) {
        case 'mostrar':
            $consultas = new consultas();
            $ejecutar = $consultas->select_cliente();
            echo json_encode($ejecutar);
        break;
        case 'guardar':
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $sexo =$_POST['sexo'];
            $consultas = new consultas();
            //$ejecutar = $consultas->insertar_cliente($nombre,$apellidos,$sexo);
            echo json_encode($ejecutar);
        break;
        case 'editar':
            $id = $_POST['id'];
            $consultas = new consultas();
            $ejecutar = $consultas->editar_cliente($id);
  //          console.log($ejecutar);
            echo json_encode($ejecutar);
            break;
        case 'update':
                $id = $_POST["idu"];
                $nombre = $_POST["nombreu"];
                $apellidos= $_POST["apellidosu"];
                $sexo= $_POST["sexou"];
                $consultas = new consultas();
                //$ejecutar = $consultas->update_cliente($id,$nombre,$apellidos,$sexo);
                echo json_encode($ejecutar);
            break;    
        case 'eliminar':
            $id = $_POST['id'];
            $consultas = new consultas();
            $ejecutar = $consultas->eliminar_cliente($id);
            echo json_encode($ejecutar);
            break;    
        default:
            # code...
            break;
    }

?>