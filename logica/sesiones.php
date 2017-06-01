<?php
session_cache_expire(2);
if(!isset($_SESSION['PHPSESSID'])) {
	session_start(); }
header("Cache-control: private");
header("Cache-control: no-cache, must-revalidate");
header("Pragma: no-cache");
if(!isset($_SESSION['LOGIN'])) {
	require_once('../logica/funciones.php');
	salir();
	?>
	<script type="text/javascript">
		window.alert ("¡No evite el login!\n Debe loggearse para poder utilizar el sitio");
		location.href="../presentacion/index.php";
	</script>
	<?php
}

?>
