<?php
namespace App\Http\Response\Transformers;

use App\Game;
use League\Fractal\TransformerAbstract;

class TeamMatchesTransformer extends TransformerAbstract
{
    public function transform(Game $game) {

        return [
            'id' => $game->id,
            'group_match_id' => $game->pool()->id,
            'status' => $game->score_contender1 != '' ? 'Finish' : 'Incoming',
            'team2' => $game->contender2->team_id != null ? $game->contender2->team->name : '',
            'start' => $game->start_time,
            'ownScore' => $game->score_contender1,
            'team2Score' => $game->score_contender2,
            'type' => $game->pool()->gameType->gameTypeDescription,
        ];
    }
}
