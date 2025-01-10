<?php

namespace App\Infrastructure\Repositories;

use App\Common\Constants\TableConstants;
use App\Common\Exceptions\Infraestructure\RepositoryException;
use App\Domain\Model\AuditoriaBase;
use App\Infrastructure\Interface\IAuditoriaBaseRepositoryEloquent;

class AuditoriaBaseRepositoryEloquent implements IAuditoriaBaseRepositoryEloquent
{
    public function Insertar(array $data): object
    {
        try {
            $auditoriabase = new AuditoriaBase();

            // Configurar la tabla, clave primaria y campo de referencia dinámicamente
            $auditoriabase->configure(
                $data['table'],                // Nombre de la tabla, se pasa desde el array
                $data['primaryKey'],           // Nombre de la clave primaria, se pasa desde el array
                $data['referenceIdField']     // Campo de referencia, se pasa desde el array
            );

            // Asignar los valores a las propiedades del modelo
            $auditoriabase->idusuario = $data['idusuario'];
            $auditoriabase->fecharegistro = date('Y-m-d');  // Fecha actual en formato YYYY-MM-DD
            $auditoriabase->horaregistro = date('H:i:s');   // Hora actual en formato HH:MM:SS
            $auditoriabase->idtipooperacion = $data['idtipooperacion'];
            $auditoriabase->newdata = $data['newdata'];
            $auditoriabase->observacion = $data['observacion'];

            // Asignar el campo de referencia dinámico
            $auditoriabase->setReferenceFieldValue($data['referenceValue']); // Asigna el valor del campo de referencia

            // Guardar el registro en la base de datos
            $auditoriabase->save();

            return $auditoriabase;
        } catch (\Throwable $e) {
            throw new RepositoryException($e->getMessage(), 404, $e);
        }
    }
}
