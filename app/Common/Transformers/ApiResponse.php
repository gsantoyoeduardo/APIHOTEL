<?php

namespace App\Common\Transformers;

use App\Common\Constants\AppConstants;

class ApiResponse
{
    protected function successResponse(string $message, $data = [])
    {
        $code =  AppConstants::getCodigo('SUCCESS');        
        $response = [
            'codigo' => $code,   
            'mensaje' => $message
        ];
        if (!empty($data)) {
            $response['data'] = $data;
        }
        return response()->json($response);
    }

    protected function errorResponse(string $message, $data = [])
    {
        $code =  AppConstants::getCodigo('ERROR');        
        $response = [
            'codigo' => $code,   
            'mensaje' => $message
        ];
        if (!empty($data)) {
            $response['data'] = $data;
        }
        return response()->json($response);
    }

    /*
    
    $validationresponse = [
        ['codigo' => 201, 'mensaje' => 'No se encuentra serie'],
        ['codigo' => 202, 'mensaje' => 'No se encuentra lote'],
        ['codigo' => 203, 'mensaje' => 'No se encuentra almacen']
    ];


    opc2: habilitar codigo comentado
    $validationresponse = [
        201 => 'No se encuentra serie',
        202 => 'No se encuentra lote',
        203 => 'No se encuentra almacen'
    ];


    */
    protected function validationResponse(string $message, $validationresponse = [])
    {
        $code = AppConstants::getCodigo('VALIDATION');  
        $response = [
            'codigo' => $code,   
        ];
        if (!empty($message)) {
            $response['mensaje'] = $message;
        }
        /*
        $errores = [];
        foreach ($validationresponse as $codigo => $mensaje) {
            $errores[] = ['codigo' => $codigo, 'mensaje' => $mensaje];
        }
        $response['errores'] = $errores;
        */
        $response['errores'] = $validationresponse;  
        return response()->json($response);
    }

}