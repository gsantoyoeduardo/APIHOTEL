<?php

namespace App\Http\Controllers;

use App\Application\Interface\IUsuarioApplication;
use App\Common\Helpers\ResponseHelper;
use App\Domain\Model\Usuario;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UsuarioController extends Controller
{

    protected IUsuarioApplication $UsuarioApplication;

    public function __construct(IUsuarioApplication $UsuarioApplication)
    {
        $this->UsuarioApplication = $UsuarioApplication;
    }
    public function ObtenerPorId(int $id)
    {
        try {
            $data = $this->UsuarioApplication->ObtenerPorId($id);
            return response()->json((new ResponseHelper())->success('La operación se completó con éxito.', $data));
        } catch (\Throwable $th) {
            return response()->json((new ResponseHelper())->error('Ocurrio un error.', $th->getMessage()));
        }
    }

    public function ObtenerTodos()
    {
        try {
            $data = $this->UsuarioApplication->ObtenerTodo();
            return response()->json((new ResponseHelper())->success('La operación se completó con éxito.', $data));
        } catch (\Throwable $th) {
            return response()->json((new ResponseHelper())->error('Ocurrio un error.', $th->getMessage()));
        }
    }

    public function Crear(Request $request)
    {
        try {
            $data = $this->UsuarioApplication->Insertar($request->all());
            return response()->json((new ResponseHelper())->success('La operación se completó con éxito.', $data));
        } catch (\Throwable $th) {
            return response()->json((new ResponseHelper())->error('Ocurrio un error.', $th->getMessage()));
        }
    }

    public function Actualizar(int $id, Request $request)
    {
        try {
            $data = $this->UsuarioApplication->Actualizar($id, $request->all());
            if(!$data){
                return response()->json((new ResponseHelper())->error('Hubo un problema al intentar actualizar el registro. Por favor, inténtalo nuevamente.'));    
            }
            return response()->json((new ResponseHelper())->success('La operación se completó con éxito.', $data));
        } catch (\Throwable $th) {
            return response()->json((new ResponseHelper())->error('Ocurrio un error.', $th->getMessage()));
        }
    }

    public function Eliminar(int $id,Request $request)
    {
        try {
            $data = $this->UsuarioApplication->Eliminar($id,$request->all());
            if(!$data){
                return response()->json((new ResponseHelper())->error('Hubo un problema al intentar eliminar el registro. Por favor, inténtalo nuevamente.'));    
            }
            return response()->json((new ResponseHelper())->success('La operación se completó con éxito.', $data));
        } catch (\Throwable $th) {
            return response()->json((new ResponseHelper())->error('Ocurrio un error.', $th->getMessage()));
        }
    }
    public function test()
    {
        return response()->json(Usuario::get());
    }
}
