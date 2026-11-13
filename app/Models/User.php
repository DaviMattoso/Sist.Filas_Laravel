<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use SoftDeletes;

    protected $fillable = [
        'email',
        'password',
        'id_company',
        'role',
        'last_login',
        'code',
        'code_expiration',
        'active',
        'blocked_until',
    ];

    protected $hidden = [
        'password',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'id_company' => 'integer',
            'last_login' => 'datetime',
            'code_expiration' => 'datetime',
            'active' => 'boolean',
            'blocked_until' => 'datetime',
        ];
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'id_company');
    }
}
