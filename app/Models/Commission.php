<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Commission extends Model
{
    use HasFactory;

    protected $casts = [
        'id' => 'integer',
        'club_id' => 'integer',
    ];

    public function club(): BelongsTo
    {
        return $this->belongsTo(Club::class);
    }

    public function commissionMembers(): HasMany
    {
        return $this->hasMany(CommissionMember::class);
    }

    public function users(): HasManyThrough
    {
        return $this->hasManyThrough(User::class, CommissionMember::class);
    }
}
