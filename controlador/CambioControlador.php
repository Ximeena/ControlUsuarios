<?php

include './datos/CambioDao.php';

class CambioControlador
{
    public function guardarRegistro($usuario, $usuarioC, $cambio) {

        $obj_cambio = new Cambio();
        $obj_cambio->setUsuario($usuario);
        $obj_cambio->setUsuarioC($usuarioC);
        $obj_cambio->setCambio($cambio);
        
        return CambioDao::registrarCambio($obj_cambio);
    }

    public function getCambios()
    {
        return CambioDao::getCambios();
    }
}
