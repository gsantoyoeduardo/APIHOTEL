<?php
namespace App\Application\Services;

use App\Application\Interface\ICabeceraGlobalApplication;
use App\Domain\Interface\ICabeceraGlobalDomain;
use App\Common\Exceptions\Application\ApplicationException;

class CabeceraGlobalServices implements ICabeceraGlobalApplication
{

    protected ICabeceraGlobalDomain $CabeceraGlobalDomain;

    public function __construct(ICabeceraGlobalDomain $CabeceraGlobalDomain)
    {
        $this->CabeceraGlobalDomain = $CabeceraGlobalDomain;
    }

    public function Eliminar($id): bool
    {
        try {
            return $this->CabeceraGlobalDomain->Eliminar($id);
        } catch (\Exception $e) {
            throw new ApplicationException($e->getMessage(), 404, $e);
        }
    }

    public function ObtenerTodo(): array
    {
        try {
            return $this->CabeceraGlobalDomain->ObtenerTodo();
        } catch (\Exception $e) {
            throw new ApplicationException($e->getMessage(), 404, $e);
        }
    }

    public function Insertar(array $data): object
    {
        try {
            return $this->CabeceraGlobalDomain->Insertar($data);
        } catch (\Exception $e) {
            throw new ApplicationException($e->getMessage(), 404, $e);
        }
    }

    public function ObtenerPorId($id): object
    {
        try {
            return $this->CabeceraGlobalDomain->ObtenerPorId($id);
        } catch (\Exception $e) {
            throw new ApplicationException($e->getMessage(), 404, $e);
        }
    }

    public function Actualizar($id, array $data): bool
    {
        try {
            return $this->CabeceraGlobalDomain->Actualizar($id, $data);
        } catch (\Exception $e) {
            throw new ApplicationException($e->getMessage(), 404, $e);
        }
    }

    public function FilterSearch(array $data): array
    {
        try {
            return $this->CabeceraGlobalDomain->FilterSearch($data);
        } catch (\Exception $e) {
            throw new ApplicationException($e->getMessage(), 404, $e);
        }
    }
}

