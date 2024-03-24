<!DOCTYPE html>
<html>
<head>
    <title>INFOR</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
    <link rel="icon" href="{!! asset('img/icontab.png') !!}"/>
</head>
<body>
<div class="wrapper">
    @include("header")
    <div class="main">
    <div class="left_main">
        <div class="slides">
        @foreach ($newsslides as $new)
            <div class="news_left">
                <a href ="/content/{{$new->News_id}}"><img src="<?php echo asset("img/{$new->Image}")?>" alt="">
                <h1>{{$new->Title}}</h1>
                <p>{{$new->Content}}</p>
                </a>
            </div>
        @endforeach
        </div>
    </div>
    <div class="right_main">
        @foreach ($newsright as $new)
        <div class="news_right">
            <a href ="/content/{{$new->News_id}}"><img src="<?php echo asset("img/{$new->Image}")?>" alt=""><h3>{{$new->Title}}</h3></a>
        </div>
        @endforeach
    </div>
    </div>
    <div class="clear"></div>
    <div class="bottom_33">
        @foreach ($newsbottom_33_1 as $new)
        <div class="news_bottom">
            <a href ="/content/{{$new->News_id}}"><img src="<?php echo asset("img/{$new->Image}")?>" alt=""><h5>{{$new->Title}}</h5></a>
        </div>
        @endforeach
    </div>
    <div class="bottom_33">
        @foreach ($newsbottom_33_2 as $new)
        <div class="news_bottom">
            <a href ="/content/{{$new->News_id}}"><img src="<?php echo asset("img/{$new->Image}")?>" alt=""><h5>{{$new->Title}}</h5></a>
        </div>
        @endforeach
    </div>
    <div class="bottom_33">
        @foreach ($newsbottom_33_3 as $new)
        <div class="news_bottom">
            <a href ="/content/{{$new->News_id}}"><img src="<?php echo asset("img/{$new->Image}")?>" alt=""><h5>{{$new->Title}}</h5></a>
        </div>
        @endforeach
    </div>
    <div class="clear"></div>
    <div class="bottom_33_67">
        <ul class="list_news">
            @foreach ($newsbottom_33_67 as $new)
            <li><a href="/content/{{$new->News_id}}"><h5>{{$new->Title}}</h5></a></li>
            @endforeach
        </ul>
    </div>
    <div class="bottom_67_33">
        @foreach ($newsbottom_67_33 as $new)
        <div class="news_cate_bottom">
            <a href ="/content/{{$new->News_id}}"><img src="<?php echo asset("img/{$new->Image}")?>" alt=""><h5>{{$new->Title}}</h5></a>
        </div>
        @endforeach
    </div>
    </div>
    <div class="clear"></div>
    @include("footer")
</div>
<script>
    var counter = 0;
    var news_lefts = document.getElementsByClassName("news_left");
    setInterval(function(){
        news_lefts[counter].style.display = "none";
        counter++;
        if(counter >= news_lefts.length){
        counter = 0;
        }
        news_lefts[counter].style.display = "block";
    }, 7000);
</script>
</body>
</html>