<?php
Require_once("../logica/sesiones.php");
Require_once('../clases/publicacion.php');
Require_once('../logica/funciones.php');

$id=strip_tags(trim($_POST['id']));
$tipo=strip_tags($_POST['tipo']);


$conex = conectar();
$t= new Publicacion ($id,'','','','','','','',$tipo); //la cantidad de elementos de la clase

$datos_t=$t->borrar($conex);

if(!empty($datos_t)){

  if ($tipo == 'Venta'){

  $conex=conectar();
  $consultas = "DELETE FROM comentariovendecompra WHERE idcomvenpublicacion=:id;
                DELETE FROM vendecompra WHERE idvendepublicacion=:id;
                DELETE FROM publicacion WHERE id=:id; ";

  $result=$conex->prepare($consultas);
  $result->execute(array(':id'=>$id));
  $consulta=$result->fetchAll();


  }elseif ($tipo == 'Permuta'){

    $conex=conectar();
    $consultas = "DELETE FROM comentariopermuta WHERE idcompermuta=:id;
                  DELETE FROM permuta WHERE idpublicacion=:id;
                  DELETE FROM publicacion WHERE id=:id;";

    $result=$conex->prepare($consultas);
    $result->execute(array(':id'=>$id));
    $consulta=$result->fetchAll();

  }elseif ($tipo == 'Subasta'){

    $conex=conectar();
    $consultas = "DELETE FROM comentariosubasta WHERE idcomsubpublicacion=:id;
                  DELETE FROM subasta WHERE idsubpublicacion=:id;
                  DELETE FROM publicacion WHERE id=:id;";

    $result=$conex->prepare($consultas);
    $result->execute(array(':id'=>$id));
    $consulta=$result->fetchAll();

  }elseif ($tipo == 'Publicacion'){

    $conex=conectar();
    $consultas = "DELETE FROM comentariopublicacion WHERE idcompublicacion=:id;
                  DELETE FROM publicacion WHERE id=:id;";

    $result=$conex->prepare($consultas);
    $result->execute(array(':id'=>$id));
    $consulta=$result->fetchAll();

  }

  ?>
  <script type="text/javascript">
  window.alert("Se borro publicacion correctamente.");
  location.href="../presentacion/Buscarpubli.php";
  </script>
  <?php

      }else{
        ?>
        <script type="text/javascript">
        window.alert("La publicacion no existe");
        location.href="../presentacion/Buscarpubli.php";
        </script>
        <?php
        desconectar($conex);

}

?>
