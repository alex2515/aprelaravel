@extends('layout')

@section('content')
	<h1>Contactos</h1>
	<h2>Escríbeme</h2>
	@if( session()->has('info') )
		<h3>{{ session('info') }}</h3>
	@else
	<form action="{{route('mensajes.store')}}" method="POST">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<p><label for="nombre">
			Nombre
			<input type="text" name="nombre" value="{{ old('nombre') }}">
			{!! $errors->first('nombre', '<span class=error>:message</span>') !!}
		</label></p>
		<p><label for="email">
			Email
			<input type="email" name="email" value="{{ old('email') }}">
			{!! $errors->first('email', '<span class=error>:message</span>') !!}
		</label></p>
		<p><label for="mensaje">
			Mensaje
			<textarea name="mensaje" cols="30" rows="10">{{ old('mensaje') }}</textarea>
			{!! $errors->first('mensaje', '<span class=error>:message</span>') !!}
		</label></p>
		<input type="submit" value="Enviar">
	</form>
	@endif
@stop