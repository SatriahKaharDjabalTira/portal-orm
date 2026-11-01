<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
    protected $fillable = ['code', 'title', 'category_id'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function members(): BelongsToMany
    {
        return $this->belongsToMany(Member::class, 'loans')
            ->withPivot('status', 'due_date')->withTimestamps();
    }
}