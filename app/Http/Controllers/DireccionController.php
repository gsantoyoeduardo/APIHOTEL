<?php

namespace App\Http\Controllers;

use App\Application\Interface\IDireccionApplication;
use App\Application\Services\DireccionServices;
use App\Application\Services\Auditorias\AuditoriaDireccionServices;
use App\Common\Helpers\ResponseHelper;
use App\Http\Requests\Direccion\{DireccionInsertarRequestValidacion, DireccionActualizarRequestValidacion, DireccionEliminarRequestValidacion};

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Carbon\Carbon;

class DireccionController extends Controller
{
    protected IDireccionApplication $DireccionApplication;

    public function __construct(IDireccionApplication $DireccionApplication)
    {
        $this->DireccionApplication = $DireccionApplication;

    }

    public function Crear(DireccionInsertarRequestValidacion $request): JsonResponse
    {
        try {
            $data = $this->DireccionApplication->Insertar($request->all());
            return response()->json((new ResponseHelper())->success('La operación se completó con éxito.', $data));
        } catch (\Throwable $th) {
            return response()->json((new ResponseHelper())->error('Ocurrio un error.', $th->getMessage()));
        }
    }

    public function Actualizar(DireccionActualizarRequestValidacion $request, int $id): JsonResponse
    {
        try {
            $data = $this->DireccionApplication->Actualizar($id, $request->all());
            if(!$data){
                return response()->json((new ResponseHelper())->error('Hubo un problema al intentar actualizar el registro. Por favor, inténtalo nuevamente.'));    
            }
            return response()->json((new ResponseHelper())->success('La operación se completó con éxito.', $data));
        } catch (\Throwable $th) {
            return response()->json((new ResponseHelper())->error('Ocurrio un error.', $th->getMessage()));
        }
    }

    public function Eliminar(DireccionEliminarRequestValidacion $request,int $id): JsonResponse
    {
        try {
            $data = $this->DireccionApplication->Eliminar($id, $request->all());
            if(!$data){
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
            $data = $this->DireccionApplication->ObtenerTodo();
            return response()->json((new ResponseHelper())->success('La operación se completó con éxito.', $data));
        } catch (\Throwable $th) {
            return response()->json((new ResponseHelper())->error('Ocurrio un error.', $th->getMessage()));
        }
    }

    public function ObtenerPorId($id)
    {
        try {
            $data = $this->DireccionApplication->ObtenerPorId($id);
            return response()->json((new ResponseHelper())->success('La operación se completó con éxito.', $data));
        } catch (\Throwable $th) {
            return response()->json((new ResponseHelper())->error('Ocurrio un error.', $th->getMessage()));
        }
    }
}
