<?php
require_once("../logica/sesiones.php");
?>
﻿<!DOCTYPE html>
<html lang="en">
    <head>
            
      <link href="assets/css/bootstrap.css" rel="stylesheet" />
      <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
      <link href="assets/css/font-awesome-animation.css" rel="stylesheet" />
      <link href="assets/css/prettyPhoto.css" rel="stylesheet" />
      <link href="assets/css/style.css" rel="stylesheet" />
      <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    </head>
<body>

        <div class="navbar navbar-inverse navbar-fixed-top">
        <img src="../imagenes/logoadmin.png" width="90" height="90"/>
        <a href="menu.php">TUMERCADO</a>
        <a href="menu.php" align="center"> Ver perfil: <?php echo $_SESSION["nombre"];?></a>
        <div class="container">

            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-center">
                  <li><?php if ($_SESSION["GRADO"]=="Administrador del sistema"){
                    ?>
                    <a href="Buscar.php">MOSTRAR-ADMINISTRADORES</a></li>
                    <?php
                  }
                    ?>
                  <li><a href="Buscarusu.php">MOSTRAR-USUARIOS</a></li>
                  <li><?php if ($_SESSION["GRADO"]=="Administrador del sistema"){
                    ?>
                    <a href="Buscarpubli.php">MOSTRAR-PUBLICACIONES</a></li>
                    <?php
                  }
                    ?>
                  <li><?php if ($_SESSION["GRADO"]=="Administrador del sistema"){
                    ?>
                    <a href="Registrarse.php">CREAR-ADMINISTRADOR</a></li>
                    <?php
                  }
                    ?>
                    <li><a href="buscarcomvende.php">COMENTARIOS-PUBLICACIONES</a></li>
                    <li><a href="buscarcomper.php">COMENTARIOS-PERMUTA</a></li>
                    <li><a href="buscarcomsub.php">COMENTARIOS-SUBASTA</a></li>
                    <li><?php if (!empty($_SESSION["LOGIN"])){
                      ?>
                      <a href="Salir.php" style="color:red;">CERRAR SESION</a></li>
                      <?php
                    }
                      ?>
                </ul>
            </div>
        </div>
    </div>

    <section  id="services-sec">
    </section>

    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap.min.js"></script>
    <script src="assets/plugins/jquery.isotope.min.js"></script>
    <script src="assets/plugins/jquery.prettyPhoto.js"></script>
    <script src="assets/js/custom.js"></script>

</body>
</html>
