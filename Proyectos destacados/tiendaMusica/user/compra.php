<?php
    include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styleProduct.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Compras</title>
</head>
<body><br>
    <script type="text/javascript">

		function confirmDelete(){
			var respuesta = confirm("¿Realmente desea eliminar este producto?");

			if(respuesta == true){
				return true;
			}else{
				return false;   
			}
		}

        function calcularIva(){
			try{
				var subtotal =  parseFloat(document.getElementById('subtotal').value) || 0;

				document.getElementById('iva').value = subtotal * .16;
			}catch (e){}
		}

        function calcularTotal(){
			try{
				var iva =  parseFloat(document.getElementById('iva').value) || 0;
                var subtotal =  parseFloat(document.getElementById('subtotal').value) || 0;
				document.getElementById('total').value = subtotal + iva;
			}catch (e){}
		}
	</script>
    <div class="row"><div class="col-10"></div><div class="col-1"><label class="subtitulo"><?php session_start(); echo $_SESSION['usuario'];?></label></div></div>
    <div class="row"><div class="col-5"></div><div class="col-4"><label class="titulo">Compra</label></div></div>
    <hr size="2" color="black" width="80%"></hr>
    <div class="row">
        <div class="col-2"></div>   
        <div class="col-2"></div>
        <center>
        <div class="tabla">
        <table>
	
                <thead>
					<tr>
						<th>Id Compra</th>
						<th>Fecha</th>
                        <th>Subtotal</th>
						<th>IVA</th>
						<th>Total</th>
						<th>Factura</th>
                        <th></th>
                        <th></th>
					</tr>
				</thead>
				<br><br>
				<tbody>
					<?php
                        $idCliente= $_SESSION['cliente'];
						$sqlC = "SELECT * FROM compra where idCliente='$idCliente'";
						$queryC = mysqli_query($connection,$sqlC);

						while ($row = mysqli_fetch_array($queryC)) {?>
							<tr>
                                <td><a href="detalleCompra.php?idCompra=<?php echo $row['idCompra']?>">
                                        <?php echo $row['idCompra']; ?>
                                    </a>
                                </td>
								<td><?php echo $row['fecha']; ?></td>
								<td><?php echo $row['subtotal']; ?></td>
								<td><?php echo $row['iva']; ?></td>
								<td><?php echo $row['total']; ?></td>
                                <td><?php echo $row['factura']; ?></td>
								<td>
                                    <a href="formUpdateCompra.php?idCompra=<?php echo $row['idCompra']?>" class="btn btn-primary boton">
                                        <?php print("<img src='images/edit_white.ico' height='26'>"); ?>
                                    </a>
                                </td>
                                <td> 
                                    <a href="deleteCompra.php?idCompra=<?php echo $row['idCompra']?>" class="btn btn-danger" onclick="return confirmDelete()">
                                        <?php print("<img src='images/delete_white.ico' height='26'>"); ?>
                                    </a>
								</td>
							</tr>
					<?php } ?>
				</tbody>

			</table>
        </div></center>
    </div>    
</body>
</html>