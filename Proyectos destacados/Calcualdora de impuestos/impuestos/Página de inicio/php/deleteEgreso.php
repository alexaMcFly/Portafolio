<?php 
	
	include 'db.php';

	if (isset($_GET['noFactura'])) {
		$noFactura_del = $_GET['noFactura'];

		echo $noFactura_del;

		$query = "DELETE FROM egresos WHERE noFactura = '$noFactura_del'";
		$execute = mysqli_query($conn,$query);

		if (!$execute) {
			die("Conchetumareeeeeeeeeeeeeeeeeeeee");
		}

		$_SESSION['message'] = 'Factura eliminada correctamente';
		$_SESSION['message_type'] = 'danger';
		header("Location: ../index.php");
	}

?>