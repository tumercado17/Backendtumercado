<?php
require_once("../logica/sesiones.php");
Require_once('../presentacion/menu.php');

if ($_SESSION["GRADO"]=="Administrador del sistema"){
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
 					<h3>Crear administrador</h3>
 					<p>Sustituya los campos correspondientes para poder actualizarlos</p>
 				</div>
 			</div>
 		</div>
 	</section>

   <section id="content">

   <div class="container">

   <div class="row">
       <div class="col-md-6">

         <form action="../logica/procesarnuevoadmin.php" method="POST">

            <div class="control-group">
              <div class="controls">
                Nombre de usuario:
                   <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre" required="required">
                     <p class="help-block"></p>
               </div>
            </div>

            <div class="control-group">
              <div class="controls">
                Apellido:
                   <input type="text" class="form-control" id="apellido" name="apellido" placeholder="apellido" required="required">
                     <p class="help-block"></p>
               </div>
            </div>

            <div class="control-group">
              <div class="controls">
                Cedula de identidad:
                   <input type="text" class="form-control" id="ci" name="ci" placeholder="cedula de identidad" required="required">
                     <p class="help-block"></p>
               </div>
            </div>

            <div class="control-group">
              <div class="controls">
                Contraseña:
                   <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="contraseña" required="required">
                     <p class="help-block"></p>
               </div>
            </div>

            <div class="control-group">
              <div class="controls">
                Correo Electronico:
                   <input type="text" class="form-control" id="email" name="email" placeholder="email" required="required">
                     <p class="help-block"></p>
               </div>
            </div>

            <div class="control-group">
              <div class="controls">
                Telefono:
                   <input type="text" class="form-control" id="telefono" name="telefono" placeholder="telefono" required="required">
                     <p class="help-block"></p>
               </div>
            </div>

            <div class="control-group">
              <div class="controls">
                Calle:
                   <input type="text" class="form-control" id="calle" name="calle" placeholder="calle" required="required">
                     <p class="help-block"></p>
               </div>
            </div>

            <div class="control-group">
              <div class="controls">
                Numero:
                   <input type="text" class="form-control" id="numero" name="numero" placeholder="numero" required="required">
                     <p class="help-block"></p>
               </div>
            </div>

            <div class="control-group">
              <div class="controls">
                Pais:
                <select class="form-control" id="pais" name="pais" required="required">
                        <option value="Penalizador">Uruguay</option>
                        <option value="Argentina">Argentina</option>
                        <option value="Colombia">Colombia</option>
                 </select>
                 <p class="help-block"></p>
               </div>
            </div>

            <div class="control-group">
              <div class="controls">
                Grado:
                <select class="form-control" id="grado" name="grado" required="required">
                        <option value="Penalizador">Penalizador</option>
                        <option value="Administrador del sistema">Administrador del sistema</option>
                        <option value="Administrador de frontend">Administrador de frontend</option>
                        <option value="Lector de registro">Lector de registro</option>
                 </select>
                 <p class="help-block"></p>
               </div>
            </div>
        <div id="success"> </div>
             <button type="submit" class="btn btn-primary pull-right">Crear</button><br />
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
