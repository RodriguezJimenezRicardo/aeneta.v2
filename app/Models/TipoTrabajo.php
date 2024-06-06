<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoTrabajo extends Model
{
    use HasFactory;

    protected $table = 'tipotrabajo';

    protected $primaryKey = 'id_tipoTrabajo';

    protected $keyType = 'string';

    protected $fillable = ['descripcion'];

    public $timestamps = false;
}
