<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class QueueTicket extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id_queue',
        'queue_ticket_number',
        'queue_ticket_created_at',
        'queue_ticket_called_at',
        'queue_ticket_called_by',
    ];

    protected function casts(): array
    {
        return [
            'id_queue' => 'integer',
            'queue_ticket_number' => 'integer',
            'queue_ticket_created_at' => 'datetime',
            'queue_ticket_called_at' => 'datetime',
        ];
    }

    public function queue(): BelongsTo
    {
        return $this->belongsTo(Queue::class, 'id_queue');
    }
}
