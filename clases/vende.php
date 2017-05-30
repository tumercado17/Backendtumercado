<?php

class vende extends publicacion
{

	private $califica;
  private $fecha;
  private $pago;
  private $comentario;
  private $preciototal;
  private $cantidad;
  private $total;


	function __construct($a='',$b='',$c='',$d='',$e='',$f='',$g='')
    {
    	$this->califica= $a;
      $this->fecha= $b;
      $this->pago= $c;
      $this->comentario= $d;
      $this->preciototal= $e;
      $this->cantidad= $f;
      $this->total= $g;

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

    public function setpago($c)
    {
      $this->pago= $c;
    }

    public function setcomentario($d)
    {
      $this->comentario= $d;
    }

    public function setgrado($e)
    {
      $this->preciototal= $e;
    }

    public function setcantidad($f)
    {
      $this->cantidad= $f;
    }

    public function settotal($g)
    {
      $this->total= $g;
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

    public function getpago()
    {
      return $this->pago;
    }

    public function getcomentario()
    {
      return $this->comentario;
    }

    public function getpreciototal()
    {
      return $this->preciototal;
    }

    public function getcantidad()
    {
      return $this->cantidad;
    }

    public function gettotal()
    {
      return $this->total;
    }

		//Funciones de la clase vende-compra

		function fechaexpiracion(){

		}

		function confirmacion(){

		}

		function relevancia(){

		}

}



?>
