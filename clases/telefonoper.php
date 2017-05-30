<?php

require_once('../persistencia/PersistenciaTelefonoper.php');

class Telefonoper{

    private $ci;
    private $telefono;

    function __construct($a='',$b='')
    {
    	  $this->ci= $a;
        $this->telefono= $b;
      }


    //Métodos set

    public function setci($a)
    {
      $this->ci= $a;
    }

    public function settelefono($b)
    {
      $this->telefono= $b;
    }

    //Métodos get

    public function getci()
    {
      return $this->ci;
    }

    public function gettelefono()
    {
      return $this->telefono;
    }

      //Funciones de la clase TelefonoPer

     //Funcion para hacer mostrar usuarios en el sitio
      public function agregartel($conex){
       $pu = new PersistenciaTelefonoper;
       return $pu->subetel($this,$conex);
      }

    }

?>
