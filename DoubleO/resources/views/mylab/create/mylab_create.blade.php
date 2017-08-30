@extends('mylab.layouts.mylab')
@section('title','공방제작')
@section('style')
  <style media="screen">
  .center_content {
    margin : 0 auto;
    overflow-y : scroll;
    overflow-x : hidden;
  }

  .right_content {
    margin : 0 auto;
    overflow-y : scroll;
    overflow-x : hidden;
  }

  .profile_bxslider {
    margin : 0 auto;
    width : 100%;
    height : 70%;
  }

  .bxslider_title p{
    margin : 0 auto;
    height : 10%;
    text-align : center;
    font-size : 20px;
    font-weight : bold;
    border-bottom : 2px solid red;
  }

  .bxslider_content{
    margin : 0 auto;
    width : 100%;
    height : 90%;
  }

  .bxslider {
    margin : 0 auto;
    width : 100%;
    height : 100%;
  }

  .bxslider li img{
    width : 100%;
    height : 100%;
  }
  </style>
@endsection
@section('content')
  <div class="main_content">
    <div class="draggable_content_main">
      <div class="menu">목록</div>
      <div class="first_content">글꼴</div>
      <div class="second_content">타임라인</div>
      <div class="third_content">공방꾸미기</div>
      <div class="fourth_content">배경화면</div>
      <div class="cancel_content">닫기</div>
    </div>
    <div class="draggable_content_sub">
      <div class="widget_content_list">
        <div class="content_list_name">
          글꼴
        </div>
        <div class="content_list_things">
          <p>폰트</p>
          <p style="font-size:25px; font-style:italic;" value="italic" class="drop_font_object">가나다라마바사</p>
          <p style="font-size:25px; font-style:normal;" value="normal" class="drop_font_object">가나다라마바사</p>
          <p style="font-size:25px; font-style:oblique;" value="oblique" class="drop_font_object">가나다라마바사</p>
          <br/>

          <p>굵기</p>
          <p style="font-size:30px" value="30px" class="drop_font_size_object">가나다라마바사(30px)</p>
          <p style="font-size:28px" value="28px" class="drop_font_size_object">가나다라마바사(28px)</p>
          <p style="font-size:25px" value="25px" class="drop_font_size_object">가나다라마바사(25px)</p>
          <p style="font-size:23px" value="23px" class="drop_font_size_object">가나다라마바사(23px)</p>
          <p style="font-size:20px" value="20px" class="drop_font_size_object">가나다라마바사(20px)</p>
          <hr>

          <p>색상</p>
          <p style="font-size:25px; color:pink" value="pink" class="drop_font_color_object">가나다라마바사</p>
          <p style="font-size:25px; color:skyblue" value="skyblue" class="drop_font_color_object">가나다라마바사</p>
          <p style="font-size:25px; color:black" value="black" class="drop_font_color_object">가나다라마바사</p>
          <p style="font-size:25px; color:gray" value="gray" class="drop_font_color_object">가나다라마바사</p>
          <br/>

          <p>강조</p>
          <p style="font-size:25px; font-weight:bold;" value="bold" class="drop_font_weight_object">가나다라마바사</p>
          <p style="font-size:25px; font-weight:normal;" value="normal" class="drop_font_weight_object">가나다라마바사</p>
        </div>
      </div>

      <div class="timeline_content_list">
        <div class="content_list_name">
          타임라인
        </div>
        <div class="content_list_things">
          {{-- <p>타임라인 1</p>
          <img src="{{asset('/storage/image/center_3.png')}}" alt="center_3.png" class="drop_center_object"> --}}
          <p>타임라인 2</p>
          <img src="{{asset('/storage/image/center_5.png')}}" alt="center_5.png" class="drop_center_object">
        </div>
      </div>

      <div class="ui_content_list">
        <div class="content_list_name">
          공방 꾸미기
        </div>
        <div class="content_list_things">
          <p>프로필 1</p>
          <img src="{{asset('/storage/image/left_1.png')}}" alt="left_1.png" class="drop_left_object">
          <p>프로필 2</p>
          <img src="{{asset('/storage/image/left_2.png')}}" alt="left_2.png" class="drop_left_object">
          <p>친구목록 1</p>
          <img src="{{asset('/storage/image/right_1.png')}}" alt="right_1.png" class="drop_right_object">
        </div>
      </div>

      <div class="background_content_list">
        <div class="content_list_name">
          배경화면
        </div>
        <div class="content_list_things">
          <p>배경화면1</p>
          <img src="{{asset('/storage/image/background_1.jpg')}}" alt="background_1.jpg" class="drop_bg_object">

          <p>배경화면2</p>
          <img src="{{asset('/storage/image/background_2.jpg')}}" alt="background_2.jpg" class="drop_bg_object">
        </div>
      </div>
    </div>

    <div class="droppable_content_main">
      <div class="background_content">
        <div class="background_content_title">
          <input type="text" name="content_title" value="공방이름을 입력해 주세요" class="lab_name">
        </div>
      </div>

      <div class="left_content">
        <div class="profile">
          <div class="profile_img">
            <img src="{{asset('storage/image/apeach.jpg')}}" alt="">
          </div>
          <div class="profile_name">
            <p>
              <b>{{$user_name['name']}}</b>
            </p>
          </div>
        </div>

        <div class="profile_introduce">
          <div class="profile_introduce_define">
            <p>자기소개</p>
          </div>
          <div class="profile_introduce_introduce">
            <p>&nbsp;&nbsp;{{$user_name['name']}}의 공방입니다 잘 부탁드려요</p>
          </div>
        </div>

        <div class="goods_introduce">
          <div class="goods_introduce_define">
            <p>물품 소개</p>
          </div>
          <div class="goods_introduce_introduce">
            <a href="#"><img src="http://img.allurekorea.com/allure/2010/10/style_5652de85caafc.jpg"/></a>
            <a href="#"><img src="http://pimage.design.co.kr/cms/contents/direct/info_id/64299/1383503026192.jpg"/></a>
            <a href="#"><img src="http://deco1st.com/web/product/medium/201412/9008_shop1_801721.jpg"/></a>
          </div>
        </div>

        {{-- 프로필 --}}

        <div class="bxslider_title">
          <p>판매자의 물품</p>
        </div>
        <div class="bxslider_content">
          <ul class="bxslider">
            <li><a href="#"><img src="http://img.allurekorea.com/allure/2010/10/style_5652de85caafc.jpg"/></a></li>
            <li><a href="#"><img src="http://pimage.design.co.kr/cms/contents/direct/info_id/64299/1383503026192.jpg"/></a></li>
            <li><a href="#"><img src="http://deco1st.com/web/product/medium/201412/9008_shop1_801721.jpg"/></a></li>
            <li><a href="#"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRp3g9dB7qHZgwFrjw7_zSI2OtG9l26orLoxkWYAdYPGBV6KOiV"/></a></li>
          </ul>
        </div>
      </div>

      <div class="center_content">
        <div class="timeline">
          <div class="write_content">
            <!-- 상단 프로필 부분 -->
            <div class="post_profile">
              <div class="post_profile_img">
                <img src="{{asset('storage/image/apeach.jpg')}}" alt="">
              </div>
              <div class="post_profile_name">
                <strong>울먹울먹</strong>
                {{-- <strong>{{$user_name['name']}}</strong> --}}
                <button type="button" name="button">...</button>
              </div>
              <div class="post_profile_date">
                <p>5월 5일</p>
                {{-- {{$timeline_content['updated_at']}} --}}
              </div>
            </div>

            <!-- 글 내용 부분 -->
            <div class="post">
              <div class="post_content">
                  오늘도 울먹울먹 내일도 울먹울먹 내일도 울먹울먹 매일을 울먹울먹<br>
                  내일도 울먹울먹<br>
                  모레도 울먹울먹<br>
                  매일을 울먹울먹<br>
                  {{-- <pre>
                    {{$timeline_content['content']}}
                  </pre> --}}
              </div>
            </div>
          </div>
        </div>
        {{-- first timeline --}}

        <div class="timeline">
          <div class="write_content">
            <!-- 상단 프로필 부분 -->
            <div class="post_profile">
              <div class="post_profile_img">
                <img src="{{asset('storage/image/apeach.jpg')}}" alt="">
              </div>
              <div class="post_profile_name">
                <strong>싱글벙글</strong>
                {{-- <strong>{{$user_name['name']}}</strong> --}}
                <button type="button" name="button">...</button>
              </div>
              <div class="post_profile_date">
                <p>5월 5일</p>
                {{-- {{$timeline_content['updated_at']}} --}}
              </div>
            </div>

            <!-- 글 내용 부분 -->
            <div class="post">
              <div class="post_content">
                  오늘도 싱글벙글 내일도 싱글벙글 내일도 싱글벙글 매일을 싱글벙글<br>
                  내일도 싱글벙글<br>
                  모레도 싱글벙글<br>
                  매일을 싱글벙글<br>
                  {{-- <pre>
                    {{$timeline_content['content']}}
                  </pre> --}}
              </div>
            </div>
          </div>
        </div>
        {{-- second_timeline --}}

        <div class="timeline">
          <div class="write_content">
            <!-- 상단 프로필 부분 -->
            <div class="post_profile">
              <div class="post_profile_img">
                <img src="{{asset('storage/image/apeach.jpg')}}" alt="">
              </div>
              <div class="post_profile_name">
                <strong>흐물즈물</strong>
                {{-- <strong>{{$user_name['name']}}</strong> --}}
                <button type="button" name="button">...</button>
              </div>
              <div class="post_profile_date">
                <p>5월 5일</p>
                {{-- {{$timeline_content['updated_at']}} --}}
              </div>
            </div>

            <!-- 글 내용 부분 -->
            <div class="post">
              <div class="post_content">
                  오늘도 흐물즈물 내일도 흐물즈물 내일도 흐물즈물 매일을 흐물즈물<br>
                  내일도 흐물즈물<br>
                  모레도 흐물즈물<br>
                  매일을 흐물즈물<br>
                  {{-- <pre>
                    {{$timeline_content['content']}}
                  </pre> --}}
              </div>
            </div>
          </div>
        </div>
        {{-- third_timeline --}}

      </div>

      <div class="right_content">
          <div class="follow_list_title">
            <p><strong>판매자 구독리스트</strong></p>
          </div>
          <div class="follow_list">
              <!-- 반복 할 곳이 여기다 여기 -->
            <div class="follow_list_form">
              <div class="follow_seller_img">
                <img src="{{asset('storage/image/apeach.jpg')}}" alt="">
              </div>
              <div class="follow_seller_info">
                <div class="follow_seller_name">
                  <p>울먹이</p>
                  {{-- <p>{{$subscription->name}}</p> --}}
                </div>
                <div class="follow_seller_intro">
                  <p>울먹울먹 울먹마켓</p>
                  {{-- <p>{{$subscription->title}}</p> --}}
                </div>
              </div>
              <div class="follow_btn">
                <button type="button" class="btn btn-danger btn-sm">
                  <a href="#">보기</a>
                </button>
              </div>
            </div>
              <!--반복 할 곳이 여기까지야 여기 -->

              <!-- 반복 할 곳이 여기다 여기 -->
            <div class="follow_list_form">
              <div class="follow_seller_img">
                <img src="{{asset('storage/image/apeach.jpg')}}" alt="">
              </div>
              <div class="follow_seller_info">
                <div class="follow_seller_name">
                  <p>싱글이</p>
                  {{-- <p>{{$subscription->name}}</p> --}}
                </div>
                <div class="follow_seller_intro">
                  <p>싱글벙글 싱글마켓</p>
                  {{-- <p>{{$subscription->title}}</p> --}}
                </div>
              </div>
              <div class="follow_btn">
                <button type="button" class="btn btn-danger btn-sm">
                  <a href="#">보기</a>
                </button>
              </div>
            </div>
              <!--반복 할 곳이 여기까지야 여기 -->

              <!-- 반복 할 곳이 여기다 여기 -->
            <div class="follow_list_form">
              <div class="follow_seller_img">
                <img src="{{asset('storage/image/apeach.jpg')}}" alt="">
              </div>
              <div class="follow_seller_info">
                <div class="follow_seller_name">
                  <p>즈물이</p>
                  {{-- <p>{{$subscription->name}}</p> --}}
                </div>
                <div class="follow_seller_intro">
                  <p>흐물즈물 흐즈마켓</p>
                  {{-- <p>{{$subscription->title}}</p> --}}
                </div>
              </div>
              <div class="follow_btn">
                <button type="button" class="btn btn-danger btn-sm">
                  <a href="#">보기</a>
                </button>
              </div>
            </div>
              <!--반복 할 곳이 여기까지야 여기 -->

              <!-- 반복 할 곳이 여기다 여기 -->
            <div class="follow_list_form">
              <div class="follow_seller_img">
                <img src="{{asset('storage/image/apeach.jpg')}}" alt="">
              </div>
              <div class="follow_seller_info">
                <div class="follow_seller_name">
                  <p>고답이</p>
                  {{-- <p>{{$subscription->name}}</p> --}}
                </div>
                <div class="follow_seller_intro">
                  <p>고구마답답 고답마켓</p>
                  {{-- <p>{{$subscription->title}}</p> --}}
                </div>
              </div>
              <div class="follow_btn">
                <button type="button" class="btn btn-danger btn-sm">
                  <a href="#">보기</a>
                </button>
              </div>
            </div>
              <!--반복 할 곳이 여기까지야 여기 -->
            </div>
          </div>
      </div>
    </div>
    <div class="submit_button">
      <p>제작완료</p>
    </div>
  </div>
@endsection
