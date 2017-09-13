<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="{{asset('css/contents/mypage.css')}}">

@extends('layouts.app')

<!-- 작성 -->

<style>
  .coupon_box{
    margin:0;
    width:930px;
    background-color:white;
  }
  .coupon_list{
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
    width:170px;
    height:50px;
    margin:5px 0;
    font-size:18px;
    text-align: center;
    padding-top:8px;
  }
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
            case "500원 에누리":
                img = "s_1.jpg";
                break;
            case "1000원 에누리":
                img = "s_2.jpg";
                break;
            case "판매자 싸대기때리기":
                img = "s_3.jpg";
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

              switch(coupon_arr[i].coupon_name){
                  case "500원 에누리":
                      img = "s_1.jpg";
                      break;
                  case "1000원 에누리":
                      img = "s_2.jpg";
                      break;
                  case "판매자 싸대기때리기":
                      img = "s_3.jpg";
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
                        url:'/mypage/buyer/coupon',
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

    })
</script>

<!-- 작업 끝 -->

@section('title', '구매자 페이지')
@section('content')
<div id="mypage_main" style="margin-top:130px;">
  <div class="mypage_user">
    <h2>MY PAGE - 구매자</h2>
    <div class="jumbotron">

    </div>
  </div>
  <div class="mypage_user_result">
    <h2>
      최근 구매 LIST
      <a class="btn btn-default" href="#">더 보기</a>
    </h2>
    <div class="jumbotron">
      <div class="mypage_buylist">
      </div>
    </div>
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
@endsection
