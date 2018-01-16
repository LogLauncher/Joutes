<?php
namespace App\Http\Response\Transformers;

use App\Tournament;
use League\Fractal\TransformerAbstract;

class SingleTournamentTransformer extends TransformerAbstract
{
    public $defaultIncludes = [
        "teams",
        "pools"
    ];

    public function transform(Tournament $tournament) {

        $results = $tournament->results();
        $first_second = null;
        $third_forth = null;
        if (count($results) > 0) {
            $first_second = $results->first()->rankings();
            $third_forth = $results->last()->rankings();
            if ($first_second === $third_forth) {
                $third_forth = null;
            }
        }

        return [
            'id'            => (int) $tournament->id,
            'name'          => (string) $tournament->name,
            'sport'         => (string) $tournament->sport->name,
            'type'          => '',
            'place'         => '',
            'winner' => [
                'id'    => $first_second[0]['team_id'],
                'name'  => $first_second[0]['team']
            ],
            'second' => [
                'id'    => $first_second[1]['team_id'],
                'name'  => $first_second[1]['team']
            ],
            'third'  => [
                'id'    => $third_forth[0]['team_id'],
                'name'  => $third_forth[0]['team']
            ]
        ];
    }

    public function includeTeams(Tournament $tournament) {
        return $this->collection($tournament->teams, new TournamentTeamTransformer);
    }
    public function includePools(Tournament $tournament)
    {
        return $this->collection($tournament->pools, new TournamentPoolTransformer);
    }
}
