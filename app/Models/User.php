<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table        = 'Users';
    protected $primaryKey   = 'id_user';
    protected $keyType      = 'string';

    public $incrementing = false;

    public $timestamps      = false;

    public function docentes()
    {
        return $this->hasMany(Docente::class, 'id_docente', 'id_docente');
    }

    public function estudiantes()
    {
        return $this->hasMany(Estudiante::class, 'id_estudiante', 'id_estudiante');
    }

    public function usersTokens()
    {
        return $this->hasMany(UserToken::class, 'id_user', 'id_user');
    }
}
