<?php

include_once 'Conexion.php';
include './entidades/Usuario.php';

class UsuarioDao extends Conexion
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

    /*Login*/
    public static function login($usuario)
    {
        $query = "SELECT * FROM usuarios WHERE usuario = :usuario AND password = :password";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->bindValue(":usuario", $usuario->getUsuario());
        $resultado->bindValue(":password", $usuario->getPassword());

        $resultado->execute();

        if ($resultado->rowCount() > 0) {
            $filas = $resultado->fetch();
            if ($filas["usuario"] == $usuario->getUsuario()
                && $filas["password"] == $usuario->getPassword()) {
                return true;
            }
        }

        return false;
    }

    /*obtener usuarios*/
    public static function getUsuario($usuario)
    {
        $query = "SELECT id,nombre,email,usuario,privilegio,fecha_registro FROM usuarios WHERE usuario = :usuario AND password = :password";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->bindValue(":usuario", $usuario->getUsuario());
        $resultado->bindValue(":password", $usuario->getPassword());

        $resultado->execute();

        $filas = $resultado->fetch();

        $usuario = new Usuario();
        $usuario->setId($filas["id"]);
        $usuario->setNombre($filas["nombre"]);
        $usuario->setUsuario($filas["usuario"]);
        $usuario->setEmail($filas["email"]);
        $usuario->setPrivilegio($filas["privilegio"]);
        $usuario->setFecha_registro($filas["fecha_registro"]);

        return $usuario;
    }

    public static function getUsuarioPorId($id)
    {
        $query = "SELECT id,nombre,email,usuario,privilegio,fecha_registro FROM usuarios WHERE id = :id";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->bindParam(":id", $id);

        $resultado->execute();

        $filas = $resultado->fetch();

        $usuario = new Usuario();
        $usuario->setId($filas["id"]);
        $usuario->setNombre($filas["nombre"]);
        $usuario->setUsuario($filas["usuario"]);
        $usuario->setEmail($filas["email"]);
        $usuario->setPrivilegio($filas["privilegio"]);
        $usuario->setFecha_registro($filas["fecha_registro"]);

        return $usuario;
    }

    public static function eliminarUsuario($id)
    {
        $query = "DELETE FROM usuarios WHERE id = :id";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->bindParam(":id", $id);

        $resultado->execute();

        if ($resultado->execute()) {
            return true;
        }

        return false;
    }

    public static function getUsuarios()
    {
        $query = "SELECT id,nombre,email,usuario,privilegio,fecha_registro FROM usuarios";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->execute();

        $filas = $resultado->fetchAll();

        return $filas;
    }

    public static function registrar($usuario)
    {
        if (is_null($usuario->getId())) {
            $query = "INSERT INTO usuarios (nombre,email,usuario,password,privilegio) VALUES (:nombre,:email,:usuario,:password,:privilegio)";
        } else {
            $query = "UPDATE usuarios SET nombre=:nombre,email=:email,usuario=:usuario,privilegio=:privilegio WHERE id=:id";
        }

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $nombre     = $usuario->getNombre();
        $email      = $usuario->getEmail();
        $usu        = $usuario->getUsuario();
        $password   = $usuario->getPassword();
        $privilegio = $usuario->getPrivilegio();

        if (!is_null($usuario->getId())) {
            $id = $usuario->getId();
            $resultado->bindParam(":id", $id);
        } else {
            $resultado->bindParam(":password", $password);
        }

        $resultado->bindParam(":nombre", $nombre);
        $resultado->bindParam(":email", $email);
        $resultado->bindParam(":usuario", $usu);
        $resultado->bindParam(":privilegio", $privilegio);

        if ($resultado->execute()) {
            return true;
        }

        return false;
    }
}