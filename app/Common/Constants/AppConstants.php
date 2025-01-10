<?php

namespace App\Common\Constants;
class AppConstants
{
    const STATUS_SUCCESS = 'success';
    const STATUS_ERROR = 'error';
    const ROLE_ADMIN = 'admin';
    const ROLE_USER = 'user';
    //para respuestas correctas del api 
    const SUCCESS_CODE = 0;
    const ERROR_CODE = 1;

    public static function getCodigo($type)
    {
        $codigo = [
            'ERROR' => 500,
            'SUCCESS' => 200,
            'VALIDATION' => 422
        ];
        return $codigo[$type] ?? null;
    }
}
