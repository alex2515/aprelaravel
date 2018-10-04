@extends('layout')
@section('content')
	<h1>Saludo {{ $nombre }}</h1>
	<ul>
		@foreach($consolas as $consola)
			<li>{{ $consola }}</li>
		@endforeach
	</ul>
@stop
