<?php
Require_once('../logica/funciones.php');
Require_once('../logica/sesiones.php');
Require_once('../presentacion/menu.php');

$conex=conectar();
$ID = $_GET["ID"];

$consultas="select id,cipersona,nombre,apellido,email,nombrepubli,descripcion,categoria,stock,tipo
            from publicacion,persona,permuta,vendecompra,subasta where cipersona=ci and id=$ID group by id;";

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
          <h3>Borrar Publicacion </h3>
          <p>Confirme borrado de la publicacion</p>
        </div>
      </div>
    </div>
  </section>

    <section id="content">

    <div class="container content">
      <div class="row">
        <form action="../logica/procesarborrpubli.php" method="POST">
     <section  id="services-sec">
       <div class="container">
           <div class="row text-center">
             <table class="table">
               <tr>
                        <td>IDPublicacion</td>
                        <td>CI</td>
                        <td>Nombre</td>
                        <td>Apellido</td>
                        <td>Email</td>
                        <td>Nombre Publicacion</td>
                        <td>Descripcion</td>
                        <td>Categoria</td>
                        <td>Stock</td>
                        <td>Tipo</td>
                       </tr>

                        <tr>
                         <td><?php echo $resultados[$i]["id"];?></td>
                         <td><?php echo $resultados[$i]["cipersona"];?></td>
                         <td><?php echo $resultados[$i]["nombre"];?></td>
                         <td><?php echo $resultados[$i]["apellido"];?></td>
                         <td><?php echo $resultados[$i]["email"];?></td>
                         <td><?php echo $resultados[$i]["nombrepubli"];?></td>
                         <td><?php echo $resultados[$i]['descripcion'];?></td>
                         <td><?php echo $resultados[$i]["categoria"];?></td>
                         <td><?php echo $resultados[$i]["stock"];?></td>
                         <td><?php echo $resultados[$i]["tipo"];?></td>
                       </tr>

                    </table>
              </div>
          </div>
        </section>

            <input type="text" class="form-control" style="visibility:hidden" id="id" name="id" value='<?php echo $resultados[$i]["id"];?>'>
            <input type="text" class="form-control" style="visibility:hidden" id="tipo" name="tipo" value='<?php echo $resultados[$i]["tipo"];?>'>
            <input type="text" class="form-control" style="visibility:hidden" id="cipersona" name="cipersona" value='<?php echo $resultados[$i]["cipersona"];?>'>

        <div class="form-group">
            <button type="submit" class="btn btn-success">Borrar</button>
        </div>
      </form>
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

<?php
}
 ?>
