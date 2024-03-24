<!DOCTYPE html>
<html>
<head>
    <title>INFOR</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
</head>
<body>
<div class="wrapper">
    @include("header")
    <div class="main">
    <div class="CRUD">
        <form action="/checkeditnews" method="post">
        @csrf
            <h2>CHỈNH SỬA BÀI VIẾT</h2>
            <p>Tiêu đề</p><input type="text" name="title" placeholder="&emsp;Nhập tiêu đề" value="{{$news->Title}}"/>
            <p>Nội dung</p><textarea name="content" placeholder="&emsp;&emsp;Nhập nội dung">{{$news->Content}}</textarea>
            <p>Ảnh&emsp;&emsp;<input type="file" name="image"></p>
            <p>Thể loại&emsp;&emsp;
            <select name="category">
                <option value="{{$news->CategoryId}}">{{$news->CategoryName}}</option>
                @foreach($category as $cate)
                <option value="{{$cate->_id}}">{{$cate->Name}}</option>
                @endforeach
            </select>
            </p>
            <input type="hidden" name="id" value="{{$news->_id}}">
            <input type="submit" name="submit" value = "Gửi"/>
        </form>
    </div>
    <div class="clear"></div>
    @include("footer")
</div>
</body>
</html> 