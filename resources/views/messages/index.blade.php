@extends('layout')

@section('content')
	<h1>Lista de mensajes :)</h1>
	<table class="table table-respnsive" width="100%" border="1">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Email</th>
				<th>Opcciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($messages as $message)
			<tr>
				<td>{{ $message->id }}</td>
				<td>{{ $message->nombre }}</td>
				<td>{{ $message->email }}</td>
				<td>
					<a href="{{ route('mensajes.show', $message->id) }}">Ver</a>
					<a href="{{ route('mensajes.edit', $message->id) }}">Editar</a>
					<form style="display: inline" action="{{ route('mensajes.destroy', $message->id) }}" method="POST">
						{!! method_field('DELETE')!!}
						{!! csrf_field() !!}
						<button type="submit">Eliminar</button>
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@stop