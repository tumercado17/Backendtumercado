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
        <a href="estadisticas.php">TUMERCADO</a>
        <a href="estadisticas.php" align="center"> Ver perfil: <?php echo $_SESSION["nombre"];?></a>
        <div class="container">

            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-center">
                  <li><?php if ($_SESSION["GRADO"]=="Administrador del sistema"){
                    ?>
                    <a href="Buscar.php">Administrar Administradores</a></li>
                    <?php
                  }
                    ?>
                  <li><a href="Buscarusu.php">Administrar Usuarios</a></li>
                  <li><?php if ($_SESSION["GRADO"]=="Administrador del sistema" or $_SESSION["GRADO"]=="Administrador de frontend"){
                    ?>
                    <a href="Buscarpubli.php">Administrar Publicaciones</a></li>
                    <?php
                  }
                    ?>
                  <li><?php if ($_SESSION["GRADO"]=="Administrador del sistema"){
                    ?>
                    <a href="Registrarse.php">Ingresar Administrador</a></li>
                    <?php
                  }
                    ?>
                    <li><a href="../reportes/listadoUsuarios.php">CREAR-PDF</a></li>
                    <li><?php if ($_SESSION["GRADO"]=="Administrador del sistema"){
                      ?>
                      <a href="buscarcompubli.php">Administrar Comentarios</a></li>
                      <?php
                    }
                      ?>
                    <li><?php if (!empty($_SESSION["LOGIN"])){
                      ?>
                      <a href="Salir.php" style="color:red">CERRAR SESION</a></li>
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
