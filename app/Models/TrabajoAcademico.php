<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrabajoAcademico extends Model
{
    use HasFactory;

    protected $table = 'TrabajoAcademico';

    protected $primaryKey = 'id_trabajoAcademico';

    protected $fillable = ['id_tipoTrabajo', 'titulo', 'descripcion', 'fecha_inicio', 'fecha_final', 'id_area'];

    public $timestamps = false;

    public function estudiantes()
    {
        return $this->hasMany(Estudiante::class);
    }

    public function directores()
    {
        return $this->belongsToMany(Docente::class);
    }

    public function sinodales()
    {
        return $this->belongsToMany(Docente::class);
    }
}
