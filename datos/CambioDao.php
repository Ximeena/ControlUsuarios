<?php

include_once 'Conexion.php';
include './entidades/Cambio.php';

class CambioDao extends Conexion
{
    protected static $cnx;

    private static function getConexion()
    {
        self::$cnx = Conexion::conectar();
    }

    private static function desconectar()
    {
        self::$cnx = null;
    }

    public static function getCambioPorId($id)
    {
        $query = "SELECT id,usuario,usuarioC,cambio,fecha_registro FROM historial WHERE id = :id";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->bindParam(":id", $id);

        $resultado->execute();

        $filas = $resultado->fetch();

        $cambio = new Cambio();
        $cambio->setId($filas["id"]);
        $cambio->setUsuario($filas["usuario"]);
        $cambio->setCambio($filas["cambio"]);
        $cambio->setFecha_registro($filas["fecha_registro"]);

        return $cambio;
    }

    public static function getCambios()
    {
        $query = "SELECT id,usuario,usuario_cambio,cambio,fecha_cambio FROM historial";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->execute();

        $filas = $resultado->fetchAll();

        return $filas;
    }

    public static function registrarCambio($cambio)
    {
        $query = "INSERT INTO historial (usuario,usuario_cambio,cambio) VALUES (:usuario,:usuarioC,:cambio)";
        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $usuario     = $cambio->getUsuario();
        $usuarioC      = $cambio->getUsuarioC();
        $cambio        = $cambio->getCambio();

        $resultado->bindParam(":usuario", $usuario);
        $resultado->bindParam(":usuarioC", $usuarioC);
        $resultado->bindParam(":cambio", $cambio);

        if ($resultado->execute()) {
            return true;
        }

        return false;
    }
}
?>