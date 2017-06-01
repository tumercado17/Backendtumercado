<?php

function conectar(){
    try {
        $conexion = new PDO('mysql:host=162.216.19.206;dbname=proyecto_fassani','fassani','VnalkNMlFOoxHlkIYkXS');
        $conexion->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
        return($conexion);
    } catch (PDOException $e) {

        print "<p>Error: No puede conectarse con la base de datos.</p>\n";

        exit();
    }
}

function desconectar($conexion){
   $conexion=null;
}

function salir(){
	session_unset();
	session_destroy();
}



?>
