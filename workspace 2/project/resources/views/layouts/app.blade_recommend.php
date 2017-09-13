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

    
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>--}}
    {{--<script src="http://code.jquery.com/jquery-latest.min.js"></script>--}}
    {{--<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>--}}
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.0.7/angular.min.js"></script>
 

    <script type="text/javascript">
             $(document).ready(function(){
                $('.notification_btn').click(function(){
                   $('.glyphicon-envelope').css('color','black');
                   $('#popoverData').popover();
                });
                
                var iconDataURI = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAKBJREFUeNpiYBjpgBFd4P///wJAaj0QO9DEQiAg5ID9tLIcmwMYsDgABhqoaTHMUHRxpsGYBv5TGqTIZsDkYWLo6gc8BEYdMOqAUQeMOoAqDgAWcgZAfB9EU63SIAGALH8PZb+H8v+jVz64KiOK6wIg+ADEArj4hOoCajiAqMpqtDIadcCoA0YdQIoDDtCqQ4KtBY3NAYG0csQowAYAAgwAgSqbls5coPEAAAAASUVORK5CYII=";

                Notification.requestPermission(function (result) {

                    //요청을 거절하면,
                    if (result === 'denied') {
                        return;
                    }
                    //요청을 허용하면,
                    else {
                       
                        return;
                    }
                 });
                
                 
                @if(Session::get('user'))
                
                  var user_id = {{Session::get('user')['id']}};
                  setInterval(function() {
                    $.ajax({
                      url: "/user_recommend/alarm_user_"+user_id+".json",
                      type: 'HEAD',
                      success: function () {
                        $.getJSON("/user_recommend/alarm_user_"+user_id+".json",function(data){
                          var savedDate = $('.alarmDate').val().split('_');
                          // console.log($('.alarmDate').val());
                          // console.log(savedDate);
                          var date = new Date();
                          var date1 = new Date(savedDate[0],savedDate[1],savedDate[2],savedDate[3],savedDate[4],savedDate[5]);
                          var date2 = new Date(data['user_'+user_id][0]['modified_date']);
                                
                          var diffTime = date1 - date2;
                          // console.log(date1);
                          // console.log(date2);
                          // console.log(diffTime);
                          if(diffTime < 0){
                            $('.glyphicon-envelope').css('color','#ce0300');
                            
                            var options = {
                              body: "새로운 판매자가 '차' 에 관련된 상품을 등록하였어요!",
                              icon: iconDataURI
                            }         
                            var DesktopNotification = new Notification("상품 추천 알림!",options);
                          }          
                        });
                      },
                      error: function () {
                        
                      }
                    });
                  },2000);
                  
                  setInterval(function(){
                    $.ajax({
                      url: "/user_recommend/alarm_user_"+user_id+".json",
                      type: 'HEAD',
                      success: function () {
                        
                        
                        $.getJSON("/user_recommend/alarm_user_"+user_id+".json",function(data){

                          // console.log(data);
                          var alarmDiv = "<div class='alarm_wrapper'>";
                          
                          for(var i = 0; i < data['user_'+user_id].length; i++){
                            // alarmDiv += "<div class='alarm_contents'>";
                            // alarmDiv += {{Session::get('user')['nick_name']}};
                            // alarmDiv += "님께서 주로 이용하신 "+data['user_'+user_id][i]['category'];
                            // alarmDiv += "관련 상품이 플리마켓 판매 물품으로 등록되었어요 !";
                            // alarmDiv += "<button type='button' class='btn btn-default'>";   
                            // alarmDiv += "<span class='glyphicon glyphicon-menu-right' aria-hidden='true'></span></button>";
                            // alarmDiv += "</div>";
                            
                            alarmDiv += "<div class='alarm_contents text-center'>";
                            alarmDiv += "<div style='width:100%; height:30px; line-height:34px;'>'"+data['user_'+user_id][i]['category']+"' 에 관련된 상품 UPDATE!!</div>";
                            alarmDiv += "<div style='width:100%; height:30px;'>";
                            alarmDiv += "<button type='button' class='btn btn-default alarmLink' style='width:95%;'>";
                            alarmDiv += "<span class='glyphicon glyphicon-chevron-right' aria-hidden='true'></span>";
                            alarmDiv += "</button>";
                            alarmDiv += "</div>";
                            alarmDiv += "</div>";
                          }
                          
                          $('.notification_btn').attr('data-content',alarmDiv);
                          var date = new Date(data['user_'+user_id][0]['modified_date']);
                          var nowDate = date.getFullYear()+"_"+date.getMonth()+"_"+date.getDate()+"_"+date.getHours()+"_"+date.getMinutes()+"_"+date.getSeconds();
                          if(!$('.alarmDate').length){
                            var alarmDate = "<input type='hidden' class='alarmDate' value='" + nowDate + "'></input>";
                            $('.menu').append(alarmDate);
                          }else{
                            $('.alarmDate').val(nowDate);
                          }
                          
                          for(var i = 0; i < data['user_'+user_id].length; i++){
                            $('.alarmLink').click(function(){
                              window.location.href="http://project-rudgusjo.c9users.io/fleamarket/flea_page/"+Number(data['user_'+user_id][i - 1]['th_id']);
                            });
                          }
                        });
                      },
                      error: function () {
                        var alarmDiv = "<div class='alarm_wrapper'>알림 내역이 존재하지 않습니다.</div>";
                        
                        $('.notification_btn').attr('data-content',alarmDiv);
                      }
                    });
                  },2000);
                @endif
                
             });
    </script>



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
    .alarm_wrapper{
      width:400px;
      height:280px;
      line-height:100%;
      overflow:scroll;
    }
    
    .alarm_contents{
      width:63%; height:70px; margin-left:-5px; border-bottom:1px dotted #a0a0a0;
    }
    .alarm_contents:last-child{
      width:63%; height:70px; margin-left:-2px;
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
            <li id="menu_lap"><a href="{{url('/mylab/create')}}">FLEA-STUDIO</a></li>
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
             <button type="button" class="btn btn-default notification_btn" aria-label="Left Align" 
                      style="margin-left:50px; margin-top:-5px;"  id="popoverData" data-content="" 
                      data-html="true" rel="popover" data-placement="bottom" data-original-title="알림">
                
                <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
              </button>
            @else
              <li id="menu_login"><a href="{{url('/login')}}">LOGIN</a></li>
              <li id="menu_join"><a href="#">JOIN</a></li>
              <li id="menu_mypage"><a href="{{url('/fleamarket/mypage/main')}}">MY PAGE</a></li>
            @endif
          </div>
        </div>
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

