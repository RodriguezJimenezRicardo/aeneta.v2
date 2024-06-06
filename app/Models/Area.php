<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $table = 'area';

    protected $primaryKey = 'id_area';

    protected $keyType = 'string';

    protected $fillable = ['descripcion'];

    public $timestamps = false;
}
