<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
<!--<link rel="stylesheet" href="{{asset('css/contents/mypage.css')}}">-->

@extends('layouts.app')

<style>
  div.mypage_user {
    width : 100%;
    height : 350px;
  }
  div.mypage_user_result {
    width : 100%;
    margin : 0 auto;
    /*height : 700px;*/
  }
  div.mypage_user div.jumbotron {
    margin-top : 20px;
    border-radius : 4px;
  }

  div.mypage_user_result div.jumbotron {
    margin-top : 20px;
    border-radius : 4px;
  }
  div.mypage_result_list {
    width : 900px;
    height : 120px;
    margin : 0 auto;
    margin-top: 20px;
    margin-bottom : 20px;
    background-color: white;
    border-radius: 4px;
    border: 1px solid gray;
  }
  .list_image{
    width:70px;
    height:70px;
    margin-top:25px;
    margin-left:25px;
    background-color:gray;
    display:inline-block;
    float:left;
  }
  .list_name{
    display:inline-block;
    margin-left:10px;
    margin-top:45px;
    height:50px;
    float:left;
    font-size:20px;
  }
  .mypage_result_list > p{
    display:inline-block;
  }
  .list_button{
    margin : 0;
    margin-left:10px;
    width:100px;
    float:left;
  }
  .btn{
    margin-top:4px;
    width:90px;
  }
  .info{
    margin:0;
    width:930px;
    height:170px;
    background-color:white;
  }
  .info_image{
    margin:20px;
    width:130px;
    height:130px;
    float:left;
    border:1px solid red;
    text-align: center;
  }
  .info_message{
    margin-top:20px;
    margin-left:35px;
    float:left;
    font-size:20px;
  }
  .long {
    width:60%;
  }

  <!-- 작성 -->

  .coupon_box{
    margin:0;
    width:930px;
    background-color:white;
  }
  .coupon_list{
    margin:20px;
    border:1px solid black;
    border-radius: 5px;
    background-color:white;
    padding:25px;
  }
  .coupon{
    border : 1px dotted black;
    display:inline-block;
    margin:10px;
  }
  .coupon_img{
    width:150px;
    height:150px;
    border-bottom:1px double black;
    margin:10px;
  }
  .coupon_text{
    width:150px;
    height:50px;
    margin:5px 10px;
    font-size:24px;
    text-align: center;
    padding-top:8px;
  }

  <!-- 작성끝 -->
</style>

<script>
  $(document).ready(function(){
      var group_list = "<div class='mypage_result_list'><div class='list_image'></div><div style='width:20%;' class='list_name'>영진 플리마켓</div>" +
          "<div class='list_name' style='width:20%;'>최근 참여 회차:1회</div><div style='width:30%;' class='list_name'>참여 일자 : 2017-05-01</div><div class='list_button'>" +
          "<button class='btn btn-default account_btn'>정산</button></div></div>";
      $('.group_list').append(group_list);

      $('.account_btn').click(function(){
          window.location.href = "<?php echo URL::to('/account/seller'); ?>";
      })

      // 작업 시작
      var coupon_arr;

      @foreach($coupon_list as $coupon)
      var coupon_list = "<div class='coupon'><div class='coupon_img'>";
      var img;

      switch('{{$coupon->coupon_name}}'){
          case "메인 홍보":
              img = "m_1.jpg";
              break;
          case "푸쉬 홍보":
              img = "m_2.jpg";
              break;
          case "선택 홍보":
              img = "m_3.jpg";
              break;
          case "홍보 우선권":
              img = "m_4.jpg";
              break;
      }

      coupon_list += "<img src={{asset('/img/icon/')}}/"+img+" style='width:100%;height:100%;'>";
      coupon_list += "</div><div class='coupon_text'>{{$coupon->coupon_name}}</div></div>";
      $('.coupon_list').append(coupon_list);
      @endforeach

      function coupon_fnc(){
          for(var i=0;i<coupon_arr.length;i++){
              var coupon_list = "<div class='coupon'><div class='coupon_img'>";
              var img;
              console.log(coupon_arr[i].coupon_name);

              switch(coupon_arr[i].coupon_name){
                  case "메인 홍보":
                      img = "m_1.jpg";
                      break;
                  case "푸쉬 홍보":
                      img = "m_2.jpg";
                      break;
                  case "선택 홍보":
                      img = "m_3.jpg";
                      break;
                  case "홍보 우선권":
                      img = "m_4.jpg";
                      break;
              }

              coupon_list += "<img src={{asset('/img/icon/')}}/"+img+" style='width:100%;height:100%;'>";
              coupon_list += "</div><div class='coupon_text'>"+coupon_arr[i].coupon_name+"</div></div>";
              $('.coupon_list').append(coupon_list);
          }
      }

      function coupon_click(){
          $('.coupon').click(function(){
              if(confirm($(this).text() + '쿠폰을 사용하시겠습니까?')){
                  $.ajax({
                      type:'POST',
                      url:'/mypage/seller/coupon',
                      data: {
                          text:$(this).text()
                      },
                      dataType : 'jsonp',
                      success : function(result){
                          if(result['error']) {
                              alert(result['error']);
                              return;
                          }
                          alert('사용 완료!');
                          coupon_arr = result['coupon'];
                          $('.coupon_list').children().remove();
                          coupon_fnc(coupon_arr);
                          coupon_click();
                      },
                      error : function(){
                          alert('에러가 발생하였습니다');
                      }
                  })
              }
          })
      }

      coupon_click();

      // 작업 끝

  })
</script>

@section('title', '판매자 페이지')
@section('content')
<div id="mypage_main" style="margin-top:130px;">
  <div class="mypage_user">
    <h2>MY PAGE - 판매자</h2>
    <div class="jumbotron">
      <div class="info">
        <div class="info_image"><br>2017.05<hr><p>05.금</p></div>
        <div class="info_message long">총 개최 횟수 : 8회</div>
        <div class="info_message">최근 참여 플리마켓 : 영진 플리마켓 4회차</div>
        <div class="info_message">참여 일자 : 2017-05-01</div>
        <div class="info_message">MY 마일리지 : 105점</div>
      </div>
    </div>
  </div>
  <div class="mypage_user_result">
    <h2>개최한 플리마켓 GROUP</h2>
    <div class="jumbotron group_list">

    </div>

    <!-- ============== 작업 시작 =================== -->

    <h2>내 쿠폰 리스트</h2>
    <div class="jumbotron">
      <div class="coupon_box">
        <div class="coupon_list">

        </div>

      </div>
    </div>

    <!--                                    -->

  </div>
</div>
@endsection
