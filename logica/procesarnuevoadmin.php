<?php

require_once('../clases/persona.php');
Require_once('../clases/telefonoper.php');
require_once('../clases/administrador.php');
require_once('../logica/funciones.php');

//trim elimina los espacion en blanco
$ci=strip_tags(trim($_POST['ci']));
$nom=strip_tags(trim($_POST['nombre']));
$ape=strip_tags(trim($_POST['apellido']));
$cont=strip_tags(trim($_POST['contrasena']));
$email=strip_tags(trim($_POST['email']));
$calle=strip_tags(trim($_POST['calle']));
$num=strip_tags(trim($_POST['numero']));
$tarj=strip_tags(trim($_POST['tarjeta']));
$tel=strip_tags(trim($_POST['telefono']));
$grado=strip_tags(trim($_POST['grado']));
$pais=strip_tags(trim($_POST['pais']));

$conex = conectar();
$u= new Persona ($ci,$nom,$ape,$email,$pais,$tarj,'',$calle,$num,'',$cont); //la cantidad de elementos de la clase persona
$o= new administrador ('',$ci,$grado); //la cantidad de elementos de la clase administrador
$p= new telefonoper ($ci,$tel); //agrega el telefono seleccionado

$datos_d=$u->alta($conex);
$datos_a=$o->altaadmin($conex);
$datos_t=$p->agregartel($conex);

  if(!empty($datos_d and $datos_a and $datos_t)){
    //cierro php
    ?>
    <script type="text/javascript">
    window.alert("El Usuario a sido ingresado.");
    location.href="../presentacion/menu.php";
    </script>


    <?php
    //vuelvo a abrirlo

}  else{
  ?>
  <script type="text/javascript">
  window.alert("El Usuario no ingresado.");
  location.href="../presentacion/Registrarse.php";-->
  </script>
  <?php
//  desconectar($conex);

}

?>
