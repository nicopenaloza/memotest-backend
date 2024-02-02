<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Game;
use App\Models\GameCard;

final readonly class CreateMemo
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args)
    {
        $game = new Game();
        $game->name = $args["name"];
        $game->image = $args["image"];
        $game->save();

        $images = $args["images"];
        foreach ($images as $image) {
            $newCard = new GameCard();
            $newCard->game_id = $game->id;
            $newCard->image = $image;
            $newCard->save();
        }
        
        return $game;
        
    }
}
