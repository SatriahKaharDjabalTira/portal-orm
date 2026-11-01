<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Member extends Model
{
    protected $fillable = ['member_no', 'name'];

    public function card(): HasOne
    {
        return $this->hasOne(MemberCard::class);
    }

    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class, 'loans')
            ->withPivot('status', 'due_date')->withTimestamps();
    }
}