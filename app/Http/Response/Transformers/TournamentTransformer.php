<?php
namespace App\Http\Response\Transformers;

use App\Tournament;
use League\Fractal\TransformerAbstract;

class TournamentTransformer extends TransformerAbstract
{



    public function transform(Tournament $tournament) {
        
        $places = array();
        foreach ($tournament->contenders as $contender) {
            foreach ($contender->games as $game) {
                if(!in_array($game->court->name, $places))
                    array_push($places, $game->court->name);
            }
        }

        return [
            'id'     => (int) $tournament->id,
            'name'   => (string) $tournament->name,
            'sport'  => (string) $tournament->sport->name,
            'places'  => $places,
            'winner' => [],
            'second' => [],
            'third'  => [],
        ];
    }



}
