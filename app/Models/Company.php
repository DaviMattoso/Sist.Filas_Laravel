<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'company_name',
        'company_logo',
        'uuid',
        'address',
        'phone',
        'email',
        'role',
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'id_company');
    }

    public function queues(): HasMany
    {
        return $this->hasMany(Queue::class, 'id_company');
    }
}
