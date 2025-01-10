<?php
namespace App\Application\Services;

use App\Application\Interface\IGlobalesApplication;
use App\Common\Exceptions\Application\ApplicationException;
use App\Domain\Interface\IGlobalesDomain;

class GlobalesServices implements IGlobalesApplication
{

    protected IGlobalesDomain $GlobalesDomain;
    public function __construct(IGlobalesDomain $GlobalesDomain)
    {
        $this->GlobalesDomain = $GlobalesDomain;
    }

    public function ObtenerPorId(int $id): object
    {
        try {
            return $this->GlobalesDomain->ObtenerPorId($id);
        } catch (\Exception $e) {
            throw new ApplicationException($e->getMessage(), 404, $e);
        }
    }

    public function Insertar(array $data): object
    {
        try {
            return $this->GlobalesDomain->Insertar($data);
        } catch (\Exception $e) {
            throw new ApplicationException($e->getMessage(), 404, $e);
        }
    }

    public function Actualizar($id, array $data): bool
    {
        try {
            return $this->GlobalesDomain->Actualizar($id, $data);
        } catch (\Exception $e) {
            throw new ApplicationException($e->getMessage(), 404, $e);
        }
    }

    public function updateUltimaAuditoria(int $id, int $idultimaauditoria): bool
    {
        try {
            return $this->GlobalesDomain->updateultimaauditoria($id, $idultimaauditoria);
        } catch (\Exception $e) {
            throw new ApplicationException($e->getMessage(), 404, $e);
        }
    }

    public function desactivarGlobales(int $id, array $data): bool
    {
        try {
            return $this->GlobalesDomain->desactivarGlobales($id, $data);
        } catch (\Exception $e) {
            throw new ApplicationException($e->getMessage(), 404, $e);
        }
    }

    public function Eliminar(int $id): bool
    {
        try {
            return $this->GlobalesDomain->Eliminar($id);
        } catch (\Exception $e) {
            throw new ApplicationException($e->getMessage(), 404, $e);
        }
    }

    public function ObtenerTodo(): array
    {
        try {
            return $this->GlobalesDomain->ObtenerTodo();
        } catch (\Exception $e) {
            throw new ApplicationException($e->getMessage(), 404, $e);
        }
    }
}
