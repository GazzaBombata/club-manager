<?php

namespace App\Models;

use App\Enums\AffiliationStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClubUserAffiliation extends Model
{
    use HasFactory;

    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'club_id' => 'integer',
        'joined_at' => 'timestamp',
        'left_at' => 'timestamp',
        'status' => AffiliationStatus::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function club(): BelongsTo
    {
        return $this->belongsTo(Club::class);
    }

    public function getProfilePhotoAttribute()
    {
        return $this->user->profile_photo_path;
    }
}
