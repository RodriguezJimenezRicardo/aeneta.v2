<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $table        = 'Estudiante';
    protected $primaryKey   = 'id_docente';
    protected $keyType      = 'string';

    public $incrementing = false;

    public $timestamps      = false;

    public function users()
    {
        return $this->hasMany(User::class, 'id_visitante', 'id_estudiante');
    }

    public function trabajoAcademico()
    {
        return $this->belongsTo(TrabajoAcademico::class);
    }
}
