<?php
namespace App\Infrastructure\Repositories;

use App\Infrastructure\Interface\ICabeceraGlobalRepositoryEloquent;
use App\Domain\Model\CabeceraGlobal;
use App\Common\Exceptions\Infraestructure\RepositoryException;
use App\Common\Constants\TableConstants;

class CabeceraGlobalRepositoryEloquent implements ICabeceraGlobalRepositoryEloquent
{



    public function Eliminar($id ,$data=[]):bool
    {
        try {
            $mod = CabeceraGlobal::find($id);
            if (!$mod) {
                return false;
            }
            $mod->idestado = TableConstants::ESTADO_GENERAL['ELIMINADO'];
            return (bool) $mod->save();
        } catch (\Throwable $e) {
            throw new RepositoryException($e->getMessage(), 404, $e);
        }
    }

    public function ObtenerTodo():array
    {
        try {
            return (CabeceraGlobal::all())->toArray();
        } catch (\Throwable $e) {
            throw new RepositoryException($e->getMessage(), 404, $e);
        }
    }

    public function ObtenerPorId($id):object
    {
        try {
            $data = CabeceraGlobal::find($id) ?? new CabeceraGlobal();
            return $data;
        } catch (\Throwable $e) {
            throw new RepositoryException("No se encontro ningun registro con el ID {$id}", 404, $e);
        }
    }

    public function Actualizar($id, array $data):bool
    {
        try {
            $mod = CabeceraGlobal::find($id);
            if (!$mod) {
                return false;
            }
            $mod->fill($data);
            $mod->save();
            return true;
        } catch (\Throwable $e) {
            throw new RepositoryException($e->getMessage(), 404, $e);
        }
    }

    public function Insertar(array $data):object
    {
        try {
            $mod = new CabeceraGlobal();
            $mod->fill($data);
            $mod->idestado = 1;
            $mod->save();
            //! AQUI DEBERIA IR LAS AUDITORIAS

            return $mod;
        } catch (\Throwable $e) {
            throw new RepositoryException($e->getMessage(), 404, $e);
        }
    }
    public function FilterSearch(array $data):array
    {
        return []; //para filtrado por concepto
    }

}

