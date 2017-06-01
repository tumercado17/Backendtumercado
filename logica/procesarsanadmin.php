<?php
require_once('../clases/persona.php');
require_once('../logica/funciones.php');

$ci= strip_tags(trim($_POST['ci']));
$san= strip_tags(trim($_POST['sancion']));
$fecha = date("Y-m-d"); //toma la fecha y la hora de la accion

$conex = conectar();

$u= new Persona ($ci,'','','','','','','',''); //la cantidad de elementos de la clase

$datos_s=$u->mostrarsanadmin($conex);

  if(!empty($datos_s)){
/*
    $conex=conectar();

    // Si existe solo cambia el campo de suspencion
    $consultas = "update sancionadmin set estado="" where idadministradorsan2=2;";
    $result=$conex->prepare($consultas);
    $result->execute(array(':sancion'=>$san,':fecha'=>$fecha,':ci'=>$ci));
    $consulta=$result->fetchAll();
*/
    ?>
    <script type="text/javascript">
    window.alert("Se aplico sancion correctamente.");
    location.href="../presentacion/buscar.php";
    </script>
    <?php

        }else{

/*
          $conex=conectar();

          // Si existe solo cambia el campo de suspencion
          $consultas = "insert into sancionadmin (ciadministradorsanadmin,idadministradorsan1,idadministradorsan2,estado,fecha)
                        values (52185428,1,:,,CURDATE());";
          $result=$conex->prepare($consultas);
          $result->execute(array(':sancion'=>$san,':fecha'=>$fecha,':ci'=>$ci));
          $consulta=$result->fetchAll();
*/
          ?>
          <script type="text/javascript">
          window.alert("EL usuario no presentaba antecedentes, se aplicaron los cambios correctamente");
          location.href="../presentacion/buscar.php";
          </script>
          <?php
        //  desconectar($conex);

}

?>
