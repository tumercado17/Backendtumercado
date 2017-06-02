<?php
Require_once('../clases/persona.php');
Require_once('../clases/usuario.class.php');
Require_once('../logica/funciones.php');
Require_once('../logica/sesiones.php');
Require_once('../presentacion/menu.php');

?>
<!DOCTYPE html>

<html lang="en">
  <body>
    <section  id="services-sec">
       <div class="container"  >
           <div class="row text-center">
             <table class="table">
               <tr>
                 <td>IDusuario</td>
                 <td>Cedula</td>
                 <td>Nombre</td>
                 <td>Apellido</td>
                 <td>Email</td>
                 <td>Calle</td>
                 <td>Numero</td>
                 <td>calificacion</td>
                 <td>Tipo</td>
                 <td>Estado</td>
                 <td>-</td>
                 <td>-</td>
                 <td>-</td>
								</tr>

                <?php

                //Hace la conexion y la consulta para luego mostrar los datos de persona
                $conex=conectar();
                $sql ="select usuario.idusuario,ciusuario,nombre,apellido,email,calle,numero,calificacion,nombreusu,estado
                        from usuario,nombreusuario,sansiona,persona where (usuario.idusuario=nombreusuario.idusuario)
                        and (persona.ci=usuario.ciusuario) and (ciusuariosan=ciusuario);";
                $result=$conex->prepare($sql);
                $result->execute();
                $resultados=$result->fetchAll();
                //$sql=mysql_fetch_array($datos_u);
        				for ($i=0;$i<count($resultados);$i++) {

                $IDu=$resultados[$i]["idusuario"]; //tama el id de la tabla para enviarlo al otro formulario
        				?>

                 <tr>
                  <td><?php echo $resultados[$i]["idusuario"];?></td>
        					<td><?php echo $resultados[$i]["ciusuario"];?></td>
        					<td><?php echo $resultados[$i]["nombre"];?></td>
        					<td><?php echo $resultados[$i]["apellido"];?></td>
                  <td><?php echo $resultados[$i]["email"];?></td>
                  <td><?php echo $resultados[$i]["calle"];?></td>
                  <td><?php echo $resultados[$i]["numero"];?></td>
                  <td><?php echo $resultados[$i]["calificacion"];?></td>
                  <td><?php echo $resultados[$i]["nombreusu"];?></td>
                  <td><?php echo $resultados[$i]["estado"];?></td>

                  <td><?php if ($_SESSION["GRADO"]=="Lector de registro" or $_SESSION["GRADO"]=="Penalizador"){
                  }else{
                    ?>
                    <a href="modifiusu.php?ID=<?php echo $IDu;?>">Modificar</a></td>
                    <?php
                  }
                     ?>
                  <td><?php if ($_SESSION["GRADO"]=="Lector de registro"){
                  }else{
                    ?><a href="sancionusu.php?ID=<?php echo $IDu;?>">Sancionar</a></td>
                    <?php
                  }
                     ?>
                  <td><?php if ($_SESSION["GRADO"]=="Lector de registro" or $_SESSION["GRADO"]=="Penalizador"){
                  }else{
                    ?><a href="borrarusu.php?ID=<?php echo $IDu;?>">Borrar</a></td>
                    <?php
                  }
                     ?>
                </tr>

                <?php
              }
                 ?>
             </table>
           </div>
       </div>
     </section>


    <!--FOOTER SECTION -->
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
