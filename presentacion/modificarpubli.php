<?php
Require_once("../logica/funciones.php");
require_once("../logica/sesiones.php");
Require_once('../presentacion/menu.php');

$conex=conectar();
$ID = $_GET["ID"];

$consultas="select id,cipersona,nombre,apellido,email,nombrepubli,descripcion,categoria,stock,tipo
            from publicacion,persona,permuta where cipersona=ci and id=$ID;";

$result=$conex->prepare($consultas);
$result->execute();
$resultados=$result->fetchAll();

for ($i=0;$i<count($resultados);$i++) {
?>

<!DOCTYPE html>

<html lang="en">
  <body>
    <section  id="services-sec">
           <form action="../logica/procesarpublicacion.php" method="POST">
             <div class="container">
               <form>

                   <div class="col-md-6 ">
                       <div class="form-group">
                            Nombre de publicacion
                           <input type="text" class="form-control" id="nombrepubli" name="nombrepubli" value='<?php echo $resultados[$i]["nombrepubli"];?>'>
                       </div>
                   </div>

                   <div class="col-md-6 ">
                           <div class="form-group">
                              Descripcion
                               <input type="text" class="form-control" id="descripcion" name="descripcion" value='<?php echo $resultados[$i]["descripcion"];?>'>
                           </div>
                       </div>
                   </div>

                   <div class="col-md-6 ">
                       <div class="form-group">
                            Categoria
                           <input type="text" class="form-control" id="categoria" name="categoria" value='<?php echo $resultados[$i]["categoria"];?>'>
                       </div>
                   </div>

                   <div class="col-md-6 ">
                       <div class="form-group">
                            Stock
                           <input type="text" class="form-control" id="stock" name="stock" value='<?php echo $resultados[$i]["stock"];?>'>
                       </div>
                   </div>

                   <div class="col-md-6 ">
                       <div class="form-group">
                            Tipo
                           <input type="text" class="form-control" id="tipo" name="tipo" value=<?php echo $resultados[$i]["tipo"];?>>
                       </div>
                   </div>
                             <input type="text" class="form-control" style="visibility:hidden" id="id" name="id" value='<?php echo $resultados[$i]["id"];?>'>
                  <button type="submit" class="btn btn-success">Modificar</button>

               </form>
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
<?php
}
 ?>
