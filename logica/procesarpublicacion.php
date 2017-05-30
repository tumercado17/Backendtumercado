<?php
	session_start();

	require_once('funciones.php');
	require_once('../clases/publicacion.php');

	$id= trim(strip_tags($_POST['id']));
  $nombrepubli = strip_tags($_POST['nombrepubli']);
  $precio = strip_tags($_POST['precio']);
  $descripcion = strip_tags($_POST['descripcion']);
  $categoria = strip_tags($_POST['categoria']);
	$stock = strip_tags($_POST['stock']);
  $tipo = strip_tags($_POST['tipo']);

  $conex = conectar();

  $u = new Publicacion ($id,'',$nombrepubli,$precio,$descripcion,$categoria,$stock,'',$tipo);
	$datos_p=$u->modipubli($conex);

  if(!empty($datos_p)){
    //cierro php
    ?>
    <script type="text/javascript">
    window.alert("La publicacion a sido modificada correctamente.");
    location.href="../presentacion/buscarpubli.php";
    </script>


    <?php
    //vuelvo a abrirlo

} else{
  ?>
  <script type="text/javascript">
  window.alert("Ocurrio un error al modificar/n Vuelva a intentarlo!.");
  location.href="../presentacion/modificarpubli.php";
  </script>
  <?php
//  desconectar($conex);

}


?>
