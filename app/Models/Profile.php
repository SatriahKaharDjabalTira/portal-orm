<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    protected $fillable = ['student_id', 'phone', 'address'];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}