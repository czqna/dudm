<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="{{url('shuten/doabb')}}" method="get">
		@csrf
		账号	<input type="text" name="name"><br>
		密码：<input type="password" name="pwd">
				<input type="submit" name="" value="登录">
	</form>
</body>
</html>