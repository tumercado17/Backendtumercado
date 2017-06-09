<?php
Require_once('../clases/persona.php');
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
    location.href="../presentacion/estadisticas.php";
  </script>
  <?php
}

?>
<!DOCTYPE html>

<html lang="en">
     <form action="sancionadmin.php" id="FrmListadoUsuarios" method="POST">
     <section  id="services-sec">
       <div class="container">
         <h1>Gestion de administradores</h1>
           <div class="row text-center">
             <table class="table">
               <tr>
                 <td>ID</td>
                 <td>Ci</td>
                 <td>Nombre</td>
                 <td>Apellido</td>
                 <td>Email</td>
                 <td>Pais</td>
                 <td>Calle</td>
                 <td>Numero</td>
                 <td>Telefono</td>
                 <td>Grado</td>
                 <td>-</td>
                 <td>-</td>
                 <td>-</td>
								</tr>

                <?php

                //Hace la conexion y la consulta para luego mostrar los datos de persona
                $conex=conectar();
                $sql ="select idadministrador,ci,nombre,apellido,email,pais,contrasena,calle,numero,cipersona,telefono,grado from persona,telefonopersona,administrador
                      where (persona.ci=telefonopersona.cipersona) and (persona.ci=administrador.ciadministrador);";
                $result=$conex->prepare($sql);
                $result->execute();
                $resultados=$result->fetchAll();

        				for ($i=0;$i<count($resultados);$i++) {
                $IDu=$resultados[$i]["idadministrador"]; //tama el id de la tabla para enviarlo al otro formulario
        				?>

                 <tr>
                  <td><?php echo $resultados[$i]["idadministrador"];?></td>
                  <td><?php echo $resultados[$i]["ci"];?></td>
        					<td><?php echo $resultados[$i]["nombre"];?></td>
        					<td><?php echo $resultados[$i]["apellido"];?></td>
        					<td><?php echo $resultados[$i]["email"];?></td>
                  <td><?php echo $resultados[$i]["pais"];?></td>
                  <td><?php echo $resultados[$i]["calle"];?></td>
                  <td><?php echo $resultados[$i]["numero"];?></td>
                  <td><?php echo $resultados[$i]["telefono"];?></td>
                  <td><?php echo $resultados[$i]["grado"];?></td>
                  <td><a href="modificaradmin.php?ID=<?php echo $IDu;?>">Modificar</a></td>
                  <td><a href="sancionadmin.php?ID=<?php echo $IDu;?>">Sancionar</a></td>
                  <td><a href="borraradmin.php?ID=<?php echo $IDu;?>">Borrar</a></td>
                  </tr>

                <?php
              }
                 ?>
             </table>
           </div>
       </div>
     </form>
     </section>

	  <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap.min.js"></script>
    <script src="assets/plugins/jquery.isotope.min.js"></script>
    <script src="assets/plugins/jquery.prettyPhoto.js"></script>
    <script src="assets/js/custom.js"></script>

</body>
</html>
