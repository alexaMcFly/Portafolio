<?php

	session_start();

	$conn = mysqli_connect(
		'localhost',
		'root',
		'',
		'impuestos'
	);

	/*if (isset($conn)) {
		echo 'DB is connected';
	}*/

?>