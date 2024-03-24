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
    <div class="profile">
        <div class="profile_50">
        <div class="left_profile" style="border-right:1px solid #00000011">
            <h2>THÔNG TIN TÀI KHOẢN</h2>
            <img src="<?php echo asset("img/{$image}")?>">
                <p>Họ và tên:&emsp;&emsp;{{session('account')->Fullname}}</p>
                <p>Email:&emsp;&emsp;&emsp;&ensp;&nbsp;{{session('account')->Email}}</p>
                <p>Số điện thoại:&ensp;&nbsp;{{session('account')->PhoneNumber}}</p>
                <a href="/editprofile"><button>CẬP NHẬT THÔNG TIN</button></a>
            </div>
        </div>
        </div>
        <div class="profile_50">
            <h2>CÔNG VIỆC</h2>
            <div class="right_profile">
                @if(session('role')=="user")
                <p>Không đủ quyền hạn</p>
                <p>Hiện tại không có công việc</p>
                @elseif(session('role')=="journalist")
                <p style="color: #000000a8;margin-top:-15px;margin-bottom:70px">- chức vụ: ký giả -</p>
                <a href="/createnews"><p>ĐĂNG TẢI TIN TỨC</p></a>
                <a href="/newsofjournalist/{{session('account')->_id}}"><p>CẬP NHẬT TIN TỨC</p></a>
                @else
                <p style="color: #000000a8;margin-top:-15px;margin-bottom:70px">- chức vụ: quản lý hệ thống -</p>
                <a href="/listnews/10000001"><p>DANH SÁCH TIN TỨC</a>
                <a href="/listjournalist"><p>DANH SÁCH KÝ GIẢ</a>
                <a href="/listuser"><p>DANH SÁCH NGƯỜI DÙNG</a>
                @endif
            </div>
        </div>
    <div class="clear"></div>
    @include("footer")
</div>
</body>
</html>