<?php

namespace App\Domain\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;
    protected $table = 'usuarios';
    protected $primaryKey = 'idusuario';
    // protected $timestamp = false;
    public $timestamps = false;
    protected $fillable = [
        'usuario',
        'password',
        'idEstado',
        'tiporecuperacion',
        'respuestaseguridad',
        'idpersona',
        'idlastauditusuarios',
    ];

    protected $hidden = [
        'password',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
    // public function setPasswordAttribute($value)
    // {
    //     $this->attributes['password'] = bcrypt($value);
    // }
}
