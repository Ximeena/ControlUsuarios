<!DOCTYPE html>
<html lang="es">
	<head>
	<?php
    session_start();
    
	include "./controlador/CambioControlador.php";
    include './helps/helps.php';
    
	$filas = CambioControlador::getCambios();
	?>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="/favicon.ico">

		<title>Control de Usuarios</title>

		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="assets/css/overhang.min.css" />

	</head>
	<body>
		<div class="container">
			<div class="starter-template">
				<br>
				<br>
				<br>
				<div class="row">
					<div class="col-md-12">
						<br>
						<a href="cerrar-sesion.php" class="btn btn-primary">Cerrar sesión</a>
                        <a href="admin.php" class="btn btn-primary">Regresar</a>
						<br>
						<br>
					</div>
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-body">
								<table class="table table-hover">
									<thead>
										<tr>
											<th>ID</th>
											<th>Usuario Admin</th>
                                            <th>Tipo de Cambio</th>
											<th>Usuario Cambiado</th>
											<th>Fecha de Cambio</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($filas as $cambio) {?>
										<tr>
											<td><?php echo $cambio["id"] ?></td>
											<td><?php echo $cambio["usuario"] ?></td>
                                            <td><?php echo getTipoCambio($cambio["cambio"]) ?></td>
											<td><?php echo $cambio["usuario_cambio"] ?></td>
                                            <td><?php echo $cambio["fecha_cambio"] ?></td>
										</tr>
										<?php }?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript">

			function eliminar(confirmacion, url){
				if(confirmacion){
					window.location.href = url;
				}
			}
		</script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
		<script src="assets/js/app.js"></script>
	</body>
</html>