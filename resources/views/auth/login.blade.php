@extends('layout')
@section('content')
<h1>Login</h1>
<form method="POST" action="/login">
	{{ csrf_field() }}
	<div class="form-group">
		<input type="email" name="email" placeholder="Email">
	</div>
	<div class="form-group">
		<input type="password" name="password" placeholder="Password">
	</div>
	<br>
	<input type="submit" value="Ingresar">
</form>
@endsection