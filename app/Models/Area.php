<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $table = 'Area';

    protected $primaryKey = 'id_area';

    protected $keyType = 'string';

    protected $fillable = ['descripcion'];

    public $timestamps = false;

    public function departamento()
    {
        return $this->hasMany(Departamento::class, 'id_area', 'id_area');
    }
}
