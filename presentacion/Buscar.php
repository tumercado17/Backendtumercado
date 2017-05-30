<?php
Require_once('../clases/persona.php');
Require_once('../logica/funciones.php');

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

        </div>
    </div>
     <!--END NAV SECTION -->
		 <section  id="services-sec">
          </section>

  <form action="sancionadmin.php" id="FrmListadoUsuarios" method="POST">
     <section  id="services-sec">
       <div class="container"  >
           <div class="row text-center">
             <table class="table">
               <tr>
                 <td>ID</td>
                 <td>Ci</td>
                 <td>Nombre</td>
                 <td>Apellido</td>
                 <td>Email</td>
                 <td>Pais</td>
                 <td>Calle</td>
                 <td>Numero</td>
                 <td>Telefono</td>
                 <td>Grado</td>
                 <td>--------</td>
                 <td>--------</td>
								</tr>

                <?php

                //Hace la conexion y la consulta para luego mostrar los datos de persona
                $conex=conectar();
                $sql ="select idadministrador,ci,nombre,apellido,email,pais,contrasena,calle,numero,cipersona,telefono,grado from persona,telefonopersona,administrador
                      where (persona.ci=telefonopersona.cipersona) and (persona.ci=administrador.ciadministrador);";
                $result=$conex->prepare($sql);
                $result->execute();
                $resultados=$result->fetchAll();

        				for ($i=0;$i<count($resultados);$i++) {
                $IDu=$resultados[$i]["ci"]; //tama el id de la tabla para enviarlo al otro formulario
        				?>

                 <tr>
                  <td><?php echo $resultados[$i]["idadministrador"];?></td>
                  <td><?php echo $resultados[$i]["ci"];?></td>
        					<td><?php echo $resultados[$i]["nombre"];?></td>
        					<td><?php echo $resultados[$i]["apellido"];?></td>
        					<td><?php echo $resultados[$i]["email"];?></td>
                  <td><?php echo $resultados[$i]["pais"];?></td>
                  <td><?php echo $resultados[$i]["calle"];?></td>
                  <td><?php echo $resultados[$i]["numero"];?></td>
                  <td><?php echo $resultados[$i]["telefono"];?></td>
                  <td><?php echo $resultados[$i]["grado"];?></td>
                  <td><a href="modificaradmin.php?ID=<?php echo $IDu;?>">Modificar</a></td>
                  <td><a href="sancionadmin.php?ID=<?php echo $IDu;?>">Sancionar</a></td>
                  <td><a href="sancion.php?ID=<?php echo $IDu;?>">Borrar</a></td>
                  </tr>

                <?php
              }
                 ?>
             </table>
           </div>
       </div>
     </form>
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
