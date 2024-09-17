<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Activity extends Model
{
    use HasFactory;

    public function task(): BelongsTo {
        return $this->belongsTo(Task::class);
    }

    public function tasks(): HasMany {
        return $this->hasMany(Task::class);
    }
}
