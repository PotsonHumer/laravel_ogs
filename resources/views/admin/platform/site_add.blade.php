@extends('layouts.admin')

@section('content')

	<blockquote class="col-xs-12"><h2>增加站台</h2></blockquote>
	<div class="col-xs-12 col-sm-7 col-md-6 col-lg-5">

		<form class="adminForm" method="post" action="{{ URL::asset('/admin/platform/site_add') }}">
			<div class="form-group">
				<div class="input-group hspan">
					<label for="name" class="input-group-addon">站台名稱</label>
					<input type="text" class="form-control" id="name" name="name" placeholder="僅可使用符合 [a-z0-9_-] 字符">
				</div>
				<div class="input-group hspan">
					<label for="status" class="input-group-addon">站台狀態</label>
					<select class="form-control" id="status" name="status">
						<option value="null">註冊</option>
						<option value="null">下線</option>
						<option value="null">上線</option>
					</select>
				</div>

				<div class="dynamic input-group hspan">
					<label class="input-group-addon">綁定網域</label>
					<input type="text" class="form-control" name="domain[]" placeholder="請輸入包含 http:// 或 https:// 的完整網址">
				</div>

			</div>

			<div class="form-group">
				<button type="button" class="dynamic_0_add btn btn-info">增加綁定網域</button>
				<button type="submit" class="btn btn-primary">儲存</button>
				<a class="btn btn-warning pull-right" href="{{ URL::asset('/admin/platform/site') }}">取消</a>
			</div>

			<input type="hidden" name="_token" value="{{ csrf_token() }}">
		</form>

	</div>

@endsection