<?php

namespace App\Domain\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Almacen extends Model
{
    use HasFactory;

    protected $table = 'almacenes';

    protected $primaryKey = 'idalmacen';

    protected $fillable = [
        'idsucursal',
        'descripcion',
        'idestado',
        'IdUltimaAuditoriaSucursal'
    ];

    public $timestamps = false;
}


