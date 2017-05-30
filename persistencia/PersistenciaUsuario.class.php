<?php
	class PersistenciaUsuario{

		function agregar($obj,$conex){
			$login = $obj->getLogin();
			$password = $obj->getPassword();

			//CONSULTA SQL
			$sql = "INSERT INTO usuario (login,password) VALUES (:login,:password)";
			//VARIABLES PARA SQL "PREPARE" ES UNA FUNCION PDO, ES UNA FUNCION DEFINIDA
			$result = $conex->prepare(sql);
			$result->execute(array(":login"->$login,":password"->$password));

			if($result){
				return true;
			}else{
				return false;
				}
			}

		}
?>
