<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Queue extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id_company',
        'name',
        'description',
        'service_name',
        'service_desk',
        'queue_prefix',
        'queue_total_digits',
        'queue_colors',
        'hash_code',
        'status',
    ];

    protected $hidden = [
        'hash_code',
    ];

    protected function casts(): array
    {
        return [
            'id_company' => 'integer',
            'queue_total_digits' => 'integer',
        ];
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'id_company');
    }

    public function queueTickets(): HasMany
    {
        return $this->hasMany(QueueTicket::class, 'id_queue');
    }
}
