<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class CommissionMember extends Model
{
    use HasFactory;

    protected $casts = [
        'id' => 'integer',
        'commission_id' => 'integer',
        'user_id' => 'integer',
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function commission(): BelongsTo
    {
        return $this->belongsTo(Commission::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function club(): HasOneThrough
    {
        return $this->hasOneThrough(
            Club::class,   // Final model you want to retrieve
            Commission::class, // Intermediate model
            'id',          // Foreign key on the `intermediate` table...
            'id',          // Foreign key on the `clubs` table...
            'commission_id',  // Local key on the `starting` table...
            'club_id'      // Local key on the `intermediate` table...
        );
    }
}
