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
        <div class="news_67_33">
            <h2>{{mb_strtoupper($news->Title, 'UTF-8')}}</h2>
            <p style="color: #000000a8;margin-top:-10px">Người đăng tải: {{$news->Fullname}}
                &emsp;&emsp;Ngày đăng tải: {{$news->created_at}}
                &emsp;&emsp;Lượt xem: {{$news->Views}}</p>
            <img src="<?php echo asset("img/{$news->Image}")?>" alt="">
            <p><?php echo nl2br($news->Content); ?></p>
        </div>
        </div>
    </div>
        <div class="news_33_67">
            <h3>TIN TỨC CÙNG DANH MỤC</h3>
            @foreach ($news_33 as $new)
            <div class="news_cate_bottom">
                <a href ="/content/{{$new->News_id}}"><img src="<?php echo asset("img/{$new->Image}")?>" alt=""><h5>{{$new->Title}}</h5></a>
            </div>
            @endforeach
        </div>
    </div>
    <div class="clear"></div>
    <div class="comment">
        <h2>BÌNH LUẬN</h2>
        @foreach ($comment as $cmt)
        <div class="eachcomment">
            <img src="<?php echo asset("img/{$cmt->Image}")?>" alt="">
            <div>
            <p>{{$cmt->Fullname}}</p><a>{{$cmt->Content}}</a>
            </div>
            @if(session('account')&&session('role')=="user") 
                @if($cmt->User_id == session('account')->_id)
                <div class="cmt">
                <div class="crudcmt" style="margin-right: 10px">
                    <a href="/editcomment/{{$cmt->_id}}">Chỉnh sửa</a>
                    <a href="/deletecomment/{{$cmt->_id}}">Xoá</a>
                </div>
                <i onclick="myFunction(this)" class="fa fa-ellipsis-v"></i>
                </div>
                @endif
            @endif
        </div>
        @endforeach
        @if(session('role') == "user")
        <form action="/comment" method="post">
        @csrf
            <textarea name="comment" placeholder="&emsp;&emsp;Nhập nội dung bình luận"></textarea>
            <input type="hidden" name="News_id" value = "{{$news->_id}}"/>
            <input type="submit" name="submit" value = "Gửi"/>
        </form>
        @elseif(session('role') == "admin" || session('role') == "reporter")
            <p style= "text-align:center;font-weight:bold;margin-top:50px">CHỨC VỤ HIỆN TẠI KHÔNG THỂ ĐỂ LẠI BÌNH LUẬN</p>
        @else
            <p style= "text-align:center;font-weight:bold;margin-top:50px">ĐĂNG NHẬP ĐỂ BÌNH LUẬN</p>
        @endif
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