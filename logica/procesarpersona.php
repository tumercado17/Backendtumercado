<?php

	session_start();
	require_once('funciones.php');
	require_once('../clases/persona.php');

	$conex = conectar();

	$nom = strip_tags($_POST['nombre']);
    $cont = strip_tags($_POST['contrasena']);

	$ejecucionOK=true;

	$u = new persona ($nom,$cont);
	$ejecucionOK=$u->alta($conex);

	if($ejecucionOK){
		echo "los datos se ingresaron ok";
		header('Location: http://localhost/ignacioclase(modificado)/presentacion/index.html');
	}else{
		echo "los datos no se ingresaron";
	}
?>
