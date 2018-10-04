@extends('layout')

@section('content')
	<h1>Contactos</h1>
	<h2>Escríbeme</h2>
	@if( session()->has('info') )
		<h3>{{ session('info') }}</h3>
	@else
	<div class="container">
	<form action="contacto" method="POST">
		<input class="form-control" type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="form-group">
			<label for="nombre">Nombre </label>
			<input class="form-control" type="text" name="nombre" value="{{ old('nombre') }}"> {!! $errors->first('nombre', '<span class=error>:message</span>') !!}
		</div>
		<div class="form-group">
			<label for="email">Email</label>
			<input class="form-control" type="email" name="email" value="{{ old('email') }}">
			{!! $errors->first('email', '<span class=error>:message</span>') !!}
		</div>
		<div class="form-group">
			<label for="mensaje">Mensaje</label>
			<textarea class="form-control" name="mensaje" cols="30" rows="10">{{ old('mensaje') }}</textarea>
			{!! $errors->first('mensaje', '<span class=error>:message</span>') !!}
		</div>
		<input type="submit" value="Enviar">
	</form>
	</div>

	@endif
@stop