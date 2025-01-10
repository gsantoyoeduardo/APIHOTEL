<?php


namespace App\Common\Helpers;

use App\Common\Constants\AppConstants;

class ResponseHelper
{
    public static function success(string $message, $data = []): array
    {
        return [
            'codigo' => AppConstants::SUCCESS_CODE,
            'mensaje' => $message,
            'data' => $data
        ];
    }

    public static function error(string $message, $errors = []): array
    {
        return [
            'codigo' => AppConstants::ERROR_CODE,
            'mensaje' => $message,
            'errors' => $errors
        ];
    }
}
