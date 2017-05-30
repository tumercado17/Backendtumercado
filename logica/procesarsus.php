<?php

require_once('../clases/publicacion.php');
require_once('../logica/funciones.php');

//$id = $_GET["ID"];
$id= strip_tags(trim($_POST['id']));
$san= strip_tags(trim($_POST['sancion']));
$ci=strip_tags(trim($_POST['cipersona']));
$fecha = date("Y-m-d"); //toma la fecha y la hora de la accion

$conex = conectar();
$u= new Publicacion ($id,'','','','','','','',''); //la cantidad de elementos de la clase

$datos_s=$u->sanpubli($conex);

  if(!empty($datos_s)){
    $conex=conectar();
    // Si existe solo cambia el campo de suspencion
    $consultas = "update bajasuspencion set estado=:sancion, fecha=:fecha where idbajapublicacion=:id;";
    $result=$conex->prepare($consultas);
    $result->execute(array(':sancion'=>$san,':fecha'=>$fecha,':id'=>$id));
    $consulta=$result->fetchAll();

    ?>
    <script type="text/javascript">
    window.alert("Se aplico sancion correctamente.");
    location.href="../presentacion/buscarpubli.php";
    </script>
    <?php

        }else{

          $conex=conectar();
          //Sino existe la sancion la ingresa a la tabla
          $consultas = "insert into bajasuspencion (cibajaadministrador,idbajapublicacion,estado,fecha)
                              values (:ci,:id,:sancion,:fecha)";
          $result=$conex->prepare($consultas);
          $result->execute(array(':ci'=>$ci,':id'=>$id,':sancion'=>$san,':fecha'=>$fecha));
          $consulta=$result->fetchAll();

          ?>
          <script type="text/javascript">
          window.alert("La publicacion no tenia registros anteriores de una sancion. La sancion se aplico correctamente");
          location.href="../presentacion/buscarpubli.php";
          </script>
          <?php
        //  desconectar($conex);

}

?>
