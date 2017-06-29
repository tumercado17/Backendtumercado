<?php
Require_once('../clases/persona.php');
Require_once('../clases/usuario.class.php');
Require_once('../logica/funciones.php');
Require_once('../logica/sesiones.php');
Require_once('../presentacion/menu.php');

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Tumercado-Inicio</title>
<body>
	<!-- end header -->
	<section id="banner">

	<!-- Slider -->
        <div id="main-slider" class="flexslider">
            <ul class="slides">
              <li>
                <img src="assets/img/slides/1.jpg" alt="" />
                <div class="flex-caption">
                    <h3>Tu Mercado</h3>
					          <p>Backend</p>

                </div>
              </li>
              <li>
                <img src="assets/img/slides/2.jpg" alt="" />
                <div class="flex-caption">
                    <h3>Bienvenido</h3>
					          <p><?php echo $_SESSION["nombre"]; echo " " . $_SESSION["apellido"];?></p>

                </div>
              </li>
            </ul>
        </div>
	<!-- end slider -->

	</section>
	<section id="call-to-action-2">
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-sm-9">
					<h3>Control total del sistema</h3>
					<p>Aqui puede leer el manual completo del sitio para poder acceder todas sus herramientas</p>
				</div>
				<div class="col-md-2 col-sm-3">
					<a href="#" class="btn btn-primary">Ver Manual</a>
				</div>
			</div>
		</div>
	</section>

  	<section id="content">

    <div class="container content">
  		<div class="row">

        <h2>Estadisticas Generales </h2>
        <table class="table">
               <tr>
                 <td style="color:red">Nombre de listados</td>
                 <td style="color:red">Cantidad</td>
                 <td style="color:red">Accion</td>
                </tr>

                <?php

                //Hace la consulta para sacar la cantidad de usuarios
                $conex=conectar();
                $sql ="select count(*) from persona,usuario where ciusuario=ci;";
                $result=$conex->prepare($sql);
                $result->execute();
                $cantusu=$result->fetchAll();

                //Hace la consulta para sacar la cantidad de administradores
                $conex=conectar();
                $sql ="select count(*) from persona,administrador where ciadministrador=ci;";
                $result=$conex->prepare($sql);
                $result->execute();
                $cantadmin=$result->fetchAll();

                //Hace la consulta para sacar la cantidad de publicaciones
                $conex=conectar();
                $sql ="select count(*) from persona,publicacion where cipersona=ci";
                $result=$conex->prepare($sql);
                $result->execute();
                $cantpubli=$result->fetchAll();

                //Hace la consulta para sacar la cantidad de comentarios
                $conex=conectar();
                $sql ="select (select count(*) from persona,comentariopermuta where cicomperpersona=ci)+
                      (select count(*) from persona,comentariopublicacion where cicompersona=ci)+
                      (select count(*) from persona,comentariosubasta where cicomsubpersona=ci)+
                      (select count(*) from persona,comentariovendecompra where cicomvenpersona=ci) as total;";
                $result=$conex->prepare($sql);
                $result->execute();
                $cantcom=$result->fetchAll();
        				?>

                <tr>
                 <td>Cantidad de usuarios</td>
                 <td><?php echo $cantusu[0]["count(*)"];?></td>
                 <td><a href="buscarusu.php">Ver</a></td>
                </tr>

                <tr>
                 <td>Cantidad de administradores</td>
                 <td><?php echo $cantadmin[0]["count(*)"];?></td>
                 <?php
                 if ($_SESSION["GRADO"]=="Administrador del sistema" or $_SESSION["GRADO"]=="Administrador de frontend"){
                  ?>
                 <td><a href="buscar.php">Ver</a></td>
                 <?php
                  }else{
                    ?>
                    <td>--</td>
                    <?php
                  }
                      ?>
                </tr>

                <tr>
                 <td>Cantidad de publicaciones</td>
                 <td><?php echo $cantpubli[0]["count(*)"];?></td>
                 <?php
                 if ($_SESSION["GRADO"]=="Administrador del sistema" or $_SESSION["GRADO"]=="Administrador de frontend"){
                  ?>
                 <td><a href="buscarpubli.php">Ver</a></td>
                 <?php
               }else{
                 ?>
                 <td>--</td>
                 <?php
               }
                   ?>
                </tr>

                <tr>
                 <td>Cantidad de comentarios</td>
                 <td><?php echo $cantcom[0]["total"];?></td>
                 <td>Estado</td>
                </tr>

             </table>

      <!-- sdasdasdasd -->
  		</div>
  	</div>

	<footer>

	<div id="sub-footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="copyright">
						<p>
							<span>&copy; Tumercado.com 2017 All right reserved. SkyCloudDevelopement </span>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	</footer>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/jquery.easing.1.3.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.fancybox.pack.js"></script>
<script src="assets/js/jquery.fancybox-media.js"></script>
<script src="assets/js/jquery.flexslider.js"></script>
<script src="assets/js/animate.js"></script>
<!-- Vendor Scripts -->
<script src="assets/js/modernizr.custom.js"></script>
<script src="assets/js/jquery.isotope.min.js"></script>
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="assets/js/animate.js"></script>
<script src="assets/js/custom.js"></script>
</body>
</html>
