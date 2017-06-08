<?php
Require_once('../clases/persona.php');
Require_once('../clases/usuario.class.php');
Require_once('../logica/funciones.php');
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
?>

<!DOCTYPE html>

<html lang="en">
<body>
<section  id="services-sec">
       <div class="container"  >
           <div class="row text-center">
             <table class="table">
               <tr>
                 <td>IDComentario</td>
                 <td>IDpublicacion</td>
                 <td>CI</td>
                 <td>Nombre</td>
                 <td>Apellido</td>
                 <td>Comentario</td>
                 <td>Tipo</td>
                 <td>Fecha</td>
                 <td>--------</td>
								</tr>

                <?php

                //Hace la conexion y la consulta para luego mostrar los datos de persona
                $conex=conectar();
                $sql ="select subastaid,id,cicomsubpersona,nombre,apellido,comentariosub,tipo,fechacomsub
                       from persona,comentariosubasta,publicacion
                       where cicomsubpersona=ci and id=idcomsubpublicacion order by subastaid;";

                $result=$conex->prepare($sql);
                $result->execute();
                $resultados=$result->fetchAll();
                //$sql=mysql_fetch_array($datos_u);
        				for ($i=0;$i<count($resultados);$i++) {

                $IDu=$resultados[$i]["subastaid"]; //tama el id de la tabla para enviarlo al otro formulario
        				?>

                 <tr>
                  <td><?php echo $resultados[$i]["subastaid"];?></td>
        					<td><?php echo $resultados[$i]["id"];?></td>
        					<td><?php echo $resultados[$i]["cicomsubpersona"];?></td>
        					<td><?php echo $resultados[$i]["nombre"];?></td>
                  <td><?php echo $resultados[$i]["apellido"];?></td>
                  <td><?php echo $resultados[$i]["comentariosub"];?></td>
                  <td><?php echo $resultados[$i]["tipo"];?></td>
                  <td><?php echo $resultados[$i]["fechacomsub"];?></td>
                  <td><a href="borrarpubli.php?ID=<?php echo $IDu;?>">Borrar</a></td>
                </tr>

                <?php
              }
                 ?>
             </table>
           </div>
       </div>
     </section>

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
