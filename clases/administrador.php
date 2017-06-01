<?php
require_once('../persistencia/Persistenciaadministrador.class.php');

class administrador{

	private $ciadministrador;
	private $idadministrador;
	private $grado;


	function __construct($a='',$b='',$c=''){
			$this->idadministrador=$a;
			$this->ciadministrador=$b;
			$this->grado= $c;
		}

		//Metodos GET

		public function getidadministrador(){
			return $this->idadministrador;
		}

		public function getciadministrador(){
 		 return $this->ciadministrador;
 	 }

	  public function getgrado(){
      return $this->grado;
    }

		//Metodos SET

		public function setciadministrador($a){
      $this->ciadministrador= $idadministrador;
    }

		public function setidadministrador($b){
      $this->idadministrador= $ciadministrador;
    }

		public function setgrado($c){
      $this->grado= $grado;
    }

		function altaadmin($conex){
	   $pu = new Persistenciaadministrador;
	   return ($pu->agregaradmin($this,$conex));
	  }

		function listaradmin($conex){
	   $pu = new Persistenciaadministrador;
	   return ($pu->mostraradmin($this,$conex));
	  }
}
?>
