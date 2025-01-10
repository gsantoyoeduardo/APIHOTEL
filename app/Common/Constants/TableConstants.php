<?php

namespace App\Common\Constants;

class TableConstants
{
    const ESTADO_GENERAL = [
        'ACTIVO' => 1,
        'ELIMINADO' => 2,
    ];
    const ESTADOS_USUARIO = [
        'ACTIVO' => 1,
        'INACTIVO' => 2,
        'SUSPENDIDO' => 3,
        'ELIMINADO' => 4
    ];


    // tambien los pueden definir de esta manera:
    const ESTADO_USUARIO_ACTIVO = 1;
    const ESTADO_USUARIO_INACTIVO = 0;
    const ESTADO_USUARIO_BLOQUEADO = 2;
}




