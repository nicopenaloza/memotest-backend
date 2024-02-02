<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\CardSession;
use App\Models\GameSession;
use Illuminate\Support\Facades\Log;

final readonly class UpdateAttempts
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args)
    {
        $gameSession = GameSession::find($args["id"]);
        if (isset($gameSession) && $gameSession->state_id != 2) {
            $gameSession->retries += 1;

            $totalMatchedCards = CardSession::where('game_session_id', $args["id"])->where('hidden', '1')->count();
            Log::info($totalMatchedCards);
            if (($totalMatchedCards / 2) >= $gameSession->numberOfPairs) {
                GameSession::end($args["id"]);
            }

            $gameSession->updated_at = now();
            $gameSession->save();
        }
        return $gameSession;
    }
}
