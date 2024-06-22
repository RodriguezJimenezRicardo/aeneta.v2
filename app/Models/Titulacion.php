<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Titulacion extends Model
{
    use HasFactory;

    protected $table        = 'Titulacion';
    protected $primaryKey   = 'id_titulacion';

    public $incrementing = true;

    public $timestamps      = false;
}
