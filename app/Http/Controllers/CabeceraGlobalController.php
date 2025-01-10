<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Common\Helpers\ResponseHelper;
use App\Application\Interface\ICabeceraGlobalApplication;

class CabeceraGlobalController extends Controller
{

    protected ICabeceraGlobalApplication $CabeceraGlobalApplication;

    public function __construct(ICabeceraGlobalApplication $CabeceraGlobalApplication)
    {
        $this->CabeceraGlobalApplication = $CabeceraGlobalApplication;
    }

    public function Eliminar($id,Request $request)
    {
        try {
            $data = $this->CabeceraGlobalApplication->Eliminar($id,$request->all());
            if(!$data){
                return response()->json((new ResponseHelper())->error('Hubo un problema al intentar eliminar el registro. Por favor, inténtalo nuevamente.'));    
            }
            return response()->json((new ResponseHelper())->success('La operación se completó con éxito.', $data));
        } catch (\Throwable $th) {
            return response()->json((new ResponseHelper())->error('Ocurrio un error.', $th->getMessage()));
        }
    }

    public function Crear(Request $request)
    {
        try {
            $data = $this->CabeceraGlobalApplication->Insertar($request->all());
            return response()->json((new ResponseHelper())->success('La operación se completó con éxito.', $data));
        } catch (\Throwable $th) {
            return response()->json((new ResponseHelper())->error('Ocurrio un error.', $th->getMessage()));
        }
    }

    public function ObtenerPorId($id)
    {
        try {
            $data = $this->CabeceraGlobalApplication->ObtenerPorId($id);
            return response()->json((new ResponseHelper())->success('La operación se completó con éxito.', $data));
        } catch (\Throwable $th) {
            return response()->json((new ResponseHelper())->error('Ocurrio un error.', $th->getMessage()));
        }
    }

    public function Actualizar($id, Request $request)
    {
        try {
            $data = $this->CabeceraGlobalApplication->Actualizar($id, $request->all());
            if(!$data){
                return response()->json((new ResponseHelper())->error('Hubo un problema al intentar actualizar el registro. Por favor, inténtalo nuevamente.'));    
            }
            return response()->json((new ResponseHelper())->success('La operación se completó con éxito.', $data));
        } catch (\Throwable $th) {
            return response()->json((new ResponseHelper())->error('Ocurrio un error.', $th->getMessage()));
        }
    }

    public function ObtenerTodos()
    {
        try {
            $data = $this->CabeceraGlobalApplication->ObtenerTodo();
            return response()->json((new ResponseHelper())->success('La operación se completó con éxito.', $data));
        } catch (\Throwable $th) {
            return response()->json((new ResponseHelper())->error('Ocurrio un error.', $th->getMessage()));
        }
    }
}

