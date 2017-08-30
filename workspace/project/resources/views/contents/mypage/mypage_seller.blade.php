<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

@extends('layouts.app')

<style>
  div.mypage_user {
    width : 100%;
    height : 350px;
  }
  div.mypage_user_result {
    width : 100%;
    margin : 0 auto;
    height : 700px;
  }

  div.mypage_user div.jumbotron {
    margin-top : 20px;
    height : 270px;
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
  </div>
</div>
@endsection
