<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserToken extends Model
{
    use HasFactory;

    protected $table        = 'UsersTokens';
    protected $primaryKey   = 'token';
    protected $keyType      = 'string';

    public $incrementing = false;

    public $timestamps      = false;

    public function providersUsers(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}
