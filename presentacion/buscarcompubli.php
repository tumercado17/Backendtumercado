<?php
Require_once('../clases/persona.php');
Require_once('../clases/usuario.class.php');
Require_once('../clases/publicacion.php');
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
<body>
	<!-- end header -->
  <section id="banner">

  <section id="call-to-action-2">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-sm-9">
          <h3>Administrar los comentarios de publicacion</h3>
          <p>Listado de todos los comentarios de una publicacion determinada</p>
        </div>
      </div>
    </div>
  </section>

<section id="content">
  <section  id="services-sec">
       <div class="container">
         <form action="../logica/procesarBusqueda.php" method="POST">
           <div class="row ext-center">
               <div class="row">
                 <div class="col-md-3 ">
                     <div class="form-group">
                         Busqueda:
                         <input type="text" id="nombre" name="nombre" class="form-control" required="required" placeholder="Nombre  de publicacion">
                     </div>
                 </div>


                 <div class="col-md-3 ">
                     <div class="form-group">
                         ID de publicacion:
                         <input type="number" min="1" max="1000" id="id" name="id" class="form-control" required="required" placeholder="ID de publicacion">
                     </div>
                 </div>



                 <div class="col-md-3 ">
                     <div class="form-group">
                       Tipo de publicacion
                        <select class="form-control" id="tipo" name="tipo" placeholder="Pais">
                          <option value="Publicacion">Publicacion</option>
                          <option value="Venta">Venta</option>
                          <option value="Permuta">Permuta</option>
                          <option value="Subasta">Subasta</option>
                        </select>
                     </div>
                 </div>
             </div>
             <div class="form-group">
                 <button type="submit" class="btn btn-success">Buscar</button>
             </div>
           </div>
         </div>
     </section>

<?php
if(isset($_SESSION["BUS"])){
  if(!empty($_SESSION["BUS"])){
    $array=$_SESSION["BUS"];
?>
<section id="content">
<div class="container content">
  <div class="row">
      <div class="container">
         <div class="row text-center">
           <table class="table">
           <tr>
             <td>ID</td>
             <td>Nombre Publicacion</td>
             <td>CIPersona</td>
             <td>Tipo</td>
             <td>Comentario</td>
             <td>--</td>
            </tr>
<?php
            for ($i=0;$i<count($array);$i++){
              $IDu = $array[$i]["id"];
              $_SESSION["TIPO"] = $tipo = $array[$i]["tipo"];
              $tipo = $array[$i]["tipo"];
 ?>
            <tr>
             <td><?php echo $array[$i]["id"];?></td>
             <td><?php echo $array[$i]["nombrepubli"];?></td>
             <td><?php echo $array[$i]["cipersona"];?></td>
             <td><?php echo $array[$i]["tipo"];?></td>
             <?php
             if ($tipo == "Subasta"){
               ?>
               <td><?php echo $array[$i]["comentariosub"];?></td>
               <?php
             }
             ?>

              <?php
              if ($tipo == "Venta"){
                ?>
                <td><?php echo $array[$i]["comentarioven"];?></td>
                <?php
              }
              ?>
              <?php
              if ($tipo == "Permuta"){
                ?>
                <td><?php echo $array[$i]["comentarioper"];?></td>
                <?php
              }
              ?>
              <?php
              if ($tipo == "Publicacion"){
                ?>
                <td><?php echo $array[$i]["comentariopub"];?></td>
                <?php
              }
              ?>
              <td><a href="borrarcompubli.php?ID=<?php echo $IDu;?>">Borrar</a></td>
             </tr>
             <?php

           }$_SESSION["BUS"] = null; //Vuelve la busqueda a cero
              ?>


          </table>
        </div>
      </div>
    </div>
  </div>
                <?php

            }
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
