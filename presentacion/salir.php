<?php
require_once("../logica/sesiones.php");

if (isset($_SESSION["PHPSESSID"])) {
	require_once('../logica/funciones.php');
	?>
		<script type="text/javascript">
			window.alert ("Adios <?php echo $_SESSION["nombre"];?>\nVuelva pronto! ");
		</script>
	<?php
	salir();
	?>
	<script type="text/javascript">
		location.href="../presentacion/index.php";
	</script>
<?php
}
else{
?>

	<script type="text/javascript">
		window.alert ("No existe una sesion abierta");
		location.href="index.php";
	</script>
<?php
}
?>
