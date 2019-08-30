<?php

class Cambio
{

    private $id;
    private $usuario;
    private $usuarioC;
    private $cambio;
    private $fecha_registro;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    public function getUsuarioC()
    {
        return $this->usuarioC;
    }

    public function setUsuarioC($usuarioC)
    {
        $this->usuarioC = $usuarioC;
    }

    public function getCambio()
    {
        return $this->cambio;
    }

    public function setCambio($cambio)
    {
        $this->cambio = $cambio;
    }

    public function getFecha_registro()
    {
        return $this->fecha_registro;
    }

    public function setFecha_registro($fecha_registro)
    {
        $this->fecha_registro = $fecha_registro;
    }

}