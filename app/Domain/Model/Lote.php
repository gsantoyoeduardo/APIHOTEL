<?php

namespace App\Domain\Model;

use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{
    protected $table = 'lote';

    protected $primaryKey = 'idlote';

    protected $fillable = [
        'idpresentacion',
        'descripcion',
        'idserie',
        'cantidad',
        'fechaingreso',
        'fechavencimiento',
        'idestado',
        'idultimaauditorialote'
    ];

    public $timestamps = false;
}
