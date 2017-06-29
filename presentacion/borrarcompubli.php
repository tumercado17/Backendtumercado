<?php
Require_once("../logica/funciones.php");
Require_once("../logica/sesiones.php");
Require_once('../presentacion/menu.php');

$conex=conectar();
$ID = $_GET["ID"];
$tipo = $_SESSION["TIPO"];


if ($tipo == "Venta"){

$consultas="SELECT id,cipersona,nombrepubli,tipo,comentarioven,idcomvenpublicacion  FROM  publicacion
            INNER JOIN comentariovendecompra ON idcomvenpublicacion = id WHERE id=$ID;";

}elseif ($tipo == "Subasta") {
  $consultas="SELECT id,cipersona,nombrepubli,tipo,comentariosub,idcomsubpublicacion  FROM  publicacion
              INNER JOIN comentariosubasta ON idcomsubpublicacion = id WHERE id=$ID;";

}elseif ($tipo == "Permuta") {

  $consultas="SELECT id,cipersona,nombrepubli,tipo,comentarioper,idcompermuta  FROM  publicacion
              INNER JOIN comentariopermuta ON idcompermuta = id WHERE id=$ID;";

  }elseif ($tipo == "Publicacion") {

    $consultas="SELECT id,cipersona,nombrepubli,tipo,comentariopub,idcompublicacion
                FROM  publicacion
                INNER JOIN comentariopublicacion ON idcompublicacion = id WHERE id=$ID;";
    }

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
          <h3>Borrar Comentario de Publicacion </h3>
          <p>Confirme borrado del comentario</p>
        </div>
      </div>
    </div>
  </section>

    <section id="content">

    <div class="container content">
      <div class="row">
        <form action="../logica/procesarborr.php" method="POST">
     <section  id="services-sec">
       <div class="container">
           <div class="row text-center">
             <table class="table">
               <tr>
                        <td>IDPublicacion</td>
                        <td>CI</td>
                        <td>Nombre de publicacion</td>
                        <td>Tipo</td>
                        <td>Comentario</td>
                      </tr>

                        <tr>
                         <td><?php echo $resultados[$i]["id"];?></td>
                         <td><?php echo $resultados[$i]["cipersona"];?></td>
                         <td><?php echo $resultados[$i]["nombrepubli"];?></td>
                         <td><?php echo $resultados[$i]["tipo"];?></td>
                         <?php
                         if ($tipo == "Venta"){
                          ?>
                         <td>
                           <?php echo $resultados[$i]["comentarioven"];?></td>
                        </tr>
                        <?php
                        }
                         ?>
                         <?php
                         if ($tipo == "Permuta"){
                          ?>
                         <td>
                           <?php echo $resultados[$i]["comentarioper"];?></td>
                        </tr>
                        <?php
                        }
                         ?>

                         <?php
                         if ($tipo == "Subasta"){
                          ?>
                         <td>
                           <?php echo $resultados[$i]["comentariosub"];?></td>
                        </tr>
                        <?php
                        }
                         ?>

                         <?php
                         if ($tipo == "Publicacion"){
                          ?>
                         <td>
                           <?php echo $resultados[$i]["comentariopub"];?></td>
                        </tr>
                        <?php
                        }
                         ?>

                    </table>
              </div>
          </div>
        </section>

        <?php  if ($tipo == "Venta"){
        ?>
        <input type="text" class="form-control" style="visibility:hidden" id="id" name="id" value='<?php echo $resultados[$i]["idcomvenpublicacion"];?>'>
        <?php
        }
        ?>

        <?php  if ($tipo == "Subasta"){
        ?>
        <input type="text" class="form-control" style="visibility:hidden" id="id" name="id" value='<?php echo $resultados[$i]["idcomsubpublicacion"];?>'>
        <?php
        }
        ?>

        <?php  if ($tipo == "Permuta"){
        ?>
        <input type="text" class="form-control" style="visibility:hidden" id="id" name="id" value='<?php echo $resultados[$i]["idcompermuta"];?>'>
        <?php
        }
        ?>

        <?php  if ($tipo == "Publicacion"){
        ?>
        <input type="text" class="form-control" style="visibility:hidden" id="id" name="id" value='<?php echo $resultados[$i]["idcompublicacion"];?>'>
        <?php
        }
        ?>

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
