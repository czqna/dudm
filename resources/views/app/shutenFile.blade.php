<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>添加页面</title>
</head>
<body>
<center>
    <form action="{{url('/shuten/dofile')}}" method="post" enctype="multipart/form-data">
        @csrf
        图片上传:<input type="file" name="goods_price"><br/>
        <input type="submit" value="上传">
    </form>
</center>
</body>
</html>