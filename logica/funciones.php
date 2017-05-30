<?php

function conectar(){
    try {
        $conexion = new PDO('mysql:host=localhost;dbname=base.sitio', 'root', '');
        $conexion->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
        return($conexion);
    } catch (PDOException $e) {

        print "<p>Error: No puede conectarse con la base de datos.</p>\n";

        exit();
    }
}

function desconectar($conexion)
{
   $conexion=null;

}



?>
