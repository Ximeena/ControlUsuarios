<!DOCTYPE html>
<html lang="es">
    <head>
        <?php session_start();?>
        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="/favicon.ico">

		<title>Control de Usuarios</title>

		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
        <link rel=stylesheet href="assets/css/styles.css">
    </head>
    <body>
        <form id="loginForm" action="validarCode.php" method="POST" role="form">
            <h2>Iniciar Sesion</h2>
            <input type="text" placeholder="Usuario" name="txtUsuario" id="usuario">
            <input type="password" placeholder="Contraseña" name="txtPassword" required id="password">
            <input type="submit" class="btn btn-primary btn-lg" value="Ingresar">
			<input type="button" OnClick="location.href = 'index.php'" class="btn btn-primary btn-lg" value="Regresar">
        </form>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
    	<script src="assets/js/app.js"></script>
    </body>
</html>