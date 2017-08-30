$(function(){
  var background_img = "background_1.jpg";
  var left_img = "left_1.png";
  var center_img = "center_1.png";
  var right_img = "right_1.png";
  var font_style = "normal";
  var font_size = "30px";
  var font_color = "gray";
  var font_weight = "0";

  $(".draggable_content_sub").hide();
  $(".widget_content_list").hide();
  $(".timeline_content_list").hide();
  $(".ui_content_list").hide();
  $(".background_content_list").hide();
  $(".profile").hide();
  $(".profile_introduce").hide();
  $(".goods_introduce").hide();
  $(".bxslider_title").hide();
  $(".bxslider_content").hide();
  $(".timeline").hide();
  $(".follow_list_title").hide();
  $(".follow_list").hide();
  $(".drag_main_content").hide();
  //기본 요소 숨기기

  $(".first_content").click(function(){
    $(".draggable_content_sub").show();
    $(".widget_content_list").show();
    $(".timeline_content_list").hide();
    $(".ui_content_list").hide();
    $(".background_content_list").hide();
  });
  //왼쪽 fixed 요소 첫번째 클릭시


  $(".second_content").click(function(){
    $(".draggable_content_sub").show();
    $(".widget_content_list").hide();
    $(".timeline_content_list").show();
    $(".ui_content_list").hide();
    $(".background_content_list").hide();
  });
  //왼쪽 fixed 요소 두번째 클릭시

  $(".third_content").click(function(){
    $(".draggable_content_sub").show();
    $(".widget_content_list").hide();
    $(".timeline_content_list").hide();
    $(".ui_content_list").show();
    $(".background_content_list").hide();
  });
  //왼쪽 fixed 요소 세번째 클릭시


  $(".fourth_content").click(function(){
    $(".draggable_content_sub").show();
    $(".widget_content_list").hide();
    $(".timeline_content_list").hide();
    $(".ui_content_list").hide();
    $(".background_content_list").show();
  });
  //왼쪽 fixed 요소 네번째 클릭시


  $(".cancel_content").click(function(){
    $(".draggable_content_sub").hide();
  });
  //왼쪽 fixed 요소 취소 클릭시

  $(".drop_bg_object").click(function(){
    background_img = $(this).attr("alt");

    $(".background_content").css({
      "background" : "url(/storage/image/"+background_img,
      "opacity" : "0.5",
      "background-repeat" : "no-repeat",
      "background-size" : "cover",
    });
  });
  //클릭 시 제목 부분 이미지 변화

  $(".drop_left_object").click(function(){
    left_img = $(this).attr("alt");

    if(left_img == "left_1.png"){
      $(".profile").show();
      $(".goods_introduce").show();
      $(".profile_introduce").show();
      $(".bxslider_title").hide();
      $(".bxslider_content").hide();
    }
    else if(left_img == "left_2.png"){
      $(".profile").hide();
      $(".goods_introduce").hide();
      $(".profile_introduce").hide();
      $(".bxslider_title").show();
      $(".bxslider_content").show();
    }
  });
  //클릭 시 왼쪽 부분 이미지 변화

  $(".drop_center_object").click(function(){
    center_img = $(this).attr("alt");

    if(center_img == "center_5.png"){
      $(".timeline").show();
    }

  });
  //클릭 시 가운데 부분 이미지 변화

  $(".drop_right_object").click(function(){
    right_img = $(this).attr("alt");

    if(right_img == "right_1.png"){
      $(".follow_list_title").show();
      $(".follow_list").show();
    }
  });
  //클릭 시 가운데 부분 이미지 변화


  $(".drop_bg_object").mousedown(function(){
    $(this).css({
      "border" : "1px solid red",
    })
  });

  $(".drop_bg_object").mouseup(function(){
    $(this).css({
      "border" : "0",
    });
  });

  $(".drop_font_object").mousedown(function(){
    $(this).css({
      "color" : "red",
    })
  });

  $(".drop_font_object").mouseup(function(){
    $(this).css({
      "color" : "black",
    });
  });
  //.drop_font_object의 클릭 표시

  $(".drop_font_size_object").mousedown(function(){
    $(this).css({
      "color" : "red",
    })
  });

  $(".drop_font_size_object").mouseup(function(){
    $(this).css({
      "color" : "black",
    });
  });
  //.drop_font_size_obejct의 클릭 표시

  $(".drop_font_color_object").mousedown(function(){
    $(this).css({
      "color" : "red",
    })
  });

  $(".drop_font_color_object").mouseup(function(){
    var font_color = $(this).attr("value");
    $(this).css({
      "color" : font_color,
    });
  });
  //.drop_font_color_object의 클릭 표시

  $(".drop_font_weight_object").mousedown(function(){
    $(this).css({
      "color" : "red",
    })
  });

  $(".drop_font_weight_object").mouseup(function(){
    $(this).css({
      "color" : "black",
    });
  });
  //.drop_font_weight_object의 클릭 표시

  $(".drop_left_object").mousedown(function(){
    $(this).css({
      "color" : "red",
    })
  });

  $(".drop_left_object").mouseup(function(){
    $(this).css({
      "color" : "black",
    });
  });
  //.drop_left_object의 클릭 표시


  $(".drop_font_object").click(function(){
    font_style = $(this).attr("value") ;
    $(".background_content_title").css({
      "font-style" : font_style,
    });
  });
  //클릭시 폰트 스타일 변화

  $(".drop_font_size_object").click(function(){
    font_size = $(this).attr("value") ;
    $(".background_content_title input").css({
      "font-size" : font_size,
    });
  });
  //클릭시 폰트 사이즈 변화

  $(".drop_font_color_object").click(function(){
    font_color = $(this).attr("value") ;
    $(".background_content_title").css({
      "color" : font_color,
    });
  });
  //클릭 시 폰트 색상 변화

  $(".drop_font_weight_object").click(function(){
    font_weight = $(this).attr("value") ;
    $(".background_content_title").css({
      "font-weight" : font_weight,
    });
  });
  //클릭 시 폰트 굵기 변화

  $(".submit_button").click(function(){
    var lab_name = $(".lab_name").val();
    $.ajax({
      url : "/mylab/create/myshop",
      type: "get",
      data : {
        lab_name : lab_name,
        background_img : background_img,
        left_img : left_img,
        center_img : center_img,
        right_img : right_img,
        font_style : font_style,
        font_size : font_size,
        font_color : font_color,
        font_weight: font_weight,
      },
      success : function(data){
        window.alert(data);
        location.replace("/mylab/show");
      },
      error : function(){
        window.alert("fail");
      }
    });
  });
});
