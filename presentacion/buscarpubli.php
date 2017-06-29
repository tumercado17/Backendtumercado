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
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="" />
<meta name="author" content="http://webthemez.com" />

<link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="css/fancybox/jquery.fancybox.css" rel="stylesheet">
<link href="css/flexslider.css" rel="stylesheet" />
<link href="css/style.css" rel="stylesheet" />

</head>
<body>

	<section id="banner">
	</section>
	<section id="call-to-action-2">
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-sm-9">
					<h3>Gestion de publicaciones</h3>
					<p>Aquí puede realizar las distintas opciones para las publicaciones registradas en el sitio</p>
				</div>
			</div>
		</div>
	</section>

  	<section id="content">

    <div class="container content">
  		<div class="row">
        <form action="sancionadmin.php" id="FrmListadoUsuarios" method="POST">
     <section  id="services-sec">
       <div class="container">
           <div class="row text-center">
             <table class="table">
               <tr>
                 <td>IDPublicacion</td>
                 <td>CI</td>
                 <td>Nombre</td>
                 <td>Apellido</td>
                 <td>Nombre Publicacion</td>
                 <td>Categoria</td>
                 <td>Fecha</td>
                 <td>Tipo</td>
                 <td>-</td>
                 <td>-</td>
                 <td>-</td>
								</tr>
                <?php

                //Hace la conexion y la consulta para luego mostrar los datos de persona
                $conex=conectar();
                $sql ="select id,cipersona,nombre,apellido,publicacion.fecha,nombrepubli,descripcion,categoria,stock,tipo
                      from publicacion,persona,permuta,subasta,vendecompra where cipersona=ci group by id order by ci;";
                $result=$conex->prepare($sql);
                $result->execute();
                $resultados=$result->fetchAll();
                //$sql=mysql_fetch_array($datos_u);
        				for ($i=0;$i<count($resultados);$i++) {

                $IDu=$resultados[$i]["id"]; //tama el id de la tabla para enviarlo al otro formulario
        				?>

                 <tr>
                  <td><?php echo $resultados[$i]["id"];?></td>
        					<td><?php echo $resultados[$i]["cipersona"];?></td>
        					<td><?php echo $resultados[$i]["nombre"];?></td>
        					<td><?php echo $resultados[$i]["apellido"];?></td>
                  <td><?php echo $resultados[$i]["nombrepubli"];?></td>
                  <td><?php echo $resultados[$i]["categoria"];?></td>
                  <td><?php echo $resultados[$i]["fecha"];?></td>
                  <td><?php echo $resultados[$i]["tipo"];?></td>

                  <td><?php if ($_SESSION["GRADO"]=="Administrador del sistema"){
                      ?>
                      <a href="modificarpubli.php?ID=<?php echo $IDu;?>">Modificar</a></td>
                      <?php
                    }
                       ?>
                  <td><?php if ($_SESSION["GRADO"]=="Administrador del sistema"){
                    ?>
                    <a href="sancion.php?ID=<?php echo $IDu;?>">Sancionar</a></td>
                    <?php
                  }
                     ?>
                  <td><?php if ($_SESSION["GRADO"]=="Administrador del sistema" or $_SESSION["GRADO"]=="Administrador de frontend"){
                    ?>
                    <a href="borrarpubli.php?ID=<?php echo $IDu;?>">Borrar</a></td>
                    <?php
                  }
                     ?>
                </tr>

                <?php
              }
                 ?>
                </table>
           </div>
       </div>
     </form>

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
