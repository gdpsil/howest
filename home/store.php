<?php
    require_once("/Applications/XAMPP/xamppfiles/htdocs/howest/controller/homecontroller.php");

    $obj                 = new homecontroller();
    $correo              = $_POST['correo'];
    $contraseña          = $_POST['contraseña'];
    $confirmarContraseña = $_POST['confirmarContraseña'];
    $error = "";


    if(empty($correo) || empty($contraseña) || empty($confirmarContraseña)){
        $error .= "<li>Completa los campos</li>";
        header("Location:signup.php?error=".$error."&&correo=".$correo."&&contraseña=".$contraseña."&&confirmarContraseña=".$confirmarContraseña);
    }else if($correo && $contraseña && $confirmarContraseña){
        if($contraseña == $confirmarContraseña){           
            if($obj->guardarUsuario($correo,$contraseña) == false){
                $error .= "<li>El correo ya esta registrado</li>";
                header("Location:signup.php?error=".$error."&&correo=".$correo."&&contraseña=".$contraseña."&&confirmarContraseña=".$confirmarContraseña);
            }else{
                //echo "Alta Correcta";
                header("Location:login.php");
            }
        }else{
            $error .= "<li>Las contraseñas son diferentes</li>";
            header("Location:signup.php?error=".$error."&&correo=".$correo."&&contraseña=".$contraseña."&&confirmarContraseña=".$confirmarContraseña);
        }
    }
?>