@extends('layouts.app')

@section('title', '개인공방')

@section('style')
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="/css/mylabcreate0.css">
  <style media="screen">
  .main_content {
    margin : 0 auto;
    width : 1280px;
    height : 1200px;
    border : 1px solid lightgray;
  }

  .background_content {
    margin : 30px auto;
    width : 1280px;
    height : 400px;
    background : url("/storage/image/background_4.jpg");
    background-repeat : no-repeat;
    background-size : cover;
  }

  .background_content_title {
    width : 30%;
    height : 100px;
    font-size : 40px;
    font-style : italic;
    font-weight : bold;
    color : black;
    position : relative;
    top : 150px;
    left : 500px;
  }

  .left_content {
    margin : -30px auto;
    background-color:#f2f2f2;
    width : 15%;
    height : 1300px;
    border-top : 1px solid lightgray;
    border-left : 1px solid lightgray;
    border-bottom : 1px solid lightgray;
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
    margin-bottom : 30px;
    width : 100%;
    height : 150px;
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
    margin-top : -30px;
    width : 70%;
    background-color:#f2f2f2;
    border-top : 1px solid lightgray;
    border-left : 1px solid lightgray;
    border-right : 1px solid lightgray;
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
    margin-bottom : 50px;
    width : 100%;
    height : 200px;
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
    height : 20%;
    padding-top : 10px;
    padding-bottom : 10px;
    text-align : center;
    border-left : 1px solid lightgray;
  }

  .post {
    width : 100%;
    height : 100%;
    float : left;
  }

  .post_name_img_date{
    margin : 0 auto;
    width : 100%;
    height : 30%;
  }

  .post_profile_img {
    margin : 0 auto;
    width : 10%;
    height : 100%;
    float : left;
  }

  .post_profile_img img{
    margin-left : 20px;
    margin-top : 5px;
    margin-right : 20px;
    margin-bottom : 5px;
    width : 50px;
    height : 50px;
  }

  .post_profile_name {
    margin : 0 auto;
    width : 90%;
    height : 50%;
    text-align : left;
    font-size : 12px;
    color : black;
    float : bottom;
  }

  .post_profile_date {
    width : 90%;
    height : 50%;
    text-align : left;
    font-size : 12px;
    color : gray;
  }

  .post_content {
    margin : 0 auto;
    width : 80%;
    height : 70%;
    text-align : center;
    border : 1px solid black;
    border-radius : 10px;
    background-color : white;
  }

  .post_content p {
    margin-top : 30px;
  }

  .right_content {
    margin : -30px auto;
    background-color:#f2f2f2;
    width : 15%;
    height : 1300px;
    border-top : 1px solid lightgray;
    border-right : 1px solid lightgray;
    border-bottom: 1px solid lightgray;
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
  <script type="text/javascript">

  </script>
@endsection

@section('content')
  <div class="main_content">
    <div class="background_content">
      <div class="background_content_title">
        <p>
          Double O 오픈공방
        </p>
      </div>
    </div>

    <div class="left_content">
      <div class="profile">
        <div class="profile_img">
          <img src="{{asset('storage/image/apeach.jpg')}}" alt="">
        </div>
        <div class="profile_name">
          <p>
            <b>Double O</b>
          </p>
        </div>
      </div>

      <div class="profile_introduce">
        <div class="profile_introduce_introduce">
          <p>
            &nbsp;Double O의 공방입니다<br/>
            &nbsp;잘 부탁드려요
          </p>
        </div>
      </div>
      {{-- 프로필 --}}

      <div class="move_some">
        <div class="move_goods_btn">
          <a href="{{url('/mylab/goods')}}">물품보기</a>
        </div>

        <div class="move_friends_btn">
          <a href="{{url('/mylab/follow')}}">친구공방</a>
        </div>
      </div>
    </div>

    <div class="center_content">
      <div class="textbox">
        <form class="" action="/board/create" method="post">
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
                <p>Double O</p>
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
      </form>
      @if (isset($timeline_contents))
        @for ($i=0; $i < count($timeline_contents) ; $i++)
          <div class="timeline">
            <div class="write_content">
              <!-- 글 내용 부분 -->
              <div class="post">
                <div class="post_name_img_date">
                  <div class="post_profile_img">
                    <img src="{{asset('storage/image/apeach.jpg')}}" alt="">
                  </div>
                  <div class="post_profile_name">
                    {{-- <p>Double O</p> --}}
                    <p>{{$user}}</p>
                  </div>
                  <div class="post_profile_date">
                    {{-- <p>2017년 7월 5일 작성</p> --}}
                    <p>{{$timeline_contents[$i]->updated_at}}</p>
                  </div>
                </div>
                <div class="post_content">
                  {{-- <p>
                    Double O 플리마켓을 개최하게 되었습니다.<br/>
                    처음 개최하는 플리마켓이지만 많은 성원 부탁드리겠습니다<br/>
                  </p> --}}

                    <p>
                      {{$timeline_contents[$i]->content}}
                    </p>
                </div>
              </div>
            </div>
          </div>
          {{-- first timeline --}}
        @endfor
      @endif
    </div>

    <div class="right_content">
      <div class="follow_list_title">
        <p><strong>판매자 구독리스트</strong></p>
      </div>
      <div class="follow_list">
        @if (isset($subscription))
          <!-- 반복 할 곳이 여기다 여기 -->
          @for ($i=0; $i <count($subscription) ; $i++)
            <div class="follow_list_form">
              <div class="follow_seller_img">
                <img src="{{asset('storage/image/profile2.png')}}" alt="">
              </div>
              <div class="follow_seller_info">
                <div class="follow_seller_intro">
                  {{-- <p>초코초코 초코나라</p> --}}
                  <p>{{$subscription[$i]->title}}</p>
                </div>
              </div>
              <div class="follow_btn">
                <button type="button" class="">
                  <a href="#">보기</a>
                </button>
              </div>
            </div>
          @endfor
          <!--반복 할 곳이 여기까지야 여기 -->
        @endif
      </div>
    </div>
  </div>
@endsection
