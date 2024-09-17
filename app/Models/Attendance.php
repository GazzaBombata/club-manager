<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Attendance extends Model
{
    use HasFactory;

    protected $casts = [
        'id' => 'integer',
        'meeting_id' => 'integer',
        'user_id' => 'integer',
        'payment_id' => 'integer',
        'is_compulsory' => 'boolean',
    ];

    public function meeting(): BelongsTo
    {
        return $this->belongsTo(Meeting::class, 'meeting_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function payment(): BelongsTo
    {
        return $this->belongsTo(Payment::class);
    }

    public function club(): HasOneThrough
    {
        return $this->hasOneThrough(
            Club::class,   // Final model you want to retrieve
            Meeting::class, // Intermediate model
            'id',          // Foreign key on the `meetings` table...
            'id',          // Foreign key on the `clubs` table...
            'meeting_id',  // Local key on the `attendances` table...
            'club_id'      // Local key on the `meetings` table...
        );
    }
}
