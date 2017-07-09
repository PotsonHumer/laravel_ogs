<form action="/admin/login" method="post">
	<input type="email" name="email" value="">
	<input type="password" name="password" value="">
	<input type="submit">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>