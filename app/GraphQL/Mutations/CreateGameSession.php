<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\CardSession;
use App\Models\Game;
use App\Models\GameCard;
use App\Models\GameSession;
use Illuminate\Database\Eloquent\Collection;

final class CreateGameSession
{
    public function __invoke(null $_, array $args): GameSession
    {
        $gameSession = new GameSession();
        $game = Game::find($args["game_id"]);

        if ($game) {
            $gameCards = GameCard::where('game_id', $game->id)->get();

            $gameSession->game_id = $game->id;
            $gameSession->numberOfPairs = $gameCards->count();
            $gameSession->retries = 0;
            $gameSession->state_id = 1;
            $gameSession->created_at = now();
            $gameSession->updated_at = now();
            $gameSession->save();

            $cardsArray = $gameCards->toArray();
            $cards = array_merge($cardsArray, $cardsArray);
            shuffle($cards);

            foreach ($cards as $card) {
                $sessionCard = new CardSession();
                $sessionCard->game_session_id = $gameSession->id;
                $sessionCard->card_id = $card['id'];
                $sessionCard->active = false;
                $sessionCard->hidden = false;
                $sessionCard->created_at = now();
                $sessionCard->updated_at = now();
                $sessionCard->save();
            }
        }

        return $gameSession;
    }
}
