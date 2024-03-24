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
    <div class="categoryname">
        <h2>{{$namecate}}</h2>
    </div>
    <div class="bottom_100">
        @foreach ($news_100 as $new)
        <div class="news_cate_bottom">
            <a href ="/content/{{$new->News_id}}"><img src="<?php echo asset("img/{$new->Image}")?>" alt=""><h5>{{$new->Title}}</h5></a>
        </div>
        @endforeach
    </div>
    </div>
    <div class="clear"></div>
    @include("footer")
</div>
</body>
</html>