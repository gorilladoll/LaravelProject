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
  $(".move_some").hide();
  $(".textbox").hide();
  $(".timeline").hide();
  $(".follow_list_title").hide();
  $(".follow_list_form").hide();


  //기본 요소 숨기기

  $(".first_content").click(function(){
    $(".draggable_content_sub").show();
    $(".widget_content_list").show();
    $(".timeline_content_list").hide();
    $(".ui_content_list").hide();
    $(".background_content_list").hide();
    $(".drag_sub_content").hide();

    $(".background_content").show();
    $(".left_content").show();
    $(".center_content").show();
    $(".right_content").show();
    $(".drag_main_content").hide();
  });
  //왼쪽 fixed 요소 첫번째 클릭시


  $(".second_content").click(function(){
    $(".draggable_content_sub").show();
    $(".widget_content_list").hide();
    $(".timeline_content_list").show();
    $(".ui_content_list").hide();
    $(".background_content_list").hide();
    $(".drag_sub_content").hide();

    $(".background_content").show();
    $(".left_content").show();
    $(".center_content").show();
    $(".right_content").show();
    $(".drag_main_content").hide();
  });
  //왼쪽 fixed 요소 두번째 클릭시

  $(".third_content").click(function(){
    $(".draggable_content_sub").show();
    $(".widget_content_list").hide();
    $(".timeline_content_list").hide();
    $(".ui_content_list").show();
    $(".background_content_list").hide();
    $(".drag_sub_content").hide();

    $(".background_content").show();
    $(".left_content").show();
    $(".center_content").show();
    $(".right_content").show();
    $(".drag_main_content").hide();
  });
  //왼쪽 fixed 요소 세번째 클릭시


  $(".fourth_content").click(function(){
    $(".draggable_content_sub").show();
    $(".widget_content_list").hide();
    $(".timeline_content_list").hide();
    $(".ui_content_list").hide();
    $(".background_content_list").show();
    $(".drag_sub_content").hide();


    $(".background_content").show();
    $(".left_content").show();
    $(".center_content").show();
    $(".right_content").show();
    $(".drag_main_content").hide();
  });
  //왼쪽 fixed 요소 네번째 클릭시

  $(".fifth_content").click(function(){
    $(".draggable_content_sub").show();
    $(".widget_content_list").hide();
    $(".timeline_content_list").hide();
    $(".ui_content_list").hide();
    $(".background_content_list").hide();
    $(".drag_sub_content").show();

    $(".background_content").hide();
    $(".left_content").hide();
    $(".center_content").hide();
    $(".right_content").hide();
    $(".drag_main_content").show();
    window.alert("원하시는 컨텐츠를 드래그 하세요");
  });

  $(".cancel_content").click(function(){
    $(".draggable_content_sub").hide();
  });
  //왼쪽 fixed 요소 취소 클릭시

  $(".drop_bg_object").click(function(){
    background_img = $(this).attr("alt");

    $(".background_content").css({
      "background" : "url(/storage/image/"+background_img+")",
      "opacity" : "0.5",
      "background-repeat" : "no-repeat",
      "background-size" : "cover",
    });
  });
  //클릭 시 제목 부분 이미지 변화

  $(".drop_left_object").click(function(){
    left_img = $(this).attr("alt");

    if(left_img == "left_3.png"){
      $(".profile").show();
      $(".profile_introduce").show();
      $(".move_some").show();
    }
  });
  //클릭 시 왼쪽 부분 이미지 변화

  $(".drop_center_object").click(function(){
    center_img = $(this).attr("alt");

    if(center_img == "center_1.png"){
      $(".timeline").show();
      $(".textbox").show();
    }

  });
  //클릭 시 가운데 부분 이미지 변화

  $(".drop_right_object").click(function(){
    right_img = $(this).attr("alt");

    if(right_img == "right_2.png"){
      $(".follow_list_title").show();
      $(".follow_list_form").show();
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

  $(".drag_sub_background_content").draggable({
    accept : $(".main_content"),
    grid:[10,10],
    snap: true,
    revert: "invalid",
    cursor: "move",
    helper: "clone",
  });

  $(".drag_sub_textbox").draggable({
    accept : $(".main_content"),
    grid:[10,10],
    snap: true,
    revert: "invalid",
    cursor: "move",
    helper : "clone",
  });

  $(".drag_sub_font_style").draggable({
    accept : $(".drag_sub_textbox"),
    grid:[10,10],
    snap: true,
    revert: "invalid",
    cursor: "move",
    helper : "clone",
  });

  $(".drag_sub_font_size").draggable({
    accept : $(".drag_sub_textbox"),
    grid:[10,10],
    snap: true,
    revert: "invalid",
    cursor: "move",
    helper : "clone",
  });

  $(".drag_sub_font_color").draggable({
    accept : $(".drag_sub_textbox"),
    grid:[10,10],
    snap: true,
    revert: "invalid",
    cursor: "move",
    helper : "clone",
  });

  $(".drag_sub_font_weight").draggable({
    accept : $(".drag_sub_textbox"),
    grid:[10,10],
    snap: true,
    revert: "invalid",
    cursor: "move",
    helper : "clone",
  });

  $(".drag_sub_timeline_object").draggable({
    accept : $(".main_content"),
    grid:[10,10],
    snap: true,
    revert: "invalid",
    cursor: "move",
    helper : "clone",
  });

  $(".drag_sub_profile_object").draggable({
    accept : $(".main_content"),
    grid:[10,10],
    snap: true,
    revert: "invalid",
    cursor: "move",
    helper : "clone",
  });

  $(".drag_sub_follow_object").draggable({
    accept : $(".main_content"),
    grid:[10,10],
    snap: true,
    revert: "invalid",
    cursor: "move",
    helper : "clone",
  });

  $(".main_content").droppable({
    drop:function(event,ui){
      if($(ui.draggable).is($(".drag_sub_background_content"))){
        var img_name = $(ui.draggable).attr("alt");
        $(".main_content").css({
          "background" : "url(/storage/image/"+img_name+")",
          "background-repeat" : "no-repeat",
          "background-size" : "cover",
        });
      }

      else if($(ui.draggable).is($(".drag_sub_textbox"))){
        // var classObject = $(".new_input_"+text_count);
        $(".main_content").append("<div class='new_input'><input tyle='text' placeholder='공방이름을 입력하세요'></div>")
        $(".new_input").css({
          "width" : "500px",
          "height" : "100px",
          "font-size" : "30px",
          "position" : "absolute",
          "left" : ui.offset.left - $(this).offset().left,
          "top" : ui.offset.top - $(this).offset().top,
        });

        $(".new_input input").css({
          "width" : "100%",
          "height" : "100%"
        });
        $(ui.draggable).draggable("disable");
      }
      else if($(ui.draggable).is($(".drag_sub_profile_object"))){
        $(".main_content").append("<div class='profile_box'></div>");
        $(".profile_box").append("<div class='profile_1'></div>");
        $(".profile_1").append("<div class='profile_img_1'>"+"<img src='/storage/image/apeach.jpg'>"+"</div>");
        $(".profile_1").append("<div class='profile_name_1'><p><b>닉네임</b></p></profile_name>");
        $(".profile_1").append("<div class='profile_introduce_1'></div>");
        $(".profile_introduce_1").append("<div class='profile_introduce_introduce_1'><p>&nbsp; 닉네임의 공방입니다<br/><p></div>")
        $(".profile_box").append("<div class='move_some_1'></div>");
        $(".move_some_1").append("<div class='move_goods_btn_1'><a href='#'>물품보기</a></div>");
        $(".move_some_1").append("<div class='move_friends_btn_1'><a href='#'>친구공방</a></div>");


        $(".profile_box").css({
          "width" : "254px",
          "height" : "360px",
          "position" : "absolute",
          "left" : ui.offset.left - $(this).offset().left,
          "top" : ui.offset.top - $(this).offset().top,
          "background-color" : "white",
        });

        $(".profile_1").css({
          "width" : "100%",
          "height" : "310px",
          "text-align": "center",
          "background-color" : "lightgray",
          "border-bottom" : "2px solid red"
        });

        $(".profile_img_1").css({
          "margin-left" : "0 auto",
          "width" : "100%",
          "height" : "200px",
        });

        $(".profile_img_1 img").css({
          "margin-top" : "50px",
          "margin-bottom" : "15px",
          "width" : "50%",
          "height" : "55%",
          "border" : "1px solid gray",
        });

        $(".profile_name_1").css({
          "margin-top" : "5px",
          "border-top" : "2px solid red",
          "border-bottom" : "2px solid red",
          "width" : "100%",
          "font-size" : "15px"
        });

        $(".profile_introduce_1").css({
          "margin" : "0 auto",
          "width" : "100%",
          "height" : "80px",
          "background" : "white"
        });


        $(".profile_introduce_introduce_1").css({
          "width" : "100%",
          "height" : "100%",
          "background-color" : "white"
        });

        $(".profile_name p").css({
          "margin-top" : "5px",
        });

        $(".move_some").css({
          "width" : "100%",
          "height" : "50px",
          "padding-top" : "5px",
          "margin-bottom" : "5px",
          "width" : "100%",
          "height" : "50px",
          "border-top" : "1px solid gray"
        });

        $(".move_goods_btn_1").css({
          "margin-top" : "5px",
          "padding-top" : "7px",
          "width" : "50%",
          "height" : "45px",
          "background-color" : "lightgreen",
          "text-align" : "center",
          "font-size" : "20px",
          "border" : "1px solid black",
          "border-radius" : "10px",
          "float" : "left"
        });

        $(".move_friends_btn_1").css({
          "margin-top" : "5px",
          "padding-top" : "7px",
          "width" : "50%",
          "height" : "45px",
          "background-color" : "lightgreen",
          "text-align" : "center",
          "font-size" : "20px",
          "border" : "1px solid black",
          "border-radius" : "10px",
          "float" : "left"
        });

        $(ui.draggable).draggable("disable");
      }
    }
  });



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
