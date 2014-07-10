@extends('layouts.auth')

@section('content')

<form action="login/sign-in" method="post">

	<label form="email">Username/e-mail</label><br />
	<input type="text" name="email" id="email" /><br />

	<label form="password">Password</label><br />
	<input type="password" name="password" id="password" /><br />

	<input type="submit" value="Login" />

</form>

<p>
	@if($isAuth)
		YES
	@else
		NO
	@endif
</p>

@stop