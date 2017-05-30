<?php

Require_once ('../logica/funciones.php');

	class Persistenciaadministrador{

	function agregaradmin($obj,$conex){
			$ciadministrador = $obj->getciadministrador();
			$idadministrador = $obj->getidadministrador();
			$grado = $obj->getgrado();

			//CONSULTA SQL
			$sql = "insert into administrador (idadministrador,ciadministrador,grado) values (:idadministrador,:ciadministrador,:grado)";

			//VARIABLES PARA SQL "PREPARE" ES UNA FUNCION PDO, ES UNA FUNCION DEFINIDA

			$consulta = $conex->prepare($sql);																			//DEFINIMOS LA CONSULTA, Y LA PREPARAMOS
			$consulta->execute(array(':idadministrador'=>$idadministrador,':ciadministrador'=>$ciadministrador,':grado'=>$grado));

			if($consulta){
				return true;
			}else{
				return false;
				}
			}

		}
?>
