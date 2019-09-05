<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加</title>
</head>
<body>
	<center>
	@if ($errors->any())
   
            @foreach ($errors->all() as $error)
              {{ $error }}
            @endforeach
     
@endif
	<form method="post" action="{{url('shuten/doadd')}}">

		@csrf
		姓名：<input type="text" name="name">
				<input type="submit" name="" value="提交">
	</form>
	</center>
</body>
</html>