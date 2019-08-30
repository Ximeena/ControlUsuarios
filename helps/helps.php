<?php

/**/
function validar_campo($campo)
{
    if (is_null($campo)) return $campo;
    $campo = trim($campo);
    $campo = stripcslashes($campo);
    $campo = htmlspecialchars($campo);

    return $campo;
}

function privilegio_es_valido($privilegio) {
    if (is_null($privilegio)) return false;
    
    if ($privilegio == 1 || $privilegio == 2) return true;
    
    return false;
}

function getPrivilegio($p)
{
    $privilegio = "";
    switch ($p) {
        case 1:
            $privilegio = "Administrador";
            break;

        case 2:
            $privilegio = "Usuario";
            break;

        default:
            $privilegio = "- No definido -";
            break;
    }

    return $privilegio;
}

function getTipoCambio($c)
{
    $cambio = "";
    switch ($c) {
        case 1:
            $cambio = "Edito";
            break;

        case 2:
            $cambio = "Añadio";
            break;

        default:
            $cambio = "Elimino";
            break;
    }

    return $cambio;
}
