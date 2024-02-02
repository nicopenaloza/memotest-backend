<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\CardSession;
use Illuminate\Support\Collection;

final class MatchPair
{
    public function __invoke(null $_, array $args): Collection
    {
        $cards = CardSession::where('card_id', $args["card_id"])
            ->where('game_session_id', $args["session_id"])
            ->get();

        foreach ($cards as $card) {
            $card->hidden = true;
            $card->updated_at = now();
            $card->save();
        }

        return $cards;
    }
}
