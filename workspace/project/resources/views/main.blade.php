 <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
 <script>
      $(document).ready(function(){
          $('#group_list').click(function () {
              window.location.href = '{{url("/group/list")}}';
          })


      });
  </script>
  
  <style>
    .title_img{
      margin:0;
    }
    .flea_content_text > h3{
      margin:0;
      padding:20px;
      border-top:2px solid #cc0a2d;
      border-bottom:2px solid #cc0a2d;
      background-color: #cc0a2d;
      color: #cc0a2d;
      color:white;
      text-align:center;
    }
    .market_list{
      margin-top:20px;
      margin-bottom:20px;
    }
  </style>

@extends('layouts.app')



@section('title', '메인화면')
@section('content')
      <!-- 컨텐츠 부분(플리마켓 정보, 판매자 정보, 벼룩가이드, 마일리지 샵) ------------------------------------------------------------------------->
        <div class="title_img">
            <img src='/img/title_v4.jpg' style="width:100%; height:auto;">
          </div>
        <div id="fleamarket">
          <!-- 플리마켓  -->
          <div class="flea_list">
              <div class="flea_contents">
                <div class="flea_content_text">
                  <h3>인기플리마켓</h3>
                </div>
                <div class="market_list">
                  <ul>
                    <li class="thumbnail"><a href="#"><img src="/img/fleamarket/fleamarket.jpg" alt=""></a></li>
                    <li class="thumbnail"><a href="#"><img src="/img/fleamarket/fleamarkettt.jpg" alt=""></a></li>
                    <li class="thumbnail"><a href="#"><img src="/img/fleamarket/2014080401000303100014261.jpg"</a></li>
                  </ul>
                </div>
              </div>
          </div>

          <div class="flea_list">
              <div class="flea_contents">
                <div class="flea_content_text">
                  <h3>인기판매자</h3>
                </div>
                <div class="market_list">
                  <ul>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                  </ul>
                </div>
              </div>
          </div>

          <div class="flea_list">
              <div class="flea_contents">
                <div class="flea_content_text">
                  <h3>인기 물품</h3>
                </div>
                <div class="market_list">
                  <ul>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                  </ul>
                </div>
              </div>
          </div>
        </div>
@endsection