<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Filament\Models\Contracts\HasAvatar;

class Club extends Model implements HasAvatar
{
    use HasFactory;

    protected $casts = [
        'id' => 'integer',
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'club_user_affiliations', 'club_id', 'user_id');
    }

    public function clubUserAffiliations(): HasMany
    {
        return $this->hasMany(ClubUserAffiliation::class, 'club_id');
    }

    public function meetings(): HasMany
    {
        return $this->hasMany(Meeting::class, 'club_id');
    }

    public function attendances(): HasManyThrough
    {
        return $this->hasManyThrough(Attendance::class, Meeting::class, 'club_id', 'meeting_id');
    }

    public function commissionMembers(): HasManyThrough
    {
        return $this->hasManyThrough(CommissionMember::class, Commission::class, 'club_id', 'commission_id');
    }

    public function commissions(): hasMany
    {
        return $this->hasMany(Commission::class, 'club_id');
    }

    public function getFilamentAvatarUrl(): ?string
    {
        return 'https://medbooksbucket2.s3.eu-central-1.amazonaws.com/'.$this->photo;
    }
}
