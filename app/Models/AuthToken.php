<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class AuthToken extends Model
{
    protected $collection = 'auth_tokens';

    protected $fillable = [
        'tokenable_type',
        'tokenable_id',
        'name',
        'token',
        'abilities',
    ];

    protected $casts = [
        'abilities' => 'array',
    ];

    public function tokenable()
    {
        return $this->morphTo();
    }
}