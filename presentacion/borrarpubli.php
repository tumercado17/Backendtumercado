<?php
Require_once("../logica/funciones.php");
Require_once("../logica/sesiones.php");
Require_once('../presentacion/menu.php');

$conex=conectar();
$ID = $_GET["ID"];
$tipo = $_SESSION["TIPO"];

if ($tipo == "Venta"){
$consultas="SELECT id,cipersona,nombrepubli,tipo,comentarioven,idcomvenpublicacion  FROM  publicacion
            INNER JOIN comentariovendecompra ON idcomvenpublicacion = id WHERE id=$ID";

}elseif ($tipo == "Subasta") {
  $consultas="SELECT id,cipersona,nombrepubli,tipo,comentariosub,idcomsubpublicacion  FROM  publicacion
              INNER JOIN comentariosubasta ON idcomsubpublicacion = id WHERE id=$ID;";

}elseif ($tipo == "Permuta") {

  $consultas="SELECT id,cipersona,nombrepubli,tipo,comentarioper,idcompermuta  FROM  publicacion
              INNER JOIN comentariopermuta ON idcompermuta = id WHERE id=$ID;";
  }

$result=$conex->prepare($consultas);
$result->execute();
$resultados=$result->fetchAll();

for ($i=0;$i<count($resultados);$i++) {

?>

<!DOCTYPE html>

<html lang="en">
<body>
    <section  id="services-sec">
              <form action="../logica/procesarborr.php" method="POST">
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



                    </table>
                  </div>
              </div>
            </section>

            <input type="text" class="form-control" style="visibility:hidden" id="id" name="id" value='<?php echo $resultados[$i]["id"];?>'>
            <input type="text" class="form-control" style="visibility:hidden" id="cipersona" name="cipersona" value='<?php echo $resultados[$i]["cipersona"];?>'>
            <button type="submit" class="btn btn-success" align="center">Confirmar Borrado</button>
          </form>

    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap.min.js"></script>
    <script src="assets/plugins/jquery.isotope.min.js"></script>
    <script src="assets/plugins/jquery.prettyPhoto.js"></script>
    <script src="assets/js/custom.js"></script>

</body>
</html>
<?php
}
 ?>
