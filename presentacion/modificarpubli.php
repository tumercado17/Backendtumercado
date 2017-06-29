<?php
Require_once('../logica/funciones.php');
Require_once('../logica/sesiones.php');
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

$conex=conectar();
$ID = $_GET["ID"];

$consultas="select id,cipersona,nombre,apellido,precio,email,nombrepubli,descripcion,categoria,stock,tipo
            from publicacion,persona,permuta where cipersona=ci and id=$ID group by $ID;";

$result=$conex->prepare($consultas);
$result->execute();
$resultados=$result->fetchAll();

for ($i=0;$i<count($resultados);$i++) {
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Acura Multi purpose Free HTML5 website Template</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="" />
<meta name="author" content="http://webthemez.com" />

<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
<link href="assets/css/fancybox/jquery.fancybox.css" rel="stylesheet">
<link href="assets/css/flexslider.css" rel="stylesheet" />
<link href="assets/css/magnific-popup.css" rel="stylesheet">
<link href="assets/css/style.css" rel="stylesheet" />
<link href="assets/css/gallery-1.css" rel="stylesheet">


</head>
<body>
  <div id="wrapper">
  <section id="banner">

  </section>
  <section id="call-to-action-2">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-sm-9">
          <h3>Modificar publicacion "<?php echo $resultados[$i]["nombrepubli"];?>"</h3>
          <p>Sustituya los campos correspondientes para poder actualizar los datos de la publicacion</p>
        </div>
      </div>
    </div>
  </section>

  <section class="section-padding gray-bg">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-title text-center">
						<h2><?php echo $resultados[$i]["nombrepubli"];?></h2>
					</div>
				</div>
			</div>
			<div class="row">

          <div class="col-md-6 col-sm-6 col-xs-12 gallery-item-wrapper artwork creative">
              <div class="gallery-item">
                    <div class="gallery-thumb">
                          <img src="../imagenes/fondo.jpg" class="img-responsive">
                          <div class="image-overlay"></div>
                          <a href="../imagenes/fondo.jpg" class="gallery-zoom"><i class="fa fa-eye"></i></a>
                    </div>
              </div>
          </div>


        <div class="col-md-6 col-sm-6">
					<div class="about-text">
						<p><h4>Descripcion: </h4>
              <?php echo $resultados[$i]["descripcion"];?></p>

						<ul class="withArrow">
              <li><span class="fa fa-angle-right"></span>Vendedor: <?php echo $resultados[$i]["nombre"] . " " . $resultados[$i]["apellido"]; ?></li>
              <li><span class="fa fa-angle-right"></span>Ci-Vendedor: <?php echo $resultados[$i]["cipersona"]; ?></li>
              <li>----</li>
							<li><span class="fa fa-angle-right"></span>Categoria: <?php echo $resultados[$i]["categoria"];?></li>
							<li><span class="fa fa-angle-right"></span>Stock: <?php echo $resultados[$i]["stock"];?></li>
              <li><span class="fa fa-angle-right"></span>Precio: <?php echo $resultados[$i]["precio"];?></li>
							<li><span class="fa fa-angle-right"></span>Tipo: <?php echo $resultados[$i]["tipo"];?></li>
						</ul>
					</div>
				</div>

			</div>
		</div>
	</section>

  <section id="content">

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <form action="../logica/procesarpublicacion.php" method="POST">
           <div class="control-group">
             <h3>Modificar campos </h3>
             <div class="controls">
               Nombre de publicacion:
                    <input type="text" class="form-control" id="nombrepubli" name="nombrepubli" value='<?php echo $resultados[$i]["nombrepubli"];?>'>
                    <p class="help-block"></p>
              </div>
           </div>

           <div class="control-group">
             <div class="controls">
               Descripcion:
                    <input type="text" class="form-control" id="descripcion" name="descripcion" value='<?php echo $resultados[$i]["descripcion"];?>'>
                    <p class="help-block"></p>
              </div>
           </div>

           <div class="control-group">
             <div class="controls">
               Categoria:
                   <input type="text" class="form-control" id="categoria" name="categoria" value='<?php echo $resultados[$i]["categoria"];?>'>
                    <p class="help-block"></p>
              </div>
           </div>

           <div class="control-group">
             <div class="controls">
               Stock:
                    <input type="text" class="form-control" id="stock" name="stock" value='<?php echo $resultados[$i]["stock"];?>'>
                    <p class="help-block"></p>
              </div>
           </div>

           <div class="control-group">
             <div class="controls">
               Tipo:
                    <select class="form-control" id="tipo" name="tipo">
                          <option value="Venta">Venta</option>
                          <option value="Permuta">Permuta</option>
                          <option value="Subasta">Subasta</option>
                    </select>
                <p class="help-block"></p>
              </div>
           </div>

       <input type="text" class="form-control" style="visibility:hidden" id="id" name="id" value='<?php echo $resultados[$i]["id"];?>'>
       <div id="success"> </div>
            <button type="submit" class="btn btn-primary pull-left">Modificar</button><br />
           </form>
                </div>
          </div>
        </div>
  </section>
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
