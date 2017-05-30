<?php

class subasta extends publicacion
{

	private $precio;
  private $preciototal;
  private $califica;
  private $cantidad;
  private $total;
  private $fecha;


	function __construct($a='',$b='',$c='',$d='',$e='',$f='')
    {
    	$this->precio= $a;
      $this->preciototal= $b;
      $this->califica= $c;
      $this->cantidad= $d;
      $this->total= $e;
      $this->fecha= $f;

    }

    //Métodos SET

    public function setprecio($a)
    {
      $this->precio= $a;
    }

    public function setpreciototal($b)
    {
      $this->preciototal= $b;
    }

    public function setcalifica($c)
    {
      $this->califica= $c;
    }

    public function setcantidad($d)
    {
      $this->cantidad= $d;
    }

    public function settotal($e)
    {
      $this->total= $e;
    }

    public function setfecha($f)
    {
      $this->fecha= $f;
    }



    //Método GET

    public function getprecio()
    {
      return $this->precio;
    }

    public function getpreciototal()
    {
      return $this->preciototal;
    }

    public function getcalifica()
    {
      return $this->califica;
    }

    public function getcantidad()
    {
      return $this->cantidad;
    }

    public function gettotal()
    {
      return $this->total;
    }

    public function getfecha()
    {
      return $this->fecha;
    }

		//Funciones de subasta


		 function incrementobase(){

		 }

		 function fechaexpiracion(){

		 }

		 function confirmacion(){

		 }

		 function relevancia(){

		 }
}



?>
