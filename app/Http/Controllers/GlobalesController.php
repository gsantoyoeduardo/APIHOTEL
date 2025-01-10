<?php

namespace App\Http\Controllers;

use App\Application\Interface\IGlobalesApplication;
use App\Application\Services\GlobalesServices;
use App\Application\Services\Auditorias\AuditoriaGlobalesServices;
use App\Common\Helpers\ResponseHelper;
use App\Http\Requests\Globales\{GlobalesInsertarRequestValidacion, GlobalesActualizarRequestValidacion, GlobalesEliminarRequestValidacion};

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Carbon\Carbon;

class GlobalesController extends Controller
{
    protected IGlobalesApplication $GlobalesApplication;

    public function __construct(IGlobalesApplication $GlobalesApplication)
    {
        $this->GlobalesApplication = $GlobalesApplication;

    }

    public function Crear(GlobalesInsertarRequestValidacion $request): JsonResponse
    {
        try {
            $data = $this->GlobalesApplication->Insertar($request->all());
            return response()->json((new ResponseHelper())->success('La operación se completó con éxito.', $data));
        } catch (\Throwable $th) {
            return response()->json((new ResponseHelper())->error('Ocurrio un error.', $th->getMessage()));
        }
    }

    public function Actualizar(GlobalesActualizarRequestValidacion $request, int $id): JsonResponse
    {
        try {
            $data = $this->GlobalesApplication->Actualizar($id, $request->all());
            if(!$data){
                return response()->json((new ResponseHelper())->error('Hubo un problema al intentar actualizar el registro. Por favor, inténtalo nuevamente.'));    
            }
            return response()->json((new ResponseHelper())->success('La operación se completó con éxito.', $data));
        } catch (\Throwable $th) {
            return response()->json((new ResponseHelper())->error('Ocurrio un error.', $th->getMessage()));
        }
    }

    public function Eliminar(GlobalesEliminarRequestValidacion $request,int $id): JsonResponse
    {
        try {
            $data = $this->GlobalesApplication->Eliminar($id,$request->all());
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
            $data = $this->GlobalesApplication->ObtenerTodo();
            return response()->json((new ResponseHelper())->success('La operación se completó con éxito.', $data));
        } catch (\Throwable $th) {
            return response()->json((new ResponseHelper())->error('Ocurrio un error.', $th->getMessage()));
        }
    }

    public function ObtenerPorId($id)
    {
        try {
            $data = $this->GlobalesApplication->ObtenerPorId($id);
            return response()->json((new ResponseHelper())->success('La operación se completó con éxito.', $data));
        } catch (\Throwable $th) {
            return response()->json((new ResponseHelper())->error('Ocurrio un error.', $th->getMessage()));
        }
    }
}
