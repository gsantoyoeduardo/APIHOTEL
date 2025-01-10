<?php

namespace App\Application\Services;


use App\Domain\Interface\IDireccionDomain;
use App\Common\Exceptions\Application\ApplicationException;
use App\Application\Interface\IDireccionApplication;

class DireccionServices implements IDireccionApplication
{
    
    protected IDireccionDomain $DireccionDomain;
    public function __construct(IDireccionDomain $DireccionDomain)
    {
        $this->DireccionDomain = $DireccionDomain;
    }

    public function ObtenerPorId(int $id): object
    {
        try {
            return $this->DireccionDomain->ObtenerPorId($id);
        } catch (\Exception $e) {
            throw new ApplicationException($e->getMessage(), 404, $e);
        }
    }
    
    public function Insertar(array $data): object
    {
        try {
            return $this->DireccionDomain->Insertar($data);
        } catch (\Exception $e) {
            throw new ApplicationException($e->getMessage(), 404, $e);
        }
    }
    
    public function Actualizar($id, array $data): bool
    {
        try {
            return $this->DireccionDomain->Actualizar($id, $data);
        } catch (\Exception $e) {
            throw new ApplicationException($e->getMessage(), 404, $e);
        }
    }
    
    public function updateUltimaAuditoria(int $id, int $idultimaauditoria): bool
    {
        try {
            return $this->DireccionDomain->updateultimaauditoria($id, $idultimaauditoria);
        } catch (\Exception $e) {
            throw new ApplicationException($e->getMessage(), 404, $e);
        }
    }
    
    public function desactivarDireccion(int $id, array $data): bool
    {
        try {
            return $this->DireccionDomain->desactivarDireccion($id, $data);
        } catch (\Exception $e) {
            throw new ApplicationException($e->getMessage(), 404, $e);
        }
    }
    
    public function Eliminar(int $id): bool
    {
        try {
            return $this->DireccionDomain->Eliminar($id);
        } catch (\Exception $e) {
            throw new ApplicationException($e->getMessage(), 404, $e);
        }
    }
    
    public function ObtenerTodo(): array
    {
        try {
            return $this->DireccionDomain->ObtenerTodo();
        } catch (\Exception $e) {
            throw new ApplicationException($e->getMessage(), 404, $e);
        }
    }
    
}
