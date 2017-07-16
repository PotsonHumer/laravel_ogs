@extends('layouts.admin')

@section('content')

	@include('admin.sub_menu')

	<blockquote class="col-xs-12"><h2>站台列表</h2></blockquote>
	<div class="col-xs-12">
		<div class="table-responsive">
			<table class="table table-hover table-condensed">
				<tr>
					<th class="text-center">選取</th>
					<th class="text-center">站點 ID</th>
					<th class="text-center">站點名稱</th>
					<th class="text-center">公司名稱</th>
					<th class="text-center">站點狀態</th>
					<th class="text-center">管理</th>
					<th class="text-center">刪除</th>
				</tr>
				<tr>
					<td class="text-center">
						<input type="checkbox" name="id[]" value="">
					</td>
					<td class="text-center">01</td>
					<td class="text-center"></td>
					<td class="text-center"></td>
					<td class="text-center">
						<a class="btn btn-success active" href="#">
							<i class="fa fa-pencil-square-o fa-lg"></i><span>開啟</span>
						</a>
					</td>
					<td class="text-center">
						<a class="btn btn-info" href="#">
							<i class="fa fa-pencil-square-o fa-lg"></i><span>修改</span>
						</a>
					</td>
					<td class="text-center">
						<a class="btn btn-danger" href="#">
							<i class="fa fa-close fa-lg"></i><span>刪除</span>
						</a>
					</td>
				</tr>

				<tr>
					<td class="text-center">
						<input type="checkbox" name="id[]" value="">
					</td>
					<td class="text-center">01</td>
					<td class="text-center"></td>
					<td class="text-center"></td>
					<td class="text-center"></td>
					<td class="text-center">
						<a class="btn btn-info" href="#">
							<i class="fa fa-pencil-square-o fa-lg"></i><span>修改</span>
						</a>
					</td>
					<td class="text-center">
						<a class="btn btn-danger" href="#">
							<i class="fa fa-close fa-lg"></i><span>刪除</span>
						</a>
					</td>
				</tr>				
			</table>
		</div>
	</div>

@endsection