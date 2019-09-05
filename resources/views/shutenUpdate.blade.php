<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>修改</title>
</head>
<body>
	<center>
	@if ($errors->any())
   
            @foreach ($errors->all() as $error)
              {{ $error }}
            @endforeach
     
	@endif
	<form method="post" action="{{url('shuten/doupdate')}}">
	<input type="hidden" name="id" value="{{$shuten_info->id}}">
		@csrf
		姓名：<input type="text" name="name" value="{{$shuten_info->name}}">
				<input type="submit" name="" value="修改">
	</form>
	</center>
</body>
</html>