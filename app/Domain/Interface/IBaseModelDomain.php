<?php

namespace App\Domain\Interface;

use Illuminate\Database\Eloquent\Model;

/**
 * Esta insterface se usara cuando se esta usando el eloquent
 */
interface IBaseModelDomain
{
    /**
     * Obtener un registro por su ID.
     *
     * @param int $id
     * @return Model|null
     */
    public function findById(int $id): ?Model;
    
    /**
     * Obtener todos los registros.
     *
     * @return array
     */
    public function all(): array;
    
    /**
     * Crear un nuevo registro.
     *
     * @param array $data
     * @return Model|null
     */
    public function create(array $data): ?Model;
    
    /**
     * Actualizar un registro existente por su ID.
     *
     * @param int $id
     * @param array $data
     * @return bool|null
     */
    public function update(int $id, array $data): ?bool;
    
    /**
     * Eliminar un registro por su ID.
     *
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool;
}
