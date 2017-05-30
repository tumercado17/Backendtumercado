<?php

	session_start();
	require_once('funciones.php');
	require_once('../clases/persona.php');


	$conex=conectar();
	$u=new Persona();
	$datos_u=$u->mostrarper($conex);
	if (empty($datos_u))
	{
		?>
		<script type="text/javascript">
	  window.alert("No existen datos de usuarios en el sistema");
	  location.href="../presentacion/index.php";
	  </script>
	 <?php
	}
	else{
		?>
		<script>
		location.href="../presentacion/index.php";
	  </script>
	  <?php
	}
?>
