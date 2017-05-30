<?php

Require_once ('../logica/funciones.php');

	class Persistenciapublicacion{

	function cambiopubli($obj,$conex){
      $id = trim($obj->getid());
			$nombrepubli = $obj->getnombrepubli();
			$precio = $obj->getprecio();
			$descripcion = $obj->getdescripcion();
      $categoria = $obj->getcategoria();
      $stock = $obj->getstock();
      $tipo = $obj->gettipo();

      //CONSULTA SQL
			$sql = "update publicacion set nombrepubli=:nombrepubli, precio=:precio, descripcion=:descripcion,
              categoria=:categoria, stock=:stock, tipo=:tipo where id=:id";

			//VARIABLES PARA SQL "PREPARE" ES UNA FUNCION PDO, ES UNA FUNCION DEFINIDA

			$consulta = $conex->prepare($sql);																			//DEFINIMOS LA CONSULTA, Y LA PREPARAMOS
			$consulta->execute(array(':nombrepubli'=>$nombrepubli,':precio'=>$precio,':descripcion'=>$descripcion,
                  ':categoria'=>$categoria,':stock'=>$stock,':tipo'=>$tipo,':id'=>$id));

			if($consulta){
				return true;
			}else{
				return false;
				}
			}

			function sancionpubli($obj,$conex){

					//Primera funcion para ver si existe o no la publicacion en la tabla de la suspeciones
		      $id = trim($obj->getid());
					//CONSULTA SQL
					$sql = "select * from bajasuspencion where idbajapublicacion=:id";

					//VARIABLES PARA SQL "PREPARE" ES UNA FUNCION PDO, ES UNA FUNCION DEFINIDA
					$result = $conex->prepare($sql);																			//DEFINIMOS LA CONSULTA, Y LA PREPARAMOS
					$result->execute(array(':id'=>$id));
					$consulta=$result->fetchAll();


					if($consulta){
						return true;
					}else{
						return false;
						}
					}

					function eliminar($obj,$conex){

						$id = trim($obj->getid());
						//CONSULTA SQL
						$sql = "select * from publicacion where id=:id";

						//VARIABLES PARA SQL "PREPARE" ES UNA FUNCION PDO, ES UNA FUNCION DEFINIDA
						$result = $conex->prepare($sql);																			//DEFINIMOS LA CONSULTA, Y LA PREPARAMOS
						$result->execute(array(':id'=>$id));
						$consulta=$result->fetchAll();


						if($consulta){
							return true;
						}else{
							return false;
							}
						}

	}
?>
