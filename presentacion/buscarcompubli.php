<?php
Require_once('../clases/persona.php');
Require_once('../clases/usuario.class.php');
Require_once('../clases/publicacion.php');
Require_once('../logica/funciones.php');
require_once('../logica/sesiones.php');
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
       <div class="container">
         <form action="../logica/procesarBusqueda.php" method="POST">
           <div class="row text-center">
             <h1>Administrar comentarios de usuarios</h1>

             <div class="row">
                 <div class="col-md-3 ">
                     <div class="form-group">
                         Busqueda:
                         <input type="text" id="nombre" name="nombre" class="form-control" required="required" placeholder="Nombre  de publicacion">
                     </div>
                 </div>
             </div>

             <div class="row">
                 <div class="col-md-3 ">
                     <div class="form-group">
                       Tipo de publicacion
                        <select class="form-control" id="tipo" name="tipo" placeholder="Pais">
                          <option value="Venta">Venta</option>
                          <option value="Permuta">Permuta</option>
                          <option value="Subasta">Subasta</option>
                        </select>
                     </div>
                 </div>
             </div>
             <div class="form-group">
                 <button type="submit" class="btn btn-success">Buscar</button>
             </div>
           </div>
         </div>
     </section>

<?php
if(isset($_SESSION["BUS"])){
  if(!empty($_SESSION["BUS"])){
    $array=$_SESSION["BUS"];
?>
<section  id="services-sec">
   <div class="container">
       <div class="row text-center">
         <table class="table">
           <tr>
             <td>ID</td>
             <td>Nombre publicacion</td>
             <td>CIPersona</td>
             <td>Tipo</td>
             <td>Comentario</td>
             <td>-------------</td>
            </tr>
<?php
            for ($i=0;$i<count($array);$i++){
              $IDu = $array[$i]["id"];
              $_SESSION["TIPO"] = $tipo = $array[$i]["tipo"];
              $tipo = $array[$i]["tipo"];
 ?>
            <tr>
             <td><?php echo $array[$i]["id"];?></td>
             <td><?php echo $array[$i]["nombrepubli"];?></td>
             <td><?php echo $array[$i]["cipersona"];?></td>
             <td><?php echo $array[$i]["tipo"];?></td>
             <?php
             if ($tipo == "Subasta"){
               ?>
               <td><?php echo $array[$i]["comentariosub"];?></td>
               <?php
             }
             ?>
            </tr>
              <?php
              if ($tipo == "Venta"){
                ?>
                <td><?php echo $array[$i]["comentarioven"];?></td>
                <?php
              }
              ?>
              <?php
              if ($tipo == "Permuta"){
                ?>
                <td><?php echo $array[$i]["comentarioper"];?></td>
                <?php
              }
              ?>
              <td><a href="borrarpubli.php?ID=<?php echo $IDu;?>">Borrar</a></td>
             </tr>
             <?php

           }
              ?>


        </table>
      </div>
    </div>
  </section>
                <?php

            }
          }

                //Hace la conexion y la consulta para luego mostrar los datos de persona
                /* $conex=conectar();
                $sql ="select vendecompraid,id,cicomvenpersona,nombre,apellido,comentarioven,tipo,fechacomven
                      from persona,comentariovendecompra,publicacion where cicomvenpersona=ci and id=idcomvenpublicacion
                      order by vendecompraid;";

                $result=$conex->prepare($sql);
                $result->execute();
                $resultados=$result->fetchAll();
                //$sql=mysql_fetch_array($datos_u);
        				for ($i=0;$i<count($resultados);$i++) {

                $IDu=$resultados[$i]["vendecompraid"]; //tama el id de la tabla para enviarlo al otro formulario
        				?>

                 <tr>
                  <td><?php echo $resultados[$i]["vendecompraid"];?></td>
        					<td><?php echo $resultados[$i]["id"];?></td>
        					<td><?php echo $resultados[$i]["cicomvenpersona"];?></td>
        					<td><?php echo $resultados[$i]["nombre"];?></td>
                  <td><?php echo $resultados[$i]["apellido"];?></td>
                  <td><?php echo $resultados[$i]["comentarioven"];?></td>
                  <td><?php echo $resultados[$i]["tipo"];?></td>
                  <td><?php echo $resultados[$i]["fechacomven"];?></td>
                  <td><a href="borrarpubli.php?ID=<?php echo $IDu;?>">Borrar</a></td>
                </tr>

                <?php
              }
                 ?>
             </table>
           </div>
       </div>
     </section>

     echo $_SESSION["BUS"];
     if(isset($_SESSION["BUS"])){
       if(!empty($_SESSION["BUS"])){
         	 $array=$_SESSION["BUS"];
           $val = count($array);
           echo '<section  id="services-sec">';
              echo '<div class="container"  >';
                 echo '<div class="row text-center">';
                   echo  '<table class="table">';
                     echo '<tr>';
                       echo '<td>Nombre</td>';
                       echo '<td>Categoría</td>';
                       echo '<td>Stock</td>';
                       echo '<td>Fecha</td>';
                       echo '<td>Precio</td>';
                       echo '<td>Tipo</td>';
                       echo '<td>Vendedor</td>';
                     echo '</tr>';
           for ($i = 0; $i < $val; $i ++){
                       echo '<tr>';
                         echo '<td>' . $array[$i]["id"] . '</td>';
                         echo '<td>' . $array[$i]["cipersona"] . '</td>';
                         echo '<td>' . $array[$i]['stock'] . '</td>';
                         echo '<td>' . $array[$i]['fecha'] . '</td>';
                         echo '<td>' . $array[$i]['precio'] . '</td>';
                         echo '<td>' . $array[$i]['tipo'] . '</td>';
                         echo '<td>' . $array[$i]['nombre'] . '</td>';
                       echo '</tr>';
           }

                     echo '</table>';
                   echo '</div>';
               echo '</div>';
             echo '</section>';
       }
     }
     */
?>
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap.min.js"></script>
    <script src="assets/plugins/jquery.isotope.min.js"></script>
    <script src="assets/plugins/jquery.prettyPhoto.js"></script>
    <script src="assets/js/custom.js"></script>

</body>
</html>
