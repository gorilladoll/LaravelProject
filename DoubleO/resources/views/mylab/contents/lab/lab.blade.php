@extends('mylab.layouts.mylab')

@section('title', '개인공방')

@section('style')
  <style media="screen">
    .background_content{
      position : relative;
    }

    .background_content_img{
      width : 100%;
      height : 100%;
      background: url({{"/storage/image/".$myshop->background_img}});
      opacity: 0.5;
      position : absolute;
      top : 0px;
      left : 0px;
    }

    .background_content_title p{
      text-align : center;
      font-style : {{$myshop->font_style}};
      font-size : {{$myshop->font_size}};
      color : {{$myshop->font_color}};
      font-weight : {{$myshop->font_weight}};
      opacity : 1.0 !important;
    }

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

    .NoContent {
      margin : 0 auto;
      margin-top : 15%;
      text-align : center;
      font-size : 2.2em;
    }

    .modal_for_write {
      margin : 0 auto;
      width : 10%;
      height : 10%;
      background-color : skyblue;
      border-radius : 100%;
      text-align : center;
      font-size : 2.2em;
      font-weight : bold;
      position : absolute;
      top : 90%;
      left : 45%;
    }
  </style>
  <script type="text/javascript">
    $(function(){
      $(".profile").show();
      $(".profile_introduce").show();
      $(".goods_introduce").show();
      $(".bxslider_title").show();
      $(".bxslider_content").show();
      $(".timeline").show();
      $(".follow_list_title").show();
      $(".follow_list").show();
      $(".modal_for_write").click(function(){
        $("#write_content_modal").modal('show');
      });
    });
  </script>
@endsection

@section('content')
  <div class="main_content">
    <div class="droppable_content_main">
      <div class="background_content">
        <div class="background_content_img"></div>
        <div class="background_content_title">
          <p>{{$myshop->lab_name}}</p>
        </div>
      </div>

      <div class="left_content">
        @if ($myshop['left_img'] == "left_1.png")
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

        @elseif ($myshop['left_img'] == "left_2.png")
          <div class="bxslider_title">
            <p>판매자의 물품</p>
          </div>
          <div class="bxslider_content">
            <ul class="bxslider">
              @if (isset($goods_images) && count($goods_images) >= 3)
                @foreach ($goods_images as $goods_image)
                  <li><a href="#"><img src="/storage/image/{{$goods_image->filename}}"/></a></li>
                @endforeach
              @else
                <li><a href="#"><img src="http://img.allurekorea.com/allure/2010/10/style_5652de85caafc.jpg"/></a></li>
                <li><a href="#"><img src="http://pimage.design.co.kr/cms/contents/direct/info_id/64299/1383503026192.jpg"/></a></li>
                <li><a href="#"><img src="http://deco1st.com/web/product/medium/201412/9008_shop1_801721.jpg"/></a></li>
                <li><a href="#"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRp3g9dB7qHZgwFrjw7_zSI2OtG9l26orLoxkWYAdYPGBV6KOiV"/></a></li>
              @endif
            </ul>
          </div>
        @endif
      </div>

      <div class="center_content">
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
          <div class="modal_for_write">
            <p>글쓰기</p>
          </div>
        </div>
      </div>

      <div class="right_content">
          <div class="seller_follow_list">
            <div class="follow_list_title">
              <p><strong>판매자 구독리스트</strong></p>
            </div>
            <div class="follow_list">
                <!-- 반복 할 곳이 여기다 여기 -->
              @foreach ($subscriptions as $subscription)
                <div class="follow_list_form">
                  <div class="follow_seller_img">
                    <img src="{{asset('storage/image/apeach.jpg')}}" alt="">
                  </div>
                  <div class="follow_seller_info">
                    <div class="follow_seller_name">
                      {{-- <p>울먹이</p> --}}
                      <p>{{$subscription->name}}</p>
                    </div>
                    <div class="follow_seller_intro">
                      {{-- <p>울먹울먹 울먹마켓</p> --}}
                      <p>{{$subscription->lab_name}}</p>
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

  <form action="/board/create" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="write_content_modal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id=""></h4>
          </div>
          <div class="modal-body">

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
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection
