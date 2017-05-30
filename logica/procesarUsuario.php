<?php

	session_start();
	require_once('funciones.php');
	require_once('../clases/Usuario.class.php');

	$conex = conectar();
	$login = strip_tags($_POST['login']);
	$password = strip_tags($_POST['password']);

	$ejecucionOK=true;

	$u = new Usuario ('',$login,$password);
	$ejecucionOK=$u->alta($conex);
	if($ejecucionOK){
		echo "los datos se ingresaron ok";
	}else{
		echo "los datos no se ingresaron";
	}
?>
