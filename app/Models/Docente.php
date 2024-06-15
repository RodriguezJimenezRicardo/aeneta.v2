<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    protected $table        = 'Docente';
    protected $primaryKey   = 'id_docente';
    protected $keyType      = 'string';

    public $incrementing = false;

    public $timestamps      = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'id_docente', 'id_docente');
    }

    public function trabajoAcademicoDirectores()
    {
        return $this->belongsToMany(TrabajoAcademico::class, 'director_trabajoacademico', 'id_docente', 'id_trabajoAcademico');
    }

    public function trabajoAcademicoSinodales()
    {
        return $this->belongsToMany(TrabajoAcademico::class, 'sinodal_trabajoacademico', 'id_docente', 'id_trabajoAcademico');
    }
}
