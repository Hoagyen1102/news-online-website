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
        <form action="/checklogin" method="post">
        @csrf
            <h2>ĐĂNG NHẬP</h2>
            <p>Email</p><input type="email" name="email" placeholder="&emsp;abc@gmail.com"/>
            <p>Mật khẩu</p><input type="password" name="password" placeholder="&emsp;abc"/>
            <input type="submit" name="submit" value = "ĐĂNG NHẬP"/>
            <p style="text-align: center;font-weight:100;">Chưa sở hữu tài khoản? <a href="/signup">Đăng ký ngay</a></p>
        </form>
    </div>
    <div class="clear"></div>
    @include("footer")
</div>
</body>
</html>