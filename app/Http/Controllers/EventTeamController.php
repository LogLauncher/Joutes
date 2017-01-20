<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\Event;

class EventTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $event)
    {
        if ($request->is('api/*')) {

            $tournaments = Event::findOrFail($event)->tournaments;
            $teams       = [];

            foreach ($tournaments as $tournament) {
                $tournament_teams = $tournament->teams;

                foreach ($tournament_teams as $team) {

                    $team['sports'] = $team->sports();
                    $teams[]        = $team;
                }
            }

            return $teams;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $event_id
     * @param  int  $team_id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $event_id, $team_id) {

        if ($request->is('api/*')) {
            $team = Team::findOrFail($team_id);

            $team['sports'] = $team->sports();

            return $team;
        }
    }
}