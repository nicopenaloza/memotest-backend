<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GameSession extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_id',
        'points',
        'username',
        'state_id',
        'deleted',
    ];

    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class);
    }

    public function state(): BelongsTo
    {
        return $this->belongsTo(GameState::class);
    }

    public function cards(): HasMany
    {
        return $this->hasMany(CardSession::class);
    }

    public static function end($id): void
    {
        $gameSession = GameSession::find($id);
        if (isset($gameSession)) {
            $gameSession->state_id = 2;
            $gameSession->updated_at = now();
            $gameSession->points =
                $gameSession->retries > 0
                ? round(($gameSession->numberOfPairs / $gameSession->retries) * 100)
                : 0;
            
            CardSession::where('game_session_id', $gameSession->id)->get()->each->delete();
            $gameSession->save();
        }
    }
}
