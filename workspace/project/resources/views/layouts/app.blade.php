<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <!--<link rel="stylesheet" href="{{asset('css/layouts/layout.css')}}">-->
    <link rel="stylesheet" href="{{asset('css/contents/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/contents/flea.css')}}">
    <link rel="stylesheet" href="{{asset('css/contents/mypage.css')}}">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

    {{--<script src="https://code.jquery.com/jquery-3.2.1.js"></script>--}}
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>--}}

    {{--<script src="http://code.jquery.com/jquery-latest.min.js"></script>--}}
    {{--<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>--}}
  </head>
  <style type="text/css">
    li{
      list-style:none;
      float:left;
      margin-left:35px;
      font-size:16px;
      font-family: "Gill Sans", "Gill Sans MT", Calibri, sans-serif;
    }
    a:link{
      text-decoration:none;
      color:black;
    }
    a:visited{
      text-decoration:none;
      color:black;
    }
    a:hover{
      text-decoration:none;
      color:#ad0000;
    }
    
    
  </style>
  
  <body>
    <div class="body">
      <!-- 상단 -------------------------------------------------------------------------------------------------------------------------------->
      <div class="header" style="width:100%; height:100px; border:1px solid #d8d8d8;  background-color:white; position:fixed; top:0px; left:0px; z-index:3;">
        <!-- 상단이미지 부분(왼쪽) -->
        <div class="menu_img" style="width:35%; height:100%; float:left;">
            <a href="{{url('/')}}"><img src="{{asset('img/doubleo.png')}}" alt="" style="margin-left:50px;  margin-top:10px; width:300px; height:100px;"></a>
        </div>

        <div class="menu_bar text-center" style="float:left; margin-top:40px; width:35%;">
          <!-- 로그인, 회원가입 -->
          <!-- 플리마켓, 벼룩공방, 마일리지 샵, 마이페이지  -->
            <li id="menu_flea"><a href="{{url('/fleamarket/main')}}">FLEA-MARKET</a></li>
            <li id="menu_lap"><a href="{{url('/mylab/show')}}">FLEA-STUDIO</a></li>
            <li id="menu_guide"><a href="#">GUIDE</a></li>
            <li id="menu_shop"><a href="{{url('/mileage/mileageshop')}}">MILEAGE</a></li>
        </div>

        <div class="menu_bar" style="margin-left:4%; float:left; margin-top:40px; width:20%; ">
          <!-- 로그인, 회원가입 -->
          <!-- 플리마켓, 벼룩공방, 마일리지 샵, 마이페이지  -->
          <div class="menu">

            @if(Session::get('user'))
              <li><a href="{{url('/logout')}}">LOGOUT</a></li>
              <li id="menu_mypage"><a href="{{url('/mypage/main')}}">MYPAGE</a></li>
            @else
              <li id="menu_login"><a href="{{url('/login')}}">LOGIN</a></li>
              <li id="menu_join"><a href="#">JOIN</a></li>
              <li id="menu_mypage"><a href="{{url('/fleamarket/mypage/main')}}">MY PAGE</a></li>
            @endif
          </div>
        </div>
      
        <!-- 상단바 부분(오른쪽)  -->
        
      </div>
      
      <!-- 컨텐츠 부분(플리마켓 정보, 판매자 정보, 벼룩가이드, 마일리지 샵) ------------------------------------------------------------------------->
      <div class="contents" style="margin:0 auto; margin-top:100px;  z-index:1">
        @yield('content')
      </div>
      <!-- 푸터부분 ----------------------------------------------------------------------------------------------------------------------------->
      <div class="footer" style="width:100%; height:100px;">
        Copyright(c)2017.All Rights Reserved By ZesTNT.
      </div>
    </div>
  </body>
</html>
