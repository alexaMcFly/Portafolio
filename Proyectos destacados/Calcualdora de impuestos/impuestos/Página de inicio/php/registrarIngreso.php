<?php

	include("db.php");


	if (isset($_POST['registrarIngreso'])) {
		$noFactura_i = $_POST['noFactura_i'];
		$fecha_i = $_POST['fecha_i'];
		$cliente_i = $_POST['cliente_i'];
		$importe_i = $_POST['importe_i'];
		$iva_i = $_POST['iva_i'];
		$total_i = $importe_i + $iva_i;


		$query = "INSERT INTO ingresos (noFactura,fecha,rfc,importe,iva,total) VALUES ('$noFactura_i','$fecha_i','$cliente_i','$importe_i','$iva_i','$total_i')";
		$result = mysqli_query($conn, $query);


		if (!$result) {
			die("Conchetumareeeeeeeeeeeeeeeeeeeee");
		}

		$_SESSION['message'] = 'Factura de ingreso registrada';
		$_SESSION['message_type'] = 'primary';

		header("Location: ../index.php");
	
	}

?>