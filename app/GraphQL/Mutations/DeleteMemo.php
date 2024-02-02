<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Game;
use App\Models\CardSession;
use App\Models\GameCard;
use App\Models\GameSession;

final class DeleteMemo
{
    public function __invoke(null $_, array $args): Game
    {
        $game = Game::find($args["id"]);
        $gameSessions = GameSession::where('game_id', $args["id"])->get();

        foreach ($gameSessions as $session) {
            CardSession::where('game_session_id', $session->id)->delete();
        }

        $gameSessions->each->delete();

        GameCard::where('game_id', $args["id"])->delete();

        if ($game) {
            $game->delete();
        }
        
        $response = new Game();
        $response->id = $args["id"];
        return $response;
    }
}
