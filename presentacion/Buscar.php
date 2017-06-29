<?php
Require_once('../clases/persona.php');
Require_once('../logica/funciones.php');
Require_once('../logica/sesiones.php');
Require_once('../presentacion/menu.php');

if ($_SESSION["GRADO"]=="Administrador del sistema" or $_SESSION["GRADO"]=="Administrador de frontend"){
?>
  <?php
}else {
  ?>
  <script type="text/javascript">
    window.alert ("¡No tiene los permisos necesarios <?php echo $_SESSION["LOGIN"];?>!\n Solo los administradores del sistema acceden aqui!!");
    location.href="../presentacion/estadisticas.php";
  </script>
  <?php
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Tumercado-Inicio</title>
<body>
	<!-- end header -->
	<section id="banner">

	</section>
	<section id="call-to-action-2">
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-sm-9">
					<h3>Gestion de administradores</h3>
					<p>Aquí puede realizar las distintas opciones para los administradores registrados en el sitio</p>
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
                 <td>ID</td>
                 <td>Ci</td>
                 <td>Nombre</td>
                 <td>Apellido</td>
                 <td>Email</td>
                 <td>Pais</td>
                 <td>Calle</td>
                 <td>Numero</td>
                 <td>Telefono</td>
                 <td>Grado</td>
                 <td>-</td>
                 <td>-</td>
								</tr>
                <?php

                //Hace la conexion y la consulta para luego mostrar los datos de persona
                $conex=conectar();
                $sql ="select idadministrador,ci,nombre,apellido,email,pais,contrasena,calle,numero,cipersona,telefono,grado from persona,telefonopersona,administrador
                      where (persona.ci=telefonopersona.cipersona) and (persona.ci=administrador.ciadministrador);";
                $result=$conex->prepare($sql);
                $result->execute();
                $resultados=$result->fetchAll();

        				for ($i=0;$i<count($resultados);$i++) {
                $IDu=$resultados[$i]["idadministrador"]; //tama el id de la tabla para enviarlo al otro formulario
        				?>

                 <tr>
                  <td><?php echo $resultados[$i]["idadministrador"];?></td>
                  <td><?php echo $resultados[$i]["ci"];?></td>
        					<td><?php echo $resultados[$i]["nombre"];?></td>
        					<td><?php echo $resultados[$i]["apellido"];?></td>
        					<td><?php echo $resultados[$i]["email"];?></td>
                  <td><?php echo $resultados[$i]["pais"];?></td>
                  <td><?php echo $resultados[$i]["calle"];?></td>
                  <td><?php echo $resultados[$i]["numero"];?></td>
                  <td><?php echo $resultados[$i]["telefono"];?></td>
                  <td><?php echo $resultados[$i]["grado"];?></td>
                  <td><a href="modificaradmin.php?ID=<?php echo $IDu;?>">Modificar</a></td>
                  <td><a href="borraradmin.php?ID=<?php echo $IDu;?>">Borrar</a></td>
                  </tr>

                <?php
              }
                 ?>
                </table>
           </div>
       </div>
     </form>

     <form action="../presentacion/Registrarse.php" method="POST">
       <div class="form-group">
           <button type="submit" class="btn btn-success">Crear Administrador</button>
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
