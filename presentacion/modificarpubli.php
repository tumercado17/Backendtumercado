<?php
Require_once("../logica/funciones.php");

$conex=conectar();
$ID = $_GET["ID"];

$consultas="select id,cipersona,nombre,apellido,email,nombrepubli,precio,descripcion,categoria,stock,tipo
            from publicacion,persona,permuta where cipersona=ci and id=$ID;";

$result=$conex->prepare($consultas);
$result->execute();
$resultados=$result->fetchAll();

for ($i=0;$i<count($resultados);$i++) {
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Multipager Template- Travelic </title>

    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="assets/css/font-awesome-animation.css" rel="stylesheet" />
    <link href="assets/css/prettyPhoto.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
</head>
<body>
     <!-- NAV SECTION -->
         <div class="navbar navbar-inverse navbar-fixed-top">

        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">TUMERCADO</a>

            </div>
            <div class="navbar-collapse collapse">
                 <ul class="nav navbar-nav navbar-center">
                   <li><a href="Buscar.php">MOSTRAR-ADMINISTRADORES</a></li>
                   <li><a href="Buscarusu.php">MOSTRAR-USUARIOS</a></li>
                   <li><a href="Buscarpubli.php">MOSTRAR-PUBLICACIONES</a></li>
                   <li><a href="Registrarse.php">CREAR-ADMINISTRADOR</a></li>
                </ul>
            </div>

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

                   <div class="row">
                       <div class="col-md-6 ">
                           <div class="form-group">
                               Precio
                               <input type="text" class="form-control" id="precio" name="precio" value='<?php echo $resultados[$i]["precio"];?>'>
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
