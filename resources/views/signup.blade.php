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
    <div class="form">
        <form action="/checksignup" method="post">
        @csrf
            <h2>ĐĂNG KÝ</h2>
            <p>Họ và tên</p><input type="text" name="fullname" placeholder="&emsp;abc"/>
            <p>Email</p><input type="email" name="email" placeholder="&emsp;abc@gmail.com"/>
            <p>Mật khẩu</p><input type="password" name="password" placeholder="&emsp;abc"/>
            <p>Ảnh đại diện</p><input type="file" name="image">
            <p>Số điện thoại</p><input type="text" name="phonenumber" placeholder="&emsp;0123456789"/>
            <input type="submit" name="submit" value = "ĐĂNG KÝ"/>
            <p style="text-align: center;font-weight:100;">Đã sở hữu tài khoản? <a href="/login">Đăng nhập</a></p>
        </form>
    </div>
    <div class="clear"></div>
    @include("footer")
</div>
</body>
</html>