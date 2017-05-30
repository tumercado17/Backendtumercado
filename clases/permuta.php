<?php

class permuta extends publicacion
{

	private $califica;
  private $fecha;


	function __construct($a='',$b='')
    {
    	$this->califica= $a;
      $this->fecha= $b;

    }

    //Métodos SET

    public function setcalifica($a)
    {
      $this->califica= $a;
    }

    public function setfecha($b)
    {
      $this->fecha= $b;
    }


    //Método GET

     public function getcalifica()
    {
      return $this->califica;
    }

    public function getfecha()
    {
      return $this->fecha;
    }

    //Funciones de la clase permuta

    function fechaexpiracion(){

    }

    function confirmacion(){

    }

    function relevancia(){

    }


}



?>
