<?php
    require_once("/Applications/XAMPP/xamppfiles/htdocs/howest/controller/homecontroller.php");
    session_start();
    $obj        = new homecontroller();
    $correo     = $obj->limpiarcorreo($_POST['correo']);
    echo "correo:" .$correo."<br>";
    $contraseña = $obj->limpiarcadena($_POST['contraseña']);
    echo "contraseña:" .$contraseña."<br>";


    $bandera    = $obj->verificarusuario($correo,$contraseña);
    echo "Bandera:" .$bandera."<br>";

    if(empty($correo) || empty($contraseña)){
        $error .= "<li>Datos Incompletos</li>";
        header("Location:login.php?error=".$error."&&correo=".$correo."&&contraseña=".$contraseña."&&confirmarContraseña=".$confirmarContraseña);
    }
    if($bandera){   
        $_SESSION['usuario'] = $correo;
        echo "Entro en la Sesion: ".$_SESSION['usuario'] ;
        header("Location:panel_control.php");
    }else{
        $error = "<li>Datos Incorrectos</li>";
        header("Location:login.php?error=".$error);
    }
?>