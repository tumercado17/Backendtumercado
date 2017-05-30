<?php
Require_once ('../logica/funciones.php'); //donde se conecta a la base

	class PersistenciaTelefonoper{

	function subetel($obj,$conex){
			$ci = $obj->getci();
      $tel = $obj->gettelefono();

			//CONSULTA SQL
			$sql = "insert into telefonopersona (cipersona,telefono) values (:cipersona,:telefono)";

			//VARIABLES PARA SQL "PREPARE" ES UNA FUNCION PDO, ES UNA FUNCION DEFINIDA

			$consulta = $conex->prepare($sql);																			//DEFINIMOS LA CONSULTA, Y LA PREPARAMOS
			$consulta->execute(array(":cipersona"=>$ci,":telefono"=>$tel));

			return $consulta;

			}
    }
  ?>
