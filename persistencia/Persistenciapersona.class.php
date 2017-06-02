<?php
//Require_once ('../logica/funciones.php'); //donde se conecta a la base

	class Persistenciapersona{

	function agregar($obj,$conex){
					$ci = $obj->getci();
		      $nom = $obj->getnombre();
		      $apell = $obj->getapellido();
		      $email = $obj->getemail();
		      $pais = $obj->getpais();
		      $tarj = $obj->gettarjeta();
		      $cali = $obj->getcalificacion();
		      $calle = $obj->getcalle();
		      $num = $obj->getnumero();
		      $tel = $obj->gettelefono();
		      $cont = $obj->getcontrasena();

					//CONSULTA SQL
					$sql = "insert into persona (ci,nombre,apellido,email,pais,contrasena,calle,numero,tarjeta,calificacion)
									values (:ci,:nombre,:apellido,:email,:pais,:contrasena,:calle,:numero,:tarjeta,'')";

					//VARIABLES PARA SQL "PREPARE" ES UNA FUNCION PDO, ES UNA FUNCION DEFINIDA

					$consulta = $conex->prepare($sql);																			//DEFINIMOS LA CONSULTA, Y LA PREPARAMOS
					$consulta->execute(array(":ci"=>$ci,":nombre"=>$nom,":apellido"=>$apell,":email"=>$email,"pais"=>$pais,":contrasena"=>$cont,":calle"=>$calle,":numero"=>$num,":tarjeta"=>$tarj,":nombre"=>$nom));

					return $consulta;

					}

		public function entrarper($obj, $conex){

	        //Obtiene los datos del objeto $obj
	        $nom= trim($obj->getnombre());
	        $pass= trim($obj->getcontrasena());

	        $sql = "select * from persona where nombre=:nombre and contrasena=:contrasena";

	        $consulta = $conex->prepare($sql);
					$consulta->execute(array(":nombre" => $nom, ":contrasena" => $pass));

			/*Despues de ejecutar la consulta como es un SELECT debo utilizar el m�todo
			fetchAll que devuelve un array que contiene todas las filas del conjunto de resultados
			*/
			$result = $consulta->fetchAll();
			//Devuelvo el array que puede tener un registro o estar vacio si el usuario y contrase�a no coinciden
			//print_r($result);
			return $result;

	    }

			public function listarper($conex){

				 	$sql = "select * from persona;";
	        $consulta = $conex->prepare($sql);
					$consulta->execute();

					$result = $consulta->fetchAll();
					return $result;

		    }

				public function listarunaper($obj,$conex){

						$ci = trim($obj->getci());

					 	$sql = "select * from persona where ci=:ci";
		        $consulta = $conex->prepare($sql);
						$consulta->execute(array(':ci'=>$ci));

						$result = $consulta->fetchAll();
						return $result;

			    }


					public function listarsan($obj,$conex){

						$ci = trim($obj->getci());

						$sql = "select * from sansiona where ciusuariosan=:ci;";
						$consulta = $conex->prepare($sql);
						$consulta->execute(array(':ci'=>$ci));

						$result = $consulta->fetchAll();
						return $result;

					}

					public function listarsanadmin($obj,$conex){

							$ci = trim($obj->getci());

						 	//$sql = "select * from sansionadmin where idadministradorsan2=:id;";
							$sql = "select * from sancionadmin where ciadministradorsanadmin = :ci;";
							$consulta = $conex->prepare($sql);
							$consulta->execute(array(':ci'=>$ci));

							$result = $consulta->fetchAll();
							return $result;

				    }
		}


?>
