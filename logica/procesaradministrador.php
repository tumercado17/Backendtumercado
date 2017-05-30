<?php

	session_start();
	require_once('funciones.php');
	require_once('../clases/administrador.php');

	$conex = conectar();
	$idadministrador = strip_tags($_POST['idadministrador']);
	$grado = strip_tags($_POST['grado']);

	$ejecucionOK=true;

	$u = new administrador ($idadministrador,$grado);
	$ejecucionOK=$u->alta($conex);

	if($ejecucionOK){
		echo "los datos se ingresaron ok";
	}else{
		echo "los datos no se ingresaron";
	}
?>
