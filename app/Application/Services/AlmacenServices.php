<?php
namespace App\Application\Services;

use App\Application\Interface\IAlmacenApplication;
use App\Domain\Interface\IAlmacenDomain;
use App\Common\Exceptions\Application\ApplicationException;

class AlmacenServices implements IAlmacenApplication
{

    protected IAlmacenDomain $AlmacenDomain;

    public function __construct(IAlmacenDomain $AlmacenDomain)
    {
        $this->AlmacenDomain = $AlmacenDomain;
    }

    public function ObtenerPorId(int $id): object
    {
        try {
            return $this->AlmacenDomain->ObtenerPorId($id);
        } catch (\Exception $e) {
            throw new ApplicationException($e->getMessage(), 404, $e);
        }
    }

    public function Insertar(array $data): object
    {
        try {
            return $this->AlmacenDomain->Insertar($data);
        } catch (\Exception $e) {
            throw new ApplicationException($e->getMessage(), 404, $e);
        }
    }

    public function Actualizar($id, array $data): bool
    {
        try {
            return $this->AlmacenDomain->Actualizar($id, $data);
        } catch (\Exception $e) {
            throw new ApplicationException($e->getMessage(), 404, $e);
        }
    }

    public function updateUltimaAuditoria(int $id, int $idultimaauditoria): bool
    {
        try {
            return $this->AlmacenDomain->updateultimaauditoria($id, $idultimaauditoria);
        } catch (\Exception $e) {
            throw new ApplicationException($e->getMessage(), 404, $e);
        }
    }

    public function desactivarAlmacen(int $id, array $data): bool
    {
        try {
            return $this->AlmacenDomain->desactivarAlmacen($id, $data);
        } catch (\Exception $e) {
            throw new ApplicationException($e->getMessage(), 404, $e);
        }
    }

    public function Eliminar(int $id, array $data): bool
    {
        try {
            return $this->AlmacenDomain->Eliminar($id, $data);
        } catch (\Exception $e) {
            throw new ApplicationException($e->getMessage(), 404, $e);
        }
    }

    public function ObtenerTodo(): array
    {
        try {
            return $this->AlmacenDomain->ObtenerTodo();
        } catch (\Exception $e) {
            throw new ApplicationException($e->getMessage(), 404, $e);
        }
    }
}
