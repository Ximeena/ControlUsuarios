<!DOCTYPE html>
<html lang="es">
    <head>
    <?php
    session_start();
    include './controlador/UsuarioControlador.php';
    include './helps/helps.php';

    $usuario = null;

    if (isset($_GET["id"])) {
        $id      = validar_campo($_GET["id"]);
        $usuario = UsuarioControlador::getUsuarioPorId($id);
    }
    ?>

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
        <form action="registroCode.php" method="POST" role="form">
            <?php if (is_null($usuario)) {?>
            <h2>Registrarse</h2>
            <?php } else {?>
            <h2>Editar Usuario</h2>
            <input type="hidden" name="id" value="<?php echo $usuario->getId() ?>">
            <?php }?>

            <input type="text" name="txtNombre" id="nombre" autofocus required placeholder="Ingresa tu nombre" value="<?php echo is_null($usuario) ? "" : $usuario->getNombre() ?>">
            <input type="email" name="txtEmail"  id="email"  required placeholder="Ingresa tu dirección de e-mail" value="<?php echo is_null($usuario) ? "" : $usuario->getEmail() ?>">
            <input type="text" name="txtUsuario"  id="usuario" autofocus required placeholder="usuario" value="<?php echo is_null($usuario) ? "" : $usuario->getUsuario() ?>">
            <?php if (isset($_SESSION["usuario"]) && $_SESSION["usuario"]["privilegio"] == 1 && !is_null($usuario)) {?>
            <input type="number" name="txtPrivilegio" required id="privilegio" value="<?php echo is_null($usuario) ? "2" : $usuario->getPrivilegio() ?>">
            <?php } else {?>
            <input type="password" name="txtPassword" required id="password" placeholder="****">
            <?php } ?>
            <?php if (!isset($_SESSION["usuario"])) {?>
            <input type="submit" class="btn btn-primary btn-lg" value="Agregar">
            <input type="button" OnClick="location.href='index.php'" class="btn btn-primary btn-lg" value="Regresar">
            <?php } else if ($_SESSION["usuario"]["privilegio"] == 1) {?>
            <input type="submit"  class="btn btn-primary btn-lg" value="<?php echo is_null($usuario) ? "Agregar" : "Editar" ?>">
            <input type="button" OnClick="location.href='admin.php'" class="btn btn-primary btn-lg" value="Regresar">
            <?php }?>
        </form>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
    	<script src="assets/js/app.js"></script>
    </body>
</html>