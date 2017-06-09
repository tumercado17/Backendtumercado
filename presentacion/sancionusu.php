<?php
Require_once("../logica/funciones.php");
require_once("../logica/sesiones.php");
Require_once('../presentacion/menu.php');

  $conex=conectar();
  $ID = $_GET["ID"];

    $consultas="select usuario.idusuario,ciusuario,nombre,apellido,ci,email,calle,numero,calificacion,nombreusu,estado from
                usuario,nombreusuario,sansiona,persona where (usuario.idusuario=nombreusuario.idusuario)
                and (persona.ci=usuario.ciusuario) and (usuario.idusuario=$ID and ciusuariosan=ciusuario)";

  $result=$conex->prepare($consultas);
  $result->execute();
  $resultados=$result->fetchAll();

  for ($i=0;$i<count($resultados);$i++) {

  ?>

<!DOCTYPE html>

<html lang="en">
  <body>
    <section  id="services-sec">
              <form action="../logica/procesarsanusu.php" method="POST">
              <div class="container">
                  <div class="row text-center">
                    <h1>Sancionar Usuario</h1>
                    <table class="table">
                      <tr>
                        <td>CI</td>
                        <td>Nombre</td>
                        <td>Apellido</td>
                        <td>Email</td>
                        <td>Calle</td>
                        <td>Numero</td>
                        <td>Calificacion</td>
                        <td>Estado</td>
                        </tr>

                        <tr>
                         <td><?php echo $resultados[$i]["ci"];?></td>
                         <td><?php echo $resultados[$i]["nombre"];?></td>
                         <td><?php echo $resultados[$i]["apellido"];?></td>
                         <td><?php echo $resultados[$i]["email"];?></td>
                         <td><?php echo $resultados[$i]["calle"];?></td>
                         <td><?php echo $resultados[$i]["numero"];?></td>
                         <td><?php echo $resultados[$i]["calificacion"];?></td>
                         <td><?php echo $resultados[$i]["estado"];?></td>
                         </tr>

                    </table>
                  </div>
              </div>
            </section>

            <div class="row">
                <div class="col-md-3 ">
                    <div class="form-group">
                       <select class="form-control" id="sancion" name="sancion">
                         <option value="No realiza transacciones">Prohibir realizar transacciones</option>
                         <option value="Sin suspencion">Quitar suspencion</option>
                       </select>
                    </div>
                </div>
            </div>
            <input type="text" class="form-control" style="visibility:hidden" id="ci" name="ci" value='<?php echo $resultados[$i]["ci"];?>'>
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
