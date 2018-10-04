@extends('layout')

@section('content')
	<h1>Usuarios</h1>
	<table class="table table-respnsive">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Email</th>
				<th>Role</th>
				<th>Opcciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($users as $user)
			<tr>
				<td>{{ $user->id }}</td>
				<td>{{ $user->name }}</td>
				<td>{{ $user->email }}</td>
				<td>{{ $user->role }}</td>
				<td>Opcciones</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@stop