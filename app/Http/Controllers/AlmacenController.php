<?php

namespace App\Http\Controllers;

use App\Application\Interface\IAlmacenApplication;
use App\Application\Services\AlmacenServices;
use App\Application\Services\Auditorias\AuditoriaAlmacenServices;
use App\Common\Helpers\ResponseHelper;
use App\Http\Requests\Almacen\{AlmacenInsertarRequestValidacion, AlmacenActualizarRequestValidacion, AlmacenEliminarRequestValidacion,AlmacenDesactivarRequestValidacion};

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Routing\Controller;

class AlmacenController extends Controller
{
    protected IAlmacenApplication $AlmacenApplication;
    // protected AuditoriaAlmacenServices $auditoriaAlmacenServices;

    public function __construct(IAlmacenApplication $AlmacenApplication)
    {
        $this->AlmacenApplication = $AlmacenApplication;
        // $this->auditoriaAlmacenServices = $auditoriaAlmacenServices;

    }

    public function Crear(AlmacenInsertarRequestValidacion $request): JsonResponse
    {
        try {
            // $almacen = $this->almacenService->createAlmacen($request->only('descripcion', 'idestado', 'idsucursal'));
            // $auditoriaData = [
            //     'idalmacen'=> $almacen->idalmacen,
            //     'idusuario' => $request->input('idusuario'),
            //     'observacion' => $request->input('observacion'),
            //     'fecharegistro' => Carbon::now(),
            //     'horaregistro' => Carbon::now()->format('H:i:s'),
            //     'idtipooperacion' => 1,
            //     'olddata' => json_encode([]),
            //     'newdata' => json_encode($almacen),
            // ];

            // $auditoriaAlmacen = $this->auditoriaAlmacenServices->createAuditoria($auditoriaData);

            // $id =  $almacen->idalmacen;
            // $idultimaauditoria = $auditoriaAlmacen->idauditoriaalmacenes ;
            // $updated = $this->almacenService->updateUltimaAuditoria($id, $idultimaauditoria);

            $data = $this->AlmacenApplication->Insertar($request->all());
            return response()->json((new ResponseHelper())->success('La operación se completó con éxito.', $data));
        } catch (\Throwable $th) {
            return response()->json((new ResponseHelper())->error('Ocurrio un error.', $th->getMessage()));
        }
    }

    public function Actualizar(AlmacenActualizarRequestValidacion $request, int $id): JsonResponse
    {
        try {
            // $olddata = $this->almacenService->getAlmacenById($id);
            // $newdata = [];
            // $requestData = $request->only('descripcion', 'idestado', 'idsucursal');

            // foreach ($requestData as $key => $value) {
            //     if (isset($olddata[$key]) && $olddata[$key] !== $value) {
            //         $newdata[$key] = $value;
            //     }
            // }

            // $updated = $this->almacenService->updateAlmacen($id, $requestData);

            // $auditoriaData = [
            //     'idalmacen'=> $id,
            //     'idusuario' => $request->input('idusuario'),
            //     'observacion' => $request->input('observacion'),
            //     'fecharegistro' => Carbon::now(),
            //     'horaregistro' => Carbon::now()->format('H:i:s'),
            //     'idtipooperacion' => 2,
            //     'olddata' => json_encode($olddata),
            //     'newdata' => json_encode($newdata),
            // ];
            // $auditoriaAlmacen = $this->auditoriaAlmacenServices->createAuditoria($auditoriaData);
            // $idultimaauditoria = $auditoriaAlmacen->idauditoriaalmacenes ;
            // $updated = $this->almacenService->updateUltimaAuditoria($id, $idultimaauditoria);

            // if (!$updated) {
            //     return response()->json(['error' => 'Almacen no encontrada o no actualizada'], 400);
            // }

            $data = $this->AlmacenApplication->Actualizar($id, $request->all());
            if (!$data) {
                return response()->json((new ResponseHelper())->error('Hubo un problema al intentar actualizar el registro. Por favor, inténtalo nuevamente.'));
            }
            return response()->json((new ResponseHelper())->success('La operación se completó con éxito.', $data));
        } catch (\Throwable $th) {
            return response()->json((new ResponseHelper())->error('Ocurrio un error.', $th->getMessage()));
        }
    }

    public function Desactivar(AlmacenDesactivarRequestValidacion $request, int $id): JsonResponse
    {
        try {
            $data = $this->AlmacenApplication->desactivarAlmacen($id, $request->all());
            if (!$data) {
                return response()->json((new ResponseHelper())->error('Hubo un problema al intentar Desactivar el registro. Por favor, inténtalo nuevamente.'));
            }
            return response()->json((new ResponseHelper())->success('La operación se completó con éxito.', $data));
        } catch (\Throwable $th) {
            return response()->json((new ResponseHelper())->error('Ocurrio un error.', $th->getMessage()));
        }
    }
    public function obtenerTodos()
    {
        try {
            $data = $this->AlmacenApplication->ObtenerTodo();
            return response()->json((new ResponseHelper())->success('La operación se completó con éxito.', $data));
        } catch (\Throwable $th) {
            return response()->json((new ResponseHelper())->error('Ocurrio un error.', $th->getMessage()));
        }
    }

    public function ObtenerPorId(int $id): JsonResponse
    {
        try {
            $data = $this->AlmacenApplication->ObtenerPorId($id);
            return response()->json((new ResponseHelper())->success('La operación se completó con éxito.', $data));
        } catch (\Throwable $th) {
            return response()->json((new ResponseHelper())->error('Ocurrio un error.', $th->getMessage()));
        }
    }
}
