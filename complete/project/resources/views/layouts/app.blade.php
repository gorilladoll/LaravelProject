<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <!--<link rel="stylesheet" href="{{asset('css/layouts/layout.css')}}">-->
    <!--<link rel="stylesheet" href="{{asset('css/contents/main.css')}}">-->
    <!--<link rel="stylesheet" href="{{asset('css/contents/flea.css')}}">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
   @yield('style')
   

  <style type="text/css">
    @font-face{ 
      font-family:interparkM; 
      src:url("/fonts/InterparkGothicMedium.ttf");
      /*src:url("/fonts/InterparkGothicMedium.eot");*/
    }
    @font-face{ 
      font-family:interparkMEot;
      src:url("/fonts/InterparkGothicMedium.eot");
    }
    
    @font-face{ 
      font-family:CulDeSac; 
      src:url("/fonts/DK Cul De Sac.ttf");
    }
    
    /*body{*/
    /*  font-family:'interparkMEot';*/
    /*}*/
    
  	li{
		  list-style: none;
	  }
    
    .menu_bar li{
      list-style:none;
      float:left;
      margin-left:35px;
      font-size:16px;
      font-family:'interparkM','interparkMEot';
      color:#4c4c4c;
    }
    a:link{
      text-decoration:none;
      color:#606060;
    }
    a:visited{
      text-decoration:none;
      color:#606060;
    }
    a:hover{
      text-decoration:none;
      color:#ad0000;
    }
    .alarm_wrapper{
      width:250px;
      height:280px;
      line-height:100%;
      overflow:scroll;
    }
    
    .contents{
      width : 100%;
      height : 100%;
    }
    
    .alarm_contents{
      width:63%; height:70px; margin-left:-5px; border-bottom:1px dotted #a0a0a0;
    }
    .alarm_contents:last-child{
      width:63%; height:70px; margin-left:-2px;
    }
    
    .header{
      width:100%; 
      height:120px; 
      border:1px solid #d8d8d8; 
      border-bottom:1px solid #606060; 
      background-color:white; 
      position:fixed; 
      top:0px; 
      left:0px; 
      z-index:3; 
      box-shadow: 2px 2px 2px #888888;
    }
  </style>
  
  <!--@yield('style');-->
  
  <body style="background-color:#f2f2f2;">
    <div class="body" >
      <!-- 상단 -------------------------------------------------------------------------------------------------------------------------------->
      <div class="header" style="">
        <!-- 상단이미지 부분(왼쪽) -->
        <div class="menu_img" style="width:32%; height:100%; float:left; ">
            <a href="{{url('/')}}"><img src="{{asset('img/logo_DOFM.png')}}" alt="" style="margin-left:50px;  margin-top:px; width:300px; height:120px;"></a>
        </div>

        <div class="menu_bar text-center" style="float:left; margin-top:50px; width:35%; margin-right:10%; font-weight:bold;">
          <!-- 로그인, 회원가입 -->
          <!-- 플리마켓, 벼룩공방, 마일리지 샵, 마이페이지  -->
            <li id="menu_flea"><a href="{{url('/fleamarket/main')}}">FLEA-MARKET</a></li>
            <li id="menu_lap"><a href="{{url('/mylab/create')}}">FLEA-STUDIO</a></li>
            <li id="menu_guide"><a href="#">GUIDE</a></li>
            <li id="menu_shop"><a href="{{url('/mileage/mileageshop')}}">MILEAGE</a></li>
        </div>

        <div class="menu_bar" style="margin-left:4%; float:left; margin-top:50px; width:15%; font-weight:bold;">
          <!-- 로그인, 회원가입 -->
          <!-- 플리마켓, 벼룩공방, 마일리지 샵, 마이페이지  -->
          <div class="menu">

            @if(Session::get('user'))
              <li><a href="{{url('/logout')}}">LOGOUT</a></li>
              <li id="menu_mypage"><a href="{{url('/mypage/main')}}">MYPAGE</a></li>
              <!--<button type="button" class="btn btn-default notification_btn" aria-label="Left Align" -->
              <!--        style="margin-left:50px; margin-top:-5px;"  id="popoverData" data-content="" -->
              <!--        data-html="true" rel="popover" data-placement="bottom" data-original-title="알림">-->
                
              <!--  <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>-->
              <!--</button>-->
            @else
              <li id="menu_login"><a href="{{url('/login')}}">LOGIN</a></li>
              <li id="menu_join"><a href="#">JOIN</a></li>
              <li id="menu_mypage"><a href="{{url('/fleamarket/mypage/main')}}">MY PAGE</a></li>
            @endif
          </div>
        </div>
      </div>
      
      <!-- 컨텐츠 부분(플리마켓 정보, 판매자 정보, 벼룩가이드, 마일리지 샵) ------------------------------------------------------------------------->
      <div class="contents" style="margin:0 auto; margin-left:-10px; width:103%; margin-top:90px;  z-index:1">
        @yield('content')
      </div>
      <!-- 푸터부분 ----------------------------------------------------------------------------------------------------------------------------->
      <!--<div class="footer" style="width:100%; height:100px;">-->
      <!--  Copyright(c)2017.All Rights Reserved By ZesTNT.-->
      <!--</div>-->
    </div>
  </body>
</html>

