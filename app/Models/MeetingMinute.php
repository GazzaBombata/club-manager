<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MeetingMinute extends Model
{
    use HasFactory;

    protected $casts = [
        'id' => 'integer',
        'meeting_id' => 'integer',
    ];

    public function meeting(): BelongsTo
    {
        return $this->belongsTo(Meeting::class);
    }

    public function club(): BelongsTo
    {
        return $this->belongsTo(Meeting::class, 'meeting_id')
            ->join('clubs', 'clubs.id', '=', 'meeting.club_id');
    }
}
