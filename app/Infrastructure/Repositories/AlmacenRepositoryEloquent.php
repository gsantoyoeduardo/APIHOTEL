<?php

namespace App\Infrastructure\Repositories;

use App\Infrastructure\Interface\IAlmacenRepositoryEloquent;
use App\Common\Exceptions\Infraestructure\RepositoryException;
use App\Domain\Model\Almacen;
use App\Infrastructure\Repositories\AuditoriaBaseRepositoryEloquent;
use App\Common\Constants\OperacionesEnBaseConstants;
use Illuminate\Support\Facades\DB;

class AlmacenRepositoryEloquent implements IAlmacenRepositoryEloquent
{
    const TABLE_NAME = 'seguridad.auditoriaalmacenes';
    const PRIMARY_KEY = 'idauditoriaalmacenes';
    const REFERENCE_ID_FIELD = 'idalmacen';

    private $auditoriaBaseRepository;

    public function __construct()
    {
        $this->auditoriaBaseRepository = new AuditoriaBaseRepositoryEloquent();
    }

    public function Eliminar($id, array $data): bool
    {
        try {
            DB::beginTransaction();

            $almacen = Almacen::find($id);
            if (!$almacen) {
                return false;
            }

            $deleted = Almacen::destroy($id); // esta wea devuelve 1 o 0
            if (!$deleted) {
                DB::rollBack();
                return false;
            }
            $auditoriaData = [
                'idusuario' => $data['idusuario'],
                'idtipooperacion' => OperacionesEnBaseConstants::OP_INSERTAR,
                'observacion' => $data['observacion'] ?? '',
                'table' => self::TABLE_NAME,
                'primaryKey' => self::PRIMARY_KEY,
                'referenceIdField' => self::REFERENCE_ID_FIELD,
                'referenceValue' => $id,
            ];

            $auditoria = $this->auditoriaBaseRepository->Insertar($auditoriaData);
            $this->updateultimaauditoria($id, $auditoria->idauditoriaalmacenes);

            DB::commit();
            return true;

        } catch (\Throwable $e) {
            DB::rollBack();
            throw new RepositoryException($e->getMessage(), 404, $e);
        }
    }


    public function ObtenerTodo(): array
    {
        try {
            return (Almacen::all())->toArray();
        } catch (\Throwable $e) {
            throw new RepositoryException($e->getMessage(), 404, $e);
        }
    }

    public function ObtenerPorId($id): object
    {
        try {
            return Almacen::find($id);
        } catch (\Throwable $e) {
            throw new RepositoryException("No se encuentra el id: {$id} en la tabla Almacenes", 404, $e);
        }
    }

    public function Actualizar($id, array $data): bool
    {
        try {
            DB::beginTransaction();

            $almacen = Almacen::find($id);
            if (!$almacen) {
                return false;
            }

            $almacen->idsucursal = $data['idsucursal'];
            $almacen->descripcion = $data['descripcion'];
            $almacen->idestado = $data['idestado'];
            $almacen->save();

            $auditoriaData = [
                'idusuario' => $data['idusuario'],
                'idtipooperacion' => OperacionesEnBaseConstants::OP_ACTUALIZAR,
                'newdata' => $almacen->toJson(),
                'observacion' => $data['observacion'] ?? '',
                'table' => self::TABLE_NAME,
                'primaryKey' => self::PRIMARY_KEY,
                'referenceIdField' => self::REFERENCE_ID_FIELD,
                'referenceValue' => $id,
            ];

            $auditoria = $this->auditoriaBaseRepository->Insertar($auditoriaData);
            $this->updateultimaauditoria($id, $auditoria->idauditoriaalmacenes);

            DB::commit();

            return true;
        } catch (\Throwable $e) {
            DB::rollBack();
            throw new RepositoryException($e->getMessage(), 404, $e);
        }
    }


    public function Insertar(array $data): object
    {
        try {
            DB::beginTransaction();

            $almacen = new Almacen();
            $almacen->idsucursal = $data['idsucursal'];
            $almacen->descripcion = $data['descripcion'];
            $almacen->idestado = $data['idestado'];
            $almacen->save();
            $auditoriaData = [
                'idusuario' => $data['idusuario'],
                'idtipooperacion' => OperacionesEnBaseConstants::OP_INSERTAR,
                'newdata' => $almacen->toJson(),
                'observacion' => $data['observacion'] ?? '',
                'table' => self::TABLE_NAME,
                'primaryKey' => self::PRIMARY_KEY,
                'referenceIdField' => self::REFERENCE_ID_FIELD,
                'referenceValue' => $almacen->idalmacen,
            ];
            $auditoria = $this->auditoriaBaseRepository->Insertar($auditoriaData);
            $this->updateultimaauditoria($almacen->idalmacen, $auditoria->idauditoriaalmacenes);
            DB::commit();

            return $almacen;
        } catch (\Throwable $e) {
            DB::rollBack();
            throw new RepositoryException($e->getMessage(), 404, $e);
        }
    }


    public function updateultimaauditoria(int $id, int $idultimaauditoria): bool
    {
        try {
            $almacen = Almacen::find($id);
            if (!$almacen) {
                return false;
            }
            $almacen->idultimaauditoriaalmacen = $idultimaauditoria;
            $almacen->save();
            return true;
        } catch (\Throwable $e) {
            throw new RepositoryException($e->getMessage(), 404, $e);
        }
    }

    public function desactivarAlmacen(int $id, array $data): bool
    {
        try {
            DB::beginTransaction();

            $almacen = Almacen::find($id);
            if (!$almacen) {
                return false;
            }
            $almacen->idestado = 2;
            $almacen->save();
            $auditoriaData = [
                'idusuario' => $data['idusuario'],
                'idtipooperacion' => OperacionesEnBaseConstants::OP_DESACTIVAR,
                'newdata' => $almacen->toJson(),
                'observacion' => $data['observacion'] ?? '',
                'table' => self::TABLE_NAME,
                'primaryKey' => self::PRIMARY_KEY,
                'referenceIdField' => self::REFERENCE_ID_FIELD,
                'referenceValue' => $id,
            ];
            $auditoria = $this->auditoriaBaseRepository->Insertar($auditoriaData);
            $this->updateultimaauditoria($id, $auditoria->idauditoriaalmacenes);

            DB::commit();
            return true;
        } catch (\Throwable $e) {
            DB::rollBack();

            throw new RepositoryException($e->getMessage(), 404, $e);
        }
    }
}
