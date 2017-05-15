<!-- @author Dessauges Antoine -->

@extends('layout')

@section('content')

	<ul id="teams" class="drag connected col-md-2">
		<span>Equipes</span>
		@foreach ($teams as $team)
			<li class="oneTeam"> {{ $team->name }} </li>
		@endforeach
	</ul>

	<div id="pools" class="col-md-10">
		<span class="col-md-12">Pools</span>

		<div class="pool col-md-4">

			<div class="row poolName"> <input type="text" name="poolName" placeholder="Nom de la pool"> </div>
			<div class="row match">
				<div class="col-md-6"><ul class="drag connected oneTeam"></ul></div>
				<div class="col-md-6"><ul class="drag connected oneTeam"></ul></div>
			</div>
			<div class="row match">
				<div class="col-md-6"><ul class="drag connected oneTeam"></ul></div>
				<div class="col-md-6"><ul class="drag connected oneTeam"></ul></div>
			</div>

			<div id="newMatch">
				<i class="fa fa-plus" aria-hidden="true"></i>
				Ajouter un match
			</div>

		</div>

	</div>

	<div id="newPool">
		<i class="fa fa-plus" aria-hidden="true"></i>
		Ajouter une pool
	</div>

@stop

