<?php
Require_once('../clases/persona.php');
Require_once('../logica/funciones.php');
Require_once('../logica/sesiones.php');
Require_once('../presentacion/menu.php');

$ID = $_SESSION["ci"];

$conex=conectar();
$sql ="select * from administrador,persona,telefonopersona where ciadministrador=$ID and ci=$ID and cipersona=$ID;";
$result=$conex->prepare($sql);
$result->execute();
$resultados=$result->fetchAll();

$IDu=$resultados[0]["idadministrador"];

?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
  <meta charset="utf-8">
  <title>Tumercado-Perfil</title>
  <body>

  <section id="banner">

  </section>
  <section id="call-to-action-2">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-sm-9">
          <h3>Perfil de <?php echo $_SESSION["nombre"]; echo " " . $_SESSION["apellido"];?></h3>
          <p>Listado general de todos los datos del administrador</p>
        </div>
      </div>
    </div>
  </section>


  <section id="content">

  <div class="container content">
    <div class="row">
      <section  id="services-sec">
        <div class="container">
         <div class="row text-center">
           <table class="table">
             <tr>
                 <td style="color:red">Datos personales</td>
               </tr>

               <tr>
                 <td>Cedula de identidad:</td>
                  <td>
                    <?php echo $resultados[0]["ciadministrador"];?>
                  </td>
                </tr>

                <tr>
                  <td>Nombre:</td>
                   <td>
                     <?php echo $resultados[0]["nombre"];?>
                   </td>
                 </tr>

                 <tr>
                   <td>Apellido:</td>
                    <td>
                      <?php echo $resultados[0]["apellido"];?>
                    </td>
                  </tr>

                  <tr>
                    <td>Email:</td>
                     <td>
                       <?php echo $resultados[0]["email"];?>
                     </td>
                   </tr>

                   <tr>
                     <td>Telefono:</td>
                      <td>
                        <?php echo $resultados[0]["telefono"];?>
                      </td>
                    </tr>

                   <tr>
                     <td>Pais:</td>
                      <td>
                        <?php echo $resultados[0]["pais"];?>
                      </td>
                    </tr>

                    <tr>
                      <td>Grado:</td>
                       <td>
                         <?php echo $resultados[0]["grado"];?>
                       </td>
                     </tr>

               <tr>
                 <td colspan="5">-</td>
               </tr>

               <tr>
                 <td>Configuracion:</td>
                 <td>
                   <?php
                   if ($_SESSION["GRADO"]=="Administrador del sistema"){
                   ?>
                         <a href="modificaradmin.php?ID=<?php echo $IDu;?>">Modificar datos personales</a>
                         <a href="borraradmin.php?ID=<?php echo $IDu;?>">Borrar cuenta</a>
                      <?php
                      }
                       ?>
                       seguridad, reclamos
                    </td>
               </tr>
              </table>
         </div>
     </div>
   </form>

    <!-- sdasdasdasd -->
   </div>
 </div>
   </section>

   <footer>

   <div id="sub-footer">
     <div class="container">
       <div class="row">
         <div class="col-lg-6">
           <div class="copyright">
             <p>
               <span>&copy; Tumercado.com 2017 All right reserved. SkyCloudDevelopement </span>
             </p>
           </div>
         </div>
       </div>
     </div>
   </div>
   </footer>
   </div>
   <a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
   <!-- javascript
     ================================================== -->
   <!-- Placed at the end of the document so the pages load faster -->
   <script src="assets/js/jquery.js"></script>
   <script src="assets/js/jquery.easing.1.3.js"></script>
   <script src="assets/js/bootstrap.min.js"></script>
   <script src="assets/js/jquery.fancybox.pack.js"></script>
   <script src="assets/js/jquery.fancybox-media.js"></script>
   <script src="assets/js/jquery.flexslider.js"></script>
   <script src="assets/js/animate.js"></script>
   <!-- Vendor Scripts -->
   <script src="assets/js/modernizr.custom.js"></script>
   <script src="assets/js/jquery.isotope.min.js"></script>
   <script src="assets/js/jquery.magnific-popup.min.js"></script>
   <script src="assets/js/animate.js"></script>
   <script src="assets/js/custom.js"></script>
   </body>
   </html>
