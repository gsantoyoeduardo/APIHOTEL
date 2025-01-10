<?php

namespace App\Http\Controllers;

use App\Application\Interface\ILoteApplication;
use App\Common\Helpers\ResponseHelper;
use App\Http\Requests\Lote\{LoteInsertarRequestValidacion, LoteActualizarRequestValidacion, LoteEliminarRequestValidacion};

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class LoteController extends Controller
{
    protected ILoteApplication $LoteApplication;

    public function __construct(ILoteApplication $LoteApplication)
    {
        $this->LoteApplication = $LoteApplication;

    }

    public function Crear(LoteInsertarRequestValidacion $request): JsonResponse
    {
        try {
            $data = $this->LoteApplication->Insertar($request->all());
            return response()->json((new ResponseHelper())->success('La operación se completó con éxito.', $data));
        } catch (\Throwable $th) {
            return response()->json((new ResponseHelper())->error('Ocurrio un error.', $th->getMessage()));
        }
    }

    public function Actualizar(LoteActualizarRequestValidacion $request, int $id): JsonResponse
    {
        try {
            $data = $this->LoteApplication->Actualizar($id, $request->all());
            if(!$data){
                return response()->json((new ResponseHelper())->error('Hubo un problema al intentar actualizar el registro. Por favor, inténtalo nuevamente.'));    
            }
            return response()->json((new ResponseHelper())->success('La operación se completó con éxito.', $data));
        } catch (\Throwable $th) {
            return response()->json((new ResponseHelper())->error('Ocurrio un error.', $th->getMessage()));
        }
    }

    public function Eliminar(LoteEliminarRequestValidacion $request,int $id): JsonResponse
    {
        try {
            $data = $this->LoteApplication->Eliminar($id,$request->all());
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
            $data = $this->LoteApplication->ObtenerTodo();
            return response()->json((new ResponseHelper())->success('La operación se completó con éxito.', $data));
        } catch (\Throwable $th) {
            return response()->json((new ResponseHelper())->error('Ocurrio un error.', $th->getMessage()));
        }
    }

    public function ObtenerPorId($id)
    {
        try {
            $data = $this->LoteApplication->ObtenerPorId($id);
            return response()->json((new ResponseHelper())->success('La operación se completó con éxito.', $data));
        } catch (\Throwable $th) {
            return response()->json((new ResponseHelper())->error('Ocurrio un error.', $th->getMessage()));
        }
    }
}
