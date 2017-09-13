 <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/earlyaccess/hanna.css'>
 <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/earlyaccess/jejugothic.css'>
 <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/earlyaccess/nanumpenscript.css'>
 
 <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
 <script>

      $(document).ready(function(){
          $('#group_list').click(function () {
              window.location.href = '{{url("/group/list")}}';
          })


      });
  </script>
  
  <style>
    /*@import url(http://fonts.googleapis.com/earlyaccess/hanna.css);*/
    /*@import url(http://fonts.googleapis.com/earlyaccess/jejugothic.css);*/
    
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
      width:1530px;
      height:1380px;
      margin: auto;
      margin-top:30px;
      margin-bottom:30px;
      
    }
    .clear{
      clear:both;
    }
    
    
    .best_market_contents{
      
      width:350px;
      height:620px;
      border-radius:5px;
      float:left;
      margin-top:-15px;
      margin-left:20px;
    }
    .best_market_contents:first-child{
      margin-left:-20px;
    }
    .best_market_contents:nth-child(5){
      margin-left:-20px;
    }
    
    .best_market_contents li{
      width:100%;
      margin-left:0px;
      font-size:30px;
      font-family: 'Nanum Pen Script', cursive;
      text-align:center;
      color:#686868;
    }
    .best_market_contents_explains{
      margin-top:10px;
    }
    .best_market_contents li:first-child{
      /*font-weight:bold;*/
      color:#e20404;
      font-size:40px;
      text-align:center;
      /*font-family: 'Jeju Gothic', serif;*/
    }
    .best_market_contents li:nth-child(3){
       margin-top:10px;
       border-top:1px dotted #878787;
    }
    
    .best_market_contents  img{
      width:100%;
      height:75%;
      box-shadow:6px 6px 4px #afafaf;
    }

  </style>

@extends('layouts.app')



@section('title', '메인화면')
@section('content')
      <!-- 컨텐츠 부분(플리마켓 정보, 판매자 정보, 벼룩가이드, 마일리지 샵) --->
        <div class="title_img">
            <img src='/img/title_v5.png' style="width:100%; height:auto; ">
          </div>
        <div id="fleamarket">
          <!-- 플리마켓  -->
          <div class="flea_list">
              <div class="flea_contents">
                <div class="flea_content_text">
                  <h3>BEST FLEA MARKET</h3>
                </div>
                <div class="market_list">
                  <ul>
                    <div class="best_market_contents">
                      <a href="#"><img src="/img/fleamarket/poster_jp_01.png" alt=""></a>
                      <div class="best_market_contents_explains">
                        <li class="text-center">1인 창조기업 플리마켓 1TH</li>
                        <li>서울특별시 서대문구 창천동 창천문화공원</li>
                        <li>2017년 8월 26일</li>
                        <li>오후12:00 ~ 오후 19:00</li>
                      </div>
                    </div>
                    <div class="best_market_contents">
                     <a href="#"><img src="/img/fleamarket/poster_jp_02.jpg" alt=""></a>
                     <div class="best_market_contents_explains">
                        <li class="text-center">모두와#애플뮤직 플리마켓 1TH</li>
                        <li>충주시 성서동</li>
                        <li>2017년 8월 28일</li>
                        <li>오후12:00 ~ 오후 19:00</li>
                      </div>
                    </div>
                    <div class="best_market_contents">
                     <a href="#"><img src="/img/fleamarket/poster_jp_03.jpg" alt=""></a>
                     <div class="best_market_contents_explains">
                        <li class="text-center">MINT SHOP 1TH</li>
                        <li>서울특별시 마포구 합정동 355-11 1F</li>
                        <li>2017년 8월 28일</li>
                        <li>오후12:00 ~ 오후 19:00</li>
                      </div>
                    </div>
                    <div class="best_market_contents">
                     <a href="#"><img src="/img/fleamarket/poster_jp_04.PNG" alt=""></a>
                     <div class="best_market_contents_explains">
                        <li class="text-center">아나마스 플리마켓</li>
                        <li>대구광역시 중구 공평동</li>
                        <li>2017년 8월 27일</li>
                        <li>오후11:00 ~ 오후 20:00</li>
                      </div>
                    </div>
                    <div class="clear"></div>
                    <br><br><br><br>
                    <div class="best_market_contents" style="margin-left:-40px;">
                      <a href="#"><img src="/img/fleamarket/poster_jp_05.png" alt=""></a>
                    </div>
                    <div class="best_market_contents">
                     <a href="#"><img src="/img/fleamarket/poster_jp_06.jpg" alt=""></a>
                    </div>
                    <div class="best_market_contents">
                     <a href="#"><img src="/img/fleamarket/poster_jp_07.jpg" alt=""></a>
                    </div>
                    <div class="best_market_contents">
                     <a href="#"><img src="/img/fleamarket/poster_jp_08.jpg" alt=""></a>
                    </div>
                  </ul>
                </div>
              </div>
          </div>

          <div class="flea_list">
              <div class="flea_contents">
                <div class="flea_content_text">
                  <h3>人気出店者</h3>
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
                  <h3>人気商品</h3>
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