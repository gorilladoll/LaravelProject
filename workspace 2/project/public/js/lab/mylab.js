$(document).ready(function(){
  $(window).scroll(function(){
    if($(document).scrollTop() > 80){
      $('.mylab_navbar').css('position', 'fixed');
      $('.mylab_navbar').css('top', '0');
    } else {
      $('.mylab_navbar').css('position', 'relative');
      $('.mylab_navbar').css('top', '0');
    }
  });


// 2017.06.13 화요일 추가됨------------------------------------
  // 물품등록 시 이미지 미리보기
  $("#goods_img_file").on('change', function(){
      readURL(this);
  });

  var image_data;
  // 이미지 미리보기
  function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
              $('#img_preview').attr('src', e.target.result);
              image_data = e.target.result;
          }

          reader.readAsDataURL(input.files[0]);
      }
  }
  
  // 2017.06.14 수요일 추가됨------------------------------------
  
  // 물품상세보기
  $('.goods_imgs').click(function(){
    var goods_id = $(this).attr("value");    // 물품아이디
                                   
    $.ajax({
      url : '/mylab/goods/detail',
      data : {
        goods_id : goods_id
      },
      type : 'get',
      success : function(data){
        
        $('.goods_detail_img').empty();   // 비우기
        $('.goods_id').empty();           // 비우기
        $('.review_comment').empty();     // 비우기
        
        var value = JSON.parse(data);        // json데이터 파싱
        
        // 총 평점계산
        var sumStarpoint = 0;
        for(var i = 0 ; i < value['comments'].length ; i++){
          sumStarpoint = sumStarpoint + value['comments'][i]['starpoint'];
        }
        
        var goods_id      = value['info']['goods_id'];              // 물품고유번호
        var goods_name    = value['info']['goods_name'];            // 물품이름
        var filename      = value['info']['img_filename'];          // 물품이미지파일
        var goods_point   = sumStarpoint / value['comments'].length;  // 물품평점
        var user_name     = value['info']['user_name'];             // 마이샵유저이름
        
        var img_file_link = "/storage/image/" + filename;   // 물품이미지 경로
        
        $('.goods_detail_img').append("<img src='" + img_file_link +"' alt=''>"); // 모달창에 물품이미지 동적으로 추가
        
        if(!goods_point){
          $('.goodsname').append("<p class='goods_id' value='"+goods_id+"'>" + goods_name + "&nbsp;&nbsp; 入力した評点がありません！</p>");          // 모달창에 물품이름 동적으로 추가
        } else{
         $('.goodsname').append("<p class='goods_id' value='"+goods_id+"'>" + goods_name + "&nbsp;&nbsp;"+goods_point.toFixed(2)+"点</p>");          // 모달창에 물품이름 동적으로 추가 
        }
        
        // console.log(goods_point.toFixed(2));
        
        if(value['comments']){
          for(var i = value['comments'].length-1 ; i >= 0 ; i--){
            $('.goodsname').after('<div class="review_comment"><p><strong>' + value['info']['user_name'] + '</strong>&nbsp;&nbsp;' + value['comments'][i]['text'] + '&nbsp;&nbsp;</p></div>');
          } 
        }
        
        $('#goods_detail_madal').modal('show');   // 모달창 보이기
      },
      error : function() {
        alert("サーバーエラー");
      }
    });
    
  });


  // 2017.06.18 일요일 추가---------------------------------------
  $('#category_input').click(function(){
    var input_category = $('#category_name_input').val();

    // 카테고리이름을 입력하지않았다면
    if(!input_category){
      alert("カテゴリーを入力してください！");

    } else{   // 카테고리 이름을 입력했다면
      $('.add_category1').append("<div class='category_name'> - <p>"+input_category+ "</p></div>");
      $('#category_name_input').val("");
    }
  });

// 2017.06.19 월요일 추가---------------------------------------
// 추가버튼누를때
  $('#add_category_btn').click(function(){
    var category = $('.add_category1').find('div').text();

    // 카테고리를 입력하지않고 버튼을 눌렀을 때
    if(!category){
      alert('追加するカテゴリーがありません！');


    } else{
      // 추가할 카테고리들 배열 -> 인덱스 0은 무조건 값이 없음
      var categories = category.split('- ');

      for(var i = 1 ; i < categories.length ; i ++){
        $('.add_category2').append("<div class='category_name'> - <p>" + categories[i] + "</p><button id='category_delete' type='button' name='button'><span class='glyphicon glyphicon-remove-circle' aria-hidden='true'></span></button></div>");
      }

      $(".add_category1").empty();
    }

  });

  // 카테고리 삭제버튼누르기, 동적 생성 요소
  $(document.body).on('click', '#category_delete', function(){
    // 해당하는 부모요소가 삭제됨
    $(this).parent().remove();

  });

  // 카테고리 수정 버튼누를때
  $('#category_add').click(function(){
    var categoryAdd = $('.add_category2').find('div').text();

    if(!categoryAdd){
      alert("修正するカテゴリーがありません！");

    } else{
      // 카테고리들 배열 저장
      var add_categories = categoryAdd.split('- ');

      $.ajax({
        url       : '/lab/goods/category',
        type      : 'get',
        data      : {
                      add_categories : add_categories
                    },
        success   : function(data){
                      window.alert(data);
                      if(data.result = "success"){
                        $('#category_modal').modal('hide');

                      } else {
                        alert('DBエラー');
                      }
                    },
        error     : function(){
                      alert('サーバーエラー');
                    }
      });
    }
  });


  $('.kv-ltr-theme-svg-star').rating({
      hoverOnClear: false,
      theme           : 'krajee-svg',
      containerClass  : 'is-star',
      filledStar      : '<span class="krajee-icon krajee-icon-star"></span>',
      emptyStar       : '<span class="krajee-icon krajee-icon-star"></span>',
      defaultCaption  : '{rating} star',
      starCaptions    : function (rating) {
                          return rating == 1 ? 'One star' : rating + ' stars';
                        }

  });


  $('#goods_comment_btn').click(function(){
    var goods_id    = $('.goods_id').attr("value");   // 물품 아이디

    var starpoint = $('#input-0-ltr-star-xs').val();        // 평점
    var comment   = $('input[name=goods_comment]').val();   // 댓글
    
    if(!starpoint && !comment){
      alert('コメントしてください！');

    } else if(!comment){
      alert('コメントしてください！');

    } else if(!starpoint){
      alert('評点してください！');

    } else{ // 리뷰 및 평점을 다 쓰고 입력버튼을 눌렀을 때
      // 게시글아이디, 게시글주인아이디, 유저아이디, 댓글, 평점 을 ajax로 보냄
      
      $.ajax({

        url         : '/mylab/goods/comment',
        data        : {
                        goods_id  : goods_id,
                        comment   : comment,
                        starpoint : starpoint
                      },
        type        : 'get',
        dataType    : 'json',
        // dataType    : 'jsonp',
        success     : function(data){
                
                        // 댓글쓴유저이름, 댓글내용을 가져와야함
                        $('.review_comments').append('<div class="review_comment"><p><strong>' + data['user_name'] + '</strong>&nbsp;&nbsp;' + data['text'] + '</p></div>');
                        $('#input-0-ltr-star-xs').empty();
                        $('input[name=goods_comment]').val("");
                      },
        error       : function(e) {
          console.log(e);
                        alert('サーバーエラー');
                      }
      });

    }
  });
});
