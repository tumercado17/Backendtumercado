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

    $consultas="select usuario.idusuario,ciusuario,nombre,apellido,ci,email,calle,numero,calificacion,nombreusu from
                usuario,nombreusuario,persona where (usuario.idusuario=nombreusuario.idusuario)
                and (persona.ci=usuario.ciusuario) and usuario.idusuario=$ID;";

  $result=$conex->prepare($consultas);
  $result->execute();
  $resultados=$result->fetchAll();

  for ($i=0;$i<count($resultados);$i++) {

  ?>

<!DOCTYPE html>

<html lang="en">
<body>
<section  id="services-sec">
              <form action="../logica/procesarborrarusu.php" method="POST">
              <div class="container">
                  <div class="row text-center">
                    <h1>Borrar Usuario</h1>
                    <table class="table">
                      <tr>
                        <td>CI</td>
                        <td>Nombre</td>
                        <td>Apellido</td>
                        <td>Email</td>
                        <td>Calle</td>
                        <td>Numero</td>
                        <td>calificacion</td>
                        </tr>

                        <tr>
                         <td><?php echo $resultados[$i]["ci"];?></td>
                         <td><?php echo $resultados[$i]["nombre"];?></td>
                         <td><?php echo $resultados[$i]["apellido"];?></td>
                         <td><?php echo $resultados[$i]["email"];?></td>
                         <td><?php echo $resultados[$i]["calle"];?></td>
                         <td><?php echo $resultados[$i]["numero"];?></td>
                         <td><?php echo $resultados[$i]["calificacion"];?></td>
                         </tr>

                    </table>
                  </div>
              </div>
            </section>
            <input type="text" class="form-control" style="visibility:hidden" id="ci" name="ci" value='<?php echo $resultados[$i]["ci"];?>'>
            <input type="text" class="form-control" style="visibility:hidden" id="idusuario" name="idusuario" value='<?php echo $resultados[$i]["idusuario"];?>'>
            <button type="submit" class="btn btn-success" align="center">Borrar Usuario</button>
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
