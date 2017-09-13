@extends('layouts.app')
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<link rel="stylesheet" type="text/css" href="/slick-1.6.0/slick/slick.css">
<link rel="stylesheet" type="text/css" href="/slick-1.6.0/slick/slick-theme.css">
<link rel="stylesheet" type="text/css" href="http://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
<script type="text/javascript" src="http://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>

<style>
  #flea_page_main{
    width:1000px;
    font-family:'interparkM','interparkMEot';
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
    font-size:12px;
  }
    .boothsz{
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
                    "style='width:{{$booth->width}};height:{{$booth->height}};'><img src='{{asset('/img/icon/')}}/test.png' style='width:100%;height:76%; border-radius: 5px;'>{{$user->name}}<div>";
                @endif

                @endforeach

              @endif
                    $('.booth_map_in').append(booths);

                    $('#' + test_count).css('left', booth_left +{{$booth->left}});
                    $('#' + test_count).css('top', booth_top +{{$booth->top}});


                    @if ($booth->type == '入り口')
                    {
                        $('#' + test_count).css('background-color', 'lightyellow');
                    }
                    @elseif ($booth->type == '地形')
                    {
                        $('#' + test_count).css('background-color', 'lightblue');
                    }
                    @endif

                    @if ($booth->value != 'null')
                    {
                        //$('#'+test_count).text('{{$booth->name}}'); //이걸 지우면 그림이 뜨는데 마우스 오버 작동을 안함
                    }
                    @endif
                    console.log(test_count);

                    test_count++;
          @endforeach
            
            @foreach ($booths2 as $booth2)
            console.log('{{$booth2->type}}');
              @if ($booth2->type == '入り口')
              {
                  var booths = "<div id='" + test_count + "' class='boothsz' " +
            "style='width:{{$booth2->width}};height:{{$booth2->height}};'><img src='{{asset('/img/icon/')}}/ipgu.png' style='width:100%;height:76%; border-radius: 5px;'><p>{{$booth2->value}}</p></div>";
              }
              @elseif ($booth2->type == '障害物')
              {
                  var booths = "<div id='" + test_count + "' class='boothsz' " +
            "style='width:{{$booth2->width}};height:{{$booth2->height}};'><img src='{{asset('/img/icon/')}}/j1.png' style='width:100%;height:76%; border-radius: 5px;'><p>{{$booth2->value}}</p></div>";
              }
              @elseif ($booth2->type == '木')
              {
                  var booths = "<div id='" + test_count + "' class='boothsz' " +
            "style='width:{{$booth2->width}};height:{{$booth2->height}};'><img src='{{asset('/img/icon/')}}/j2.jpg' style='width:100%;height:76%; border-radius: 5px;'><p>{{$booth2->value}}</p></div>";
              }
              @elseif ($booth2->type == 'トイレ')
              {
                  var booths = "<div id='" + test_count + "' class='boothsz' " +
            "style='width:{{$booth2->width}};height:{{$booth2->height}};'><img src='{{asset('/img/icon/')}}/j3.jpg' style='width:100%;height:76%; border-radius: 5px;'><p>{{$booth2->value}}</p></div>";
              }
              @elseif ($booth2->type == 'null')
              {
                  var booths = "<div id='" + test_count + "' class='boothsz' " +
            "style='width:{{$booth2->width}};height:{{$booth2->height}};'><img src='{{asset('/img/icon/')}}/test.png' style='width:100%;height:76%; border-radius: 5px;'></div>";
              }
              @endif
            
            $('.booth_map_in').append(booths);

            $('#' + test_count).css('left', booth_left +{{$booth2->left}});
            $('#' + test_count).css('top', booth_top +{{$booth2->top}});
            

                    test_count++;
            @endforeach
            

      @foreach ($comments as $comment)
      var comment = "<div id='c_{{$comment->id}}' class='com_css'><p id='com_name'>{{$comment->name}}</p><p id='com_text'>{{$comment->text}}</p><p id='com_time'>{{$comment->date}}</p>";
      if({{$comment->user_id}} == {{$user_id}}) {

          comment += "<p class='del' id='d{{$comment->id}}'>[削除]</p>";
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
                  alert('エラー');
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
                      alert('エラー');
                      return;
                  }
              })
          }
      })

      // 판매자 신청 경고문
      $('#seller_applys').click(function(){
          if(confirm("もう出店者申し込みました。! \n以前の申請情報を削除しますか？")){
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
        <h3 style="margin-left:20px; font-size:36px;">{{$flea[0]->flea_name}} 第{{$flea_th[0]->th}}回</h3>
        <hr>
        <p style="margin-left:20px; font-size:26px;">開催期間 : {{$flea_th[0]->start_year_month}}-{{$flea_th[0]->start_day}} {{$flea_th[0]->start_time}} ~
          {{$flea_th[0]->end_year_month}}-{{$flea_th[0]->end_day}} {{$flea_th[0]->end_time}}</p>
        <p style="margin-left:20px; font-size:26px;">場所 : {{$flea[0]->address}}</p>
        <p style="margin-left:20px; font-size:26px;">参加費 : {{$flea_th[0]->entry_fee}}円</p>
        <p style="margin-left:20px; font-size:26px; display:inline-block">テーマ : </p><div class="tag">{{$flea_th[0]->topic}}</div>
      </div>
    </div>

    <!-- 설명 -->
    <div id='var1' class="f_text thumbnail">
      <p>説明</p>
      <textarea readonly style="font-size:20px;padding:15px;width:100%;height:88%;resize:none;"> {{$flea_th[0]->text}}</textarea>
    </div>

    <!-- 부스배치도 -->
    <div class="booth_map thumbnail">
      <p>ブース配置図</p>
      <div class="booth_map_in">

      </div>
    </div>

    <!-- 부스배치도 -->
    <div class="maps thumbnail">
      <p>地図</p>
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
        <button class="btn btn-default" style="width:130px;"><a style="font-size:14px;" href="{{url('/fleamarket/sellerapply/')}}/{{$flea_th[0]->id}}">出店者申し込み</a></button>
        @else
        <button class="btn btn-default" id="seller_applys" style="width:133px; color:#2a88bd;">出店者申し込み</button>
        @endif
      <button class="btn btn-default"><a href="{{url('/fleamarket/ticketbuy')}}">チケット購入</a></button>
      <button class="btn btn-default"><a href="{{url('/fleamarket/flea_open')}}">修正</a></button>
      <button class="btn btn-default"><a href="/fleamarket/sellerSet/{{$booth_name}}/th/{{$flea_th[0]->id}}">出店者配置</a></button>
    </div>

    <!-- 댓글 -->
    <div class="flea_comments thumbnail">
      <p style="margin:10px;font-size:20px;">コメント</p>
      <div class="flea_comment_num">
      </div>
      <div class="flea_comment">
        {{--<textarea id='comment_text' style="margin-left:45px;width:805px;height:60px;resize:none;"></textarea>--}}
        <input type='text' id='comment_text' style="margin-left:45px;width:800px;height:60px;resize:none;"></input>
        <button style="width:100px; margin-right:35px;" id='com_button' class="btn btn-default">コメント作成</button>
      </div>
    </div>


    <script type="text/javascript">
      $(document).ready(function(){
        $('.seller_info_contents:eq(0)').show();
        $('.seller_info_contents:eq(1)').hide();
        $('.seller_info_contents:eq(2)').hide();
        $('.seller_info_contents:eq(3)').hide();
        $('.seller_info_contents:eq(4)').hide();
        
        // $('button').click(function() {
        //   alert('aaaa'); 
        // });
        
        
        $(document).on('click','.slick-next',function(){
          
          var getId = $('.slick-active').attr('id').split("_")[1];
          
          for(var i = 0; i < $('.seller_info_contents').length; i++){
            if(getId == Number($('.seller_info_contents:eq('+i+')').attr('id'))){
              $('.seller_info_contents:eq(0)').hide();
              $('.seller_info_contents:eq(1)').hide();
              $('.seller_info_contents:eq(2)').hide();
              $('.seller_info_contents:eq(3)').hide();
              $('.seller_info_contents:eq(4)').hide();
              $('.seller_info_contents:eq('+i+')').show();
            }
          }
        });
        
        $(document).on('click','.slick-prev',function(){
          
          var getId = $('.slick-active').attr('id').split("_")[1];
          
          for(var i = 0; i < $('.seller_info_contents').length; i++){
            if(getId == Number($('.seller_info_contents:eq('+i+')').attr('id'))){
              $('.seller_info_contents:eq(0)').hide();
              $('.seller_info_contents:eq(1)').hide();
              $('.seller_info_contents:eq(2)').hide();
              $('.seller_info_contents:eq(3)').hide();
              $('.seller_info_contents:eq(4)').hide();
              $('.seller_info_contents:eq('+i+')').show();
            }
          }
        });
        
        $('.booths').click(function() {
          $('#myModal').modal();
        });
        
        $('.booths').mouseover(function() {
          if(!$(this).children('img').length){
            $(this).css('background-color','#4f4f4f');
            $(this).css('opacity','0.8');
            $(this).css('color','white');
            var height = $(this).height();
            $(this).css('padding-top',height / 4);
            var userNick = $(this).text();
            $(this).html("'"+userNick+"'<br/>詳細情報見る");
          }
          
        });
        
        $('.booths').mouseout(function() {
          if(!$(this).children('img').length){
            var userNick = $(this).html();
            userNick = userNick.split("<br>")[0];
            userNick = userNick.split("'")[1];
            // alert(userNick);
            $(this).css('background-color','white');
            $(this).css('opacity','1');
            $(this).css('color','black');
            $(this).css('padding-top','1px');
            $(this).html("<img src='{{asset('/img/icon/')}}/test.png' style='width:100%;height:76%; border-radius: 5px;'>"+userNick);
          }
        });
        
        $(".slick_wrapper").slick({
          dots: true,
          infinite: true,
          variableWidth: true
        });
      });
    </script>
    
    <style type="text/css">
      .seller_info_header{
        font-size:20px;
      }
      .slider {
        width: 50%;
        margin: 100px auto;
      }
  
      .slick-slide {
        margin: 0px 20px;
      }
  
      .slick-slide img {
        width: 100%;
      }
  
      .slick-prev:before,
      .slick-next:before {
          color: black;
      }
      .slick_img_wrapper{
        width:200px;
        height:200px;
      }
      .slick_wrapper{
        width:200px;
        height:200px;
        /*border:1px solid black;*/
        margin-top:0px;
      }
      .seller_info_division_line{
        margin:auto;
        margin-top:60px;
        margin-bottom:20px;
        border-bottom:1px dotted #a3a3a3;
        width:90%;
      }
      .seller_info_contents{
        margin:auto;
        width:90%;
        height:200px;
        /*border:1px solid black;*/
        font-size:20px;
      }

      .seller_info_note{
        width:100%;
        height:50px;
        border:1px solid #a3a3a3;
        border-radius:6px;
      }
    </style>
    
      <div class="modal fade" id="myModal">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header seller_info_header">
              出店者"山田"様のブース情報
            </div>
            <div class="modal-body">
              <section class="slick_wrapper slider">
                <div class="slick_img_wrapper" id="goods_1">
                  <img src="{{asset('storage/image/')}}/goods1.jpg">
                </div>
                <div class="slick_img_wrapper" id="goods_2">
                  <img src="{{asset('storage/image/')}}/goods2.jpg">
                </div>
                <div class="slick_img_wrapper" id="goods_3">
                  <img src="{{asset('storage/image/')}}/goods3.jpg">
                </div>
                <div class="slick_img_wrapper" id="goods_4">
                  <img src="{{asset('storage/image/')}}/goods4.jpg">
                </div>
                <div class="slick_img_wrapper" id="goods_5">
                  <img src="{{asset('storage/image/')}}/goods5.jpg">
                </div>
              </section>
              <div class="seller_info_division_line"></div>
              <div class="seller_info_contents" id="1">
                <div>商品名 : ブラックチョコレート</div>
                <div>価格 &nbsp;&nbsp;&nbsp;: 700円</div>
                <div>在庫 &nbsp;&nbsp;&nbsp;: 20 EA</div><br>
                備考<div class="seller_info_note"></div>
              </div>
              <div class="seller_info_contents" id="2">
                <div>商品名 : ホワイト・チョコレート</div>
                <div>価格 &nbsp;&nbsp;&nbsp;: 700円</div>
                <div>在庫 &nbsp;&nbsp;&nbsp;: 20 EA</div><br>
                備考<div class="seller_info_note"></div>
              </div>
              <div class="seller_info_contents" id="3">
                <div>商品名 : トリュフチョコレート</div>
                <div>価格 &nbsp;&nbsp;&nbsp;: 1000円</div>
                <div>在庫 &nbsp;&nbsp;&nbsp;: 25 EA</div><br>
                備考<div class="seller_info_note"></div>
              </div>
              <div class="seller_info_contents" id="4">
                <div>商品名 : シェルチョコレート</div>
                <div>価格 &nbsp;&nbsp;&nbsp;: 500円</div>
                <div>在庫 &nbsp;&nbsp;&nbsp;: 30 EA</div><br>
                備考<div class="seller_info_note"></div>
              </div>
              <div class="seller_info_contents" id="5">
                <div>商品名 : ジャンドゥーヤチョコレート</div>
                <div>価格 &nbsp;&nbsp;&nbsp;: 400円</div>
                <div>在庫 &nbsp;&nbsp;&nbsp;: 15 EA</div><br>
                備考<div class="seller_info_note"></div>
              </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="exit" class="btn btn-default">キャンセル</button>
            </div>
          </div>
          
        </div>
      </div>
  </div>
@endsection
