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
        <div class="tab">
        @if($id==10000001)
        <a href="/listnews/10000001"><h3 style="border-bottom:2px solid #041C88">ĐÃ ĐĂNG TẢI</h3></a>
        <a href="/listnews/10000000"><h3>ĐANG CHỜ DUYỆT</h3></a>
        <a href="/listnews/10000002"><h3>TỪ CHỐI</h3></a>
        @elseif($id==10000000)
        <a href="/listnews/10000001"><h3>ĐÃ ĐĂNG TẢI</h3></a>
        <a href="/listnews/10000000"><h3 style="border-bottom:2px solid #041C88">ĐANG CHỜ DUYỆT</h3></a>
        <a href="/listnews/10000002"><h3>TỪ CHỐI</h3></a>
        @else
        <a href="/listnews/10000001"><h3>ĐÃ ĐĂNG TẢI</h3></a>
        <a href="/listnews/10000000"><h3>ĐANG CHỜ DUYỆT</h3></a>
        <a href="/listnews/10000000"><h3 style="border-bottom:2px solid #041C88">TỪ CHỐI</h3></a>
        @endif
        </div>
        <table class="each">
            <tr>
                <th>ID</th>
                <th>ẢNH MINH HOẠ</th>
                <th style="width:400px">TIÊU ĐỀ</th>
                <th>KÝ GIẢ</th>
                <th>THỂ LOẠI</th>
                @if($id==10000001)
                <th>NGUỜI DUYỆT</th>
                @endif
                <th>XEM CHI TIẾT</th>
                @if($id==10000001)
                <th>XOÁ</th>
                @elseif($id==10000000)
                <th>DUYỆT</th>
                <th>TỪ CHỐI</th>
                @else
                <th>LÝ DO TỪ CHỐI</th>
                @endif
            </tr>
            @foreach ($news as $new)
            <tr>
                <td>{{$new->News_id}}</td>
                <td><img src="<?php echo asset("img/{$new->Image}")?>" alt="">
                <td>{{$new->Title}}</td>
                <td>{{$new->Journalistname}}</td>
                <td>{{$new->Categoryname}}</td>
                @if($id==10000001)
                <td>{{$new->Adminname}}</td>
                <td><a href="/content/{{$new->News_id}}"><i class="	fa fa-newspaper-o"></i></a></td>
                <td><a href="/deletenews/{{$new->News_id}}"><i class="fa fa-trash-o"></i></a></td>
                @else
                <td><a href="/detailsstatus/{{$new->News_id}}"><i class="fa fa-newspaper-o"></i></a></td>
                @if($id==10000000)
                <td><a href="/pushnews/{{$new->News_id}}"><i class="fa fa-check"></i></a></td>
                <td><a><i id="replyIcon" class="fa fa-mail-reply"></i></a>
                <div id="replyForm" class="reply" style="display: none;">
                    <form id="form_reply" action="/checkrejected" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$new->News_id}}"/>
                    <input type="text" name="reply" placeholder=" Phản hồi..."/>
                    </form>
                </div>
                </td>
                @else
                <td><a>{{$new->Reply}}</a></td>
                @endif
                @endif
            </tr>
            @endforeach
        </table>
    </div>
    <div class="clear"></div>
    @include("footer")
</div>
<script>
    document.getElementById("replyIcon").addEventListener("click", function() {
        var replyForm = document.getElementById("replyForm");
        var replyIcon = document.getElementById("replyIcon");
        if (replyForm.style.display === "none") {
            replyForm.style.display = "block";
            replyIcon.style.display = "none";
        } else {
            replyIcon.style.display = "block";
            replyForm.style.display = "none";
        }
    });
</script>
</body>
</html>