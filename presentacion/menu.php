<?php

$hora= date ("h:i:s");
$fecha= date ("j/n/Y");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Tumercado-Inicio</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="" />
<meta name="author" content="http://webthemez.com" />

<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
<link href="assets/css/fancybox/jquery.fancybox.css" rel="stylesheet">
<link href="assets/css/flexslider.css" rel="stylesheet" />
<link href="assets/css/style.css" rel="stylesheet" />

</head>
<body>
<div id="wrapper" class="home-page">
<div class="topbar">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <p class="pull-left hidden-xs"><i class="fa fa-clock-o"></i><span><?php echo $fecha; ?></span></p>
        <a href="Perfil.php"><p class="pull-right">Perfil: <?php echo $_SESSION["nombre"]; echo " " . $_SESSION["apellido"];?></p></a>
      </div>
    </div>
  </div>
</div>
	<!-- start header -->
	<header>
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="estadisticas.php"><img src="assets/img/logoadmin.png" alt="logo"/></a> <!-- Poner el logo del sistema -->
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="estadisticas.php">Home</a></li>
                        <li><?php if ($_SESSION["GRADO"]=="Administrador del sistema"){
                    ?>
                    <a href="Buscar.php">Gestion de Administradores</a></li>
                    <?php
                  }
                    ?>
                  <li><a href="Buscarusu.php">Gestion de Usuarios</a></li>
                  <li><?php if ($_SESSION["GRADO"]=="Administrador del sistema" or $_SESSION["GRADO"]=="Administrador de frontend"){
                    ?>
                    <a href="Buscarpubli.php">Gestion Publicaciones</a></li>
                    <?php
                  }
                    ?>

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
	</header>


</body>
</html>
