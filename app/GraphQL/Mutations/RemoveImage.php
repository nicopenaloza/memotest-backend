<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\CardSession;
use App\Models\Game;
use App\Models\GameCard;

final readonly class RemoveImage
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args)
    {

        CardSession::where('card_id', $args["id"])->delete();
        GameCard::where('id', $args["id"])->delete();

        $response = new GameCard();
        $response->id = $args["id"];
        return $response;
    }
}
