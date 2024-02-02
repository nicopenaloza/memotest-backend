<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\CardSession;
use App\Models\GameSession;

final readonly class EndGameSession
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args)
    {
        GameSession::end($args["id"]);
        $gameSession = GameSession::find($args["id"]);
        return $gameSession;
    }
}
