<!DOCTYPE html>
<html lang="es">
	<head>
	<?php
	session_start();
	if (isset($_SESSION["usuario"])) {
		if ($_SESSION["usuario"]["privilegio"] == 1) {
			header("location:admin.php");
		}
	} else {
		header("location:usuario.php");
	}

	include "./controlador/UsuarioControlador.php";
	include './helps/helps.php';
	$filas = UsuarioControlador::getUsuarios();
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
						<a href="cerrar-sesion.php" class="btn btn-primary btn-lg">Cerrar sesión</a>
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
											<th>Nombre</th>
											<th>Usuario</th>
											<th>Email</th>
											<th>Privilegio</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($filas as $usuario) {?>
										<tr>
											<td><?php echo $usuario["id"] ?></td>
											<td><?php echo $usuario["nombre"] ?></td>
											<td><?php echo $usuario["usuario"] ?></td>
											<td><?php echo $usuario["email"] ?></td>
											<td><?php echo getPrivilegio($usuario["privilegio"]) ?></td>
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