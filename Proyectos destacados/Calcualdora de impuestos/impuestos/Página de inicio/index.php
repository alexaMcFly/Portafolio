<?php include 'php/db.php' ?>

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
		function calcularIva_i(){
			try{
				var importe =  parseFloat(document.getElementById('importe_i').value) || 0;

				document.getElementById('iva_i').value = importe * .16;
			}catch (e){}
		}

		function calcularIva_e(){
			try{
				var importe =  parseFloat(document.getElementById('importe_e').value) || 0;

				document.getElementById('iva_e').value = importe * .16;
			}catch (e){}
		}

		function confirmDelete(){
			var respuesta = confirm("¿Realmente desea eliminar esta factura?");

			if(respuesta == true){
				return true;
			}else{
				return false;
			}
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
	<?php if (isset($_SESSION['message'])) {?>	
		<div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
		  <?= $_SESSION['message'] ?>
		  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	<?php  session_unset(); } ?>
	<div id="containerIngreso">
		<h2>INGRESOS</h2>
		<hr> 
		<form method="POST" action="php/registrarIngreso.php">
			<input type="text" name="noFactura_i" id="nofactura_i" placeholder="No. Factura" class="margen" autofocus required>
			<label>Fecha</label>
			<input type="date" name="fecha_i" id="fecha_i" placeholder="Fecha" class="margen" required>
			<label><select name="cliente_i" class="margen" required>
				<option value="" hidden>Selecciona el cliente</option>
				<?php  
					$query = "SELECT * FROM clientes";
					$execute = mysqli_query($conn,$query) or die(mysqli_error($conn));
				?>

				<?php foreach ($execute as $options){ ?>
						<option value="<?php echo $options['rfc'] ?>"><?php echo $options['Nombre'] ?></option>
				<?php } ?>
			</select></label>
			<input type="number" name="importe_i" id="importe_i" placeholder="Importe" class="margenNum" step="0.1" oninput="calcularIva_i()" required>
			<input type="number" value="" name="iva_i" id="iva_i" class="margenNum" placeholder="IVA" readonly>
			<!--<input type="number" value="" name="total_i" id="total_i" class="margenNum" placeholder="Total">-->
			<input type="submit" name="registrarIngreso" value="Registrar Ingreso" class="boton">
		</form>
	

		<div class="col-md-8">
			<table class="table table-bordered tabla">
				<thead>
					<tr>
						<th>No. Factura</th>
						<th>Fecha de emisión</th>
						<th>RFC</th>
						<th>Importe</th>
						<th>IVA</th>
						<th>Total</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<br><br>
				<tbody>
					<?php
						$query = "SELECT * FROM ingresos";
						$execute = mysqli_query($conn,$query);

						while ($row = mysqli_fetch_array($execute)) {?>
							<tr>
								<td><?php echo $row['noFactura']; ?></td>
								<td><?php echo $row['fecha']; ?></td>
								<td><?php echo $row['rfc']; ?></td>
								<td><?php echo $row['importe']; ?></td>
								<td><?php echo $row['iva']; ?></td>
								<td><?php echo $row['total']; ?></td>
								<td>
										<a href="php/editIngreso.php?noFactura=<?php echo $row['noFactura']?>" class="btn btn-primary">
											<?php print("<img src='images/edit_white.ico' height='26'>"); ?>
										</a>
										<a href="php/deleteIngreso.php?noFactura=<?php echo $row['noFactura']?>" class="btn btn-danger" onclick="return confirmDelete()">
											<?php print("<img src='images/delete_white.ico' height='26'>"); ?>
										</a>
									</td>
							</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>

	<div id="containerEgreso">
		<h2>EGRESOS</h2>
		<hr> 
		<form method="POST" action="php/registrarEgreso.php">
			<input type="text" name="noFactura_e" id="nofactura_e" placeholder="No. Factura" class="margen" autofocus required>
			<label>Fecha</label>
			<input type="date" name="fecha_e" id="fecha_e" value="" class="margen" required>
			<label><select name="cliente_e" class="margen" required>
				<option value="" hidden>Selecciona el cliente</option>
				<?php 
					include 'php/db.php'; 
					$query = "SELECT * FROM clientes";
					$execute = mysqli_query($conn,$query) or die(mysqli_error($conn));
				?>

				<?php foreach ($execute as $options){ ?>
						<option value="<?php echo $options['rfc'] ?>"><?php echo $options['Nombre'] ?></option>
				<?php } ?>
			</select></label>
			<input type="number" name="importe_e" id="importe_e" placeholder="Importe" class="margenNum" step="0.1" oninput="calcularIva_e()" required>
			<input type="number" value="" name="iva_e" id="iva_e" class="margenNum" placeholder="IVA" readonly>
			<!--<input type="number" value="" name="total_e" id="total_e" class="margenNum" placeholder="Total" >-->
			<input type="submit" name="registrarEgreso" value="Registrar Egreso" class="boton">
		</form>

		<div class="col-md-8">
			<table class="table table-bordered tabla">
				<thead>
					<tr>
						<th>No. Factura</th>
						<th>Fecha de emisión</th>
						<th>RFC</th>
						<th>Importe</th>
						<th>IVA</th>
						<th>Total</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<br><br>
				<tbody>
					<?php
						$query = "SELECT * FROM egresos";
						$execute = mysqli_query($conn,$query);

						while ($row = mysqli_fetch_array($execute)) {?>
							<tr>
								<td><?php echo $row['noFactura']; ?></td>
								<td><?php echo $row['fecha']; ?></td>
								<td><?php echo $row['rfc']; ?></td>
								<td><?php echo $row['importe']; ?></td>
								<td><?php echo $row['iva']; ?></td>
								<td><?php echo $row['total']; ?></td>
								<td>
										<a href="php/editEgreso.php?noFactura=<?php echo $row['noFactura']?>" class="btn btn-primary">
											<?php print("<img src='images/edit_white.ico' height='26'>"); ?>
										</a>
										<a href="php/deleteEgreso.php?noFactura=<?php echo $row['noFactura']?>" class="btn btn-danger">
											<?php print("<img src='images/delete_white.ico' height='26'>"); ?>
										</a>
									</td>
							</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		<br><div class="row">
		<div class="col-3"></div>
		<div class="col-2">
		<button onclick="location.href='formISR.php'" class="btn btn-warning">ISR</a>
		</div>
		<div class="col-2"></div>
		<div class="col-2">
		<button onclick="location.href='formIVA.php'" class="btn btn-success">IVA</a>
		</div>
		<div class="col-2">
		<button onclick="location.href='cliente.php'" class="btn btn-dark">Clientes</a>
		</div>
		<br><br><br><br>
		
	</div>

	<!--SCRIPTS-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>