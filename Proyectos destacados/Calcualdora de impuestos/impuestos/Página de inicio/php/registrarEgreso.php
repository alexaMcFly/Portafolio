<?php

	include("db.php");


	if (isset($_POST['registrarEgreso'])) {
		$noFactura_e = $_POST['noFactura_e'];
		$fecha_e = $_POST['fecha_e'];
		$cliente_e = $_POST['cliente_e'];
		$importe_e = $_POST['importe_e'];
		$iva_e = $_POST['iva_e'];
		$total_e = $importe_e + $iva_e;


		$query = "INSERT INTO egresos (noFactura,fecha,rfc,importe,iva,total) VALUES ('$noFactura_e','$fecha_e','$cliente_e','$importe_e','$iva_e','$total_e')";
		$result = mysqli_query($conn, $query);


		if (!$result) {
			die("Conchetumareeeeeeeeeeeeeeeeeeeee");
		}

		$_SESSION['message'] = 'Factura de egreso registrada';
		$_SESSION['message_type'] = 'primary';

		header("Location: ../index.php");
	
	}

?>