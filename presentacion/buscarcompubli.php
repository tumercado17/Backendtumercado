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
             <td>--</td>
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
              <td><a href="borrarcompubli.php?ID=<?php echo $IDu;?>">Borrar</a></td>
             </tr>
             <?php

           }$_SESSION["BUS"] = null; //Vuelve la busqueda a cero
              ?>


        </table>
      </div>
    </div>
  </section>
                <?php

            }
          }
?>
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap.min.js"></script>
    <script src="assets/plugins/jquery.isotope.min.js"></script>
    <script src="assets/plugins/jquery.prettyPhoto.js"></script>
    <script src="assets/js/custom.js"></script>

</body>
</html>
