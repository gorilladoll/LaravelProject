@extends('mylab.layouts.mylab')

@section('title', '물품보기')

@section('style')
  <script type="text/javascript">
    $(function(){
      $(".profile").show();
    });
  </script>
@endsection

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
      <h6> - 카테고리명</h6>
      @foreach ($category as $category_distinct)
        <h6>{{$category_distinct['category']}}</h6>
      @endforeach
    </div>
  </div>
  <!-- 물품첫화면은 전체물품이 나오게 함 -->
  <div class="goods">
    <div class="lab_title">
      <h2>category name</h2>
    </div>
    <div class="category_imgs">
      <ul>
        @foreach ($goods as $good)
          <li>
            @foreach ($images as $image)
              @if ($image['goods_id'] == $good['id'])
                <div class="goods_img">
                  <img src="{{asset('/storage/image/'.$image['filename'])}}" alt="">
                </div>
              @endif
            @endforeach
          </li>
        @endforeach
      </ul>

    </div>
  </div>

<!-- 카테고리 모달 -->
<form class="category_form" action="index.html" method="post">
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
                <input type="text" name="category" value="">
                <button id="category_input" type="button" class="btn btn-default">
                  입력
                </button>
              </div>
              <div class="add_category">
                <div class="category_name">
                  - <p>카테고리</p>
                </div>
                <div class="category_name">
                  - <p>카테고리</p>
                </div>
              </div>
              <div class="add_category_btn">
                <button id="add_category_btn" type="button" class="btn btn-default">
                  추가
                </button>
              </div>
            </div>
            <div class="category2">
              <p class="category_title">카테고리</p>
              <div class="add_category">
                <!-- 여기여기 -->
                <div class="category_name">
                  - <p>카테고리</p>
                  <button id="category_delete" type="button" name="button">
                    <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
                  </button>
                </div>
                <!-- 여기여기 -->
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" id="category_add" class="btn btn-danger">수정</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">취소</button>
        </div>
      </div>
    </div>
  </div>
</form>
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
          <div class="goods_write">
            <div class="goods_title">
              <div class="category_dropbox">
                <select class="category_dropbox" name="category"> -->
                  <!-- 카테고리 -->
                  <!-- 사용자 별로 작성한 카테고리를 가져옴 -->

                  <option value="ㄱ">ㄱ</option>
                  <option value="ㄴ">ㄴ</option>
                  <option value="ㄷ">ㄷ</option>
                </select>
              </div>
              <div class="goods_title_input">
                <input type="text" name="goods_name" value="" placeholder="물품이름을 입력해주세요.">
                <button type="button" name="button">
                  <span class="glyphicon glyphicon-picture" aria-hidden="true"></span>
                </button>
                <input type="file" name="goods_img_file" value="" id="goods_img_file">
              </div>
            </div>
            <div class="goods_intro">
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


  @yield('category')
</div>
@endsection
