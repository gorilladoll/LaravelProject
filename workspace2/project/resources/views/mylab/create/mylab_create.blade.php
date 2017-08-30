@extends('layouts.app')

@section('title','공방제작')

@section('style')
  {{-- <link rel="stylesheet" href="{{asset('/css/contents/mylab.css')}}">  --}}
  <link rel="stylesheet" href="/css/mylabcreate0.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <script src="/js/mylabcreate.js" charset="utf-8"></script>

  <style media="screen">
    .main_content {
      margin : 0 auto;
      width : 1280px;
      height : 1700px;
      border : 1px solid lightgray;
    }

    .background_content {
      border-left : 1px solid black;
      border-right : 1px solid black;
      width : 1280px;
      height : 400px;
      background-repeat : no-repeat;
      background-size : cover;
      opacity : 0.8;
    }

    .background_content_title {
      width : 50%;
      height : 100px;
      font-size : 40px;
      font-style : italic;
      font-weight : bold;
      color : black;
      position : relative;
      top : 150px;
      left : 300px;
    }

    .background_content_title input {
      width : 100%;
      height : 80px;
      text-align : center;
    }

    .left_content {
      margin : 0px auto;
      background-color:#f2f2f2;
      width : 15%;
      height : 1300px;
      border : 1px solid black;
      float : left;
    }

    .bxslider_content {
      margin-left : 10px auto;
    }

    .bx-viewprot {
      margin-left : 5px auto;
      width : 100%;
      height : 500px;
    }

    .profile {
      width : 100%;
      height : 200px;
      text-align: center;
      background-color : lightgray;
      border-bottom : 2px solid red;
    }

    .profile_img {
      margin-left : 0 auto;
      width : 100%;
    }

    .profile_img img {
      margin-top : 30px;
      margin-bottom : 20px;
      width : 50%;
      height : 55%;
      border : 1px solid gray;
    }

    .profile_name {
      margin-top : 5px;
      border-top : 2px solid red;
      width : 100%;
      font-size : 15px;
    }

    .profile_name p {
      margin-top : 5px;
    }

    .profile_introduce {
      margin : 0 auto;
      width : 100%;
      height : 40px;
      font-size : 15px;
    }

    .move_some {
      padding-top : 5px;
      margin-bottom : 5px;
      width : 100%;
      height : 50px;
      border-top : 1px solid gray;
    }

    .move_goods_btn {
      margin-top : 5px;
      padding-top : 7px;
      width : 50%;
      height : 45px;
      background-color : lightgreen;
      text-align : center;
      font-size : 20px;
      border : 1px solid black;
      border-radius : 10px;
      float : left;
    }

    .move_friends_btn {
      margin-top : 5px;
      margin-bottom : 10px;
      padding-top : 7px;
      width : 50%;
      height : 45px;
      background-color : lightgreen;
      text-align : center;
      font-size : 20px;
      border : 1px solid black;
      border-radius : 10px;
      float : left;
    }

    .bxslider_title {
      clear : both;
      margin : 0 auto;
      margin-top : 10px;
      width : 100%;
      height : 30px;
      font-weight : bold;
      text-align : center;
      border-top : 2px solid red;
      border-bottom : 2px solid red;
    }

    .bxslider_content {
      margin-left : 5px;
      width : 100%;
    }
    /* 공방 왼쪽 구현 */

    .center_content {
      margin : 0px;
      width : 70%;
      height : 1300px;
      background-color:#f2f2f2;
      border-top : 1px solid black;
      border-bottom : 1px solid black;
      float : left;
    }

    .textbox {
      width : 100%;
      height : 300px;
      border-bottom : 2px solid red;
    }

    .text_input {
      margin : 0 auto;
      width : 100%;
      height : 200px;
      border-left : 1px solid lightgray;
      border-bottom : 1px solid lightgray;
    }

    .text_profile_img {
      margin : 0 auto;
      border-right : 1px solid lightgray;
      width : 20%;
      height : 100%;
      float : left;
    }

    .text_profile_img img {
      margin : 0 auto;
      margin-left : 18px;
      margin-top : 20px;
      margin-right: 18px;
      margin-bottom : 20px;
      width : 80%;
      height : 80%;
      border : 1px solid gray;
    }

    .text_user_name {
      margin-left : 20%;
      width : 80%;
      height : 15%;
      text-align : center;
    }

    .text_user_name p {
      font-size : 20px;
      font-weight : bold;
    }

    textarea {
      width : 70%;
      height : 85%;
      resize : none;
      float : left;
    }

    button {
      width : 10%;
      height : 85%;
      background-color : lightblue;
      font-size : 25px;
      color : gray;
      float : left;
      border-left : 1px solid black;
      border-top : 1px solid black;
      border-right : 1px solid lightgray;
      border-bottom : 1px solid black;
    }

    .timeline {
      clear : both;
      width : 100%;
      height : 200px;
      border-bottom : 1px solid gray;
    }

    .write_content {
      margin : 0 auto;
      border-right : 1px solid lightgray;
      width : 100%;
      height : 100%;
      float : left;
    }

    .post_profile {
      width : 20%;
      height : 100%;
      float : left;
      border-right: 1px solid lightgray;
      border-bottom : 1px solid lightgray;
      position :relative;
    }

    .post_profile_img {
      width : 100%;
      height : 80%;
      border-bottom : 1px solid lightgray;
    }

    .post_profile_img img {
      margin : 0 auto;
      margin-left : 35px;
      margin-top : 25px;
      margin-right: 35px;
      margin-bottom : 25px;
      width : 60%;
      height : 70%;
      border : 1px solid gray;
      float : left;
    }

    .post_profile_name {
      width : 100%;
      height : 50%;
      padding-top : 10px;
      padding-bottom : 10px;
      text-align : center;
      border-left : 1px solid lightgray;
    }

    .post {
      width : 80%;
      height : 100%;
      float : left;
    }

    .post_profile_date {
      width : 100%;
      height : 10%;
      text-align : right;
      font-size : 12px;
      color : gray;
    }

    .post_content {
      margin : 0 auto;
      width : 80%;
      height : 80%;
      text-align : center;
      border : 1px solid black;
      border-radius : 10px;
      background-color : white;
    }

    .post_content p {
      margin-top : 30px;
    }

    .right_content {
      margin : 0px auto;
      background-color:#f2f2f2;
      width : 15%;
      height : 1300px;
      border : 1px solid black;
      float : left;
    }

    .follow_list_title {
      margin : 0 auto;
      padding-top : 5px;
      padding-bottom : 5px;
      width : 100%;
      height : 50px;
      text-align : center;
      border-bottom : 2px solid red;
      font-size : 25px;
    }

    .follow_list {
      width : 100%;
    }

    .follow_list_form {
      width : 100%;
      height : 200px;
    }

    .follow_seller_img {
      margin : 0 auto;
      width : 100%;
      height : 70%;
      border-bottom : 1px solid lightgray;
    }

    .follow_seller_img img {
      margin : 10px 40px;
      width : 60%;
      height : 80%;
      border : 1px solid black;
    }

    .follow_seller_info {
      margin : 0 auto;
      width : 100%;
      height : 15%;
    }

    .follow_seller_intro {
      margin : 0 auto;
      padding-top : 5px;
      padding-bottom : 5px;
      width : 100%;
      height : 100%;
      text-align : center;
      font-weight : bold;
    }

    .follow_btn {
      margin : 0 auto;
      width : 100%;
      height : 14%;
    }

    .follow_btn button {
      margin : 0 auto;
      width : 100%;
      height : 100%;
      background-color : lightpink;
      text-align : center;
      font-size : 15px;
      font-weight : bold;
    }
  </style>
@endsection

@section('content')
  <div class="main_content">
    <div class="draggable_content_main">
      <!--<div class="menu">목록</div>-->
      <div class="first_content">
        <img src="{{asset('/storage/icon/icon_font.png')}}">
      </div>
      <br/>

      <div class="second_content">
        <img src="{{asset('/storage/icon/icon_newsfeed.png')}}">
      </div>
      <br/>

      <div class="third_content">
        <img src="{{asset('/storage/icon/icon_content.png')}}">
      </div>
      <br/>

      <div class="fourth_content">
        <img src="{{asset('/storage/icon/icon_background.png')}}">
      </div>
      <br/>

      <div class="fifth_content">
        <img src="{{asset('/storage/icon/icon_background.png')}}" alt="">
      </div>
      <br/>

      <div class="cancel_content">
        <img src="{{asset('/storage/icon/icon_cancel.png')}}">
      </div>
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
          <div class="none-space"></div>

          <p>굵기</p>
          <p style="font-size:30px" value="30px" class="drop_font_size_object">가나다라마바사(30px)</p>
          <p style="font-size:28px" value="28px" class="drop_font_size_object">가나다라마바사(28px)</p>
          <p style="font-size:25px" value="25px" class="drop_font_size_object">가나다라마바사(25px)</p>
          <p style="font-size:23px" value="23px" class="drop_font_size_object">가나다라마바사(23px)</p>
          <p style="font-size:20px" value="20px" class="drop_font_size_object">가나다라마바사(20px)</p>
          <div class="none-space"></div>

          <p>색상</p>
          <p style="font-size:25px; color:pink" value="pink" class="drop_font_color_object">가나다라마바사</p>
          <p style="font-size:25px; color:skyblue" value="skyblue" class="drop_font_color_object">가나다라마바사</p>
          <p style="font-size:25px; color:black" value="black" class="drop_font_color_object">가나다라마바사</p>
          <p style="font-size:25px; color:gray" value="gray" class="drop_font_color_object">가나다라마바사</p>
          <div class="none-space"></div>

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
          <p>페이스북 형식</p>
          <img src="{{asset('/storage/image/center_1.png')}}" alt="center_1.png" class="drop_center_object">
          <div class="none-space"></div>

          <p>블록 형식</p>
          <img src="{{asset('/storage/image/center_2.png')}}" alt="center_2.png" class="drop_center_object">
          <div class="none-space"></div>

          <p>텀블러 형식</p>
          <img src="{{asset('/storage/image/center_3.png')}}" alt="center_3.png" class="drop_center_object">
          <div class="none-space"></div>

          <p>신문 형식</p>
          <img src="{{asset('/storage/image/center_4.png')}}" alt="center_4.png" class="drop_center_object">
          <div class="none-space"></div>

          <p>카페 형식</p>
          <img src="{{asset('/storage/image/center_5.png')}}" alt="center_5.png" class="drop_center_object">
          <div class="none-space"></div>
          <p></p>
        </div>
      </div>

      <div class="ui_content_list">
        <div class="content_list_name">
          공방 꾸미기
        </div>
        <div class="content_list_things">
          <p>프로필 1</p>
          <img src="{{asset('/storage/image/left_3.png')}}" alt="left_3.png" class="drop_left_object">
          <div class="none-space"></div>

          <p>친구목록 1</p>
          <img src="{{asset('/storage/image/right_2.png')}}" alt="right_2.png" class="drop_right_object">
          <div class="none-space"></div>

          <p>프로필 2</p>
          <img src="{{asset('/storage/image/left_2.png')}}" alt="left_2.png" class="drop_left_object">
          <div class="none-space"></div>

          <p>친구목록 2</p>
          <img src="{{asset('/storage/image/right_1.png')}}" alt="right_1.png" class="drop_right_object">
          <div class="none-space"></div>

          <p>프로필 3</p>
          <img src="{{asset('/storage/image/left_1.png')}}" alt="left_1.png" class="drop_left_object">
        </div>
      </div>

      <div class="background_content_list">
        <div class="content_list_name">
          배경화면
        </div>
        <div class="content_list_things">
          <p>배경화면1</p>
          <img src="{{asset('/storage/image/background_4.jpg')}}" alt="background_4.jpg" class="drop_bg_object">
          <div class="none-space"></div>

          <p>배경화면2</p>
          <img src="{{asset('/storage/image/background_1.jpg')}}" alt="background_1.jpg" class="drop_bg_object">
          <div class="none-space"></div>

          <p>배경화면3</p>
          <img src="{{asset('/storage/image/background_2.jpg')}}" alt="background_2.jpg" class="drop_bg_object">
          <div class="none-space"></div>

          <p>배경화면4</p>
          <img src="{{asset('/storage/image/background_3.jpeg')}}" alt="background_3.jpeg" class="drop_bg_object">

        </div>
      </div>

      <div class="drag_sub_content">
        <div class="content_list_name">
          드래그
        </div>
        <div class="content_list_things">
          <div class="drag_sub_background">
            <p>배경화면1</p>
            <img src="{{asset('/storage/image/background_5.jpg')}}" alt="background_5.jpg" class="drag_sub_background_content">
            <div class="none-space"></div>

            <p>배경화면2</p>
            <img src="{{asset('/storage/image/background_6.jpg')}}" alt="background_6.jpg" class="drag_sub_background_content">
            <div class="none-space"></div>

            <p>배경화면3</p>
            <img src="{{asset('/storage/image/background_7.jpg')}}" alt="background_7.jpg" class="drag_sub_background_content">
            <div class="none-space"></div>

            <p>배경화면4</p>
            <img src="{{asset('/storage/image/background_8.jpg')}}" alt="background_8.jpg" class="drag_sub_background_content">
          </div>
          <div class="none-space"></div>

          <div class="drag_sub_text">
            <p>텍스트박스</p>
            <div class="drag_sub_textbox"></div>
            <div class="none-space"></div>

            <p>폰트</p>
            <p style="font-size:25px; font-style:italic;" value="italic" class="drag_sub_font_style">가나다라마바사</p>
            <p style="font-size:25px; font-style:normal;" value="normal" class="drag_sub_font_style">가나다라마바사</p>
            <p style="font-size:25px; font-style:oblique;" value="oblique" class="drag_sub_font_style">가나다라마바사</p>
            <div class="none-space"></div>

            <p>굵기</p>
            <p style="font-size:30px" value="30px" class="drag_sub_font_size">가나다라마바사(30px)</p>
            <p style="font-size:28px" value="28px" class="drag_sub_font_size">가나다라마바사(28px)</p>
            <p style="font-size:25px" value="25px" class="drag_sub_font_size">가나다라마바사(25px)</p>
            <p style="font-size:23px" value="23px" class="drag_sub_font_size">가나다라마바사(23px)</p>
            <p style="font-size:20px" value="20px" class="drag_sub_font_size">가나다라마바사(20px)</p>
            <div class="none-space"></div>

            <p>색상</p>
            <p style="font-size:25px; color:pink" value="pink" class="drag_sub_font_color">가나다라마바사</p>
            <p style="font-size:25px; color:skyblue" value="skyblue" class="drag_sub_font_color">가나다라마바사</p>
            <p style="font-size:25px; color:black" value="black" class="drag_sub_font_color">가나다라마바사</p>
            <p style="font-size:25px; color:gray" value="gray" class="drag_sub_font_color">가나다라마바사</p>
            <div class="none-space"></div>

            <p>강조</p>
            <p style="font-size:25px; font-weight:bold;" value="bold" class="drag_sub_font_weight">가나다라마바사</p>
            <p style="font-size:25px; font-weight:normal;" value="normal" class="drag_sub_font_weight">가나다라마바사</p>
            <div class="none-space"></div>
          </div>

          <div class="drag_content_timeline">
            <p>페이스북 형식</p>
            <img src="{{asset('/storage/image/center_1.png')}}" alt="drag_sub_timeline" class="drag_sub_timeline_object">
            <div class="none-space"></div>
          </div>

          <div class="drag_content_profile">
            <p>프로필 1</p>
            <img src="{{asset('/storage/image/left_3.png')}}" alt="drag_sub_profile" class="drag_sub_profile_object">
            <div class="none-space"></div>
          </div>

          <div class="drag_content_follow">
            <p>친구목록 1</p>
            <img src="{{asset('/storage/image/right_2.png')}}" alt="drag_sub_follow" class="drag_sub_follow_object">
            <div class="none-space"></div>
          </div>
        </div>
        <div class="none-space"></div>
      </div>

    </div>

    {{-- <div class="droppable_content_main"> --}}
      <div class="background_content">
        <div class="background_content_title">
          <input type="text" name="" value="공방이름을 입력하세요">
        </div>
      </div>

      <div class="left_content">
        <div class="profile">
          <div class="profile_img">
            <img src="{{asset('storage/image/apeach.jpg')}}" alt="">
          </div>
          <div class="profile_name">
            <p>
              <b>닉네임</b>
            </p>
          </div>
        </div>

        <div class="profile_introduce">
          <div class="profile_introduce_introduce">
            <p>
              &nbsp;닉네임의 공방입니다<br/>
              &nbsp;잘 부탁드려요
            </p>
          </div>
        </div>
        {{-- 프로필 --}}

        <div class="move_some">
          <div class="move_goods_btn">
            <a href="#">물품보기</a>
          </div>

          <div class="move_friends_btn">
            <a href="#">친구공방</a>
          </div>
        </div>
      </div>

      <div class="center_content">
        <div class="textbox">
          <div class="category">
            <div class="dropboxs">
              <select class="form-control Child" name="form_control_child">
                <option value="none">none</option>
                <option value="food">식품</option>
                <option value="homemade">핸드메이드</option>
                <option value="cloth">옷</option>
              </select>
              <select class="form-control Parent" name="form_control_parent">
                <option value="timeline">타임라인</option>
                <option value="made">물품</option>
              </select>
              <!-- javascript로 추가 -->
              <!-- 대분류가 타임라인일 경우 -> 없음 -->
              <!-- 대분류가 물품등록일경우 -> 등록한 카테고리가 나옴 -->
            </div>
          </div>

          <div class="text_input">
            <div class="text_profile_img">
              <img src="{{asset('storage/image/apeach.jpg')}}" alt="">
            </div>

              <div class="text_user_name">
                <p>닉네임</p>
              </div>
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <textarea name="input_write" rows="5" cols="30" class="input_write" placeholder="글을 입력해 주세요" maxlength="150"></textarea>
              <button type="submit" name="submit_write" class="submit_button">완료</button>
          </div>

          <div class="text_btn">
            <div class="picture_btn">
              {{-- <span class="glyphicon glyphicon-picture" aria-hidden="true"></span> --}}
              <input type="file" name="img_upload[]" class="img_upload" multiple>
            </div>
          </div>
        </div>
        <div class="timeline">
          <div class="write_content">
            <!-- 상단 프로필 부분 -->
            <div class="post_profile">
              <div class="post_profile_img">
                <img src="{{asset('storage/image/apeach.jpg')}}" alt="">
              </div>
              <div class="post_profile_name">
                <strong>닉네임</strong>
                {{-- <strong>{{$user_name['name']}}</strong> --}}
                {{-- <button type="button" name="button">...</button> --}}
              </div>
            </div>

            <!-- 글 내용 부분 -->
            <div class="post">
              <div class="post_profile_date">
                <p>2017년 8월 20일 작성</p>
                {{-- {{$timeline_content['updated_at']}} --}}
              </div>
              <div class="post_content">
                <p>
                  Double O 플리마켓을 개최하게 되었습니다.<br/>
                  처음 개최하는 플리마켓이지만 많은 성원 부탁드리겠습니다<br/>
                </p>

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
                <strong>Double O</strong>
                {{-- <strong>{{$user_name['name']}}</strong> --}}
                {{-- <button type="button" name="button">...</button> --}}
              </div>
            </div>

            <!-- 글 내용 부분 -->
            <div class="post">
              <div class="post_profile_date">
                <p>2017년 7월 5일 작성</p>
                {{-- {{$timeline_content['updated_at']}} --}}
              </div>
              <div class="post_content">
                <p>
                  이번에도 롯데 플리마켓에 참여하게 되었습니다.<br/>
                  이번에는 오미자차와 녹차를 준비하였습니다.<br/>
                  많은 성원 부탁드리겠습니다.<br/>
                </p>
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
                <strong>Double O</strong>
                {{-- <strong>{{$user_name['name']}}</strong> --}}
                {{-- <button type="button" name="button">...</button> --}}
              </div>
            </div>

            <!-- 글 내용 부분 -->
            <div class="post">
              <div class="post_profile_date">
                <p>2017년 6월 5일 작성</p>
                {{-- {{$timeline_content['updated_at']}} --}}
              </div>
              <div class="post_content">
                  <p>
                    플리마켓을 기획 중입니다.<br/>
                    혹시나 관심이 있으신분은 연락 주시기 바랍니다.<br/>
                    TEL 010-1234-5678<br/>
                  </p>
                  {{-- <pre>
                    {{$timeline_content['content']}}
                  </pre> --}}
              </div>
            </div>
          </div>
        </div>
        {{-- third_timeline --}}

        <div class="timeline">
          <div class="write_content">
            <!-- 상단 프로필 부분 -->
            <div class="post_profile">
              <div class="post_profile_img">
                <img src="{{asset('storage/image/apeach.jpg')}}" alt="">
              </div>
              <div class="post_profile_name">
                <strong>Double O</strong>
                {{-- <strong>{{$user_name['name']}}</strong> --}}
                {{-- <button type="button" name="button">...</button> --}}
              </div>
            </div>

            <!-- 글 내용 부분 -->
            <div class="post">
              <div class="post_profile_date">
                <p>2017년 5월 5일 작성</p>
                {{-- {{$timeline_content['updated_at']}} --}}
              </div>
              <div class="post_content">
                <p>
                  롯데 플리마켓에 참여하게 되었습니다<br/>
                  이번에 제가 준비한 물품은 향초 2종입니다<br/>
                  많은 성원 부탁드리겠습니다.<br/>
                </p>
                  {{-- <pre>
                    {{$timeline_content['content']}}
                  </pre> --}}
              </div>
            </div>
          </div>
        </div>
        {{-- fourth_timeline --}}

        <div class="timeline">
          <div class="write_content">
            <!-- 상단 프로필 부분 -->
            <div class="post_profile">
              <div class="post_profile_img">
                <img src="{{asset('storage/image/apeach.jpg')}}" alt="">
              </div>
              <div class="post_profile_name">
                <strong>Double O</strong>
                {{-- <strong>{{$user_name['name']}}</strong> --}}
                {{-- <button type="button" name="button">...</button> --}}
              </div>
            </div>

            <!-- 글 내용 부분 -->
            <div class="post">
              <div class="post_profile_date">
                <p>2017년 5월 5일 작성</p>
                {{-- {{$timeline_content['updated_at']}} --}}
              </div>
              <div class="post_content">
                <p>
                  처음 가입 하였습니다.<br/>
                  플리마켓 개최와 판매를 위하여 개설하게 되었습니다.<br/>
                  잘 부탁드리겠습니다.<br/>
                </p>
                  {{-- <pre>
                    {{$timeline_content['content']}}
                  </pre> --}}
              </div>
            </div>
          </div>
        </div>
        {{-- fifth_timeline --}}
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
              <div class="follow_seller_intro">
                <p>친구1</p>
                {{-- <p>{{$subscription->title}}</p> --}}
              </div>
            </div>
            <div class="follow_btn">
              <button type="button" class="">
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
              <div class="follow_seller_intro">
                <p>친구2</p>
                {{-- <p>{{$subscription->title}}</p> --}}
              </div>
            </div>
            <div class="follow_btn">
              <button type="button" class="">
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
              <div class="follow_seller_intro">
                <p>친구3</p>
                {{-- <p>{{$subscription->title}}</p> --}}
              </div>
            </div>
            <div class="follow_btn">
              <button type="button" class="">
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
              <div class="follow_seller_intro">
                <p>친구4</p>
                {{-- <p>{{$subscription->title}}</p> --}}
              </div>
            </div>
            <div class="follow_btn">
              <button type="button" class="">
                <a href="#">보기</a>
              </button>
            </div>
          </div>
            <!--반복 할 곳이 여기까지야 여기 -->
        </div>
      </div>
    </div>
  </div>

@endsection
