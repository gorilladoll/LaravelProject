@extends("layouts.app")

@section('title','mylab')

@section('style')
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <!-- bxSlider Javascript file -->
  <script src="/js/bxslider/jquery.bxslider.min.js"></script>
  <!-- bxSlider CSS file -->
  <link href="/js/bxslider/jquery.bxslider.css" rel="stylesheet" />
  <script src="/js/section0.js" charset="utf-8"></script>
  <style media="screen">
    .main_content {
      margin : 0 auto;
      width : 1280px;
      height : 1200px;
      font-family:'interparkM','interparkMEot';
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
      background-color : rgb(217, 83, 79);
      text-align : center;
      font-size : 20px;
      color : white;
      border : 1px solid black;
      border-radius : 10px;
      float : left;
    }
    
    .move_goods_btn a {
      color : white;
    }

    .move_friends_btn {
      margin-top : 5px;
      margin-bottom : 10px;
      padding-top : 7px;
      width : 50%;
      height : 45px;
      background-color : rgb(217, 83, 79);
      text-align : center;
      color : white;
      font-size : 20px;
      border : 1px solid black;
      border-radius : 10px;
      float : left;
    }
    
    .move_friends_btn a {
      color : white;
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
      background-color : rgb(217, 83, 79);
      font-size : 25px;
      color : gray;
      float : left;
      color : white;
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
      background-color : rgb(217, 83, 79);
      text-align : center;
      text-decoration : white;
      font-size : 15px;
      font-weight : bold;
    }
    
    .follow_btn button a {
      color : white;
    }
  </style>
@endsection

@section('content')
  <div class="main_content">
    <div class="background_content">
      <div class="background_content_title">
        <p>
          Double O フリマー<br/>
        </p>
      </div>
    </div>

    <div class="left_content">
      <div class="profile">
        <div class="profile_img">
          <img src="{{asset('storage/image/profile7.jpg')}}" alt="">
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
            &nbsp;Double Oのアトリエです。<br/>
            &nbsp;宜しくお願いします。
          </p>
        </div>
      </div>
      {{-- 프로필 --}}

      <div class="move_some">
        <div class="move_goods_btn">
          <a href="{{url('/mylab/goods')}}">商品閲覧</a>
        </div>

        <div class="move_friends_btn">
          <a href="{{url('/mylab/follow')}}">友達閲覧</a>
        </div>
      </div>

      <div class="bxslider_title">
        <p>商品リスト</p>
      </div>
      <div class="bxslider_content">
        <ul class="bxslider">
          <li><a href="#"><img src="https://s-media-cache-ak0.pinimg.com/736x/b7/e6/9a/b7e69af39631e1734fec3301af1846bd--centerpiece-wedding-centerpiece-ideas.jpg"/></a></li>
          <li><a href="#"><img src="http://www.grandrental-stl.com/wp-content/uploads/2016/04/Cylinder_Vase.jpg"/></a></li>
          <li><a href="#"><img src="http://mblogthumb2.phinf.naver.net/20140612_297/eunki3131_1402537172587o4naB_JPEG/10_%BF%C0%B9%CC%C0%DA%BD%BD%B7%AF%BD%C3-1.jpg?type=w2"/></a></li>
          <li><a href="#"><img src="http://post.phinf.naver.net/MjAxNzA2MTVfMTI2/MDAxNDk3NTE1MzU4MzY3.aBcLQykpHxCL13wtqXjP-FzhN7ajNb4iPjL8upyrb84g.BhzecxHCcPZC5MnA-qyVJiz8KuNFaE4ZtbeF5kgrAXog.JPEG/%EC%8A%A4%EB%B2%85%EB%85%B9%EC%B0%A82-04.jpg?type=w1200"/></a></li>
        </ul>
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
              <option value="timeline">タイムライン</option>
              <option value="made">물품</option>
            </select>
            <!-- javascript로 추가 -->
            <!-- 대분류가 타임라인일 경우 -> 없음 -->
            <!-- 대분류가 물품등록일경우 -> 등록한 카테고리가 나옴 -->
          </div>
        </div>

        <div class="text_input">
          <div class="text_profile_img">
            <img src="{{asset('storage/image/profile7.jpg')}}" alt="">
          </div>

            <div class="text_user_name">
              <p>Double O</p>
            </div>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <textarea name="input_write" rows="5" cols="30" class="input_write" placeholder="内容を入力してください。" maxlength="150"></textarea>
            <button type="submit" name="submit_write" class="submit_button">確認</button>
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
          <!-- 글 내용 부분 -->
          <div class="post">
            <div class="post_name_img_date">
              <div class="post_profile_img">
                <img src="{{asset('storage/image/profile4.png')}}" alt="">
              </div>
              <div class="post_profile_name">
                <p>今日のお茶</p>
              </div>
              <div class="post_profile_date">
                <p>2017年７月５日</p>
                {{-- {{$timeline_content['updated_at']}} --}}
              </div>
            </div>
            <div class="post_content">
              <p>
                緑色でたっぷり！お茶マーケットを開催することになりました。<br/>
                初めてのフリーマーケット開催ですが宜しくお願いします。<br/>
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
          <!-- 글 내용 부분 -->
          <div class="post">
            <div class="post_name_img_date">
              <div class="post_profile_img">
                <img src="{{asset('storage/image/profile7.jpg')}}" alt="">
              </div>
              <div class="post_profile_name">
                <p>Double O</p>
              </div>
              <div class="post_profile_date">
                <p>2017年６月５日</p>
                {{-- {{$timeline_content['updated_at']}} --}}
              </div>
            </div>
            <div class="post_content">
              <p>
                今回もロッテーフリマーケットに参加することになりました。<br/>
                今回はお茶を用意しました。宜しくお願いします。<br/>
                
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
          <!-- 글 내용 부분 -->
          <div class="post">
            <div class="post_name_img_date">
              <div class="post_profile_img">
                <img src="{{asset('storage/image/profile6.jpeg')}}" alt="">
              </div>
              <div class="post_profile_name">
                <p>チョコの国</p>
              </div>
              <div class="post_profile_date">
                <p>2017年６月３日</p>
                {{-- {{$timeline_content['updated_at']}} --}}
              </div>
            </div>
            <div class="post_content">
                <p>
                  フリーマーケットを企画しています。<br/>
                  興味がある方はご連絡お願いします。<br/>
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
          <!-- 글 내용 부분 -->
          <div class="post">
            <div class="post_name_img_date">
              <div class="post_profile_img">
                <img src="{{asset('storage/image/profile7.jpg')}}" alt="">
              </div>
              <div class="post_profile_name">
                <p>Double O</p>
              </div>
              <div class="post_profile_date">
                <p>2017年５月２５日</p>
                {{-- {{$timeline_content['updated_at']}} --}}
              </div>
            </div>
            <div class="post_content">
              <p>
                ロッテーフリマーケットに参加します。<br/>
                私が用意する商品はキャンドルです。<br/>
                宜しくお願いします。<br/>
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
          <!-- 글 내용 부분 -->
          <div class="post">
            <div class="post_name_img_date">
              <div class="post_profile_img">
                <img src="{{asset('storage/image/profile7.jpg')}}" alt="">
              </div>
              <div class="post_profile_name">
                <p>Double O</p>
              </div>
              <div class="post_profile_date">
                <p>2017年5月5日</p>
                {{-- {{$timeline_content['updated_at']}} --}}
              </div>
            </div>
            <div class="post_content">
              <p>
                初めてアトリエを作りました。.<br/>
                フリーマーケットの参加と開催のためにアカウントを作りました。<br/>
                宜しくお願いします。<br/>
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
        <p><strong>友達リスト</strong></p>
      </div>
      <div class="follow_list">
          <!-- 반복 할 곳이 여기다 여기 -->
        <div class="follow_list_form">
          <div class="follow_seller_img">
            <img src="{{asset('storage/image/profile6.jpeg')}}" alt="">
          </div>
          <div class="follow_seller_info">
            <div class="follow_seller_intro">
              <p>チョコの国</p>
              {{-- <p>{{$subscription->title}}</p> --}}
            </div>
          </div>
          <div class="follow_btn">
            <button type="button" class="">
              <a href="#">閲覧</a>
            </button>
          </div>
        </div>
          <!--반복 할 곳이 여기까지야 여기 -->

          <!-- 반복 할 곳이 여기다 여기 -->
        <div class="follow_list_form">
          <div class="follow_seller_img">
            <img src="{{asset('storage/image/profile8.jpeg')}}" alt="">
          </div>
          <div class="follow_seller_info">
            <div class="follow_seller_intro">
              <p>キャンドルの職人</p>
              {{-- <p>{{$subscription->title}}</p> --}}
            </div>
          </div>
          <div class="follow_btn">
            <button type="button" class="">
              <a href="#">閲覧</a>
            </button>
          </div>
        </div>
          <!--반복 할 곳이 여기까지야 여기 -->

          <!-- 반복 할 곳이 여기다 여기 -->
        <div class="follow_list_form">
          <div class="follow_seller_img">
            <img src="{{asset('storage/image/profile4.png')}}" alt="">
          </div>
          <div class="follow_seller_info">
            <div class="follow_seller_intro">
              <p>今日のお茶</p>
              {{-- <p>{{$subscription->title}}</p> --}}
            </div>
          </div>
          <div class="follow_btn">
            <button type="button" class="">
              <a href="#">閲覧</a>
            </button>
          </div>
        </div>
          <!--반복 할 곳이 여기까지야 여기 -->

          <!-- 반복 할 곳이 여기다 여기 -->
        <div class="follow_list_form">
          <div class="follow_seller_img">
            <img src="{{asset('storage/image/profile5.jpeg')}}" alt="">
          </div>
          <div class="follow_seller_info">
            <div class="follow_seller_intro">
              <p>芋マーケット</p>
              {{-- <p>{{$subscription->title}}</p> --}}
            </div>
          </div>
          <div class="follow_btn">
            <button type="button" class="">
              <a href="#">閲覧</a>
            </button>
          </div>
        </div>
          <!--반복 할 곳이 여기까지야 여기 -->
      </div>
    </div>
  </div>
@endsection
