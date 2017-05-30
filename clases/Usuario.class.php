<?php

   require_once('../persistencia/PersistenciaUsuario.class.php');

 class Usuario {
   protected $id;
   protected $login;
   protected $password;
   protected $categoria;
   protected $correo;
   protected $eliminado;

   function __construct($ci, $nombre, $contrasena, $cat, $email,$borrado) {
     $this->id = $ci;
     $this->login= $nombre;
     $this->password = $contrasena;
     $this->categoria = $cat;
     $this->correo = $email;
     $this->eliminado = $borrado;
   }

   public function getId() {
        return $this->id;
   }
   public function getLogin(){
    	return $this->login;
   }
   public function getPassword(){
    	return $this->contrasena;
   }
   public function getCategoria() {
     	return $this->cat;
   }
   public function getCorreo() {
     	return $this->email;
   }
   public function getEliminado() {
     	return $this->borrado;
   }


   public function setId() {
        $this->id=$ci;
   }
   public function setLogin(){
		$this->login=$nombre;
   }
   public function setPassword(){
    	$this->password=$contrasena;
   }
   public function setCategoria() {
     	$this->categoria=$cat;
   }
   public function setCorreo() {
     	$this->correo=$email;
   }
   public function setEliminado() {
     	$this->eliminado=$borrado;
   }
 }


//Funcion para agregar usuario
 function alta ($conex){
  $pu = new PersistenciaUsuario;
  return ($pu->agregar($this,$conex));
 }


?>
