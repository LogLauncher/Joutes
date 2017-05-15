<!-- @author Dessauges Antoine -->

@extends('layout')

@section('content')

	create pool
	<div id="teams">
		@foreach ($teams as $team)
			<div class="oneTeam"> {{ $team->name }} </div>
		@endforeach
	</div>

@stop