<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CardSession extends Model
{
    use HasFactory;

    public function session(): BelongsTo
    {
        return $this->belongsTo(GameSession::class);
    }

    public function card(): BelongsTo
    {
        return $this->belongsTo(GameCard::class);
    }
}
