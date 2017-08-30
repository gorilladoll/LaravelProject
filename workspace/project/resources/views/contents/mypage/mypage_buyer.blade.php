@extends('layouts.app')

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
  <div class="buyer_coupon_list">
    <h2>최근 구매 LIST</h2>
    <div class="jumbotron">
    </div>
  </div>
</div>
@endsection
