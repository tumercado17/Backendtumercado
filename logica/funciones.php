<?php

function conectar(){
    try {
	//servidor mysql de red
        //$conexion = new PDO('mysql:host=192.168.1.24;port=3306;dbname=base.sitio', 'root', 'Nacho12345.');
        $conexion = new PDO('mysql:host=162.216.19.206;port=443;dbname=proyecto_fassani','fassani','VnalkNMlFOoxHlkIYkXS');
	//Xampp local del pc
        //$conexion = new PDO('mysql:host=localhost;port=3306;dbname=base.sitio', 'root', '');
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
