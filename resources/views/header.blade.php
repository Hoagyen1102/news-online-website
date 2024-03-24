<div class="move">
    <div class="header">
        <div class="left_header">
            <div class="icon">
                <img src="{{ asset('img/icon.jpg')}}" alt="">
            </div>
        </div>
        <div class="logo">
            <h1>INFOR</h1>
            <h4>NHANH CHÓNG - CHÍNH XÁC</h4>
        </div>
        <div class="search">
            <form id="form_search" action="/search" method="post">
            @csrf
            <input type="search" name="search" placeholder="&emsp;Tìm kiếm..."/>
            </form>
        </div>
        <div class="right_header">
          <ul class="func_header">
                <li><h4 style="font-weight:100;color:#000000f1">HOTLINE: 1900 123 123</h4></li>
                <li><a href="/introduce"><h4>GIỚI THIỆU</h4></a></li>
                @if(session('account'))
                <li><a href="/profile/{{session('account')->_id}}"><h4>HỒ SƠ</h4></a></li>
                <li><a href="/logout"><h4>ĐĂNG XUẤT</h4></a></li>
                @else
                <li><a href="/login"><h4>ĐĂNG NHẬP</h4></a></li>
                @endif
          </ul>
        </div>
    </div>
    <div class="clear"></div>
    <div class="menu">
      <ul class="func_menu">
          <li><a href="/index">TRANG CHỦ</a></li>   
        @foreach ($category as $cate)
          <li><a href="/category/{{$cate->_id}}">{{mb_strtoupper($cate->Name, 'UTF-8')}}</a></li>
        @endforeach
      </ul>
    </div>
</div>
<script>
    document.getElementById("form_search").addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
            document.getElementById("form_search").submit();
        }
    });
</script>
