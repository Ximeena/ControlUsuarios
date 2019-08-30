<?php

include './controlador/UsuarioControlador.php';
include './controlador/CambioControlador.php';
include './helps/helps.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["txtNombre"]) && isset($_POST["txtEmail"]) && isset($_POST["txtUsuario"])) {

        $txtNombre     = validar_campo($_POST["txtNombre"]);
        $txtEmail      = validar_campo($_POST["txtEmail"]);
        $txtUsuario    = validar_campo($_POST["txtUsuario"]);
        $txtPassword   = isset($_POST["txtPassword"]) ? validar_campo($_POST["txtPassword"]) : null;
        $txtPrivilegio = isset($_POST["txtPrivilegio"]) ? validar_campo($_POST["txtPrivilegio"]) : 2;

        if (!privilegio_es_valido($txtPrivilegio)) {
            if (isset($_POST['id'])) {
                return header("location:registro.php?id=".$_POST['id']."error=3");        
            } else {
                return header("location:registro.php?error=3");
            }
        }

        if (isset($_POST["id"])) {
            if (UsuarioControlador::registrar($txtNombre, $txtEmail, $txtUsuario, $txtPassword, $txtPrivilegio, validar_campo($_POST["id"]))) {
                if ($_SESSION["usuario"]["privilegio"] == 1) {
                    $usuario = $_SESSION["usuario"]["nombre"];
                    CambioControlador::guardarRegistro($usuario,$txtUsuario,1);
                    header("location:admin.php");
                } else {  
                    header("location:login.php");
                }
            } else {
                echo 'Hubo un error al guardar';
            }
        } else if (is_null($txtPassword)) {
            header("location:registro.php?error=2");
        } else {
            if (UsuarioControlador::registrar($txtNombre, $txtEmail, $txtUsuario, $txtPassword, $txtPrivilegio, null)) {
                if ($_SESSION["usuario"]["privilegio"] == 1) {
                    $usuario = $_SESSION["usuario"]["nombre"];
                    CambioControlador::guardarRegistro($usuario,$txtUsuario,2);
                    header("location:admin.php");
                } else  {  
                    header("location:login.php");
                }
            }
        }
    // Redireccionar cuando no estan seteados los valores requeridos
    } else {
        if (isset($_POST['id'])) {
            header("location:registro.php?id=".$_POST['id']."error=2");        
        } else {
            header("location:registro.php?error=2");        
        }
    }
} else {
    header("location:registro.php?error=1");
}
