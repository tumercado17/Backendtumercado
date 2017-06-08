<?php
if(!isset($_SESSION['PHPSESSID']) !="0") {
	session_start();
}

require_once('../clases/persona.php');
require_once('../clases/administrador.php');
require_once('../logica/funciones.php');

//trim elimina los espacion en blanco
$nom = strip_tags(trim($_POST['nombre']));
$pass = strip_tags(trim($_POST['contrasena']));

$_SESSION["nombre"] = $nom;

$conex = conectar();

$u= new Persona ('',$nom,'','','','','','','','',$pass); //la cantidad de elementos de la clase

$datos_u=$u->loginper($conex);

  if(!empty($datos_u)){

		// Hace la consulta para sacar el rol del usuario que se registro
    $conex=conectar();

		$ci = $_SESSION["ci"] = $datos_u[0]["ci"];
		$sql ="select grado from persona,administrador where ci=$ci and ciadministrador=$ci;";

		$result=$conex->prepare($sql);
		$result->execute();
		$resultados=$result->fetchAll();

		for ($i=0;$i<count($resultados);$i++) {
		$IDu=$resultados[$i]["grado"];

		//Carga las variables de sesion para poder hacer el filtro de las sesiones
		}
		$_SESSION["GRADO"] = $IDu;
    $_SESSION["ci"] = $datos_u[0]["ci"];
		$_SESSION["LOGIN"] = $datos_u[0]["nombre"];

		?>
    <script type="text/javascript">
    location.href="../presentacion/estadisticas.php";
    </script>


    <?php

}  else{
  ?>
  <script type="text/javascript">
  window.alert("El Usuario o Password \n no es correcto.");
  location.href="../presentacion/index.php";
  </script>
  <?php
	desconectar($conex);

}

?>
