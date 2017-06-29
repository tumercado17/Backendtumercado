<?php
session_start(); // inicia las sessions
require_once('../clases/publicacion.php');
require_once('../logica/funciones.php');

$id = strip_tags($_POST['id']);
$nombrepubli= strip_tags($_POST['nombre']);
$tipo = strip_tags($_POST['tipo']);

$conex = conectar();
$e = new Publicacion ($id,'',$nombrepubli,'','','','','',$tipo);

$datos_e=$e->buscarPubl($conex);

  if(!empty($datos_e)){
    $_SESSION["BUS"] = $datos_e;
    header('Location: http://localhost/backend%20tumercado/presentacion/buscarcompubli.php');

}  else{
  ?>
  <script type="text/javascript">
  window.alert("No se encontró ningún resultado.");
  location.href="../presentacion/buscarcompubli.php";
  </script>
  <?php
  desconectar($conex);

}




 ?>
