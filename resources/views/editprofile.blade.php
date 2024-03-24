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
        <form action="/checkeditprofile" method="post">
        @csrf
            <h2>CẬP NHẬT THÔNG TIN CÁ NHÂN</h2>
            <p>Họ và tên</p><input type="text" name="fullname" placeholder="&emsp;abc" value="{{session('account')->Fullname}}"/>
            <p>Email</p><input type="email" name="email" placeholder="&emsp;abc@gmail.com" value="{{session('account')->Email}}"/>
            <p>Mật khẩu</p><input type="password" name="password" placeholder="&emsp;abc" value="{{session('account')->Password}}"/>
            <p>Ảnh đại diện</p><input type="file" name="image">
            <p>Số điện thoại</p><input type="text" name="phonenumber" placeholder="&emsp;0123456789" value="{{session('account')->PhoneNumber}}"/>
            <input type="submit" name="submit" value = "CẬP NHẬT"/>
        </form>
    </div>
    <div class="clear"></div>
    @include("footer")
</div>
</body>
</html>