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
        return $this->hasManyThrough(
            User::class, // The final model
            CommissionMember::class, // The intermediate model
            'commission_id', // Foreign key on the commission_members table
            'id', // Foreign key on the users table
            'id', // Local key on the commissions table
            'user_id' // Local key on the commission_members table
        );
    }
}
