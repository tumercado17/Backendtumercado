<?php
Require_once('../clases/persona.php');
Require_once('../clases/usuario.class.php');
Require_once('../logica/funciones.php');
require_once("../logica/sesiones.php");
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
                 <td>IDPublicacion</td>
                 <td>CI</td>
                 <td>Nombre</td>
                 <td>Apellido</td>
                 <td>Email</td>
                 <td>Nombre Publicacion</td>
                 <td>Descripcion</td>
                 <td>Categoria</td>
                 <td>Stock</td>
                 <td>Tipo</td>
                 <td>--------</td>
                 <td>--------</td>
                 <td>--------</td>
								</tr>

                <?php

                //Hace la conexion y la consulta para luego mostrar los datos de persona
                $conex=conectar();
                $sql ="select id,cipersona,nombre,apellido,email,nombrepubli,descripcion,categoria,stock,tipo
                      from publicacion,persona,permuta,subasta,vendecompra where cipersona=ci group by id order by ci;";
                $result=$conex->prepare($sql);
                $result->execute();
                $resultados=$result->fetchAll();
                //$sql=mysql_fetch_array($datos_u);
        				for ($i=0;$i<count($resultados);$i++) {

                $IDu=$resultados[$i]["id"]; //tama el id de la tabla para enviarlo al otro formulario
        				?>

                 <tr>
                  <td><?php echo $resultados[$i]["id"];?></td>
        					<td><?php echo $resultados[$i]["cipersona"];?></td>
        					<td><?php echo $resultados[$i]["nombre"];?></td>
        					<td><?php echo $resultados[$i]["apellido"];?></td>
                  <td><?php echo $resultados[$i]["email"];?></td>
                  <td><?php echo $resultados[$i]["nombrepubli"];?></td>
                  <td><?php echo $resultados[$i]['descripcion'];?></td>
                  <td><?php echo $resultados[$i]["categoria"];?></td>
                  <td><?php echo $resultados[$i]["stock"];?></td>
                  <td><?php echo $resultados[$i]["tipo"];?></td>
                  <td><a href="modificarpubli.php?ID=<?php echo $IDu;?>">Modificar</a></td>
                  <td><a href="sancion.php?ID=<?php echo $IDu;?>">Sancionar</a></td>
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
