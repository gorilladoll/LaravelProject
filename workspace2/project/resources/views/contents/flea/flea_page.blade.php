@extends('layouts.app')
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>

<style>
  #flea_page_main{
    width:1000px;
    margin : 0 auto;
  }
  .f_info{
    margin-top:30px;
    width:1000px;
    height:420px;
    /*border:1px solid black;*/
  }
  .info_image{
    width:340px;
    height:420px;
    display:inline-block;
    float:left;
    box-shadow:5px 5px 10px #b2b2b2;
  }
  .info_text2{
    margin-left:50px;
    font-size:20px;
    width:610px;
    height:420px;
    float:left;
    display:inline-block;
    padding-left:20px;
    box-shadow:5px 5px 10px #b2b2b2;
  }

  .tag{
    background-color:gray;
    border-radius: 5px;
    display:inline-block;
    padding-left:4px;
    padding-right:4px;
    color: white;
  }

  .f_text{
    margin-top:30px;
    width:1000px;
    height:300px;
    box-shadow:5px 5px 10px #b2b2b2;
  }
  
  .f_text > textarea {
    border:0px;
    border-top:1px dotted #e0e0e0;
  }

  .f_text > p{
    font-size:20px;
    margin:0;
    padding:4px;
  }

  .booth_map {
    margin-top:30px;
    width:1000px;
    border:1px solid black;
    box-shadow:5px 5px 10px #b2b2b2;
  }

  .booth_map > p{
    font-size:20px;
    margin:0;
    padding:4px;
    border-bottom: dotted 1px #e0e0e0;
  }

  .booth_map_in{
    width:800px;
    height:600px;
    margin: 10px auto;
    background-color:#f4f4f4;
    border-radius:5px;
  }


  .maps {
    margin-top:30px;
    width:1000px;
    border:1px solid black;
    box-shadow:5px 5px 10px #b2b2b2;
  }
  .maps > p{
    font-size:20px;
    margin:0;
    padding:4px;
    border-bottom: dotted 1px #c1c1c1;
  }

  #map{
    width: 85%;
    height:500px;
    margin:0 auto;
  }

  .flea_buttons{
    width:500px;
    height:50px;
    margin : 0 auto;
    margin-top:20px;
  }
  .btn{
    width:100px;
    margin-left:5px;
    margin-right:5px;
  }

  .footer{
    float:left;
  }
  .flea_comments {
    width:1000px;
    border:1px dotted #c1c1c1;
    box-shadow:5px 5px 10px #b2b2b2;
  }
  .flea_comment_num{
    float:left;
    border:1px solid #c1c1c1;
    margin:0 auto;
    width:900px;
    margin-left:50px;
    margin-bottom: 20px;
  }
  .com_css:last-child{
    border:0px;
  }
  .flea_comment > button{
    margin-right:45px;
    width:85px;
    height:60px;
    float:right;
  }
  .flea_comment > textarea {
    margin-bottom : 10px;
  }
  .booths{
    width:98px;
    height:98px;
    background-color:white;
    border:1px solid #b70505;
    border-radius:5px;
    position:absolute;
    text-align:center;
  }
  .com_css{
    width:880px;
    margin: 5px;
    padding-bottom:20px;
    border-bottom:1px dotted black;
    float:left;
  }
  #com_name{
    margin:5px;
    display: inline-block;
    width:100px;
    height:auto;
    float:left;
    padding-top:12px;
    padding-left:15px;
    font-size:16px;
  }
  #com_text{
    margin:5px;
    display: inline-block;
    width:500px;
    height:auto;
    float:left;
    padding-top:12px;
    padding-left:5px;
    font-size:16px;
  }
  #com_time{
    margin:5px;
    float:left;
    display: inline-block;
    width:160px;
    height:auto;
    padding-top:12px;
    padding-left:5px;
    font-size:16px;
  }
  .del{
    padding:12px;
    padding-left:16px;
    font-size:16px;
    margin:5px;
    float:left;
    width:70px;
    height:auto;
    border-radius: 5px;
  }
  #icon_bar{
    width:150px;
    height:450px;
    position:fixed;
  }

</style>

<script>
  $(document).ready(function(){
      var test_count=1;
      var com_count=1;
      var com_name;

      var booth_left = $('.booth_map_in').offset().left;
      var booth_top = $('.booth_map_in').offset().top;
      
      var icon_bar1 = $('#flea_page_main').width();
      var icon_bar2 = $('#flea_page_main').offset().left;
      
      var foo_top1 = $('#flea_page_main').height();
      var foo_top2 = $('#flea_page_main').offset().top;
      
      $('#icon_bar').css('left',icon_bar1 + icon_bar2+30);

      // 부스 배치도에서 받아온 부스를 배치
        @foreach ($booths as $booth)

            @if($booth->user_id == NULL)

            var booths = "<div id='" + test_count + "' class='booths' " +
            "style='width:{{$booth->width}};height:{{$booth->height}};'><div>";

            @else

                @foreach ($users as $user)

                @if($booth->user_id == $user->id)
                var booths = "<div id='" + test_count + "' class='booths' " +
                    "style='width:{{$booth->width}};height:{{$booth->height}};'>{{$user->name}}<div>";
                @endif

                @endforeach

              @endif
                    $('.booth_map_in').append(booths);

                    $('#' + test_count).css('left', booth_left +{{$booth->left}});
                    $('#' + test_count).css('top', booth_top +{{$booth->top}});


                    @if ($booth->type == '입구')
                    {
                        $('#' + test_count).css('background-color', 'lightyellow');
                    }
                    @elseif ($booth->type == '지형')
                    {
                        $('#' + test_count).css('background-color', 'lightblue');
                    }
                    @endif

                    @if ($booth->value != 'null')
                    {
                        $('#'+test_count).text('{{$booth->name}}');
                    }
                    @endif
                    console.log(test_count);

                    test_count++;
            @endforeach
            
            @foreach ($booths2 as $booth2)
            console.log(test_count);
            var booths = "<div id='" + test_count + "' class='booths' " +
            "style='width:{{$booth2->width}};height:{{$booth2->height}};'><div>";
            $('.booth_map_in').append(booths);

            $('#' + test_count).css('left', booth_left +{{$booth2->left}});
            $('#' + test_count).css('top', booth_top +{{$booth2->top}});
            
                    @if ($booth->type == '입구')
                    {
                        $('#' + test_count).css('background-color', 'lightyellow');
                    }
                    @elseif ($booth->type == '지형')
                    {
                        $('#' + test_count).css('background-color', 'lightblue');
                    }
                    @endif
                    test_count++;
            @endforeach
            

      @foreach ($comments as $comment)
      var comment = "<div id='c_{{$comment->id}}' class='com_css'><p id='com_name'>{{$comment->name}}</p><p id='com_text'>{{$comment->text}}</p><p id='com_time'>{{$comment->date}}</p>";
      if({{$comment->user_id}} == {{$user_id}}) {

          comment += "<p class='del' id='d{{$comment->id}}'>[삭제]</p>";
      }
      comment += "</div>";

      $('.flea_comment_num').append(comment);
      com_count++;
      @endforeach

      $('#com_button').click(function(){
          text = $('#comment_text').val();
          $.ajax({
            /*서버에 값 전달*/
              url: '/fleamarket/flea_comment/input',
              data: {
                  user_id : {{$user_id}},
                  flea_id : {{$flea_th[0]->id}},
                  text : text
              },
              dataType: 'jsonp',
              success: function (data) {
                  @foreach ($users as $user)
                    @if ($user->id == $user_id)
                        com_name = '{{$user->name}}';
                        @endif
                  @endforeach

                  var date = new Date();
                  var time = date.getFullYear()+'-'+(date.getMonth()+1)+'-'+date.getDate()+' '+date.getHours()+':'+date.getMinutes()+':'+date.getSeconds();
                  var comment = "<div id='c_"+com_count+"' class='com_css'><p id='com_name'>"+com_name+"</p><p id='com_text'>"+text+"</p><p id='com_time'>"+time+"</p>";
                  comment += "</div>";

                  $('.flea_comment_num').append(comment);
              },
              error: function () {
                  alert('에러가 발생하였습니다');
                  return;
              }
          });
      })

      // 댓글 삭제 구문
      $('.del').click(function() {
          if(confirm('삭제하시겠습니까?')) {
              var com_id_num = $(this).parent().attr('id');
              var com_id = com_id_num.split('_');
              com_id = Number(com_id[1]);
              $.ajax({
                /*서버에 값 전달*/
                  url: '/fleamarket/flea_comment/del',
                  data: {
                      user_id: {{$user_id}},
                      flea_id: {{$flea_th[0]->id}},
                      com_id: com_id
                  },
                  dataType: 'jsonp',
                  success: function (data) {
                      $('#' + com_id_num).remove();
                  },
                  error: function () {
                      alert('에러가 발생하였습니다');
                      return;
                  }
              })
          }
      })

      // 판매자 신청 경고문
      $('#seller_applys').click(function(){
          if(confirm("이미 판매자 신청이 되어 있습니다! \n이전의 신청 정보를 삭제하고 계속 진행하시겠습니까?")){
              window.location.href = '/fleamarket/sellerapply/{{$flea_th[0]->id}}';
          }
      })

    //아이콘바 부분
    $('#var1').click(function(){
      //$(document).scrollTop(500);
      $('body,html').animate({scrollTop: 800}, 500);
    })
    $('#var2').click(function(){
      //$(document).scrollTop(500);
      $('body,html').animate({scrollTop: 1500}, 500);
    })
    $('#var3').click(function(){
      //$(document).scrollTop(500);
      $('body,html').animate({scrollTop: 2120}, 500);
    })
  })
</script>

@section('title', '플리마켓 상세정보')
@section('content')
<div id='icon_bar' style='margin-top:20'>
  <img id='var1' src='{{asset('/img/icon/')}}/bar1.png' style='width:120;height:120;'>
  <img id='var2' src='{{asset('/img/icon/')}}/bar2.png' style='width:120;height:120;'>
  <img id='var3' src='{{asset('/img/icon/')}}/bar3.png' style='width:120;height:120;'>
</div>
  <div id='flea_page_main' style="margin-top:130px;">
    <!-- 사진 및 소개 -->
    <div class="f_info">
      <div class="info_image thumbnail"><img style="width:100%;height:100%;" class='img-rounded' src="{{url('user_img/')}}/{{$flea[0]->image_name}}"></div>
      <div class="info_text2 thumbnail">
        <h3 style="margin-left:20px; font-size:36px;">{{$flea[0]->flea_name}} {{$flea_th[0]->th}}회차</h3>
        <hr>
        <p style="margin-left:20px; font-size:26px;">날짜 : {{$flea_th[0]->start_year_month}}-{{$flea_th[0]->start_day}} {{$flea_th[0]->start_time}} ~
          {{$flea_th[0]->end_year_month}}-{{$flea_th[0]->end_day}} {{$flea_th[0]->end_time}}</p>
        <p style="margin-left:20px; font-size:26px;">장소 : {{$flea[0]->address}}</p>
        <p style="margin-left:20px; font-size:26px;">참가비 : {{$flea_th[0]->entry_fee}}원</p>
        <p style="margin-left:20px; font-size:26px; display:inline-block">대표주제 : </p><div class="tag">{{$flea_th[0]->topic}}</div>
      </div>
    </div>

    <!-- 설명 -->
    <div id='var1' class="f_text thumbnail">
      <p>설명</p>
      <textarea readonly style="font-size:20px;padding:15px;width:100%;height:88%;resize:none;"> {{$flea_th[0]->text}}</textarea>
    </div>

    <!-- 부스배치도 -->
    <div class="booth_map thumbnail">
      <p>부스배치도</p>
      <div class="booth_map_in">

      </div>
    </div>

    <!-- 부스배치도 -->
    <div class="maps thumbnail">
      <p>지도</p>
      <div id="map"></div>
      <script>
          //구글 맵 api
          function initMap() {
              var lat_value = {{$flea_info[0]->coordinate1}};
              var lng_value = {{$flea_info[0]->coordinate2}};

              var myLatLng = {lat: lat_value, lng: lng_value};

              var map = new google.maps.Map(document.getElementById('map'), {
                  zoom: 16,
                  center: myLatLng
              });

              var marker = new google.maps.Marker({
                  position: myLatLng,
                  map: map,
                  title: 'Hello World!'
              });
          }
      </script>
      <script async defer
              src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCpA9_rF-RU1DlFl7Bb5JiUYsieSobRj0Q&callback=initMap">
      </script>
    </div>

    <!-- 버튼 -->
    <div class="flea_buttons">
      <!-- if문을 사용하여 로그인 전후와 본인이 작성한 것을 기준으로
    나타내는 버튼을 다르게 나타가게함. -->
        @if ($applys == 0)
        <button class="btn btn-default"><a href="{{url('/fleamarket/sellerapply/')}}/{{$flea_th[0]->id}}">판매자 신청</a></button>
        @else
        <button class="btn btn-default" id="seller_applys" style="width:133px; color:#2a88bd;">판매자 신청 수정</button>
        @endif
      <button class="btn btn-default"><a href="{{url('/fleamarket/ticketbuy')}}">티켓 구매</a></button>
      <button class="btn btn-default"><a href="{{url('/fleamarket/flea_open')}}">수 정</a></button>
      <button class="btn btn-default"><a href="/fleamarket/sellerSet/{{$booth_name}}/th/{{$flea_th[0]->id}}">판매자 배치</a></button>
    </div>

    <!-- 댓글 -->
    <div class="flea_comments thumbnail">
      <p style="margin:10px;font-size:20px;">댓글</p>
      <div class="flea_comment_num">
      </div>
      <div class="flea_comment">
        {{--<textarea id='comment_text' style="margin-left:45px;width:805px;height:60px;resize:none;"></textarea>--}}
        <input type='text' id='comment_text' style="margin-left:45px;width:800px;height:60px;resize:none;"></input>
        <button id='com_button' class="btn btn-default">댓글작성</button>
      </div>
    </div>

  </div>
@endsection
