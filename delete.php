<?php

include './controlador/UsuarioControlador.php';
include './controlador/CambioControlador.php';
include './helps/helps.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["id"])) {

        $id = validar_campo($_GET["id"]);
        $usuarioC = UsuarioControlador::getUsuarioPorId($id);
        $usuario = $_SESSION["usuario"]["nombre"];

        if (UsuarioControlador::eliminarUsuario($id)) {
            CambioControlador::guardarRegistro($usuario,$usuarioC->getUsuario(),3);
            header("location:admin.php");
        }

    }
} else {
    header("location:admin.php?error=1");
}
