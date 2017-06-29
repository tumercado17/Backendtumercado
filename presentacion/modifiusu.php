<?php
Require_once("../logica/funciones.php");
require_once("../logica/sesiones.php");
Require_once('../presentacion/menu.php');

if ($_SESSION["GRADO"]=="Administrador del sistema" or $_SESSION["GRADO"]=="Administrador de frontend"){
?>
  <?php
}else {
  ?>
  <script type="text/javascript">
    window.alert ("¡No tiene los permisos necesarios <?php echo $_SESSION["LOGIN"];?>!\n Solo los administradores del sistema acceden aqui!!");
    location.href="../presentacion/menu.php";
  </script>
  <?php
}

$conex=conectar();
$ID = $_GET["ID"];

$consultas="select usuario.idusuario,ciusuario,ci,persona.nombre,apellido,contrasena,email,calle,numero,calificacion,nombreusu
            from usuario,nombreusuario,persona
            where ((usuario.idusuario=idnomusuario)
            and (persona.ci=usuario.ciusuario)) and usuario.idusuario=$ID;";


$result=$conex->prepare($consultas);
$result->execute();
$resultados=$result->fetchAll();

for ($i=0;$i<count($resultados);$i++) {
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
					<h3>Modificar usuario "<?php echo $resultados[$i]["nombre"]; echo " " . $resultados[$i]["apellido"];?>"</h3>
					<p>Sustituya los campos correspondientes para poder actualizarlo los datos de "<?php echo $resultados[$i]["nombre"]; echo " " . $resultados[$i]["apellido"];?>"</p>
				</div>
			</div>
		</div>
	</section>

  <section id="content">

  <div class="container">

  <div class="row">
      <div class="col-md-6">

        <form action="../logica/procesarmodiusu.php" method="POST">

           <div class="control-group">
             <div class="controls">
               Nombre de usuario:
                  <input type="text" class="form-control" id="nombre" name="nombre" value='<?php echo $resultados[$i]["nombre"];?>'>
                    <p class="help-block"></p>
              </div>
           </div>

           <div class="control-group">
             <div class="controls">
               Apellido:
                  <input type="text" class="form-control" id="apellido" name="apellido" value='<?php echo $resultados[$i]["apellido"];?>'>
                    <p class="help-block"></p>
              </div>
           </div>

           <div class="control-group">
             <div class="controls">
               Contraseña:
                  <input type="password" class="form-control" id="contrasena" name="contrasena" value='<?php echo $resultados[$i]["contrasena"];?>'>
                    <p class="help-block"></p>
              </div>
           </div>

           <div class="control-group">
             <div class="controls">
               Correo Electronico:
                  <input type="text" class="form-control" id="email" name="email" value='<?php echo $resultados[$i]["email"];?>'>
                    <p class="help-block"></p>
              </div>
           </div>

           <div class="control-group">
             <div class="controls">
               Calle:
                  <input type="text" class="form-control" id="calle" name="calle" value='<?php echo $resultados[$i]["calle"];?>'>
                    <p class="help-block"></p>
              </div>
           </div>

           <div class="control-group">
             <div class="controls">
               Numero:
                  <input type="text" class="form-control" id="numero" name="numero" value='<?php echo $resultados[$i]["numero"];?>'>
                    <p class="help-block"></p>
              </div>
           </div>

           <div class="control-group">
             <div class="controls">
               Calificacion:
                  <input type="text" class="form-control" id="calificacion" name="calificacion" value='<?php echo $resultados[$i]["calificacion"];?>'>
                    <p class="help-block"></p>
              </div>
           </div>


           <input type="text" class="form-control" style="visibility:hidden" id="id" name="id" value='<?php echo $resultados[$i]["id"];?>'>
           <input type="text" class="form-control" style="visibility:hidden" id="ci" name="ci" value='<?php echo $resultados[$i]["ci"];?>'>
       <div id="success"> </div>
            <button type="submit" class="btn btn-primary pull-right">Modificar</button><br />
           </form>
                </div>
          </div>
  </div>

  </section>



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
<?php
}
?>
