<!-- @author Dessauges Antoine -->

@extends('layout')

@section('content')

	<ul id="teams" class="drag connected col-md-2">
		<span>Equipes</span>
		@foreach ($teams as $team)
			<li class="team"> {{ $team->name }} </li>
		@endforeach
	</ul>

	<div id="pools" class="col-md-10">
		<span class="col-md-12">Pools <div id="newPool" class="greenBtn">Ajouter une pool</div> </span>

		<div class="col-md-4">
			<div class="pool">

				<div class="row poolName"> <input type="text" name="poolName" placeholder="Nom de la pool"> </div>
				<div class="row match">
					<ul class="drag connected oneTeam"></ul> <span class="versus">VS</span>
					<ul class="drag connected oneTeam"></ul> <i class="deleteMatch fa fa-trash-o" aria-hidden="true"></i>
				</div>
				<div class="row match">
					<ul class="drag connected oneTeam"></ul> <span class="versus">VS</span>
					<ul class="drag connected oneTeam"></ul> <i class="deleteMatch fa fa-trash-o" aria-hidden="true"></i>
				</div>

				<div class="newMatch">
					<i class="fa fa-plus" aria-hidden="true"></i>
					Ajouter un match
				</div>

				<div class="deletePool">
					Supprimer la pool
					<i class="fa fa-trash-o" aria-hidden="true"></i>
				</div>

			</div>
		</div>

	</div>

	<div class="send savePool"><button class="btn btn-success formSend">Sauvegarder</button></div>

@stop

