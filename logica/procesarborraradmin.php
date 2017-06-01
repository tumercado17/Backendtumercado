<?php
require_once('../clases/persona.php');
require_once('../logica/funciones.php');

$ci= strip_tags(trim($_POST['ci']));

$conex = conectar();

$u= new Persona ($ci,'','','','','','','',''); //la cantidad de elementos de la clase

$datos_s=$u->mostrarunaper($conex);

  if(!empty($datos_s)){
    $conex=conectar();

    // Si existe solo cambia el campo de suspencion
    $consultas = "delete from telefonopersona where cipersona=:ci;
                  delete from administrador where ciadministrador=:ci;
                  delete from persona where ci=:ci;";

    $result=$conex->prepare($consultas);
    $result->execute(array(':ci'=>$ci));
    $consulta=$result->fetchAll();

    ?>
    <script type="text/javascript">
    window.alert("Se eliminio administrador correctamente.");
    location.href="../presentacion/buscar.php";
    </script>
    <?php

        }else{
          ?>
          <script type="text/javascript">
          window.alert("EL usuario no existe por lo tanto no se aplican los cambios");
          location.href="../presentacion/buscar.php";
          </script>
          <?php
        //  desconectar($conex);

}

?>
