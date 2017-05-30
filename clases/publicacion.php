<?php
require_once('../persistencia/Persistenciapublicacion.php');

class Publicacion{

    private $id;
    private $cipersona;
    private $nombrepubli;
    private $precio;
    private $descripcion;
    private $categoria;
    private $stock;
    private $fecha;
    private $tipo;


    function __construct($a='',$b='',$c='',$d='',$e='',$f='',$g='',$h='',$i='')
    {
    	  $this->id= $a;
        $this->cipersona= $b;
        $this->nombrepubli= $c;
        $this->precio= $d;
        $this->descripcion= $e;
        $this->categoria= $f;
        $this->stock= $g;
        $this->fecha= $h;
        $this->tipo= $i;

    }

    //Métodos set

    public function setid($a)
    {
      $this->id= $a;
    }

    public function setcipersona($b)
    {
      $this->cipersona= $b;
    }

    public function setnombrepubli($c)
    {
      $this->nombrepubli= $c;
    }

    public function setprecio($d)
    {
      $this->precio= $d;
    }

    public function setdescripcion($e)
    {
      $this->descripcion= $e;
    }

    public function setcategoria($f)
    {
      $this->categoria= $f;
    }

    public function setstock($g)
    {
      $this->stock= $g;
    }

    public function setfecha($h)
    {
      $this->fecha= $h;
    }

    public function settipo($i)
    {
      $this->tipo= $i;
    }


    //Métodos get

    public function getid()
    {
      return $this->id;
    }

    public function getcipersona()
    {
      return $this->cipersona;
    }

    public function getnombrepubli()
    {
      return $this->nombrepubli;
    }

    public function getprecio()
    {
      return $this->precio;
    }

    public function getdescripcion()
    {
      return $this->descripcion;
    }

    public function getcategoria()
    {
      return $this->categoria;
    }

    public function getstock()
    {
      return $this->stock;
    }

    public function getfecha()
    {
      return $this->fecha;
    }

    public function gettipo()
    {
      return $this->tipo;
    }

    //Funciones de la clase publicacion
    function modipubli($conex){
	   $pu = new Persistenciapublicacion;
	   return ($pu->cambiopubli($this,$conex));
	  }

    function sanpubli($conex){
	   $pu = new Persistenciapublicacion;
	   return ($pu->sancionpubli($this,$conex));
	  }

    function borrar($conex){
	   $pu = new Persistenciapublicacion;
	   return ($pu->eliminar($this,$conex));
	  }

}
?>
