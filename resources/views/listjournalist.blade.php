<!DOCTYPE html>
<html>
<head>
    <title>INFOR</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
</head>
<body>
<div class="wrapper">
    @include("header")
    <div class="list_news">
        <table class="each">
            <tr>
                <th>ID</th>
                <th>ẢNH ĐẠI DIỆN</th>
                <th>HỌ VÀ TÊN</th>
                <th>EMAIL</th>
                <th>SỐ ĐIỆN THOẠI</th>
                <th>CÁC BÀI BÁO ĐÃ ĐĂNG</th>
                <th>XOÁ</th>
            </tr>
            @foreach ($list as $journalist)
            <tr>
                <td>{{$journalist->_id}}</td>
                <td><img class="ava" src="<?php echo asset("img/{$journalist->Image}")?>"></td>
                <td>{{$journalist->Fullname}}</td>
                <td>{{$journalist->Email}}</td>
                <td>{{$journalist->PhoneNumber}}</td>
                <td><a href="/newsofjournalist/{{$journalist->_id}}"><i class="	fa fa-newspaper-o"></i></a></td>
                <td><a href="/deletejournalist/{{$journalist->_id}}"><i class="fa fa-trash-o"></i></a></td>
            </tr>
            @endforeach
        </table>
    </div>
    <div class="clear"></div>
    @include("footer")
</div>
</body>
</html>