@extends('layouts.app')

@section('title', "seller's goods")

@section('style')
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  
  <!-- rating -->
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/star-rating.css" media="all" type="text/css"/>
  <link rel="stylesheet" href="../themes/krajee-fa/theme.css" media="all" type="text/css"/>
  <link rel="stylesheet" href="../themes/krajee-svg/theme.css" media="all" type="text/css"/>
  <link rel="stylesheet" href="../themes/krajee-uni/theme.css" media="all" type="text/css"/>


  <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link href="../css/star-rating.css" media="all" rel="stylesheet" type="text/css"/>
  <!--suppress JSUnresolvedLibraryURL -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="../js/star-rating.js" type="text/javascript"></script>

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="../js/star-rating.js" type="text/javascript"></script>
  <script src="../themes/krajee-fa/theme.js" type="text/javascript"></script>
  <script src="../themes/krajee-svg/theme.js" type="text/javascript"></script>
  <script src="../themes/krajee-uni/theme.js" type="text/javascript"></script>

  <script src="../js/bootstrap.min.js"></script>
  
  <script src="/js/lab/mylab.js" charset="utf-8"></script>
  <script type="text/javascript">
    $(function(){
      $(".profile").show();
    });
  </script>

  <link rel="stylesheet" href="/css/contents/mylab.css">
  <style media="screen">
    #goods_main {
      padding-top : 10px !important;
    }
  </style>
@endsection

@section('content')
<div id="goods_main">
  <div class="goods_menu">
    <div class="profile">
      <div class="profile_img">
        <img src="{{asset('storage/image/profile7.jpg')}}" alt="">
      </div>
      <div class="profile_name">
        <p>
          <!--<b>{{$user_name['name']}}</b>-->
          <b>Double O</b>
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

      <button id = "goods_btn_click" class="btn btn-danger" data-toggle="modal" data-target="#goods_modal">
        商品登録
      </button>
      <button id = "category_btn_click" class="btn btn-danger" data-toggle="modal" data-target="#category_modal">
        カテゴリー
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
        
        <!--물품 기본 4개-->
        <li>
          <div class="goods_imgs">
            <div class="goods_img">
              <img src="https://s-media-cache-ak0.pinimg.com/736x/b7/e6/9a/b7e69af39631e1734fec3301af1846bd--centerpiece-wedding-centerpiece-ideas.jpg"/>
            </div>
            <div class="goods_img_name">
              <p>明明と火をともそう！ キャンドル</p>
            </div>
          </div>
        </li>
        <li>
          <div class="goods_imgs">
            <div class="goods_img">
              <img src="http://www.grandrental-stl.com/wp-content/uploads/2016/04/Cylinder_Vase.jpg"/>
            </div>
            <div class="goods_img_name">
              <p>みんなのキャンドル</p>
            </div>
          </div>
        </li>
        <li>
          <div class="goods_imgs">
            <div class="goods_img">
              <img src="http://mblogthumb2.phinf.naver.net/20140612_297/eunki3131_1402537172587o4naB_JPEG/10_%BF%C0%B9%CC%C0%DA%BD%BD%B7%AF%BD%C3-1.jpg?type=w2"/>
            </div>
            <div class="goods_img_name">
              <p>へえースムージー</p>
            </div>
          </div>
        </li>
        <li>
          <div class="goods_imgs">
            <div class="goods_img">
              <img src="http://post.phinf.naver.net/MjAxNzA2MTVfMTI2/MDAxNDk3NTE1MzU4MzY3.aBcLQykpHxCL13wtqXjP-FzhN7ajNb4iPjL8upyrb84g.BhzecxHCcPZC5MnA-qyVJiz8KuNFaE4ZtbeF5kgrAXog.JPEG/%EC%8A%A4%EB%B2%85%EB%85%B9%EC%B0%A82-04.jpg?type=w1200"/>
            </div>
            <div class="goods_img_name">
              <p>甘み爆発!! グリーンティードーナツ</p>
            </div>
          </div>
        </li>
      </ul>

    </div>
  </div>

<!-- 카테고리 모달 -->
  <div class="modal fade" id="category_modal" tabindex="-1" role="dialog" aria-labelledby="categoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="categoryModalLabel">カテゴリー修正</h4>
        </div>
        <div class="modal-body">
          <div class="category_window">
            <div class="category1">
              <p class="category_title">カテゴリー追加</p>
              <div class="category_input">
                <input id="category_name_input" type="text" name="category" value="">
                <button id="category_input" type="button" class="btn btn-default">
                  入力
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
                  追加
                </button>
              </div>
            </div>
            <div class="category2">
              <p class="category_title">カテゴリー</p>
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
          <button type="button" id="category_add" class="btn btn-danger">修正</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">キャンセル</button>
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
          <h4 class="modal-title" id="goodsModalLabel">商品入力</h4>
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
                <input id="goods_name_insert" type="text" name="goods_name" value="" placeholder="商品名を書いてください。">
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
          <button type="submit" id="goods_save" class="btn btn-danger">登録</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">キャンセル</button>
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
        <h4 class="modal-title" id="">商品詳細</h4>
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
                <input type="text" name="goods_comment" value="" placeholder="commnet">
              </div>
              <div class="goods_comment_input_btn">
                <button id="goods_comment_btn" type="button" class="btn btn-danger">
                  登録
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
