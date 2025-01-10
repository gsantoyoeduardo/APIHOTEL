<?php

namespace App\Http\Controllers;

use App\Application\Interface\ISucursalApplication;
use App\Http\Requests\Sucursal\{SucursalInsertarRequestValidacion, SucursalActualizarRequestValidacion, SucursalEliminarRequestValidacion};

use App\Common\Helpers\ResponseHelper;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use Illuminate\Routing\Controller;

class SucursalController extends Controller
{
    protected ISucursalApplication $SucursalApplication;

    public function __construct(ISucursalApplication $SucursalApplication)
    {
        $this->SucursalApplication = $SucursalApplication;
    }

    public function Crear(SucursalInsertarRequestValidacion $request): JsonResponse
    {
        try {
            $data = $this->SucursalApplication->Insertar($request->all());
            return response()->json((new ResponseHelper())->success('La operación se completó con éxito.', $data));
        } catch (\Throwable $th) {
            return response()->json((new ResponseHelper())->error('Ocurrio un error.', $th->getMessage()));
        }
    }

    public function Actualizar(SucursalActualizarRequestValidacion $request, int $id): JsonResponse
    {
        try {
            $data = $this->SucursalApplication->Actualizar($id, $request->all());
            if (!$data) {
                return response()->json((new ResponseHelper())->error('Hubo un problema al intentar actualizar el registro. Por favor, inténtalo nuevamente.'));
            }
            return response()->json((new ResponseHelper())->success('La operación se completó con éxito.', $data));
        } catch (\Throwable $th) {
            return response()->json((new ResponseHelper())->error('Ocurrio un error.', $th->getMessage()));
        }
    }

    public function Eliminar(SucursalEliminarRequestValidacion $request, int $id): JsonResponse
    {
        try {
            $data = $this->SucursalApplication->Eliminar($id, $request->all());
            if (!$data) {
                return response()->json((new ResponseHelper())->error('Hubo un problema al intentar eliminar el registro. Por favor, inténtalo nuevamente.'));
            }
            return response()->json((new ResponseHelper())->success('La operación se completó con éxito.', $data));
        } catch (\Throwable $th) {
            return response()->json((new ResponseHelper())->error('Ocurrio un error.', $th->getMessage()));
        }
    }

    public function ObtenerTodos()
    {
        try {
            $data = $this->SucursalApplication->ObtenerTodo();
            return response()->json((new ResponseHelper())->success('La operación se completó con éxito.', $data));
        } catch (\Throwable $th) {
            return response()->json((new ResponseHelper())->error('Ocurrio un error.', $th->getMessage()));
        }
    }

    public function ObtenerPorId($id)
    {
        try {
            $data = $this->SucursalApplication->ObtenerPorId($id);
            return response()->json((new ResponseHelper())->success('La operación se completó con éxito.', $data));
        } catch (\Throwable $th) {
            return response()->json((new ResponseHelper())->error('Ocurrio un error.', $th->getMessage()));
        }
    }
}
