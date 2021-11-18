<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Link extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'link'
    ];

    public function visits(): HasMany
    {
        return $this->hasMany(Visit::class);
    }

    public function latest_visit(): HasOne
    {
        return $this->hasOne(Visit::class)->latest();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
