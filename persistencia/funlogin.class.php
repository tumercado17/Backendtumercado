<?php
	Require_once("../logica/funciones.php");
	Require_once("../presentacion/index.html");
	Require_once("../clases/persona.php");

class logIn{
		function getLogInResult($obj,$conex){

			$nom = $obj->getnombre();																					//llamamos al nombre de usuario del objeto usuario
			$cont = $obj->getcontrasena();																				//llamamos a la contraseña del objeto usuario
			$cont = md5($pass);																							//Encriptamos la contraseña
			$mensaje=array();																							//CREAMOS EL ARRAY DE MENSAJES PARA ERRORES

			$sql =	"select nombre, contrasena, correo, ci from Persona where (nombre= :nombre and contrasena= :contrasena)";

			$resultado = $conex->prepare($sql);																			//DEFINIMOS LA CONSULTA, Y LA PREPARAMOS
			$resultado = $consulta->execute(array(':nombre' => $nom, ':contrasena' => $cont));							//SE HACE LA CONSULTA EN BASE AL STRING DE CONEIÓN Y AL STRING DE CONSULTA

			if($consulta){
				return true;
			}else{
				return false;
				}
			}

	?>
