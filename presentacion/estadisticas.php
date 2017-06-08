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
       <div class="container">
         <form action="../reportes/listadoUsuarios.php" method="POST">
           <div class="row text-center">
             <h1> Estadisticas Generales de TUMERCADO</h1>
             <table class="table">
               <tr>
                 <td style="color:red">Nombre de listados</td>
                 <td style="color:red">Cantidad</td>
                 <td style="color:red">Accion</td>
                </tr>

                <?php

                //Hace la consulta para sacar la cantidad de usuarios
                $conex=conectar();
                $sql ="select count(*) from persona,usuario where ciusuario=ci;";
                $result=$conex->prepare($sql);
                $result->execute();
                $cantusu=$result->fetchAll();

                //Hace la consulta para sacar la cantidad de administradores
                $conex=conectar();
                $sql ="select count(*) from persona,administrador where ciadministrador=ci;";
                $result=$conex->prepare($sql);
                $result->execute();
                $cantadmin=$result->fetchAll();

                //Hace la consulta para sacar la cantidad de publicaciones
                $conex=conectar();
                $sql ="select count(*) from persona,publicacion where cipersona=ci";
                $result=$conex->prepare($sql);
                $result->execute();
                $cantpubli=$result->fetchAll();

                //Hace la consulta para sacar la cantidad de comentarios
                $conex=conectar();
                $sql ="select (select count(*) from persona,comentariopermuta where cicomperpersona=ci)+
                      (select count(*) from persona,comentariopublicacion where cicompersona=ci)+
                      (select count(*) from persona,comentariosubasta where cicomsubpersona=ci)+
                      (select count(*) from persona,comentariovendecompra where cicomvenpersona=ci) as total;";
                $result=$conex->prepare($sql);
                $result->execute();
                $cantcom=$result->fetchAll();
        				?>

                <tr>
                 <td>Cantidad de usuarios</td>
                 <td><?php echo $cantusu[0]["count(*)"];?></td>
                 <td><a href="buscarusu.php">Ver</a></td>
                </tr>

                <tr>
                 <td>Cantidad de administradores</td>
                 <td><?php echo $cantadmin[0]["count(*)"];?></td>
                 <?php
                 if ($_SESSION["GRADO"]=="Administrador del sistema" or $_SESSION["GRADO"]=="Administrador de frontend"){
                  ?>
                 <td><a href="buscar.php">Ver</a></td>
                 <?php
                  }else{
                    ?>
                    <td>--</td>
                    <?php
                  }
                      ?>
                </tr>

                <tr>
                 <td>cantidad de publicaciones</td>
                 <td><?php echo $cantpubli[0]["count(*)"];?></td>
                 <?php
                 if ($_SESSION["GRADO"]=="Administrador del sistema" or $_SESSION["GRADO"]=="Administrador de frontend"){
                  ?>
                 <td><a href="buscarpubli.php">Ver</a></td>
                 <?php
               }else{
                 ?>
                 <td>--</td>
                 <?php
               }
                   ?>
                </tr>

                <tr>
                 <td>cantidad de comentarios</td>
                 <td><?php echo $cantcom[0]["total"];?></td>
                 <td>Estado</td>
                </tr>

             </table>
           </div>
       </div>
     </section>

     <div class="form-group">
         <button type="submit" class="btn btn-success">Guardar PDF</button>
         <a href="index.php">
     </div>

    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap.min.js"></script>
    <script src="assets/plugins/jquery.isotope.min.js"></script>
    <script src="assets/plugins/jquery.prettyPhoto.js"></script>
    <script src="assets/js/custom.js"></script>

</body>
</html>
