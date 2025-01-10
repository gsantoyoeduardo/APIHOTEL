<?php
namespace App\Application\Services;

use App\Application\Interface\ISucursalApplication;
use App\Common\Exceptions\Application\ApplicationException;
use App\Domain\Interface\ISucursalDomain;

class SucursalServices implements ISucursalApplication
{

    protected ISucursalDomain $SucursalDomain;
    public function __construct(ISucursalDomain $SucursalDomain)
    {
        $this->SucursalDomain = $SucursalDomain;
    }
    public function ObtenerPorId(int $id): object
    {
        try {
            return $this->SucursalDomain->ObtenerPorId($id);
        } catch (\Exception $e) {
            throw new ApplicationException($e->getMessage(), 404, $e);
        }
    }

    public function Insertar(array $data): object
    {
        try {
            return $this->SucursalDomain->Insertar($data);
        } catch (\Exception $e) {
            throw new ApplicationException($e->getMessage(), 404, $e);
        }
    }

    public function Actualizar($id, array $data): bool
    {
        try {
            return $this->SucursalDomain->Actualizar($id, $data);
        } catch (\Exception $e) {
            throw new ApplicationException($e->getMessage(), 404, $e);
        }
    }

    public function updateUltimaAuditoria(int $id, int $idultimaauditoria): bool
    {
        try {
            return $this->SucursalDomain->updateultimaauditoria($id, $idultimaauditoria);
        } catch (\Exception $e) {
            throw new ApplicationException($e->getMessage(), 404, $e);
        }
    }

    public function desactivarSucursal(int $id, array $data): bool
    {
        try {
            return $this->SucursalDomain->desactivarSucursal($id, $data);
        } catch (\Exception $e) {
            throw new ApplicationException($e->getMessage(), 404, $e);
        }
    }

    public function Eliminar(int $id): bool
    {
        try {
            return $this->SucursalDomain->Eliminar($id);
        } catch (\Exception $e) {
            throw new ApplicationException($e->getMessage(), 404, $e);
        }
    }

    public function ObtenerTodo(): array
    {
        try {
            return $this->SucursalDomain->ObtenerTodo();
        } catch (\Exception $e) {
            throw new ApplicationException($e->getMessage(), 404, $e);
        }
    }
}
