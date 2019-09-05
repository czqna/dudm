<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>列表</title>
</head>

	<form method="get" action="{{url('shuten/index')}}">

		@csrf
		姓名：<input type="text" name="search" value="{{$search}}">
				<input type="submit" name="" value="搜索">
	</form>
<body>
	<table border="1">
		<tr>
			<td>姓名</td>
			<td>id</td>
			<td>添加</td>
			<td>操作</td>
		</tr>
		@foreach($shuten as $item)
		<tr>
			<td>{{ $item->name }}</td>
			<td>{{ $item->id }}</td>
			<td><a href="">添加</a></td>
			<td><a href="{{url('shuten/delete')}}?id={{$item->id}}">删除</a><a href="{{url('shuten/update')}}?id={{$item->id}}">修改</a></td>
		</tr>
	@endforeach
	</table>
	{{ $shuten->appends(['search' => $search])->links() }}
</body>
</html>