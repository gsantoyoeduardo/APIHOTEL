<?php

namespace App\Http\Controllers;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

interface BaseControllerInterface
{
    public function obtenerPorId(int $id);
    public function ObtenerTodos();
    public function Crear(Request $request);
    public function Actualizar(int $id, Request $request);
    public function Eliminar(int $id);
}

