<?php
Require_once("../logica/funciones.php");
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
              <form action="../logica/procesarsanadmin.php" method="POST">
              <div class="container">
                  <div class="row text-center">
                    <table class="table">
                      <tr>
                        <td>CI</td>
                        <td>Nombre</td>
                        <td>Apellido</td>
                        <td>Email</td>
                        <td>Grado</td>
                        </tr>

                        <tr>
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
