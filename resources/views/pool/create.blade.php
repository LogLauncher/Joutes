<!-- @author Dessauges Antoine -->

@extends('layout')

@section('content')

	<ul id="teams" class="drag connected">
		<h3>Equipes</h3>
		@foreach ($teams as $team)
			<li class="oneTeam"> {{ $team->name }} </li>
		@endforeach
	</ul>

	<div id="pools">
		<ul class="pool drag connected">
			<input type="text" name="poolName" placeholder="Nom de la pool">
		</ul>
	</div>

	<div id="newPool">
		<i class="fa fa-plus" aria-hidden="true"></i>
	</div>

@stop

