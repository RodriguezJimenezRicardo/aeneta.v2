<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $table = 'Departamento';

    protected $primaryKey = 'id_departamento';

    protected $keyType = 'string';

    protected $fillable = ['descripcion'];

    public $timestamps = false;

    public function areas()
    {
        return $this->hasMany(Area::class, 'id_area', 'id_area');
    }
}
