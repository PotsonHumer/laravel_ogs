@extends('layouts.admin')

@section('content')
<div id="loginForm" class="flex flex-middle col-xs-12 col-sm-offset-3 col-sm-6 col-md-offset-4 col-md-4">
	<form action="{{ url('/admin/login') }}" method="post" class="clear">

		<!-- <div id="logo" class="flex flex-center"><img src="{{ URL::asset('/images/logo_b.svg') }}" class="img-responsive"></div> -->

		<h1 class="text-center">歐格思雲端 <small>後台管理系統登入</small></h1>

		<div class="form-group">
			<div class="input-group">
				<label for="email" class="input-group-addon">登入帳號</label>
				<input type="email" class="form-control" id="email" name="email" placeholder="E-MAIL" value="{{ old('email') }}" required>
			</div>
		</div>
		<div class="form-group">
			<div class="input-group">
				<label for="pwd" class="input-group-addon">登入密碼</label>
				<input type="password" class="form-control" id="pwd" name="password" required>
			</div>

			@if ($errors->has('errMessage'))
			<span class="help-block">
				<strong class="text-danger">{{ $errors->first('errMessage') }}</strong>
			</span>
			@endif

		</div>
		<button type="submit" class="col-xs-12 btn btn-info">登入</button>

		<input type="hidden" name="_token" value="{{ csrf_token() }}">
	</form>
</div>
@endsection