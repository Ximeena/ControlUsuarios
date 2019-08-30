<?php

class Conexion
{
    public static function conectar()
    {
        try {

            $conexion = new PDO("mysql:host=localhost;dbname=ControlUsuarios", "root", "");

            return $conexion;

        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
