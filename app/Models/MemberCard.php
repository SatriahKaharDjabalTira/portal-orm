<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MemberCard extends Model
{
    protected $fillable = ['member_id', 'card_number', 'expires_at'];

    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class);
    }
}