<?php

require_once('../clases/publicacion.php');
require_once('../logica/funciones.php');

$id= strip_tags(trim($_POST['id']));

$conex = conectar();
$u= new Publicacion ($id,'','','','','','','',''); //la cantidad de elementos de la clase

$datos_s=$u->borrar($conex);

  if(!empty($datos_s)){

    $conex=conectar();
    
    // Si existe solo cambia el campo de suspencion
    $consultas = "delete from permuta where idpublicacion=:id;
    delete from bajasuspencion where idbajapublicacion=:id;
    delete from publicacion where id=:id;";

    $result=$conex->prepare($consultas);
    $result->execute(array(':id'=>$id));
    $consulta=$result->fetchAll();

    ?>
    <script type="text/javascript">
    window.alert("Se borro publicacion correctamente.");
    location.href="../presentacion/buscarpubli.php";
    </script>
    <?php

        }else{

          ?>
          <script type="text/javascript">
          window.alert("La publicacion no existe");
          location.href="../presentacion/buscarpubli.php";
          </script>
          <?php
        //  desconectar($conex);

}

?>
