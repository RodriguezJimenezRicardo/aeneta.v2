<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $table        = 'Estudiante';
    protected $primaryKey   = 'id_estudiante';
    protected $keyType      = 'string';

    public $incrementing = false;

    public $timestamps      = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'id_estudiante', 'id_estudiante');
    }

    public function trabajoAcademico()
    {
        return $this->belongsTo(TrabajoAcademico::class);
    }
}
