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

$consultas="select id,cipersona,nombre,apellido,email,nombrepubli,precio,descripcion,categoria,stock,tipo
            from publicacion,persona,permuta where cipersona=ci and id=$ID;";

$result=$conex->prepare($consultas);
$result->execute();
$resultados=$result->fetchAll();

for ($i=0;$i<count($resultados);$i++) {

?>

<!DOCTYPE html>

<html lang="en">
  <body>
    <section  id="services-sec">
              <form action="../logica/procesarsus.php" method="POST">
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
                        <td>Precio</td>
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
                         <td><?php echo $resultados[$i]["precio"];?></td>
                         <td><?php echo $resultados[$i]['descripcion'];?></td>
                         <td><?php echo $resultados[$i]["categoria"];?></td>
                         <td><?php echo $resultados[$i]["stock"];?></td>
                         <td><?php echo $resultados[$i]["tipo"];?></td>
                       </tr>

                    </table>
                  </div>
              </div>
            </section>

            <div class="row">
                <div class="col-md-3 ">
                    <div class="form-group">
                       <select class="form-control" id="sancion" name="sancion">
                         <option value="Suspendido por 2 transacciones">Aplicar suspencion de calificacion</option>
                         <option value="Sin suspencion">Quitar suspencion de calificacion</option>
                       </select>
                    </div>
                </div>
            </div>
            <input type="text" class="form-control" style="visibility:hidden" id="id" name="id" value='<?php echo $resultados[$i]["id"];?>'>
            <input type="text" class="form-control" style="visibility:hidden" id="cipersona" name="cipersona" value='<?php echo $resultados[$i]["cipersona"];?>'>
            <button type="submit" class="btn btn-success" align="center">Aplicar Sancion</button>
          </form>
  <div id="footer">
      2017 www.tumercado.com | Todos los derechos reservados

    </div>

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
