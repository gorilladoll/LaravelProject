@extends('mylab.layouts.mylab')

@section('title', '개인공방')

@section('style')
<style media="screen">
  .main_content{
    margin: 0 auto;
    position : relative;
    /*border : 1px solid black;*/
    width : 1200px;
    height : 1200px;
  }

  .title{
    margin: 0 auto;
    background-image: url(http://cfile28.uf.tistory.com/image/2137E439521346182E4C25);
    background-repeat: no-repeat;
    background-position : center;
    background-size : 100% 100%;
    border : 1px solid black;
    width : 100%;
    height : 300px;
  }


  .title_content{
    margin : 0 auto;
    margin-top : 5%;
    align : center;
    font-size : 50px;
    text-align : center;
    color : black;
  }

  .bxslider_content {
    margin : 0 auto;
    width : 100%;
    height : 200px;
  }

  .bxslider {
    margin : 0 auto;
    width : 100%;
    height : 200px;
  }

  .bx-wrapper, .bx-viewport {
    margin : 0 auto !important;
    height: 180px !important;
  }

  .bx-viewport ul li img {
    width : 100%;
    height : 180px;
  }


  .clock{
    margin : 0 auto;
    background-color : white;
    width : 200px;
    height : 200px;
    position : absolute;
    top : {{$clock['top']}}px;
    left : {{$clock['left']-80}}px;
  }

  div.profile{
    position : absolute;
    top : {{$profile['top']}}px;
    left : {{$profile['left']-80}}px;
  }

  .calendar{
    margin: 0 auto;
    width : 200px;
    height : 200px;
    position : absolute;
    top : {{$stiker['top']}}px;
    left : {{$stiker['left']-80}}px;
  }

  .textbox{
    margin: 0 auto;
    position : absolute;
    top : {{$textbox['top']}}px;
    left : {{$textbox['left']-80}}px;
  }

  .timeline{
    margin: 0 auto;
    padding-top : 33px;
    border : 1px solid black;
    width : 605px;
    height : 600px;
    position : absolute;
    top : {{$timeline['top']}}px;
    left : {{$timeline['left']-80}}px;
    overflow-y : auto;
  }

  .friends{
    margin: 0 auto;
    border : 1px solid black;
    width : 200px;
    height : 402px;
    position : absolute;
    top : {{$friends['top']}}px;
    left : {{$friends['left']-80}}px;
    overflow-y : auto;
    overflow-x : hidden;
  }

  div.ui-datepicker{
    width : 100%;
    height : 100%;
   font-size : 10px;
  }
</style>
@endsection

@section('content')
  <div class="title">
    <div class="title_content">
      {{$myshop['title']}}
    </div>
  </div>

  <div class="main_content">
    <div class="bxslider_content">
      <ul class="bxslider">
        @if (isset($goods_images) && count($goods_images) >= 3)
          @foreach ($goods_images as $goods_image)
            <li><a href="#"><img src="/storage/image/{{$goods_image->filename}}"/></a></li>
          @endforeach
        @else
          <li><a href="#"><img src="http://210.116.77.61/wp-content/uploads/2016/01/%EC%BD%94%EC%97%91%EC%8A%A4-%EB%B0%B0%EB%84%88.jpg"/></a></li>
          <li><a href="#"><img src="http://cfile22.uf.tistory.com/image/271398445475983D09DB6F"/></a></li>
          <li><a href="#"><img src="http://pds21.egloos.com/pds/201310/23/88/d0005488_52676e7cda30f.jpg"/></a></li>
          <li><a href="#"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS2p1Cp5Yl2oFcEVpi5PDsyJEcSsEyGjNuh6jGRHrrdvGzsRGIabA"/></a></li>
          <li><a href="#"><img src="http://img3.doosanmagazine.gscdn.com/article_image/img_2/2013/10/01230102000001501_1.jpg"/></a></li>
          <li><a href="#"><img src="http://2.bp.blogspot.com/-IBsB9pK7r2Y/VCQNwvYJ7_I/AAAAAAAAAPI/5QpXvqd_wKA/s1600/%EC%86%8C%EC%9D%B4%EC%BA%94%EB%93%A402.jpg"/></a></li>
        @endif
      </ul>
    </div>

    <div class="clock">
        <div id="Date"></div>
          <ul id = "time">
              <li id="hours"></li>
              <li id="point">:</li>
              <li id="min"></li>
              <li id="point">:</li>
              <li id="sec"></li>
          </ul>
      </div>
      {{-- 시계 --}}

      <div class="calendar">
        <div id="datepicker1"></div>
      </div>
      {{-- 캘린더 --}}

      <div class="profile">
        <div class="profile_img">
          <img src="{{asset('storage/image/apeach.jpg')}}" alt="">
        </div>
        <div class="profile_name">
          <p>
            {{-- <b>울먹울먹</b> --}}
            <b>{{$user_name['name']}}</b>
          </p>
        </div>
      </div>
      {{-- 프로필 --}}

      <!-- 글내용 보기 -->
      <div class="timeline">
        @if (count($timeline_contents) != 0)
          @foreach ($timeline_contents as $timeline_content)
            <div class="write_content">
              <!-- 상단 프로필 부분 -->
              <div class="post_profile">
                <div class="post_profile_img">
                  <img src="{{asset('storage/image/apeach.jpg')}}" alt="">
                </div>
                <div class="post_profile_name">
                  {{-- <strong>울먹울먹</strong> --}}
                  <strong>{{$user_name['name']}}</strong>
                  <button type="button" name="button">...</button>
                </div>
                <div class="post_profile_date">
                  {{-- <p>5월 5일</p> --}}
                  {{$timeline_content['updated_at']}}
                </div>
              </div>

              <!-- 글 내용 부분 -->
              <div class="post">
                <div class="post_content">
                    {{-- 오늘도 울먹울먹 내일도 울먹울먹 내일도 울먹울먹 매일을 울먹울먹<br>
                    내일도 울먹울먹<br>
                    모레도 울먹울먹<br>
                    매일을 울먹울먹<br> --}}
                    <pre>
                      {{$timeline_content['content']}}
                    </pre>
                </div>
                @for ($i=0,$images = count($timeline_images); $i < $images ; $i++)
                  @if ($timeline_images[$i]['board_id'] == $timeline_content['id'])
                    <div class="picture">
                      <img src="{{URL::asset('/storage/image/'.$timeline_images[$i]['filename'])}}" alt="">
                    </div>
                  @endif
                @endfor
              </div>

              <!-- 버튼하단부분 -->
              <div class="post_btn">
                <div class="comment_btn_position">
                    <a href="#">댓글</a>
                </div>
                <div class="like_btn_position">
                    <a href="#">좋아요</a>
                </div>
              </div>
              <!-- 댓글 입력창 부분 -->
            </div>
          @endforeach
        @else
          <div class="NoContent">작성한 글이 없습니다</div>
        @endif
      </div>


  <!-- 타임라인 글 입력창 // 텍스트 박스 1 X 2 -->
      <form action="/board/create" method="post" enctype="multipart/form-data">
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
            <div class="text_write">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <textarea name="input_write" rows="5" cols="30" class="input_write" placeholder="글쓰기" maxlength="150"></textarea>
              <!--<button type="submit" name="submit_write" class="submit_button">작성완료</button><br/>-->
            </div>
          </div>

          <div class="text_btn">
            <div class="picture_btn">
              {{-- <span class="glyphicon glyphicon-picture" aria-hidden="true"></span> --}}
              <input type="file" name="img_upload[]" class="img_upload" multiple>
            </div>
            <div class="input_btn">
              <button type="submit" name="submit_write" class="submit_button">작성완료</button><br/>
            </div>
          </div>
        </div>
      </form>

      <div class="friends">
        <div class="seller_follow_list">
          <div class="follow_list_title">
            <p><strong>판매자 구독리스트</strong></p>
          </div>
          <div class="follow_list">
              <!-- 반복 할 곳이 여기다 여기 -->
            @foreach ($subscriptions as $subscription)
              <div class="follow_lisform">
                <div class="follow_seller_img">
                  <img src="{{asset('storage/image/apeach.jpg')}}" alt="">
                </div>
                <div class="follow_seller_info">
                  <div class="follow_seller_name">
                    <p>{{$subscription->name}}</p>
                  </div>
                  <div class="follow_seller_intro">
                    <p>{{$subscription->title}}</p>
                  </div>
                </div>
                <div class="follow_btn">
                  <button type="button" class="btn btn-danger btn-sm">
                    <a href="/mylab/user/lab/{{$subscription->id}}">보기</a>
                  </button>
                </div>
              </div>
              @endforeach
              <!--반복 할 곳이 여기까지야 여기 -->
            </div>
          </div>
        <!-- 판매자구독리스트 -->
      </div>
    </div>
@endsection
