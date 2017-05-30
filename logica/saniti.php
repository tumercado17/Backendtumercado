<?php
//require_once('../presentacion/formulario.php');
//require_once('../persistencia/Persistenciaadministrador.class.php');

//Declaramos las variables para generar un mensaje de error y para además controlar si hay errores o no
$error=false;
$mensaje=array();

//Definimos los formatos para evaluar

$forgrado='^[a-zA-ZÀ-ÖØ-öø-ÿ]+\.?(( |\-)[a-zA-ZÀ-ÖØ-öø-ÿ]+\.?)*$^'; //formato para el grado

if (isset($_POST['grado']) and !empty($_POST['grado'])){
  $inputgrado=strip_tags($_POST['grado']);
  if(!preg_match($forgrado,$inputgrado)){
      $error=true;
      $mensaje[]="El formato de mail/nombre de usuario ingresado no es correcto"."<br/>";
  }
}
else{
  $error=true;
  $mensaje[]="No se ingreso nombre de usuario"."<br/>";
}



 ?>
