<?php
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

 ?>
﻿<!DOCTYPE html>

<html lang="en">
  <body>
    <section  id="services-sec">
      <h1>Formulario Nuevo administrador</h1>
       <form action="../logica/procesarnuevoadmin.php" method="POST">
         <div class="container">
           <form>
               <div class="col-md-6 ">
                   <div class="form-group">
                     Cedula de identidad:
                       <input type="text" class="form-control" id="ci" name="ci" required="required" placeholder="Cedula de identidad">
                   </div>
               </div>

               <div class="row">
                   <div class="col-md-6 ">
                       <div class="form-group">
                         Nombre:
                           <input type="text" class="form-control" id="nombre" name="nombre" required="required" placeholder="Nombre">
                       </div>
                   </div>
                   <div class="col-md-6 ">
                       <div class="form-group">
                         Apellido:
                           <input type="text" class="form-control" id="apellido" name="apellido" required="required" placeholder="Apellido">
                       </div>
                   </div>
               </div>

               <div class="col-md-6 ">
                   <div class="form-group">
                     Password:
                       <input type="password" class="form-control" id="contrasena" name="contrasena" required="required" placeholder="Contraseña">
                   </div>
               </div>

               <div class="col-md-6 ">
                   <div class="form-group">
                     Correo Electronico:
                       <input type="text" class="form-control" id="email" name="email" required="required" placeholder="CorreoElectronico">
                   </div>
               </div>

               <div class="col-md-6 ">
                   <div class="form-group">
                     Telefono:
                       <input type="text" class="form-control" id="telefono" name="telefono" required="required" placeholder="Telefono">
                   </div>
               </div>

               <div class="col-md-6 ">
                   <div class="form-group">
                     Calle:
                       <input type="text" class="form-control" id="calle" name="calle" required="required" placeholder="Calle">
                   </div>
               </div>

               <div class="col-md-6 ">
                   <div class="form-group">
                     Numero de Puerta:
                       <input type="text" class="form-control" id="numero" name="numero" required="required" placeholder="Numeropuerta">
                   </div>
               </div>

               <div class="row">
                   <div class="col-md-3 ">
                       <div class="form-group">
                         Pais:
                          <select class="form-control" id="pais" name="pais" required="required" placeholder="Pais">
                            <option value="Uruguay">Uruguay</option>
                            <option value="Argentina">Argentina</option>
                            <option value="Colombia">Colombia</option>
                          </select>
                       </div>
                   </div>
               </div>

               <div class="col-md-6 ">
                   <div class="form-group">
                     Tarjeta:
                       <input type="text" class="form-control" id="tarjeta" name="tarjeta" required="required" placeholder="NumeroTarjeta">
                   </div>
               </div>

               <div class="row">
                   <div class="col-md-3 ">
                       <div class="form-group">
                         Tipo de administrador:
                          <select class="form-control" id="grado" name="grado" required="required" placeholder="Grado">
                            <option value="Penalizador">Penalizador</option>
                            <option value="Administrador del sistema">Administrador del sistema</option>
                            <option value="Administrador de frontend">Administrador de frontend</option>
                            <option value="Lector de registro">Lector de registro</option>
                          </select>
                       </div>
                   </div>
               </div>
              <button type="submit" class="btn btn-success">Registrar</button>
           </form>
         </div>
     </section>

    <div id="footer">
    </div>

    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap.min.js"></script>
    <script src="assets/plugins/jquery.isotope.min.js"></script>
    <script src="assets/plugins/jquery.prettyPhoto.js"></script>
    <script src="assets/js/custom.js"></script>

</body>
</html>
