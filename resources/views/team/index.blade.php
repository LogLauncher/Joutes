@extends('layout')

@section('content')

	<h1>Teams</h1>

	<table>

		<thead>
			<tr>
				<th>Nom de l'équipe</th>
				<th>Options</th>
			</tr>
		</thead>

		<tbody>

		  	@foreach ($teams as $team)
				<tr>
			      <td> {{ $team->name }} {{ $team->id }}</td>
			      <td> 
				      <a href="{{ route('teams.edit', $team->id) }}" alt="Modifier la team"> <i class="fa fa-pencil" aria-hidden="true"></i> </a>
				      <a href="" alt="Supprimer la team"> <i class="fa fa-trash-o" aria-hidden="true"></i> </a>
			      </td>
			    </tr>

			@endforeach
	    	
	  	</tbody>

	</table>

@stop