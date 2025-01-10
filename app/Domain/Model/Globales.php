<?php

namespace App\Domain\Model;

use Illuminate\Database\Eloquent\Model;

class Globales extends Model
{
    protected $table = 'globales';

    protected $primaryKey = 'idglobales';

    protected $fillable = [
        'idcabecera',
        'codigo',
        'descripcion',
        'idestado',
        'valorkey',
        'valor1',
        'valor2',
        'valor3',
        'valor4',
        'correlativo',
        'idultimaauditoriaglobal'
    ];

    public $timestamps = false;
}
