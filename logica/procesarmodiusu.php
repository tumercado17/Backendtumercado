<?php
require_once('../clases/persona.php');
//require_once('../clases/usuario.class.php');
require_once('../logica/funciones.php');

//$id = $_GET["ID"];
$id= strip_tags(trim($_POST['id']));
$ci=strip_tags(trim($_POST['ci']));
$nom=strip_tags(trim($_POST['nombre']));
$apell=strip_tags(trim($_POST['apellido']));
$email=strip_tags(trim($_POST['email']));
$cont=strip_tags(trim($_POST['contrasena']));
$calle=strip_tags(trim($_POST['calle']));
$numero=strip_tags(trim($_POST['numero']));
$calificacion=strip_tags(trim($_POST['calificacion']));
$nomusu=strip_tags(trim($_POST['nombreusu']));

$conex = conectar();
$u= new Persona ($ci,'','','','','','','',''); //la cantidad de elementos de la clase

$datos_s=$u->mostrarunaper($conex);

  if(!empty($datos_s)){
    $conex=conectar();

    // Si existe solo cambia el campo de suspencion
    $consultas = "update persona set nombre=:nombre, apellido=:apellido, email=:email, contrasena=:contrasena,
                calle=:calle, numero=:numero, calificacion=:calificacion where ci=:ci;";
    $result=$conex->prepare($consultas);
    $result->execute(array(':nombre'=>$nom,':apellido'=>$apell,':email'=>$email,':contrasena'=>$cont,
                            ':calle'=>$calle,':numero'=>$numero,':calificacion'=>$calificacion,':ci'=>$ci));
    $consulta=$result->fetchAll();

    ?>
    <script type="text/javascript">
    window.alert("Se aplicaron cambios correctamente.");
    location.href="../presentacion/buscarusu.php";
    </script>
    <?php

        }else{

          ?>
          <script type="text/javascript">
          window.alert("EL usuario no existe por lo tanto no se aplican los cambios");
          location.href="../presentacion/buscarpubli.php";
          </script>
          <?php
        //  desconectar($conex);

}

?>
