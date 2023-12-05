<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Calculo de Impuestos</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
	<script type="text/javascript">
		function calcularIva(){
			try{
				var importe =  parseFloat(document.getElementById('importe_edit').value) || 0;

				document.getElementById('iva_edit').value = importe * .16;
			}catch (e){}
		}

	</script>
	<header>
		<nav class="navbar navbar-dark bg-primary">
			<div class="container">
				<a href="index.php" class="navbar-brand">Calculo de Impuestos</a>
			</div>
		</nav>
	</header>
	<br><br>


<?php 
	include ("db.php");

	if (isset($_GET['noFactura'])) {
		$noFactura_ed = $_GET['noFactura'];
		$query = "SELECT * FROM ingresos WHERE noFactura = '$noFactura_ed'";
		$execute = mysqli_query($conn,$query);
		if (mysqli_num_rows($execute) == 1) {
			$row = mysqli_fetch_array($execute);
			$noFact = $row['noFactura'];
			$fecha = $row['fecha'];
			$rfc = $row['rfc'];
			$importe = $row['importe'];
			$iva = $row['iva'];
		}
	}

	if(isset($_POST['update'])){
		$noFactura_ed = $_GET['noFactura'];
		$noFact = $_POST['noFactura_edit'];
		$fecha = $_POST['fecha_edit'];
		$rfc = $_POST['cliente_edit'];
		$importe = floatval($_POST['importe_edit']);
		$iva = floatval($_POST['iva_edit']);
		$total = floatval($importe + $iva);

		$query = "UPDATE ingresos SET noFactura = '$noFact', fecha = '$fecha', rfc = '$rfc', importe = '$importe', iva = '$iva', total = '$total' WHERE noFactura = '$noFactura_ed'";

		mysqli_query($conn, $query);

		$_SESSION['message'] = 'Datos de factura actualizados';
		$_SESSION['message_type'] = 'warning';
		header("Location: ../index.php");

	}
?>	

<div class="container p-4">
	<div class="row">
		<div class="col md-4 mx-auto">
			<div class="card card-body">
				<form action="editIngreso.php?noFactura=<?php echo $_GET['noFactura']; ?>" method="POST">
					<div class="form-group">
						<input type="text" name="noFactura_edit" value="<?php echo $noFact; ?>" class="form-control"  placeholder="Nuevo número de factura" required>
					</div><br>
					<div class="form-group">
						<input type="date" name="fecha_edit" value="<?php echo $fecha; ?>" class="form-control" required>
					</div><br>
					<div class="form-group">
						<style type="text/css">
							.margen{
								padding: 5px 5px;
								width: 1237px;
							}
							.margenNum{
								padding: 5px 8px;
								width: 1237px;
							}
						</style>
						<label><select name="cliente_edit" class="margen" required>
							<option value="" hidden>Selecciona el cliente</option>
							<?php 
								include 'db.php'; 
								$query = "SELECT * FROM clientes";
								$execute = mysqli_query($conn,$query) or die(mysqli_error($conn));
							?>

							<?php foreach ($execute as $options){ ?>
									<option value="<?php echo $options['rfc'] ?>"><?php echo $options['Nombre'] ?></option>
							<?php } ?>
						</select></label>
					</div><br>
					<div class="form-group">
						<input type="number" name="importe_edit" id="importe_edit" value="" placeholder="Importe" class="form-control" step="0.1" oninput="calcularIva()" required>
					</div><br>
					<div class="form-group">
						<input type="number" value="" name="iva_edit" id="iva_edit" class="margenNum" value="<?php echo $iva; ?>" placeholder="IVA" readonly>
					</div><br>
					<button class="btn btn-success" name="update"> 
						Actualizar
					</button>
					<a href="../index.php" class="btn btn-danger">
						Cancelar
					</a>
				</form>
			</div>
		</div>
	</div>
</div>


<!--SCRIPTS-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>