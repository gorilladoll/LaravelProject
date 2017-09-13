@extends('mylab.layouts.mylab')

@section('title', '구독공방')

@section('content')
<div class="seller_follow">
  <div class="seller_recommend">
    <div class="lab_title">
      <h5><strong>추천 판매자</strong></h5>
    </div>
    <div class="seller_profiles">
      <ul>
        @for ($i=0; $i < count($new_friends); $i++)
          <li>
            <div class="seller">
              <div class="seller_img">
                <img src="{{asset('storage/image/apeach.jpg')}}" alt="">
              </div>
              <div class="seller_name">
                <p>{{$new_friends[$i]['name']}}</p>
              </div>
              <a href="/mylab/seller/add/{{$new_friends[$i]['id']}}"><button type="button">구독</button></a>
            </div>
          </li>
        @endfor
      </ul>
    </div>
  </div>

  <div class="follow_board">
    <div class="lab_title">
      <h5><strong>구독공방 타임라인</strong></h5>
    </div>
  </div>
  <div class="seller_timeline">
    <!-- 글내용 보기 -->
    {{-- {{$subscription_timelines}} --}}
    @foreach ($subscription_timelines as $subscription_timeline)
      <div class="write_content">
        <!-- 상단 프로필 부분 -->
        <div class="post_profile">
          <div class="post_profile_img">
            <img src="{{asset('storage/image/apeach.jpg')}}" alt="">
          </div>
          <div class="post_profile_name">
            <strong>{{$subscription_timeline->lab_name}}</strong>
            <button type="button" name="button">...</button>
          </div>
          <div class="post_profile_date">
            <p>{{$subscription_timeline->updated_at}}</p>
          </div>
        </div>

        <!-- 글 내용 부분 -->
        <div class="post">
          <div class="post_content">
              <pre>{{$subscription_timeline->content}}</pre>
          </div>
          @for ($i=0,$image_count = count($images); $i < $image_count ; $i++)
            @if ($images[$i]['board_id'] == $subscription_timeline->id)
              <div class="picture">
                <img src="{{URL::asset('/storage/image/'.$images[$i]['filename'])}}" alt="">
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

  </div>
</div>
@endsection
