<?php
require_once("/Applications/XAMPP/xamppfiles/htdocs/howest/view/head.php")
?>

<div class="fondo_menu">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Howest</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <?php if(empty($_SESSION['usuario'])): ?>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Cotizaciones</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contactanos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="clientes.php">Clientes</a>
                        </li>
                    </ul>
                    <a href="/howest/home/login.php" class="boton">Inicia Session</a>
                    <a href="/howest/home/signup.php" class="boton">Registrate</a>
                </div>
                <?php else: ?>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Agregar informacion</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../home/aclientes.php">TR Clientes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="aordenes.php">TR  Ordenes de trabajo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="ati.php">TR TI</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../view/clientes.php">Clientes</a>
                        </li>
                    </ul>
                    <a href="/howest/home/logout.php" class="boton">Cerrar Sesion</a>
                </div>
                <?php endif ?>

            </div>
        </nav>
    </div>
</div>
<div class="fondo">


 