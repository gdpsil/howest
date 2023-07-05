<?php
    session_start();
    require_once("../view/header.php");
    if(empty($_SESSION['usuario'])){
        echo "la sesion desde panel de control esta vacia";
        //header("Location:login.php");
    }
?>
    <h1 class="text-center mt-4">Bienvenido <?= $_SESSION['usuario']?></h1>
<?php
    require_once("/Applications/XAMPP/xamppfiles/htdocs/howest/view/footer.php");
?>