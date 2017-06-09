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

///////////////////////////////////////////////

			function sancionpubli($obj,$conex){

					//Primera funcion para ver si existe o no la publicacion en la tabla de la suspeciones
		      $id = trim($obj->getid());
					//CONSULTA SQL
					$sql = "select * from bajasuspencion where idbajapublicacion=:id;";

					//VARIABLES PARA SQL "PREPARE" ES UNA FUNCION PDO, ES UNA FUNCION DEFINIDA
					$result = $conex->prepare($sql);																			//DEFINIMOS LA CONSULTA, Y LA PREPARAMOS
					$result->execute(array(':id'=>$id));
					$consulta=$result->fetchAll();
					return $consulta;
					}


/////////////////////////////////////////////////////////////////////

					function eliminar($obj,$conex){
						$id = trim($obj->getid());
						$tipo = $obj->gettipo();

						if ($tipo == 'Venta'){

						$sql = "SELECT * FROM publicacion WHERE id=:id AND tipo=:tipo;";

						//VARIABLES PARA SQL "PREPARE" ES UNA FUNCION PDO, ES UNA FUNCION DEFINIDA
						$result = $conex->prepare($sql);
						$result->execute(array(':id'=>$id,':tipo'=>$tipo));
						$consulta=$result->fetchAll();
						return $consulta;


						}elseif ($tipo == 'Permuta') {

						$sql = "SELECT * FROM publicacion WHERE id=:id AND tipo=:tipo;";

						//VARIABLES PARA SQL "PREPARE" ES UNA FUNCION PDO, ES UNA FUNCION DEFINIDA
						$result = $conex->prepare($sql);
						$result->execute(array(':id'=>$id,':tipo'=>$tipo));
						$consulta=$result->fetchAll();
						return $consulta;

						}elseif ($tipo == 'Subasta'){

						$sql = "SELECT * FROM publicacion WHERE id=:id AND tipo=:tipo;";

						//VARIABLES PARA SQL "PREPARE" ES UNA FUNCION PDO, ES UNA FUNCION DEFINIDA
						$result = $conex->prepare($sql);
						$result->execute(array(':id'=>$id,':tipo'=>$tipo));
						$consulta=$result->fetchAll();
						return $consulta;

						}
					}

///////////////////////////////////////////////////////////////////////
						public function buscarPubl($obj,$conex){ //consulta para realizar la busqueda de los comentarios de las publicaciones
							$nombrepubli = $obj->getnombrepubli();
							$tipo = $obj->gettipo();

							if ($tipo == 'Venta'){
							$sql = "SELECT id,cipersona,nombrepubli,tipo,comentarioven,idcomvenpublicacion  FROM  publicacion
											INNER JOIN comentariovendecompra ON idcomvenpublicacion = id
											WHERE comentarioven LIKE concat('%', :nombrepubli, '%');";

							//VARIABLES PARA SQL "PREPARE" ES UNA FUNCION PDO, ES UNA FUNCION DEFINIDA
							$result = $conex->prepare($sql);																			//DEFINIMOS LA CONSULTA, Y LA PREPARAMOS
							$result->execute(array(':nombrepubli'=>$nombrepubli));
							$consulta=$result->fetchAll();
							return $consulta;

						}elseif ($tipo == 'Permuta') {
							$sql = "SELECT id,cipersona,nombrepubli,tipo,comentarioper,idcompermuta  FROM  publicacion
											INNER JOIN comentariopermuta ON idcompermuta = id
											WHERE comentarioper LIKE concat('%', :nombrepubli, '%');";

							//VARIABLES PARA SQL "PREPARE" ES UNA FUNCION PDO, ES UNA FUNCION DEFINIDA
							$result = $conex->prepare($sql);																			//DEFINIMOS LA CONSULTA, Y LA PREPARAMOS
							$result->execute(array(':nombrepubli'=>$nombrepubli));
							$consulta=$result->fetchAll();
							return $consulta;

						}elseif ($tipo == 'Subasta') {
							$sql = "SELECT id,cipersona,nombrepubli,tipo,comentariosub,idcomsubpublicacion  FROM  publicacion
											INNER JOIN comentariosubasta ON idcomsubpublicacion = id
											WHERE comentariosub LIKE concat('%', :nombrepubli, '%');";

							//VARIABLES PARA SQL "PREPARE" ES UNA FUNCION PDO, ES UNA FUNCION DEFINIDA
							$result = $conex->prepare($sql);																			//DEFINIMOS LA CONSULTA, Y LA PREPARAMOS
							$result->execute(array(':nombrepubli'=>$nombrepubli));
							$consulta=$result->fetchAll();
							return $consulta;

						}
					}


	}
?>
