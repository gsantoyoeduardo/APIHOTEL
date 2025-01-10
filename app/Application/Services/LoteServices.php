<?php

namespace App\Application\Services;

use App\Application\Interface\ILoteApplication;
use App\Common\Exceptions\Application\ApplicationException;
use App\Domain\Interface\ILoteDomain;

class LoteServices implements ILoteApplication
{
    protected ILoteDomain $LoteDomain;
    public function __construct(ILoteDomain $LoteDomain)
    {
        $this->LoteDomain = $LoteDomain;
    }
    public function ObtenerPorId(int $id): object
    {
        try {
            return $this->LoteDomain->ObtenerPorId($id);
        } catch (\Exception $e) {
            throw new ApplicationException($e->getMessage(), 404, $e);
        }
    }
    
    public function Insertar(array $data): object
    {
        try {
            return $this->LoteDomain->Insertar($data);
        } catch (\Exception $e) {
            throw new ApplicationException($e->getMessage(), 404, $e);
        }
    }
    
    public function Actualizar($id, array $data): bool
    {
        try {
            return $this->LoteDomain->Actualizar($id, $data);
        } catch (\Exception $e) {
            throw new ApplicationException($e->getMessage(), 404, $e);
        }
    }
    
    public function updateUltimaAuditoria(int $id, int $idultimaauditoria): bool
    {
        try {
            return $this->LoteDomain->updateultimaauditoria($id, $idultimaauditoria);
        } catch (\Exception $e) {
            throw new ApplicationException($e->getMessage(), 404, $e);
        }
    }
    
    public function desactivarLote(int $id, array $data): bool
    {
        try {
            return $this->LoteDomain->desactivarLote($id, $data);
        } catch (\Exception $e) {
            throw new ApplicationException($e->getMessage(), 404, $e);
        }
    }
    
    public function Eliminar(int $id): bool
    {
        try {
            return $this->LoteDomain->Eliminar($id);
        } catch (\Exception $e) {
            throw new ApplicationException($e->getMessage(), 404, $e);
        }
    }
    
    public function ObtenerTodo(): array
    {
        try {
            return $this->LoteDomain->ObtenerTodo();
        } catch (\Exception $e) {
            throw new ApplicationException($e->getMessage(), 404, $e);
        }
    }
}
