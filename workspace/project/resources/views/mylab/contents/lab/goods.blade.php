@extends('mylab.layouts.mylab')

@section('title', '물품보기')

@section('content')
<div id="goods_main">
  <div class="goods_menu">
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
    <div class="goods_profile_btn">
      <!-- 본인페이지일경우 -> 물품등록, 카테고리수정 -->
      <!-- 아닐경우 -> 개인공방, 구독하기 -->
      <!-- <button type="button" class="btn btn-danger btn-sm">
        개인공방
      </button>
      <button type="button" class="btn btn-danger btn-sm">
        구독하기
      </button> -->

      <button class="btn btn-danger" data-toggle="modal" data-target="#goods_modal">
        물품등록
      </button>
      <button class="btn btn-danger" data-toggle="modal" data-target="#category_modal">
        카테고리수정
      </button>

    </div>
    <div class="goods_category">
      <h4>Category</h4>
      <!-- for문으로 유저마다의 카테고리를 가져옴 밑의 형식으로-->
      @foreach ($category as $category_distinct)
        <h6> - {{$category_distinct['category']}}</h6>
      @endforeach
    </div>
  </div>
  <!-- 물품첫화면은 전체물품이 나오게 함 -->
  <div class="goods">
    <div class="lab_title">
      
      <h2>category</h2>
    </div>
    <div class="category_imgs">
      <ul>
        @foreach ($goods as $good)
          <li>
            @foreach ($images as $image)
              @if(isset($image))
                @if ($image['goods_id'] == $good['id'])
                  <div class="goods_imgs" value="{{$good['id']}}">
                    <div class="goods_img">
                      <img src="{{asset('/storage/image/'.$image['filename'])}}" alt="">
                    </div>
                    <div class="goods_img_name">
                      <p>{{$good['name']}}</p>
                    </div>
                  </div>
                @endif
              @endif
            @endforeach
          </li>
        @endforeach
      </ul>

    </div>
  </div>

<!-- 카테고리 모달 -->
  <div class="modal fade" id="category_modal" tabindex="-1" role="dialog" aria-labelledby="categoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="categoryModalLabel">카테고리 수정</h4>
        </div>
        <div class="modal-body">
          <div class="category_window">
            <div class="category1">
              <p class="category_title">카테고리 추가</p>
              <div class="category_input">
                <input id="category_name_input" type="text" name="category" value="">
                <button id="category_input" type="button" class="btn btn-default">
                  입력
                </button>
              </div>
              <div class="add_category1">
                {{--여기여기--}}
                {{--<div class="category_name">--}}
                  {{-- - <p>카테고리</p>--}}
                {{--</div>--}}
                {{--여기여기--}}
              </div>
              <div class="add_category_btn">
                <button id="add_category_btn" type="button" class="btn btn-default">
                  추가
                </button>
              </div>
            </div>
            <div class="category2">
              <p class="category_title">카테고리</p>
              <div class="add_category2">
                {{--카테고리가 없을 경우--}}
                @if(!$category)

                @else   {{--카테고리가 존재할 경우--}}
                  @foreach ($category as $category_distinct)
                  <div class="category_name">
                   <p> - {{$category_distinct['category']}}</p>
                   <button id="category_delete" type="button" name="button">
                     <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
                    </button>
                  </div>
                  @endforeach
                @endif
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" id="category_add" class="btn btn-danger">수정</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">취소</button>
        </div>
      </div>
    </div>
  </div>
<!-- end 카테고리 모달 -->

<!-- 물품등록 모달 -->
<form class="goods_add_form" action="{{url('/mylab/goods/add')}}" method="post" enctype = "multipart/form-data">
  <input type="hidden" name="_token" value="{{csrf_token()}}">
  <div class="modal fade" id="goods_modal" tabindex="-1" role="dialog" aria-labelledby="goodsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="goodsModalLabel">물품등록</h4>
        </div>
        <div class="modal-body">
          <div class="goods_form">
            <div class="goods_title">
              <div class="category_dropbox">
                <select class="category_dropbox" name="category"> -->
                  <!-- 카테고리 -->
                  <!-- 사용자 별로 작성한 카테고리를 가져옴 -->
                  @foreach ($category as $category_distinct)
                    <option value="{{$category_distinct['category']}}">{{$category_distinct['category']}}</option>
                  @endforeach
                </select>
              </div>
              <div class="goods_title_input">
                <input id="goods_name_insert" type="text" name="goods_name" value="" placeholder="물품이름을 입력해주세요.">
                {{--<button type="button" name="button">
                  <span class="glyphicon glyphicon-picture" aria-hidden="true"></span>
                </button>--}}
                <input type="file" name="goods_img_file" value="" id="goods_img_file">
              </div>
            </div>
            <div class="goods_intro_img">
              <!-- 이미지 미리보기 창 -->
              <img id="img_preview" src="" alt="">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" id="goods_save" class="btn btn-danger">등록</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">취소</button>
        </div>
      </div>
    </div>
  </div>
</form>
<!-- end 물품등록 모달 -->


{{--물품상세보기 모달(리뷰 및 평점)--}}
<div class="modal fade" id="goods_detail_madal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="">물품 상세보기</h4>
      </div>
      <div class="modal-body">
        <!-- 물품상세페이지 -->
        <div class="goods_detail_form">
          <!-- 이미지 부분 -->
          <div class="goods_detail_img">
            <!--<img src="{{asset('img/apeach.jpg')}}" alt="">-->
          </div>
          <!-- 리뷰 및 평점 부분 -->
          <div class="goods_detail_contents">
            {{--댓글보여주는 전체 부분--}}
            <div class="goods_comments">
              {{--글쓴이 정보--}}
              <div class="seller_info">
                <div class="seller">
                  <img src="{{asset('storage/image/apeach.jpg')}}" alt=""><p>{{$user_name['name']}}</p>
                </div>
              </div>
              {{--댓글부분--}}
              <div class="review_comments">
                {{--물품이름 및 평점--}}
                <div class="goodsname"></div>
                {{--댓글 내용들(여기부터)--}}
                <!--<div class="review_comment">-->
                <!--  <p><strong>사용자</strong>&nbsp;&nbsp;댓글내용</p>-->
                <!--</div>-->
                {{--댓글 내용들(여기까지)--}}

              </div>
            </div>
            <!-- 평점부분 -->
            <div class="goods_point">
              <input id="input-0-ltr-star-xs" name="input-0-ltr-star-xs" class="kv-ltr-theme-svg-star rating-loading" value="0" dir="ltr" data-size="xs">
            </div>
            <!-- 댓글입력부분 -->
            <div class="goods_comment">
              <div class="goods_comment_input">
                <input type="text" name="goods_comment" value="" placeholder="댓글입력">
              </div>
              <div class="goods_comment_input_btn">
                <button id="goods_comment_btn" type="button" class="btn btn-danger">
                  입력
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
{{--END 물품상세보기 모달(리뷰 및 평점)--}}


  @yield('category')
</div>
@endsection
