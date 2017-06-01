<?php
Require_once("../logica/funciones.php");
require_once("../logica/sesiones.php");
Require_once('../presentacion/menu.php');


  $conex=conectar();
  $ID = $_GET["ID"];

    $consultas="select idadministrador,ci,nombre,apellido,email,grado
                from persona,telefonopersona,administrador where (persona.ci=telefonopersona.cipersona)
                and (persona.ci=administrador.ciadministrador) and idadministrador=$ID;";

  $result=$conex->prepare($consultas);
  $result->execute();
  $resultados=$result->fetchAll();

  for ($i=0;$i<count($resultados);$i++) {

  ?>

<!DOCTYPE html>

<html lang="en">
  <body>
      <section  id="services-sec">
              <form action="../logica/procesarborraradmin.php" method="POST">
              <div class="container">
                  <div class="row text-center">
                    <table class="table">
                      <tr>
                        <td>ID</td>
                        <td>CI</td>
                        <td>Nombre</td>
                        <td>Apellido</td>
                        <td>Email</td>
                        <td>Grado</td>
                        </tr>

                        <tr>
                         <td><?php echo $resultados[$i]["idadministrador"];?></td>
                         <td><?php echo $resultados[$i]["ci"];?></td>
                         <td><?php echo $resultados[$i]["nombre"];?></td>
                         <td><?php echo $resultados[$i]["apellido"];?></td>
                         <td><?php echo $resultados[$i]["email"];?></td>
                         <td><?php echo $resultados[$i]["grado"];?></td>
                         </tr>

                    </table>
                  </div>
              </div>
            </section>
            <input type="text" class="form-control" style="visibility:hidden" id="ci" name="ci" value='<?php echo $resultados[$i]["ci"];?>'>
            <input type="text" class="form-control" style="visibility:hidden" id="idadministrador" name="idadministrador" value='<?php echo $resultados[$i]["idusuario"];?>'>
            <button type="submit" class="btn btn-success" align="center">Borrar administrador</button>
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
