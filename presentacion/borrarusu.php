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
    location.href="../presentacion/estadisticas.php";
  </script>
  <?php
}

  $conex=conectar();
  $ID = $_GET["ID"];

    $consultas="select usuario.idusuario,ciusuario,persona.nombre,apellido,ci,email,calle,numero,calificacion,nombreusu
                from usuario,nombreusuario,persona
                where (usuario.idusuario=idnomusuario)
                and (persona.ci=usuario.ciusuario) and usuario.idusuario=$ID;";

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
  					<h3>Borrar al usuario "<?php echo $resultados[$i]["nombre"]; echo " " . $resultados[$i]["apellido"];?>"</h3>
  					<p>Confirme el borrado del usuario "<?php echo $resultados[$i]["nombre"]; echo " " . $resultados[$i]["apellido"];?>"</p>
  				</div>
  			</div>
  		</div>
  	</section>

    	<section id="content">

      <div class="container content">
    		<div class="row">
          <form action="../logica/procesarborrarusu.php" method="POST">
       <section  id="services-sec">
         <div class="container">
             <div class="row text-center">
               <table class="table">
                 <tr>
                        <td>CI</td>
                        <td>Nombre</td>
                        <td>Apellido</td>
                        <td>Email</td>
                        <td>Calle</td>
                        <td>Numero</td>
                        <td>calificacion</td>
                        </tr>

                        <tr>
                         <td><?php echo $resultados[$i]["ci"];?></td>
                         <td><?php echo $resultados[$i]["nombre"];?></td>
                         <td><?php echo $resultados[$i]["apellido"];?></td>
                         <td><?php echo $resultados[$i]["email"];?></td>
                         <td><?php echo $resultados[$i]["calle"];?></td>
                         <td><?php echo $resultados[$i]["numero"];?></td>
                         <td><?php echo $resultados[$i]["calificacion"];?></td>
                         </tr>

                      </table>

                </div>
            </div>
          </section>
              <input type="text" class="form-control" style="visibility:hidden" id="ci" name="ci" value='<?php echo $resultados[$i]["ci"];?>'>
              <input type="text" class="form-control" style="visibility:hidden" id="idusuario" name="idusuario" value='<?php echo $resultados[$i]["idusuario"];?>'>
          <div class="form-group">
              <button type="submit" class="btn btn-success">Borrar</button>
          </div>
        </form>
      </div>
  </div>
  <?php
}
 ?>
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
