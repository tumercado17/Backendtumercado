<?php

require_once('../clases/persona.php');
require_once('../logica/funciones.php');


$nom= strip_tags(trim($_POST['nombre']));
//trim elimina los espacion en blanco
$pass = strip_tags(trim($_POST['contrasena']));

$conex = conectar();
$u= new Persona ('',$nom,'','','','','','','','',$pass); //la cantidad de elementos de la clase

$datos_u=$u->loginper($conex);
  print_r($datos_u);
  if(!empty($datos_u)){
    ?>
    <script type="text/javascript">
    location.href="../presentacion/menu.php";
    </script>


    <?php

}  else{
  ?>
  <script type="text/javascript">
  window.alert("El Usuario o Password \n no es correcto.");
  location.href="../presentacion/index.php";
  </script>
  <?php
//  desconectar($conex);

}

?>
