<?php
require_once('../clases/persona.php');
require_once('../logica/funciones.php');

$ci= strip_tags(trim($_POST['ci']));
$id= strip_tags(trim($_POST['idusuario']));
$fecha = date("Y-m-d"); //toma la fecha y la hora de la accion

echo $id;
$conex = conectar();

$u= new Persona ($ci,'','','','','','','',''); //la cantidad de elementos de la clase

$datos_s=$u->mostrarunaper($conex);

  if(!empty($datos_s)){
    $conex=conectar();

    // Si existe solo cambia el campo de suspencion
    $consultas = "delete from telefonopersona where cipersona=:ci;
                  delete from nombreusuario where idusuario=:id;
                  delete from usuario where ciusuario=:ci;
                  delete from persona where ci=:ci;";

    $result=$conex->prepare($consultas);
    $result->execute(array(':ci'=>$ci,':id'=>$id));
    $consulta=$result->fetchAll();

    ?>
    <script type="text/javascript">
    window.alert("Se aplicaron cambios correctamente.");
    //location.href="../presentacion/buscarusu.php";
    </script>
    <?php

        }else{
          ?>
          <script type="text/javascript">
          window.alert("EL usuario no existe por lo tanto no se aplican los cambios");
          location.href="../presentacion/buscarpubli.php";
          </script>
          <?php
        //  desconectar($conex);

}

?>
