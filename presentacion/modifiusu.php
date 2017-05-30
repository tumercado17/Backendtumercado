  <?php
  Require_once("../logica/funciones.php");

  $conex=conectar();
  $ID = $_GET["ID"];

  $consultas="select usuario.idusuario,ciusuario,ci,nombre,apellido,contrasena,email,calle,numero,calificacion,nombreusu from
              usuario,nombreusuario,persona where ((usuario.idusuario=nombreusuario.idusuario)
              and (persona.ci=usuario.ciusuario)) and usuario.idusuario=$ID;";


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
           <form action="../logica/procesarmodiusu.php" method="POST">
             <div class="container">
               <form>

                   <div class="col-md-6 ">
                       <div class="form-group">
                            Nombre
                           <input type="text" class="form-control" id="nombre" name="nombre" value='<?php echo $resultados[$i]["nombre"];?>'>
                       </div>
                   </div>

                   <div class="row">
                       <div class="col-md-6 ">
                           <div class="form-group">
                               Apellido
                               <input type="text" class="form-control" id="apellido" name="apellido" value='<?php echo $resultados[$i]["apellido"];?>'>
                           </div>
                       </div>

                       <div class="row">
                           <div class="col-md-6 ">
                               <div class="form-group">
                                   contraseña
                                   <input type="text" class="form-control" id="contrasena" name="contrasena" value='<?php echo $resultados[$i]["contrasena"];?>'>
                               </div>
                           </div>

                       <div class="col-md-6 ">
                           <div class="form-group">
                              Correo electronico
                               <input type="text" class="form-control" id="email" name="email" value='<?php echo $resultados[$i]["email"];?>'>
                           </div>
                       </div>
                   </div>

                   <div class="col-md-6 ">
                       <div class="form-group">
                            Calle
                           <input type="text" class="form-control" id="calle" name="calle" value='<?php echo $resultados[$i]["calle"];?>'>
                       </div>
                   </div>

                   <div class="col-md-6 ">
                       <div class="form-group">
                            Numero
                           <input type="text" class="form-control" id="numero" name="numero" value='<?php echo $resultados[$i]["numero"];?>'>
                       </div>
                   </div>

                   <div class="col-md-6 ">
                       <div class="form-group">
                            Calificacion
                           <input type="text" class="form-control" id="calificacion" name="calificacion" value='<?php echo $resultados[$i]["calificacion"];?>'>
                       </div>
                   </div>
                             <input type="text" class="form-control" style="visibility:hidden" id="id" name="id" value='<?php echo $resultados[$i]["id"];?>'>
                             <input type="text" class="form-control" style="visibility:hidden" id="ci" name="ci" value='<?php echo $resultados[$i]["ci"];?>'>
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
