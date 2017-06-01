<?php
	class PersistenciaUsuario{

		function agregar($obj,$conex){
			$login = $obj->getLogin();
			$password = $obj->getPassword();

			//CONSULTA SQL
			$sql = "insert into usuario (login,password) values (:login,:password)";
			//VARIABLES PARA SQL "PREPARE" ES UNA FUNCION PDO, ES UNA FUNCION DEFINIDA
			$result = $conex->prepare(sql);
			$result->execute(array(":login"=>$login,":password"=>$password));

			if($result){
				return true;
			}else{
				return false;
				}
			}

		}
?>
