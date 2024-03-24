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
                <th>ẢNH MINH HOẠ</th>
                <th style="width:400px">TIÊU ĐỀ</th>
                <th>THỂ LOẠI</th>
                <th>XEM CHI TIẾT</th>
                @if(session('role')=="journalist")
                <th>CHỈNH SỬA</th>
                @endif
                <th>XOÁ</th>
            </tr>
            @if($news->count()>0)
            @foreach ($news as $new)
            <tr>
                <td>{{$new->News_id}}</td>
                <td><img src="<?php echo asset("img/{$new->Image}")?>" alt="">
                <td>{{$new->Title}}
                @if($new->Statusid=="10000002")
                    <br><p style="color:red">Lý do từ chối:&ensp;{{$new->Reply}}</p></td>
                @endif
                <td>{{$new->Categoryname}}</td>
                @if($new->Statusid!="10000001")
                <td><a href="/detailsstatus/{{$new->News_id}}"><i class="fa fa-newspaper-o"></i></a></td>
                @else
                <td><a href="/content/{{$new->News_id}}"><i class="	fa fa-newspaper-o"></i></a></td>
                @endif
                @if(session('role')=="journalist")
                    @if($new->Statusid=="10000002")
                    <td><a href="/editnews/{{$new->News_id}}"><i class="fa fa-edit"></i></a></td>
                    <td><a href="/deletenews/{{$new->News_id}}"><i class="fa fa-trash-o"></i></a></td>
                    @elseif($new->Statusid=="10000000")
                    <td>{{$new->Statusname}}</td>
                    <td><a href="/deletenews/{{$new->News_id}}"><i class="fa fa-trash-o"></i></a></td>
                    @else
                    <td colspan="2">{{$new->Statusname}}</td>
                    @endif
                @else
                <td><a href="/deletenews/{{$new->News_id}}"><i class="fa fa-trash-o"></i></a></td>
                @endif
            </tr>
            @endforeach
            @else
            <td colspan="7"><h4>HIỆN TẠI CHƯA CÓ BÀI ĐĂNG NÀO</h4></td>
            @endif
        </table>
    </div>
    <div class="clear"></div>
    @include("footer")
</div>
</body>
</html>