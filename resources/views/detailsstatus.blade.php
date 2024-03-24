<!DOCTYPE html>
<html>
<head>
    <title>INFOR</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="wrapper">
    @include("header")
    <div class="content">
        <div class="maincontent">
        <div class="news_100">
            <h2>{{mb_strtoupper($news->Title, 'UTF-8')}}</h2>
            <p style="color: #000000a8;margin-top:-10px">Người đăng tải: {{$news->Fullname}}
            @if($news->Statusid == "10000000")
                &emsp;&emsp;Trạng thái: Chờ duyệt
                @if(session('role')=="admin")
                <a href="/pushnews/{{$news->_id}}"><button>Duyệt tin tức</button></a>
                @endif
            @else
            &emsp;&emsp;Trạng thái: Đã hoàn trả
            @endif
            </p>
            <img src="<?php echo asset("img/{$news->Image}")?>" alt="">
            <p><?php echo nl2br($news->Content); ?></p>
        </div>
        </div>
    </div>
    </div>
    <div class="clear"></div>
    @include("footer")
</div>
<script>
    function myFunction(element) {
        var dropdown = element.previousElementSibling;
        dropdown.classList.toggle("show");
    }
</script>
</body>
</html>