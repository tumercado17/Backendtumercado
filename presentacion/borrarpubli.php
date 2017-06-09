<?php
Require_once("../logica/funciones.php");
Require_once("../logica/sesiones.php");
Require_once('../presentacion/menu.php');

$conex=conectar();
$ID = $_GET["ID"];

$consultas="select id,cipersona,nombre,apellido,email,nombrepubli,descripcion,categoria,stock,tipo
            from publicacion,persona,permuta,vendecompra,subasta where cipersona=ci and id=$ID group by id;";

$result=$conex->prepare($consultas);
$result->execute();
$resultados=$result->fetchAll();

for ($i=0;$i<count($resultados);$i++) {

?>

<!DOCTYPE html>

<html lang="en">
<body>
    <section  id="services-sec">
              <form action="../logica/procesarborrpubli.php" method="POST">
              <div class="container">
                  <div class="row text-center">
                    <h1>Borrar publicacion</h1>
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
                       </tr>

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
                       </tr>

                    </table>
                  </div>
              </div>
            </section>

            <input type="text" class="form-control" style="visibility:hidden" id="id" name="id" value='<?php echo $resultados[$i]["id"];?>'>
            <input type="text" class="form-control" style="visibility:hidden" id="tipo" name="tipo" value='<?php echo $resultados[$i]["tipo"];?>'>
            <input type="text" class="form-control" style="visibility:hidden" id="cipersona" name="cipersona" value='<?php echo $resultados[$i]["cipersona"];?>'>
            <button type="submit" class="btn btn-success" align="center">Confirmar Borrado</button>
          </form>
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
